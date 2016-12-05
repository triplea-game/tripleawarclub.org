<?php
/*
 * Created on 10.10.2006
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

// ! Must be here or template will show on all pages!
$xoopsOption['template_main'] = "matches.html";
include XOOPS_ROOT_PATH.'/header.php';

$comp_id = $_GET['lid'];
$user_id = $_GET['uid'];
//$side = $_GET['side'];

// Verfify user id
if( isset($user_id) && !is_numeric($user_id) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
}

// Verfify comp id
if( isset($comp_id) && !is_numeric($comp_id) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
}

// Verify side
//if( isset($side) && ($side != "axis") && ($side != "allies" ) ){
//	$side == "both";
//}

// Get the matches
$matches_handler =& xoops_getmodulehandler('matches');
//$matches = $matches_handler->getMatches($comp_id, $user_id, $side);
$matches = $matches_handler->getMatchesOnly($user_id,$comp_id); // for revised, one match == 2 games

// Check for a valid competition id
$num_matches = count($matches);

if( $num_matches > 0 ){

	// Get the organization
	include "include/functions.inc.php";
	$org = getPageOrganization($num_matches, $matches_per_page, $page_num);
	if( count($org) < 1 ){
		redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
	}

	// Get the competition name
	$ladder_handler =& xoops_getmodulehandler('ladder');
	$ladders = $ladder_handler->getAllLadders();
	$params = array('name'=>$ladders[$comp_id]['comp_name'],
				'comp_id'=>$comp_id,
				'matches'=>$matches,
				'num_pages'=>$org['num_pages'],
				'page_num'=>$org['page_num'],
				'start_match'=>$org['start_item'],
				'end_match'=>$org['end_item']);
	// Send to template
	$xoopsTpl->assign('params', $params);
	
	//echo("Played matches listing will be temporarily disabled, sorry for any inconvenience.");
}
else{
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_NO_MATCHES_FOUND));
}

?>
