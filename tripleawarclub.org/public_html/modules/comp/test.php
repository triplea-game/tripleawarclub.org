<?php
ini_set('display_errors', 'on');
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "test"; exit;
/*
 * Created on Oct 7, 2006
 */
echo "hello world";exit;
//include XOOPS_ROOT_PATH.'/header.php';
echo "hello world"; exit;
// Guest can't report matches
//if( !is_object($xoopsUser) ){
//	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_NEED_LOGIN));
//}
//else{
/*	
	// Get the player id (current user)
	$user_id = $xoopsUser->getVar('uid');

	// Match selection page
	if( !isset($step) ){
		
		// Get the current challenges for the player
		$player_handler = xoops_getmodulehandler('player');
		$profile = $player_handler->getPlayerProfile($user_id);
		
		if( count($profile) < 1 ){
			redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
		}
		
		echo("<h2 class=\"siteheader\">Report Match</h2><p>All fields are required.</p>");
		
		include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
				
		$ladder_handler = xoops_getmodulehandler('ladder');	
		$ladders = $ladder_handler->getAllLadders();	

		foreach($ladders as $ladder){
			
			$lid=$ladder['comp_id'];
				
			$challenges = $player_handler->getPlayerChallenges($user_id, $lid);
			
			if( count($challenges) > 0 ){
				//redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_NO_ACTIVE_CHALLENGES));

				echo "<br><h3 class=\"comp\">".$ladder_handler->getLadderName($lid)."</h3>";
				
				$form = new XoopsThemeForm('Results', 'reportmatch', 'matches.php?op=report&step=verify', 'POST');
				$form->addElement(new XoopsFormLabel(ucwords(_COMP_REPORTING_PLAYER), $profile['uname']));
				$challenge_select = new XoopsFormSelect(ucwords(_COMP_AGAINST_OPPONENT).' ('.ucwords(_COMP_CHALLENGE_ID).')', 'challenge_id');
				$form->addElement(new XoopsFormHidden('comp_id', $lid));
				$form->addElement(new XoopsFormHidden('user_id', $user_id));				
				
				foreach($challenges as $challenge){
					if( $challenge['challenger_id'] == $user_id ){
						$challenge_select->addOption($challenge['challenge_id'], $challenge['challenged_name'].' ('.$challenge['challenge_id'].')');
					}
					else{
						$challenge_select->addOption($challenge['challenge_id'], $challenge['challenger_name'].' ('.$challenge['challenge_id'].')');
					}
				}
				$form->addElement(&$challenge_select);
				
				$axis_result_select = new XoopsFormSelect($profile['uname'].' '.ucfirst(_COMP_PLAYING_AS).' '.ucwords(_COMP_AXIS), 'axis_result', 0, 1);
				$axis_result_select->addOption(0, _COMP_BLANK);			
				$axis_result_select->addOption(1, ucfirst(_COMP_WINS));
				$axis_result_select->addOption(2, ucfirst(_COMP_LOSES));
				$form->addElement(&$axis_result_select);
				
				$allies_result_select = new XoopsFormSelect($profile['uname'].' '.ucfirst(_COMP_PLAYING_AS).' '.ucwords(_COMP_ALLIES), 'allies_result', 0, 1);
				$allies_result_select->addOption(0, _COMP_BLANK);		
				$allies_result_select->addOption(1, ucfirst(_COMP_WINS));
				$allies_result_select->addOption(2, ucfirst(_COMP_LOSES));
				$form->addElement(&$allies_result_select);
				
				//ABSTRACT LAYTOR PLZ
				if($lid=="6"){ // aa50
	
					$map = new XoopsFormSelect(_COMP_MAP, "map");
					$map->addOption(0, _COMP_BLANK);
					$map->addOption("1", _COMP_1941);
					$map->addOption("3", _COMP_1942);
					$form->addElement(&$map);
	
					$luck = new XoopsFormSelect(_COMP_LUCK_OPTION, "luck");
					$luck->addOption(0, _COMP_BLANK);
					$luck->addOption("1", _COMP_REGULARLUCK);
					$luck->addOption("3", _COMP_LL);
					$form->addElement(&$luck);
	
					$nos = new XoopsFormSelect(_COMP_NOS, "nos");
					$nos->addOption(0, _COMP_BLANK);
					$nos->addOption("1", _COMP_OFF);
					$nos->addOption("3", _COMP_ON);				
					$form->addElement(&$nos);
									
				}			
				
				$form->addElement(new XoopsFormButton('', '', ucwords(_COMP_REPORT), 'submit'));
				$form->display();
			
			}
		
		}
		
		
	}
	// Verify or post result
	else{
		// Verify before post
		if( $step == 'verify' ){
			
				
			// Get the challenge information from the database
			if( !isset($challenge_id) || !is_numeric($challenge_id) ){
				redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
			}
			$challenges_handler =& xoops_getmodulehandler('challenges');
			$challenge = $challenges_handler->getChallenge($challenge_id);
			if( count($challenge) < 1 ){
				redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
			}
			if( $challenge['chall_status'] > 0 ){
				redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
			}

			// Check values win/loss
			if( (($axis_result != 1) && ($axis_result !=2)) || (($allies_result != 1) && ($allies_result != 2)) ){
				redirect_header("matches.php?op=report&uid=".$user_id, 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
			}

			// Check aa50 values
			if($comp_id==6){

				if( (($map != 1) && ($map !=3)) || (($nos != 1) && ($nos !=3)) || (($luck != 1) && ($luck !=3)) ){
					redirect_header("matches.php?op=report&uid=".$user_id, 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
				}			
			
			}

			// Determine winner and loser
			if( $challenge['challenger_id'] == $user_id ){
				$user_name = $challenge['challenger_name'];
				$opponent_id = $challenge['challenged_id'];
				$opponent_name = $challenge['challenged_name'];
			}
			else{
				$user_name = $challenge['challenged_name'];
				$opponent_id = $challenge['challenger_id'];
				$opponent_name = $challenge['challenger_name'];
			}
			
			echo("<h2 class=\"siteheader\">Report Match</h2><br>");
			
			// Create verification form
			include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
			$form = new XoopsThemeForm(ucwords(_COMP_VERIFY_MATCH_RESULTS), 'verifymatch', 'matches.php?&op=report&step=post', 'POST');
			$form->addElement(new XoopsFormLabel(ucwords(_COMP_CHALLENGE_ID), $challenge_id));
			$form->addElement(new XoopsFormHidden('challenge_id', $challenge_id));
			$form->addElement(new XoopsFormHidden('comp_id', $comp_id));
			$form->addElement(new XoopsFormHidden('user_id', $user_id));
			
			// Player loses as Axis
			if( $axis_result == 2 ){
				$form->addElement(new XoopsFormLabel('', $opponent_name.' '._COMP_WINS_AS.' '.ucwords(_COMP_ALLIES).' '._COMP_AGAINST_OPPONENT.' '.$user_name));
			}
			// Player wins as Axis
			else{
				$form->addElement(new XoopsFormLabel('', $user_name.' '._COMP_WINS_AS.' '.ucwords(_COMP_AXIS).' '._COMP_AGAINST_OPPONENT.' '.$opponent_name));
			}
			$form->addElement(new XoopsFormHidden('axis_result', $axis_result));
			// Player loses as Allies
			if( $allies_result == 2 ){
				$form->addElement(new XoopsFormLabel('', $opponent_name.' '._COMP_WINS_AS.' '.ucwords(_COMP_AXIS).' '._COMP_AGAINST_OPPONENT.' '.$user_name));
			}
			// Player wins as Allies
			else{
				$form->addElement(new XoopsFormLabel('', $user_name.' '._COMP_WINS_AS.' '.ucwords(_COMP_ALLIES).' '._COMP_AGAINST_OPPONENT.' '.$opponent_name));
			}
			$form->addElement(new XoopsFormHidden('allies_result', $allies_result));
		
			// aa50 stuff
			if($comp_id==6){
			
			
						// Map
						if( $map == 1 ){
							$form->addElement(new XoopsFormLabel('', _COMP_1941));
						} else {
							$form->addElement(new XoopsFormLabel('', _COMP_1942));
						}
						$form->addElement(new XoopsFormHidden('map', $map));
						
						// Luck
						if( $luck == 1 ){
							$form->addElement(new XoopsFormLabel('', _COMP_REGULARLUCK));
						} else {
							$form->addElement(new XoopsFormLabel('', _COMP_LL));
						}
						$form->addElement(new XoopsFormHidden('luck', $luck));	
						
						// Nos
						if( $nos == 1 ){
							$form->addElement(new XoopsFormLabel('', _COMP_OFF));
						} else {
							$form->addElement(new XoopsFormLabel('', _COMP_ON));
						}
						$form->addElement(new XoopsFormHidden('nos', $nos));	
						
			}

			// Challenge slota
			$player_handler =& xoops_getmodulehandler('player');
			$profile = $player_handler->getPlayerProfile($user_id, $challenge['comp_id']);
			$current_chall_slot = $profile['competitions'][0]['challengeslot']; // Only one competition in array
			$slot_select = new XoopsFormRadio("Open my challenge slot?", "chall_slot", $current_chall_slot, 1);
			$slot_select->addOption(0, ucwords(_COMP_CHALLENGESLOT_OPEN));
			$slot_select->addOption(1, ucwords(_COMP_CHALLENGESLOT_CLOSED));
			$form->addElement(&$slot_select);
			
			$form->addElement(new XoopsFormButton('', '', ucwords(_COMP_REPORT), 'submit'));
			$form->addElement(new XoopsFormLabel('', '<a href="index.php">'.ucwords(_COMP_CANCEL).'</a>'));
			$form->display();
		}
		
		// Post result to database
		elseif( $step == 'post' ){

			if($comp_id==6){

				if(!isset($map) || !isset($nos) || !isset($luck)){

					redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
				} else {

					if( (($map != 1) && ($map !=3)) || (($nos != 1) && ($nos !=3)) || (($luck != 1) && ($luck !=3)) ){

						redirect_header("matches.php?op=report&uid=".$user_id, 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
					}						

				}
			}		

			// Check for necessary values.
			if( !isset($axis_result) || !isset($allies_result) || !isset($challenge_id) ){

				redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
			}
			elseif( (($axis_result != 1) && ($axis_result !=2)) || (($allies_result != 1) && ($allies_result != 2)) || !is_numeric($challenge_id) ){

				redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
			}
			else{
				
				$user_handler =& xoops_getmodulehandler('user');
				$challenges_handler =& xoops_getmodulehandler('challenges');
				$challenge = $challenges_handler->getChallenge($challenge_id);	

				// open challenge slot 
				if(isset($chall_slot)){
					echo $user_handler->updateChallengeSlot($lid,$chall_slot)."<br>";
				}
				// Get info for email

				// Get the ids
				if( $challenge['challenger_id'] == $xoopsUser->getVar('uid') ){
					$reporter_id =  $challenge['challenger_id'];
					$opponent_id = $challenge['challenged_id'];
				}
				else{
					$reporter_id = $challenge['challenged_id'];
					$opponent_id = $challenge['challenger_id'];
				}

				$player_handler =& xoops_getmodulehandler('player');
				$reporter = $player_handler->getPlayerProfile($reporter_id);
				$opponent = $player_handler->getPlayerProfile($opponent_id);
				$to = array($reporter['email'], $opponent['email']);
				// Send Email Notification of Report
				$xoopsMailer =& getMailer();
				$xoopsMailer->useMail(); 
				$xoopsMailer->setTemplateDir(XOOPS_ROOT_PATH.'/modules/comp/language/'.$xoopsConfig['language'].'/mail_template');
				$xoopsMailer->setTemplate("comp_report_match.tpl");
				$xoopsMailer->setToEmails($to);
				$xoopsMailer->setFromEmail("admin@tripleawarclub.org");
				$xoopsMailer->setFromName($reporter['uname']);
				$xoopsMailer->setSubject("Match Reported.");
				$xoopsMailer->assign("OPPONENT", $opponent['uname']);
				$xoopsMailer->assign("REPORTER", $reporter['uname']);

				if($axis_result==2){
					$xoopsMailer->assign("AXIS_RESULT", "loss");}
				if($axis_result==1){
					$xoopsMailer->assign("AXIS_RESULT", "win");}
				if($allies_result==2){
					$xoopsMailer->assign("ALLIES_RESULT", "loss");}
				if($allies_result==1){
					$xoopsMailer->assign("ALLIES_RESULT", "win");}

				$xoopsMailer->assign("CHALLENGE_ID", $challenge_id);
				$xoopsMailer->assign("SITENAME", $xoopsConfig['sitename']);
				$xoopsMailer->assign("SITEURL", XOOPS_URL."/");
				$xoopsMailer->send();
				echo $user_handler->reportChallenge($challenge_id, $axis_result, $allies_result, $map, $luck, $nos);
			}
		}
*/	}
//}


