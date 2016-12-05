<?php
/*
 * Created on 11.12.2006
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

//$xoopsOption['template_main'] = "invitationresults.html";
include XOOPS_ROOT_PATH.'/header.php';
global $xoopsUser;

$invitation_id = isset($_GET['inv_id']) ? $_GET['inv_id'] : null;
if( isset($invitation_id) && !is_numeric($invitation_id) ){
	redirect_header("index.php", 3, _COMP_ERRORS_INVALID_VALUE);
}

$challenges_handler =& xoops_getmodulehandler('challenges');
// delete invitation or exit script
$inviter_id = $challenges_handler->deleteInvitation($invitation_id, $xoopsUser->getVar('uid'));
if ( $inviter_id == false || !is_numeric($inviter_id) ) {
	redirect_header("index.php", 3, _COMP_ERRORS_INVITATION_NOT_DELETED);
}


// send private message
global $xoopsUser, $xoopsDB;
$ladder_handler =& xoops_getmodulehandler('ladder');
$comp_name = $ladder_handler->getLadderName($comp_id);

$subject = $comp_name . ": " . _COMP_INVITATION_FOR . $xoopsUser->getVar('uname') . _COMP_INVITATION_FOR2;
$message = $comp_name . ": " . _COMP_INVITATION_FOR . $xoopsUser->getVar('uname') . _COMP_INVITATION_FOR2;

$msg_id = $xoopsDB->genId('priv_msgs_msg_id_seq');
$sql = sprintf("INSERT INTO %s (msg_id, msg_image, subject, from_userid, to_userid, msg_time, msg_text, read_msg) VALUES (%u, %s, %s, %u, %u, %u, %s, %u)", $xoopsDB->prefix('priv_msgs'), $msg_id, $xoopsDB->quoteString("icon1.gif"), $xoopsDB->quoteString($subject), $xoopsUser->getVar('uid'), $inviter_id, time(), $xoopsDB->quoteString($message), 0);
$result = $xoopsDB->queryF($sql);
			

// send email
global $xoopsConfig;

$xoopsmember_handler =& xoops_gethandler('member');
$receiver =& $xoopsmember_handler->getUser($inviter_id); 	
			
include XOOPS_ROOT_PATH."/class/xoopsmailer.php";
$to = array($receiver->getVar('email'));
			
$xoopsMailer =& getMailer();
$xoopsMailer->useMail(); 
$xoopsMailer->setTemplateDir(XOOPS_ROOT_PATH.'/modules/comp/language/'.$xoopsConfig['language'].'/mail_template');
$xoopsMailer->setTemplate("comp_delete_invitation.tpl");
			
$xoopsMailer->setToEmails($to);
$xoopsMailer->setFromEmail("admin@tripleawarclub.org");
$xoopsMailer->setFromName($xoopsUser->getVar('uname'));
$xoopsMailer->setSubject($subject);
			
//assign variables 
$xoopsMailer->assign("RECEIVER", $receiver->getVar('uname'));
$xoopsMailer->assign("SENDER", $xoopsUser->getVar('uname'));
$xoopsMailer->assign("COMPETITION", $comp_name);
$xoopsMailer->assign("SITENAME", $xoopsConfig['sitename']);
$xoopsMailer->assign("SITEURL", XOOPS_URL."/");
			
$xoopsMailer->send();	


redirect_header("index.php", 3, _COMP_INVITATION_DELETED);

?>
