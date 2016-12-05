<?php
/*
 * Created on 04.10.2006
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include '../../mainfile.php';

/* template and header are set by the included files 
// 
// $xoopsOption['template_main'] = "comp_index.html";
// include XOOPS_ROOT_PATH.'/header.php';
*/

//get all POST variables and check if they are numeric
foreach($_POST as $key => $value) {
	if(!is_numeric($value)) {
		redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
	}
	$$key = $value;
}

$op = $_GET['op'];
$lid = $_GET['lid'];
$step = $_GET['step'];
$page_num = isset($_GET['pagenum']) ? $_GET['pagenum'] : 1;
$matches_per_page = isset($_GET['mppg']) ? $_GET['mppg'] : 20;

if (!isset($lid)) {
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
}
if( !is_numeric($lid) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
}

//guests are only allowed to view matches.
if(!is_object($xoopsUser)) {
	$op = NULL;
}

//$matches_handler =& xoops_getmodulehandler('matches');

switch($op) {
	case "search": 
		include_once 'search_opponents.php';
//		$matches_handler->search($lid);
		break;
	case "searchresults":
		include_once 'searchresults.php';
		break;
	case "sendchallenge":
		include_once 'sendchallenge.php';
		break;
	case "report":
		include_once 'reportmatches.php';
		break;
	default:
		include_once 'display_matches2.php';
}
include_once XOOPS_ROOT_PATH.'/footer.php';
?>
