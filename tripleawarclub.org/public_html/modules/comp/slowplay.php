<?php
/*
 * Created on 25.11.2006
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include '../../mainfile.php';
$xoopsOption['template_main'] = "slowplay.html";
include XOOPS_ROOT_PATH.'/header.php';

$challenge_id = isset($_GET['cid']) ? $_GET['cid'] : null;
if( isset($challenge_id) && !is_numeric($challenge_id) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
}

$ladder_id = isset($_GET['lid']) ? $_GET['lid'] : null;
if( isset($ladder_id) && !is_numeric($ladder_id) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
}

$user_id = isset($_GET['uid']) ? $_GET['uid'] : null;
if( isset($user_id) && !is_numeric($user_id) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
}

	$user_handler =& xoops_getmodulehandler('user');
	if (!$user_handler->isPlayer($ladder_id)) {
		redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_RIGHTS_VIEW));
	}

// Get the challenges
$challenges_handler =& xoops_getmodulehandler('challenges');
$challenge = $challenges_handler->getChallenge($challenge_id);

$ladder_handler =& xoops_getmodulehandler('ladder');
$ladder_name = $ladder_handler->getLadderName($ladder_id);

$player_handler =& xoops_getmodulehandler('player');

$challenge_table = $xoopsDB->prefix('comp_challenges');

switch($_GET['task']){

case 'send':

	if($user_id==$challenge['challenger_id']){ // the sender is the challenger
		$slowPlayReciever=array('id'=>$challenge['challenged_id'],'name'=>$challenge['challenged_name']);
		$slowPlaySender=array('id'=>$challenge['challenger_id'],'name'=>$challenge['challenger_name']);
	}else{ // the sender is the challenged
		$slowPlayReciever=array('id'=>$challenge['challenger_id'],'name'=>$challenge['challenger_name']);
		$slowPlaySender=array('id'=>$challenge['challenged_id'],'name'=>$challenge['challenged_name']);
	}

	// first check if its been a week
	$sql = "SELECT slowplay_date FROM $challenge_table WHERE challenge_id = $challenge_id";
	$query = $xoopsDB->query($sql);
	$result = $xoopsDB->fetchRow($query);
	$slowplay_date = strtotime($result[0]);
	$oneWeekAgo = mktime(0, 0, 0, date("m")  , date("d")-7, date("Y"));
	
	if ($slowplay_date == null || $oneWeekAgo > $slowplay_date) {
	
		// update slowplay (1 SP in effect) and slowplay_date
		$todaysDate = date('Y-m-d');
		$update = "UPDATE $challenge_table SET slowplay_date = '".$todaysDate."', slowplay = 1 WHERE challenge_id = ".$challenge_id." LIMIT 1";
		$xoopsDB->query($update);

		$slowPlayRecieverProfile = $player_handler->getPlayerProfile($slowPlayReciever['id']);
		$slowPlaySenderProfile = $player_handler->getPlayerProfile($slowPlaySender['id']);
		
		// send emails

		$xoopsMailer =& getMailer();
		$xoopsMailer->useMail(); 
		$xoopsMailer->setTemplateDir(XOOPS_ROOT_PATH.'/modules/comp/language/'.$xoopsConfig['language'].'/mail_template');
		$xoopsMailer->setTemplate("comp_slow_play_warning.tpl");
	
		$xoopsMailer->setToEmails($slowPlayRecieverProfile['email']);
		$xoopsMailer->setFromEmail("admin@tripleawarclub.org");
		$xoopsMailer->setFromName("TripleA WarClub");
		$xoopsMailer->setSubject("Slow Play Warning Issued");
	
		$xoopsMailer->assign("SENDER", $slowPlaySender['name']);
		$xoopsMailer->assign("RECEIVER", $slowPlayReciever['name']);
		$xoopsMailer->assign("RECEIVER_ID", $slowPlayReciever['id']);
		$xoopsMailer->assign("COMP_ID", $ladder_id);
		$xoopsMailer->assign("CHALLENGE_ID", $challenge_id);		
		$xoopsMailer->assign("SITENAME", $xoopsConfig['sitename']);
		$xoopsMailer->assign("SITEURL", XOOPS_URL."/");
	
		$xoopsMailer->send();
		
		// send private message to receiver
		$ladder_handler =& xoops_getmodulehandler('ladder');
		$comp_name = $ladder_handler->getLadderName($comp_id);
		
		$subject = $comp_name . ": SlowPlay Warning from ".$xoopsUser->getVar('uname');
		$message = "You have recieved a SlowPlay warning from ".$xoopsUser->getVar('uname').". You must click on the following link to disable it: ";
		$message .= "http://www.tripleawarclub.org/modules/comp/challenges.php?op=slowplay&lid=".$ladder_id."&uid=".$slowPlayReciever['id']."&cid=".$challenge_id."&task=disable";
				   
		$msg_id = $xoopsDB->genId('priv_msgs_msg_id_seq');
		$sql = sprintf("INSERT INTO %s (msg_id, msg_image, subject, from_userid, to_userid, msg_time, msg_text, read_msg) VALUES (%u, %s, %s, %u, %u, %u, %s, %u)", $xoopsDB->prefix('priv_msgs'), $msg_id, $xoopsDB->quoteString("icon1.gif"), $xoopsDB->quoteString($subject), $slowPlaySender['id'], $slowPlayReciever['id'], time(), $xoopsDB->quoteString($message), 0);
		$result = $xoopsDB->queryF($sql);
		
		
		echo("<p>A SlowPlay warning has been sent to ".$slowPlayReciever['name'].". </p>");
		
	} else { 

		echo("<p>You need to wait one week before issuing another SlowPlay warning.</p>");
		
	}
	
	break;

case 'disable':
	
	if($user_id==$challenge['challenger_id']){ // the reciever is the challenger 
		$slowPlaySender=array('id'=>$challenge['challenged_id'],'name'=>$challenge['challenged_name']);
		$slowPlayReciever=array('id'=>$challenge['challenger_id'],'name'=>$challenge['challenger_name']);
	}else{ // the sender is the challenged
		$slowPlaySender=array('id'=>$challenge['challenger_id'],'name'=>$challenge['challenger_name']);
		$slowPlayReciever=array('id'=>$challenge['challenged_id'],'name'=>$challenge['challenged_name']);
	}

	// update slowplay status to 0, and set slowplay_date back 0000-00-00
	$update = "UPDATE ".$challenge_table." SET slowplay_date = '0000-00-00', slowplay = 0 WHERE challenge_id = ".$challenge_id." LIMIT 1";
	$result = $xoopsDB->queryF($update);
	
	$slowPlayRecieverProfile = $player_handler->getPlayerProfile($slowPlayReciever['id']);
	$slowPlaySenderProfile = $player_handler->getPlayerProfile($slowPlaySender['id']);
	
	// send emails
	$xoopsMailer =& getMailer();
	$xoopsMailer->useMail(); 
	$xoopsMailer->setTemplateDir(XOOPS_ROOT_PATH.'/modules/comp/language/'.$xoopsConfig['language'].'/mail_template');
	$xoopsMailer->setTemplate("comp_slow_play_disable.tpl");

	$xoopsMailer->setToEmails($slowPlaySenderProfile['email']);
	$xoopsMailer->setFromEmail("admin@tripleawarclub.org");
	$xoopsMailer->setFromName("TripleA WarClub");
	$xoopsMailer->setSubject("Slow Play Warning Disabled");

	$xoopsMailer->assign("SENDER", $slowPlaySender['name']);
	$xoopsMailer->assign("RECEIVER", $slowPlayReciever['name']);
	$xoopsMailer->assign("COMP_ID", $ladder_id);
	$xoopsMailer->assign("CHALLENGE_ID", $challenge_id);		
	$xoopsMailer->assign("SITENAME", $xoopsConfig['sitename']);
	$xoopsMailer->assign("SITEURL", XOOPS_URL."/");

	$xoopsMailer->send();
	
	echo("<p>The SlowPlay warning for your challenge ID ".$challenge_id." has been disabled. Your opponent has been notified that the SlowPlay was disabled. Please contact your opponent to resume your game.</p>");
	break;

default: 

	$profile = $player_handler->getPlayerProfile($user_id);
	echo("<h2 class=\"siteheader\">SlowPlay</h2><br><p>You are about initiate a SlowPlay for challenge <b>$challenge_id</b>. Please confirm below.</p><br>");
	include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
	$form = new XoopsThemeForm('Confirm SlowPlay', 'confirm', 'challenges.php?op=slowplay&lid='.$ladder_id.'&uid='.$user_id.'&cid='.$challenge_id.'&task=send', 'POST');
	$form->addElement(new XoopsFormTextArea('Info', 'info', 'Your opponent has a week to respond to the SlowPlay warning. If they do not, you can issue one more. After the second week you can take the match as a win.', 20, 75, 'disabled readonly', 'text_area'));
	$form->addElement(new XoopsFormButton("", "action", "confirm", "submit"));
	$form->display();

}

$xoopsTpl->assign('ladder', $ladder_name);

include_once XOOPS_ROOT_PATH.'/footer.php';

?>
