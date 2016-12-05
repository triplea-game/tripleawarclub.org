<?php
/*
 * Created on Oct 7, 2006
 */
include '../../mainfile.php';

// Get the parameters
$comp_id = isset($_GET['lid']) ? $_GET['lid'] : $_POST['lid'];
$op = isset($_GET['op']) ? $_GET['op'] : $_POST['op'];
$user_id = $_GET['uid'];
$page_num = isset($_GET['pagenum']) ? $_GET['pagenum'] : 1;
$matches_per_page = isset($_GET['mppg']) ? $_GET['mppg'] : 20;
$side = isset($_GET['side']) ? $_GET['side'] : $_POST['side'];
$action = $_POST['action'];
$step = $_POST['step'];
$challenge_id = $_POST['challenge_id'];
$winner_id = $_POST['winner_id'];
$loser_id = $_POST['loser_id'];
$points = $_POST['points'];

// Verify comp_id parameter
if( !isset($comp_id) ){
	exit(_COMP_ERRORS_MISSING_VALUE);
}
elseif( !is_numeric($comp_id) ){
	exit(_COMP_ERRORS_INVALID_VALUE);
}
else{
	// A display page
	if( !isset($op) ){
		// ! Must be here or template will show on all pages!
		$xoopsOption['template_main'] = "matches.html";
		include XOOPS_ROOT_PATH.'/header.php';

		// Verfify user id
		if( isset($user_id) && !is_numeric($user_id) ){
			unset($user_id);
		}

		// Verify side
		if( isset($side) && ($side != "axis") && ($side != "allies" ) ){
			$side == "both";
		}

		// Get the matches
		$matches_handler =& xoops_getmodulehandler('matches');
		$matches = $matches_handler->getMatches($comp_id, $user_id, $side);
	
		// Check for a valid competition id
		$num_matches = count($matches);
		if( $num_matches > 0 ){
	
			// Get the organization
			include "include/functions.inc.php";
			$org = getPageOrganization($num_matches, $matches_per_page, $page_num);
			if( count($org) < 1 ){
				exit(_COMP_ERRORS_INVALID_VALUE);
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
		}
		else{
			exit(_COMP_ERRORS_INVALID_VALUE);
		}
	}
	// Report a match result page
	elseif( $op == "report" ){
		// ! Must be here so template will show on match display page!
		include XOOPS_ROOT_PATH.'/header.php';

		// Guest can't report matches
		if( !is_object($xoopsUser) ){
			exit(_COMP_ERRORS_NEED_LOGIN);
		}
		else{
			// Get the player id (current user)
			$user_id = $xoopsUser->getVar('uid');

			// Match selection page
			if( !isset($action) ){
				// Get the current challenges for the player
				$player_handler =& xoops_getmodulehandler('player');
				$profile = $player_handler->getPlayerProfile($user_id, $comp_id);
				if( count($profile) < 1 ){
					exit(_COMP_ERRORS_INVALID_VALUE);
				}
				$challenges = $player_handler->getPlayerChallenges($user_id, $comp_id);
				if( count($challenges) < 1 ){
					exit(_COMP_ERRORS_NO_ACTIVE_CHALLENGES);
				}

				include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
				$form = new XoopsThemeForm(ucwords(_COMP_REPORT_MATCH), 'reportmatch', 'matches.php', 'POST');
				$form->addElement(new XoopsFormHidden('lid', $comp_id));
				$form->addElement(new XoopsFormHidden('op', 'report'));
				$form->addElement(new XoopsFormHidden('step', 'verify'));
				$form->addElement(new XoopsFormLabel(ucwords(_COMP_REPORTING_PLAYER), $profile['uname']));
				$side_select = new XoopsFormSelect(ucfirst(_COMP_PLAYING_AS), 'side', 1, 1);
				$side_select->addOption(0, 'Axis');
				$side_select->addOption(1, 'Allies');
				$form->addElement(&$side_select);
				$result_select = new XoopsFormSelect('Result', 'result', 'win', 1);
				$result_select->addOption('win', 'Wins');
				$result_select->addOption('loss', 'Loses');
				$form->addElement(&$result_select);
				$challenge_select = new XoopsFormSelect('Against Opponent (Challenge Id)', 'challenge_id');
				foreach($challenges as $challenge){
					if( $challenge['challenger_id'] == $user_id ){
						$challenge_select->addOption($challenge['challenge_id'], $challenge['challenged_name'].' ('.$challenge['challenge_id'].')');
					}
					else{
						$challenge_select->addOption($challenge['challenge_id'], $challenge['challenger_name'].' ('.$challenge['challenge_id'].')');
					}
				}
				$form->addElement(&$challenge_select);
				$form->addElement(new XoopsFormButton("", "action", ucwords(_COMP_REPORT), "submit"));
				$form->display();
			}
			// Verify or post result
			else{
				// Verify before post
				if( $step == 'verify' ){

					// Check side value
					if( ($side != 0) && ($side != 1) ){
						exit(_COMP_ERRORS_INVALID_VALUE);
					}

					// Get the challenge information from the database
					if( !isset($challenge_id) || !is_numeric($challenge_id) ){
						exit(_COMP_ERRORS_INVALID_VALUE);
					}
					$challenges_handler =& xoops_getmodulehandler('challenges');
					$challenge = $challenges_handler->getChallenge($challenge_id);
					if( count($challenge) < 1 ){
						exit(_COMP_ERRORS_INVALID_VALUE);
					}
					if( $challenge['chall_status'] > 1 ){
						exit(_COMP_ERRORS_INVALID_VALUE);
					}

					// Determine winner and loser
					if( $challenge['challenger_id'] == $user_id ){
						$user_name = $challenge['challenger_name'];
						$user_points = $challenge['points_challenger'];
						$opponent_id = $challenge['challenged_id'];
						$opponent_name = $challenge['challenged_name'];
						$opponent_points = $challenge['points_challenged'];
					}
					else{
						$user_name = $challenge['challenged_name'];
						$user_points = $challenge['points_challenged'];
						$opponent_id = $challenge['challenger_id'];
						$opponent_name = $challenge['challenger_name'];
						$opponent_points = $challenge['points_challenger'];
					}
					if( $result == 'win' ){
						$winner_id = $user_id;
						$winner_name = $user_name;
						$loser_id = $opponent_id;
						$loser_name = $opponent_name;
						$points = $user_points;
					}
					elseif( $result == 'loss' ){
						$winner_id = $opponent_id;
						$winner_name = $opponent_name;
						$loser_id = $user_id;
						$loser_name = $user_name;
						$points = $opponent_points;
						// Reverse side
						$side = ($side == 1) ? 0 : 1;
					}
					else{
						exit(_COMP_ERRORS_INVALID_VALUE);
					}

					// Create verification form
					include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
					$form = new XoopsThemeForm('Verify Match Results', 'verifymatch', 'matches.php', 'POST');
					$form->addElement(new XoopsFormHidden('lid', $comp_id));
					$form->addElement(new XoopsFormHidden('op', 'report'));
					$form->addElement(new XoopsFormHidden('step', 'post'));
					$form->addElement(new XoopsFormLabel('Challenge Id', $challenge_id));
					$form->addElement(new XoopsFormHidden('challenge_id', $challenge_id));
					$form->addElement(new XoopsFormLabel('Winning Player', $winner_name));
					$form->addElement(new XoopsFormHidden('winner_id', $winner_id));
					if( $side == 0 ){
						$form->addElement(new XoopsFormLabel('Winning Side', 'Axis'));
					}
					else{
						$form->addElement(new XoopsFormLabel('Winning Side', 'Allies'));
					}
					$form->addElement(new XoopsFormHidden('side', $side));
					$form->addElement(new XoopsFormLabel('Losing Player', $loser_name));
					$form->addElement(new XoopsFormHidden('loser_id', $loser_id));
					$form->addElement(new XoopsFormLabel('Match Points', $points));
					$form->addElement(new XoopsFormHidden('points', $points));
					$form->addElement(new XoopsFormButton("", "action", ucwords(_COMP_REPORT), "submit"));
					$form->display();
				}
				// Post result to database
				elseif( $step == 'post' ){
					// Check for necessary values.
					if( !isset($winner_id) || !isset($loser_id) || !isset($side) || !isset($challenge_id) || !isset($points) ){
						exit(_COMP_ERRORS_MISSING_VALUE);
					}
					// Check for invalid values.
					elseif( !is_numeric($winner_id) || !is_numeric($loser_id) || !is_numeric($side) || !is_numeric($challenge_id) || !is_numeric($points) ){
						exit(_COMP_ERRORS_INVALID_VALUE);
					}
					else{
						$user_handler =& xoops_getmodulehandler('user');
						echo $user_handler->reportMatch($challenge_id, $winner_id, $loser_id, $side, $points);
					}
				}
			}
		}
	}
	// Find an opponent to challenge
	elseif( $op == "search" ){
		// ! Must be here so template will show on match display page!
		include XOOPS_ROOT_PATH.'/header.php';

		echo 'Challenge an opponent....<br>';
	}
	else{
		exit(_COMP_ERRORS_INVALID_VALUE);
	}
}

include_once XOOPS_ROOT_PATH.'/footer.php';
?>
