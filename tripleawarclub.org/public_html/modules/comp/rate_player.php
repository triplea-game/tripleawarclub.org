<?php
/*
 * Created on Nov 11, 2006
 */
include XOOPS_ROOT_PATH.'/header.php';

// Must be a logged in user.
if( !is_object($xoopsUser) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_NEED_LOGIN));
}
else{
	// Get all completed challenges without a rating 
	$player_handler =& xoops_getmodulehandler('player');
	$challs = $player_handler->getPlayerUnenteredRatings($xoopsUser->getVar('uid'));

	// No challenges to give rating on
	if( count($challs) == 0 ){
		redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_NO_PLAYER_RATE));
	}
	else{
	
		echo("<h2 class=\"siteheader\">Rate Player</h2><p>To rate a player, please fill in the following form.</p><br>");
	
		$user_id = $xoopsUser->getVar('uid');

		// Create form to enter rating
		include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
		$form = new XoopsThemeForm('Rating', 'rateplayer', 'rating.php?op=enter', 'POST');
		$player_select = new XoopsFormSelect(ucwords(_COMP_PLAYER_TO_RATE).' ('.ucwords(_COMP_CHALLENGE_ID).')', 'challenge_id', $challs[0]['challenge_id'], 1);
		foreach($challs as $challenge){
			if( $challenge['challenger_id'] == $user_id ){
				$opponent_name = $challenge['challenged_name'];
			}
			else{
				$opponent_name = $challenge['challenger_name'];
			}
			$player_select->addOption($challenge['challenge_id'], $opponent_name.' ('.$challenge['challenge_id'].')');
		}
		$form->addElement(&$player_select);
		$rating_select = new XoopsFormRadio(ucwords(_COMP_RATING), 'rating', 0, 1);
		$rating_select->addOption(1, ucwords(_COMP_POSITIVE));
		$rating_select->addOption(0, ucwords(_COMP_NEUTRAL));
		$rating_select->addOption(-1, ucwords(_COMP_NEGATIVE));
		$form->addElement(&$rating_select);
		$text_width = 30; // Maximum number of characters to accept
		$form->addElement(new XoopsFormText(ucwords(_COMP_COMMENTS), 'comments', 2*$text_width, $text_width));
		$form->addElement(new XoopsFormButton('', '', ucwords(_COMP_REPORT), 'submit'));
		$form->display();
	}
}
?>
