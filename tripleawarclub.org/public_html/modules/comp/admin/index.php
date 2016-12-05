<?php
/*
 * Created on Dec 17, 2006
 */
include "../../../mainfile.php";
include XOOPS_ROOT_PATH."/include/cp_functions.php";
if ( file_exists(XOOPS_ROOT_PATH."/modules/comp/language/".$xoopsConfig['language']."/main.php") ) {
        include XOOPS_ROOT_PATH."/modules/comp/language/".$xoopsConfig['language']."/main.php";
} else {
        include XOOPS_ROOT_PATH."/modules/system/language/english/main.php";
}

// Test for user and admin
include_once XOOPS_ROOT_PATH."/class/xoopsmodule.php";
if( is_object($xoopsUser) ){
	$xoopsModule =& XoopsModule::getByDirname("comp");
	if ( $xoopsUser->isAdmin($xoopsModule->mid()) ) {
		xoops_cp_header();
		$op = $_POST['op'];

		$admin_handler =& xoops_getmodulehandler('admin', 'comp');
		
		// Display options
		if( !isset($op) ){
			// Get the players
			$sql = "SELECT xoops_users.uname, xoops_users.uid, global_users.status " .
					"FROM ".$xoopsDB->prefix('comp_user_global')." AS global_users, " .
						$xoopsDB->prefix('users')." AS xoops_users " .
					"WHERE global_users.xoops_user_id = xoops_users.uid ".
					"ORDER BY xoops_users.uname";
			$result = $xoopsDB->query($sql);
			$player_list = array();

			// Setup player section form elements
			include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
			$delete_select = new XoopsFormSelect(ucwords(_COMP_DELETE_PLAYER), "del_player", '', 1);
			$deactive_select = new XoopsFormSelect(ucwords(_COMP_DEACTIVATE_PLAYER), "deactivate_player", '', 1);
			$active_select = new XoopsFormSelect(ucwords(_COMP_ACTIVATE_PLAYER), "activate_player", '', 1);
			$undelete_select = new XoopsFormSelect(ucwords(_COMP_UNDELETE_PLAYER), "undelete_player", '', 1);

			// Get player information and fill form elements
			while( $row = $xoopsDB->fetchArray($result) ){
				$display = $row['uname']." (".$row['uid'].")";
				switch(true){
					case ( $row['status'] < 2 ):
						$deactive_select->addOption($row['uid'], $display);
						$delete_select->addOption($row['uid'], $display);
						break;
					case ( $row['status'] == 2 ):
						$delete_select->addOption($row['uid'], $display);
						$active_select->addOption($row['uid'], $display);
						break;
					case ( $row['status'] >= 3 ):
						$undelete_select->addOption($row['uid'], $display);
						break;
				}
			}

			// Build admin form
			$form = new XoopsThemeForm(ucwords(_COMP_ADMINISTRATION), 'admin', "index.php", 'POST');
			$form->addElement(&$delete_select);
			$form->addElement(new XoopsFormButton("", "op", ucwords(_COMP_DELETE), "submit"));
			$form->addElement(&$deactive_select);
			$form->addElement(new XoopsFormButton("", "op", ucwords(_COMP_DEACTIVATE), "submit"));
			$form->addElement(&$active_select);
			$form->addElement(new XoopsFormButton("", "op", ucwords(_COMP_ACTIVATE), "submit"));
			$form->addElement(&$undelete_select);
			$form->addElement(new XoopsFormButton("", "op", ucwords(_COMP_UNDELETE), "submit"));
		
			$form->display();

			$admin_handler->checkMultiple();

		}
		// Perform action
		else{
			
			
			switch(true){
				case ($op == ucwords(_COMP_DELETE)):
					if( !isset($_POST['del_player']) ){
						redirect_header("../index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
					}
					else if( !is_numeric($_POST['del_player']) ){
						redirect_header("../index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
					}
					else{
						$player_id = $_POST['del_player'];
					}

					if( $admin_handler->deletePlayer($player_id) ){
						redirect_header("index.php", 3, ucfirst(_COMP_PLAYER_DELETED));
					}
					else{
						redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_PLAYER_NOT_DELETED));
					}
					break;
					
				case ($op == ucwords(_COMP_DEACTIVATE)):
					if( !isset($_POST['deactivate_player']) ){
						redirect_header("../index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
					}
					else if( !is_numeric($_POST['deactivate_player']) ){
						redirect_header("../index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
					}
					else{
						$player_id = $_POST['deactivate_player'];
					}

					if( $admin_handler->deactivatePlayer($player_id) ){
						redirect_header("index.php", 3, ucfirst(_COMP_PLAYER_DEACTIVATED));
					}
					else{
						redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_PLAYER_NOT_DEACTIVATED));
					}
					break;
					
				case ($op == ucwords(_COMP_ACTIVATE)):
					if( !isset($_POST['activate_player']) ){
						redirect_header("../index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
					}
					else if( !is_numeric($_POST['activate_player']) ){
						redirect_header("../index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
					}
					else{
						$player_id = $_POST['activate_player'];
					}

					if( $admin_handler->activatePlayer($player_id) ){
						redirect_header("index.php", 3, ucfirst(_COMP_PLAYER_ACTIVATED));
					}
					else{
						redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_PLAYER_NOT_ACTIVATED));
					}
					break;
					
				case ($op == ucwords(_COMP_UNDELETE)):
					if( !isset($_POST['undelete_player']) ){
						redirect_header("../index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
					}
					else if( !is_numeric($_POST['undelete_player']) ){
						redirect_header("../index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
					}
					else{
						$player_id = $_POST['undelete_player'];
					}

					if( $admin_handler->undeletePlayer($player_id) ){
						redirect_header("index.php", 3, ucfirst(_COMP_PLAYER_UNDELETED));
					}
					else{
						redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_PLAYER_NOT_UNDELETED));
					}
					break;
					
				default:
					redirect_header("../index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
					break;
			}
		}
		
		xoops_cp_footer();
	}
	// Not admin for comp module
	else{
		redirect_header("../index.php", 3, ucfirst(_COMP_ERRORS_RIGHTS_VIEW));
	}
}
// Not logged in
else{
	redirect_header("../index.php", 3, ucfirst(_COMP_ERRORS_NEED_LOGIN));
}

?>
