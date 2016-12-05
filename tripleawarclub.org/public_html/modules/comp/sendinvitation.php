<?php
/*
 * Created on 25.11.2006
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
$xoopsOption['template_main'] = "invitationresults.html";
include XOOPS_ROOT_PATH.'/header.php';


$invited_id = isset($_GET['iid']) ? $_GET['iid'] : null;
if( isset($invited_id) && !is_numeric($invited_id) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
}


$user_handler =& xoops_getmodulehandler('user');
if (!$user_handler->isplayer($comp_id)) {
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_RIGHTS_VIEW));
}


$challenge_diff = $user_handler->getDifferenceOfChallenges($comp_id);
$xoopsTpl->assign('difference', $challenge_diff);

// get the users profile
$profile = $user_handler->getUserProfile();

	
if ($challenge_diff <= 3) {
	// step 1: show list of players with same game-,rules- and luck-options if no invited player is set
	if (!isset($invited_id)) {
		$matches_handler =& xoops_getmodulehandler('matches');
		$available_players = $matches_handler->getAvailablePlayers($comp_id,$profile[$comp_id]["option_luck"],$profile[$comp_id]["option_rules"],$profile[$comp_id]["option_mode"],$max_diff=NULL,$opponent_id=NULL,$invitation=true);
	
		if(count($available_players)==0){
			$xoopsTpl->assign('error', "no_players");
		}	
		else {
			$xoopsTpl->assign('content', $available_players);
			$xoopsTpl->assign('show', "yes");
		}
	
		
	}
	
	else {	
	// step 2: check if invited player can receive an invitation
		$profile = $user_handler->getUserProfile();
		$challenges_handler =& xoops_getmodulehandler('challenges');
		if ( !$challenges_handler->checkPlayerForInvitation($comp_id,$profile[$comp_id]["option_luck"],$profile[$comp_id]["option_rules"],$profile[$comp_id]["option_mode"],$invited_id) ) {
			redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
		}
		else {		
			// send invitation
			global $xoopsUser;
			$inviter_id = $xoopsUser->getVar('uid');
			$challenges_handler->sendInvitation($inviter_id, $invited_id, $comp_id);
			
		}
	
	
	}
}
else {
	echo _COMP_SENT_CHALLENGES1 . "<b> " . $challenge_diff . " </b>" . _COMP_SENT_CHALLENGES2 . "<br>";
	echo "<h2>" . _COMP_ERRORS_CHALLENGE_DIFFERENCE . "</h2>";
}
?>
