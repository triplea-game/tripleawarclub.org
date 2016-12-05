<?php
/*
 * Created on 11.09.2006
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

include '../../mainfile.php';
include XOOPS_ROOT_PATH.'/header.php';

$lid = $_GET['lid'];
if(!empty($_POST['accept_rules'])){
$accept_rules = $_POST['accept_rules'];
}
// don't touch this or security is compromised !
if (!isset($lid) || !is_numeric($lid)) {
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
}

// no access for guests
global $xoopsUser;
if (!is_object($xoopsUser)) {
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_NEED_LOGIN));
}

global $xoopsDB;
if (!isset($xoopsDB)) {
	$xoopsDB = XoopsDatabaseFactory::getDatabaseConnection();
}

// operation: show rules and form
if (!isset($accept_rules)) {	

	// User already attempted to join, but didn't accept rules
	if( isset($_POST['submit']) ){
		redirect_header("join.php?lid=$lid", 3, ucfirst(_COMP_ERRORS_ACCEPT_RULES));
	}

	$sql = "SELECT comp_name, comp_rules, comp_rules_date FROM ".$xoopsDB->prefix("comp_competitions")." WHERE comp_id='$lid'";
		$result = $xoopsDB->query($sql);
		$row = $xoopsDB->fetchArray($result);
		
		// wrong ID?
		if ($row==false) {
			redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
		}
		$unformatedrules = stripslashes($row["comp_rules"]);
		$name = $row["comp_name"];
	//	$formateddate = date2string($row["comp_rules_date"]);
	
	$rules = $unformatedrules;
	$ts =& MyTextSanitizer::getInstance();
	$formatedrules = $ts->displayTarea($rules, 1, 1, 1, 1, 1);
	
	echo '<h2 class="boxHeader">Join Competition</h2><br>';
	
	include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
	
	$frm = new XoopsThemeForm('Accept the Rules', 'entry_form', "join.php?lid=$lid", 'POST'); 
	
	echo("<p>You must read over and agree to the following ladder rules in order to join.</p><p><strong>If you are new to our ladder we strongly urge you to read at least sections 1-3.</strong></p>");
	
	include_once($row["comp_rules"]);
	
	echo("<br>");
	
	//$frm->addElement(new XoopsFormDhtmlTextArea('Rules', 'rules', $formatedrules, 20, 75, 'text_area')); 
		$agree_chk = new XoopsFormCheckBox('', 'accept_rules' );
		
		$agree_chk->addOption(1, " "._COMP_ACCEPT_RULES);
		$frm->addElement($agree_chk);
		
	$frm->addElement(new XoopsFormButton("", "submit", _COMP_SUBMIT, "submit"));
	$frm->addElement(new XoopsFormHidden('uid', $xoopsUser->getVar('uid')));
	$frm->display();

}
// operation: insert user into database
else {
	
	// force options selection
	
	$uid = isset($_POST['uid']) ? $_POST['uid'] : $xoopsUser->getVar('uid');
	
	$user_handler = xoops_getmodulehandler('user');
	$user_profile = $user_handler->getUserProfile($uid);
	$return_msg = $user_handler->joinCompetition($lid);

		$sql = "SELECT comp_name FROM ".$xoopsDB->prefix("comp_competitions")." WHERE comp_id='$lid'";
		$result = $xoopsDB->query($sql);
		$row = $xoopsDB->fetchArray($result);
		
		// wrong ID?
		if ($row==false) {
			redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
		}
		
		$name = $row["comp_name"];
	
	redirect_header("http://www.tripleawarclub.org/modules/comp/editlocalprofile.php?uid=".$uid."&lid=".$lid."&ref=join", 1, "You have joined the ".$name." ladder!");
	
	//echo '<h2 class="siteheader">Join Competition</h2>';
	//echo $return_msg;
	
	
	
	//echo '<p><br>You have joined the '.$name.' ladder! Please <a href="' . XOOPS_URL . "/modules/comp/profile.php?lid=$lid" . '">update your profile</a>.</p>';

}

include_once XOOPS_ROOT_PATH.'/footer.php';

?>
