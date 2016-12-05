<?php
/*
 * Created on Nov 5, 2006
 */
include '../../mainfile.php';

$uid = ( isset( $_GET['uid'] ) ) ? $_GET['uid'] : false;
$op = ( isset( $_GET['op'] ) ) ? $_GET['op']  : null;
$challenge_id = ( isset( $_POST['challenge_id'] ) ) ? $_POST['challenge_id'] : false;
$rating = (isset($_POST['rating']))? $_POST['rating'] : false;
$comments = stripslashes($_POST['comments']);

// Check reporting variables
if( isset($challenge_id) && !is_numeric($challenge_id)){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
}
if( isset($rating) && ($rating != 1) && ($rating != 0) && ($rating != -1) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
}

if( isset($uid) && !is_numeric($uid) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
}
elseif( !isset($uid) && !is_object($xoopsUser) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
}
else{
	$uid = isset($uid) ? $uid : $xoopsUser->getVar('uid');

	// Operation not set, display user rating
	if( !is_null($op) ){
		$player_handler =& xoops_getmodulehandler('player');
		$ratings = $player_handler->getPlayerKarmaRatings($uid);
		$profile = $player_handler->getPlayerProfile($uid);
		$params['profile'] = $profile;
		$params['ratings'] = $ratings;

		$xoopsOption['template_main'] = "ratings.html";
		include XOOPS_ROOT_PATH.'/header.php';
		// Send to template
		$xoopsTpl->assign('params', $params);
		$xoopsTpl->assign('max', 100);
	}
	// Operation to perform
	else{
		// Must be logged in
		if( !is_object($xoopsUser) ){
			redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_NEED_LOGIN));
		}
		else{
			switch($op){
				case 'rate':
					include_once 'rate_player.php';
					break;
				case 'enter':
					include XOOPS_ROOT_PATH.'/header.php';
					$user_handler =& xoops_getmodulehandler('user');
					echo "<h2 class=\"siteheader\">Rate Player</h2><br>";
					echo "<p>".$user_handler->ratePlayer($challenge_id, $rating, $comments).".</p>";
					break;
				default:
					redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
					break;
			}
		}
	}
}

include_once XOOPS_ROOT_PATH.'/footer.php';

?>
