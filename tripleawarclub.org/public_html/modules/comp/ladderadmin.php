<?php
/*
 * Created on Dec 17, 2006
 */
include '../../mainfile.php';
include XOOPS_ROOT_PATH.'/header.php';

$comp_id = $_GET['lid'];
$op = $_POST['op'];
$del_challenge = $_POST['del_challenge'];

// Check for competition id
if( isset($comp_id) ){
	if( !is_numeric($comp_id) ){
		redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
	}
}
else{
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
}

// Check for logged in and admin
if( !is_object($xoopsUser) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_NEED_LOGIN));
}
else{
	$admin_handler =& xoops_getmodulehandler('admin');
	if( !($admin_handler->isAdmin($comp_id)) ){
		redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_RIGHTS_VIEW));
	}
}

// Perform operation
if( isset($op) ){
	switch(true){
		case ($op == ucwords(_COMP_DELETE)):
			$challenge_handler =& xoops_getmodulehandler('challenges');
			if( $challenge_handler->deleteChallenge($del_challenge) ){
				redirect_header("ladderadmin.php?lid=$comp_id", 3, ucfirst(_COMP_CHALLENGE_DELETED));
			}
			else{
				redirect_header("ladderadmin.php", 3, ucfirst(_COMP_ERRORS_CHALLENGE_NOT_DELETED));
			}
			break;
		case ($op == "unreport"):
			$challenge_handler =& xoops_getmodulehandler('challenges');
			if( $challenge_handler->unReportChallenge($del_challenge) ){
				redirect_header("ladderadmin.php?lid=$comp_id", 3, "Challenge has been un-reported.");
			}
			else{
				redirect_header("ladderadmin.php", 3, ucfirst(_COMP_ERRORS_CHALLENGE_NOT_DELETED));
			}
			break;
		default:
			redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_POST));
			break;
	}
}
// List admin functions
else{
	$ladder_handler =& xoops_getmodulehandler('ladder');
	$comp_name = $ladder_handler->getLadderName($comp_id);
	$challenge_handler =& xoops_getmodulehandler('challenges');
	$challenges = $challenge_handler->getChallenges($comp_id);
	foreach($challenges as $row){
		$challenge_list[$row['challenge_id']] = $row['challenger_name'].' '._COMP_CHALLENGED.' '.$row['challenged_name'].' '._COMP_CHALLENGE_ID.' '.$row['challenge_id'];
	}

	include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
	$form = new XoopsThemeForm(ucwords($comp_name).' '.ucwords(_COMP_ADMINISTRATION), 'admin', "ladderadmin.php?lid=$comp_id", 'POST');

	// Delete challenge section
	$challenge_select = new XoopsFormSelect(ucwords(_COMP_DELETE_CHALLENGE), "del_challenge", '', 1);
	$challenge_select->addOptionArray($challenge_list);
	$form->addElement(&$challenge_select);
	$form->addElement(new XoopsFormButton("", "op", ucwords(_COMP_DELETE), "submit"));
	$form->display();
	echo("<br><br>");
	// Un-Report challenge section
	$form2 = new XoopsThemeForm(ucwords($comp_name).' '.ucwords(_COMP_ADMINISTRATION), 'admin', "ladderadmin.php?lid=$comp_id", 'POST');
	$challenge_select = new XoopsFormSelect("Un-report a challenge", "del_challenge", '', 1);
	$challenge_select->addOptionArray($challenge_list);
	$form2->addElement(&$challenge_select);
	$form2->addElement(new XoopsFormButton("", "op", "unreport", "submit"));
	$form2->display();
	
}

include_once XOOPS_ROOT_PATH.'/footer.php';
?>
