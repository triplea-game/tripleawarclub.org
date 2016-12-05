<?php
/*
 * Created on 14.10.2006
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include XOOPS_ROOT_PATH.'/header.php';

// uid is the user id of the challenged player
// get id or exit
$uid = isset($_GET['uid']) ? $_GET['uid'] : redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));

if( !is_numeric($uid) ){
	redirect_header("http://www.tripleawarclub.org/modules/comp/index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
}

$user_handler = xoops_getmodulehandler('user');
if (!$user_handler->isplayer($lid)) {
	redirect_header("http://www.tripleawarclub.org/modules/comp/index.php", 3, ucfirst(_COMP_ERRORS_RIGHTS_VIEW));
}


$challenge_diff = $user_handler->getDifferenceOfChallenges($lid);
if ($challenge_diff <= 3) {
	$profile = $user_handler->getUserProfile();
	$matches_handler = xoops_getmodulehandler('matches');
	$check = $matches_handler->CheckSpecificPlayer($lid,$user_handler->user_id,$profile[$lid]["option_luck"],$profile[$lid]["option_rules"],$profile[$lid]["option_mode"],$profile[$lid]["nos"],$profile[$lid]["map"],$max_diff=600,$uid);
	if ($check) {
//		echo"<script>alert('true');</script>";
		$matches_handler->SendChallenge($user_handler->user_id, $uid, $lid);
	}
	else {
		redirect_header("http://www.tripleawarclub.org/modules/comp/index.php", 3, _COMP_ERRORS_CHALLENGE_PLAYER);
	}
		
}
else {

	echo "<h2 class=\"siteheader\">Challenge</h2>";
	echo "<p>" . _COMP_SENT_CHALLENGES1 . "<b> " . $challenge_diff . " </b>" . _COMP_SENT_CHALLENGES2 . ".</p>";
	echo "<p>" . _COMP_ERRORS_CHALLENGE_DIFFERENCE . ".</p>";
}

                
?>
