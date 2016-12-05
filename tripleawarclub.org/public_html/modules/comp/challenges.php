<?php
/*
 * Created on Oct 8, 2006
 */
include '../../mainfile.php';

// Get the parameters
$comp_id = isset($_GET['lid']) ? $_GET['lid'] : NULL;
$user_id = isset($_GET['uid']) ? $_GET['uid'] : NULL;
$op = isset($_GET['op']) ? $_GET['op'] : NULL;
$page_num = isset($_GET['pagenum']) ? $_GET['pagenum'] : 1;
$challenges_per_page = isset($_GET['cppg']) ? $_GET['cppg'] : 20;

// Verify comp_id parameter
if( isset($comp_id) && !is_numeric($comp_id) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
}
else{
	// Verfify user id
	if( isset($user_id) && !is_numeric($user_id) ){
		unset($user_id);
	}

	switch($op) {
		case "invitation":
			include_once 'sendinvitation.php';
			break;
		case "delete_invitation":
			include_once 'delete_invitation.php';
			break;
		case "accept_invitation":
			include_once 'accept_invitation.php';
			break;
		case "slowplay":
			include_once 'slowplay.php';
			break;
		default:
			include_once 'display_challenges.php';
	}
}

include_once XOOPS_ROOT_PATH.'/footer.php';
?>
