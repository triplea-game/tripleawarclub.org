<?php
/*
 * Created on 07.09.2006
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include '../../mainfile.php';
$xoopsOption['template_main'] = "comp_rules_new.html";
include XOOPS_ROOT_PATH.'/header.php';

	
$lid = $_GET['lid'];

if (!isset($lid)) {
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
}
	
global $xoopsDB;

if (!isset($xoopsDB)) {
	$xoopsDB = XoopsDatabaseFactory::getDatabaseConnection();
}

if (isset($_POST['updated_rules'])) {
	$unformatedrules = stripslashes($_POST['updated_rules']);
	$name = $_POST['name'];
	$formateddate = $_POST['date'];
}
else {
	$sql = "SELECT comp_name, comp_rules, comp_rules_date FROM ".$xoopsDB->prefix("comp_competitions")." WHERE comp_id='$lid'";
	$result = $xoopsDB->query($sql);
	if( $xoopsDB->getRowsNum($result) > 0 ){
		$row = $xoopsDB->fetchArray($result);
		$unformatedrules = stripslashes($row["comp_rules"]);
		$name = $row["comp_name"];
	
		include './include/functions.inc.php';
		$formateddate = date2string($row["comp_rules_date"]);
	}
	else{
		redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
	}
}
/** 
 * format rules
 * 
 * for some reason the variable used by $ts->displayTarea() is overwritten
 * so $unformatedrules is copied to $rules to allow manipulation of the unformated rules by admins
 *
 * @return string with formated rules
 */
$rules = $unformatedrules;
$ts =& MyTextSanitizer::getInstance();
$formatedrules = $ts->displayTarea($rules, 1, 1, 1, 1, 1);
$xoopsTpl->assign('rules', $formatedrules);
$xoopsTpl->assign('lastupdate', $formateddate);
if ( isset( $_POST['contents_preview']) && !isset( $_POST['contents_submit'] )) {
	$xoopsTpl->assign('name', $name." (". _COMP_PREVIEW .")");
}
else {
	$xoopsTpl->assign('name', $name);
}

//admin stuff
/*if(is_object($xoopsUser)) {
	$admin_handler =& xoops_getmodulehandler('admin', 'comp');
	if ($admin_handler->isAdmin($lid)) {
		
		//show editor
		include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
		$frm = new XoopsThemeForm('Edit the Rules', 'entry_form', "rules.php?lid=$lid", 'POST'); 
//		$frm->addElement(new XoopsFormLabel('Instructions', 'Type some text into the area and hit Submit. The text will be displayed on the next page unformatted (raw) and after formatting (conversion to HTML).')); 
		$frm->addElement(new XoopsFormDhtmlTextArea('Text Area', 'updated_rules', $unformatedrules, 20, 75, 'text_area')); 
	
		$button_tray = new XoopsFormElementTray('');
		$submit_button = new XoopsFormButton('', 'contents_submit', _COMP_SUBMIT, "submit");
		$preview_button = new XoopsFormButton('', 'contents_preview', _COMP_PREVIEW, "submit");
		$button_tray->addElement($preview_button);
		$button_tray->addElement($submit_button);	
		$frm->addElement($button_tray);
		$frm->addElement(new XoopsFormHidden("date", $formateddate));
		$frm->addElement(new XoopsFormHidden("name", $name));
		
		$frm->display();
		
		if ( isset( $_POST['contents_submit'] )) {
			// submit rules to database
			$rules = addslashes($unformatedrules);
			$sql = "UPDATE " . $xoopsDB->prefix("comp_competitions") . " SET comp_rules = '$rules', comp_rules_date = NOW() WHERE comp_id='$lid'";
			$result = $xoopsDB->query($sql);
			
		}

	}
}*/

include_once XOOPS_ROOT_PATH.'/footer.php';

?>
