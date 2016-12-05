<?php
/*
 * Created on Sep 12, 2006
 */
include '../../mainfile.php';
$xoopsOption['template_main'] = "profile.html";
include XOOPS_ROOT_PATH.'/header.php';

// Get the competition id
$comp_id = isset($_GET['lid']) ? $_GET['lid'] : NULL;

// Get the player id (current user if not set)
if( isset($_GET['uid']) ){
	if( is_numeric($_GET['uid']) ){
		$user_id = $_GET['uid'];
	}
	else{
		redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
	}
}
else{
	// Check for logged in user
	if( is_object($xoopsUser) ){
		$user_id = $xoopsUser->getVar('uid');
	}
	// Error, don't know who to display
	else{
		redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
	}
}

// Get the profile handler and the profile for the specified player
$player_handler =& xoops_getmodulehandler('player');
if( isset($comp_id) && is_numeric($comp_id) ){
	$profile = $player_handler->getPlayerProfile($user_id, $comp_id);
	
	// Verify it was a proper competition id.
	// Error if $user_id not a player in $comp_id.
	if( count($profile['competitions']) == 0 ){
		redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
	}
	
} else {

	$profile = $player_handler->getPlayerProfile($user_id);
	
}

// Check a profile was returned
if( count($profile) > 0 ){

	// Grab extra info
	$posts = $player_handler->getRecentPosts($user_id, 5);
	$ratings = $player_handler->getPlayerKarmaRatings($user_id);
	
	// Check top player
	$topPlayer = false;
	// this will have to be updated for multiple ladders
	//$topPlayer = $player_handler->checkTopPlayer($user_id, $profile['competitions'][0]['comp_id']);
	//if($topPlayer==true){
	//	$profile['competitions'][0]['rank']=_COMP_FIELDMARSHALL_RANK;
	//}
	
	// Send to template
	$params['profile'] = $profile;
	$params['posts'] = $posts;
	$params['ratings'] = $ratings;
	$params['topPlayer'] = $topPlayer;
	$xoopsTpl->assign('params', $params);
}
// Invalid player id
else{
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
}

include_once XOOPS_ROOT_PATH.'/footer.php';
?>
