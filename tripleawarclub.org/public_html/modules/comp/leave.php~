<?php
/*
 * Created on 16.09.2006
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

include '../../mainfile.php';
include XOOPS_ROOT_PATH.'/header.php';

$lid = $_GET['lid'];
$confirm = $_GET['confirm'];

// don't touch this or security is compromised !
if (!isset($lid) || !is_numeric($lid)) {
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
}

// no access for guests
global $xoopsUser;
if (!is_object($xoopsUser)) {
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_NEED_LOGIN));
}

if(!isset($confirm)) {
	echo "<script> 
		function confirm_delete() {
			var confirmation = confirm('"._COMP_CONFIRM_LEAVE."');
			if(confirmation == true)
				{
				location.href = 'leave.php?lid=$lid&confirm=yes';	
				}
			else {
				history.back();
			}
		} //end function confirm_delete
		confirm_delete();
	</script>";
}

if($confirm=="yes") {
	$user_handler = xoops_getmodulehandler('user');
	$user_handler->leaveCompetition($lid);
	echo '<h2 class="siteheader">Leave Competition</h2><br>';
	echo '<p>'._COMP_LEFT_COMPETITION.'</p>';
}

include_once XOOPS_ROOT_PATH.'/footer.php';
?>