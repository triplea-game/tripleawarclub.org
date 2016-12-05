<?php
/**
 * Class to handle challenges for competitions.
 * Contains the information necessary to handle challenges for competitions.
 * 
 * @module Comp
 * @version 1.0
 * @author Andreas Menrath <clausewitz_triplea@gmx.de>
 * @author Kurtis ... <minionofchaos@gmail.com>
 * 
 * last modification: 2006-12-27
 * 
 * To Do: update SQL-syntax
*/

class CompChallengesHandler {
	var $db;
	
	//Constructor
	function CompChallengesHandler() {
		// get database connection
		$this->db = XoopsDatabaseFactory::getDatabaseConnection();	
	}

	/**
	 * Returns the challenges for the given competition, optionally filtered
	 * to a certain user.
	 * 
	 * @var $comp_id competition id to retrieve matches from
	 * @var $user_id user id to return matches about
	 * @var $max_status = 2 default (completed)_ .... from what I can tell status=3 means deleted, 2 is completed, Im setting 4 to slowplay, slowplay column will be a count.
	 * @return mixed array of challenges from the competition sorted by date
	 */
	function getChallenges($comp_id, $user_id = NULL, $max_status = 2) {
		// Just return challenges about one player
		if( isset($user_id) ){
			$player_handler =& xoops_getmodulehandler('player', 'comp');
			return $player_handler->getPlayerChallenges($user_id, $comp_id, false);
		}
		else{
			$challenges = array();

// ToDo:
//SQL syntax: 	use LIMIT, 
//				JOIN-syntax
			$challenge_table = $this->db->prefix('comp_challenges');
			$matches_table = $this->db->prefix('comp_matches');
			$xoops_user_table = $this->db->prefix('users');
			$comp_global_table = $this->db->prefix('comp_user_global');
			$sql = "SELECT $challenge_table.*, challenger.uname AS challenger_name, challenged.uname AS challenged_name, " .
						"challenger.country AS challenger_country, challenged.country AS challenged_country " .
					"FROM $challenge_table, " .
						"(SELECT uname, challenge_id, country FROM $challenge_table, $xoops_user_table, $comp_global_table " .
							"WHERE $challenge_table.challenger_id = $xoops_user_table.uid " .
								"AND $xoops_user_table.uid = $comp_global_table.xoops_user_id " .
								"AND $challenge_table.comp_id = $comp_id) AS challenger, " .
						"(SELECT uname, challenge_id, country FROM $challenge_table, $xoops_user_table, $comp_global_table " .
							"WHERE $challenge_table.challenged_id = $xoops_user_table.uid " .
								"AND $xoops_user_table.uid = $comp_global_table.xoops_user_id " .
								"AND $challenge_table.comp_id = $comp_id) AS challenged " .
					"WHERE challenger.challenge_id = challenged.challenge_id " .
						"AND $challenge_table.challenge_id = challenger.challenge_id " .
						"AND $challenge_table.chall_status <= $max_status ";
						if( isset($user_id) ){
							$sql .= "AND ($challenge_table.challenger_id = $user_id OR $challenge_table.challenged_id = $user_id) ";
						}
					$sql .= "ORDER BY $challenge_table.challenge_id DESC, $challenge_table.chall_status";

			$result = $this->db->query($sql);
			while( $row = $this->db->fetchArray($result) ){
				$challenges[] = $row;
			}
			unset($result);

			return $challenges;
		}
	}

	/**
	 * Returns the challenge with the given id.
	 * 
	 * @var $challenge_id id of challenge to return
	 * @return mixed array of challenge information
	 */
	function getChallenge($challenge_id) {
		$challenge = array();

// SQL
		$challenge_table = $this->db->prefix('comp_challenges');
		$xoops_user_table = $this->db->prefix('users');
		$sql = "SELECT $challenge_table.*, challenger.uname AS challenger_name, challenged.uname AS challenged_name " .
				"FROM $challenge_table, " .
					"(SELECT uname, challenge_id FROM $challenge_table, $xoops_user_table " .
						"WHERE $challenge_table.challenger_id = $xoops_user_table.uid " .
							"AND $challenge_table.challenge_id = $challenge_id) AS challenger, " .
					"(SELECT uname, challenge_id FROM $challenge_table, $xoops_user_table " .
						"WHERE $challenge_table.challenged_id = $xoops_user_table.uid " .
							"AND $challenge_table.challenge_id = $challenge_id) AS challenged " .
				"WHERE challenger.challenge_id = challenged.challenge_id " .
					"AND $challenge_table.challenge_id = challenger.challenge_id " .
					"AND $challenge_table.challenge_id = $challenge_id";
		$result = $this->db->query($sql);
		// Better only be one result
// if NumRows > 1 return false
		$challenge = $this->db->fetchArray($result);
		unset($result);

		return $challenge;
	}

	/**
	 * Deletes the given challenge. If the challenge is completed, it deletes/adds points
	 * for the respective players.
	 * 
	 * @var $challenge_id id of challenge to delete
	 * @return true on success, false on error
	 */
	function deleteChallenge($challenge_id) {
		// Get challenge to delete and associated players
// SQL ???
		$sql = "SELECT challenge_table.* FROM ".$this->db->prefix('comp_challenges')." AS challenge_table " .
				"WHERE challenge_id=$challenge_id";
		$result = $this->db->query($sql);
		if( $this->db->getRowsNum($result) != 1 ){
			return false;
		}
		$challenge=$this->db->fetchArray($result);
		$player_handler =& xoops_getmodulehandler('player', 'comp');
		$players[$challenge['challenger_id']]=$player_handler->getPlayerProfile($challenge['challenger_id'], $challenge['comp_id'], 3);
		$players[$challenge['challenged_id']]=$player_handler->getPlayerProfile($challenge['challenged_id'], $challenge['comp_id'], 3);

// SQL ???
		// Remove the points for any deleted matches
		$sql = "SELECT match_table.* FROM ".$this->db->prefix('comp_matches')." AS match_table " .
				"WHERE challenge_id=$challenge_id";
		$result = $this->db->query($sql);
		if( $this->db->getRowsNum($result) > 2 ){
			return false;
		}
		// Only do database update if matches reported
		if( $this->db->getRowsNum($result) > 0 ){
		
		// in revised the matches are 2 games, so this only needs to be done once.
		$players[$challenge['challenger_id']]['competitions'][0]['matches'] -= 1;
		$players[$challenge['challenged_id']]['competitions'][0]['matches'] -= 1;

			while( $row = $this->db->fetchArray($result) ){
				// Update winner
				$players[$row['winner_id']]['competitions'][0]['rating'] -= round($row['ratingchange']/2);
				//$players[$row['winner_id']]['competitions'][0]['matches'] -= 1;
				$players[$row['winner_id']]['competitions'][0]['wins'] -= 1;
				if( $players[$row['winner_id']]['competitions'][0]['streakwins'] == $players[$row['winner_id']]['competitions'][0]['longest_winstreak']){
					$players[$row['winner_id']]['competitions'][0]['longest_winstreak']-=1;
				}
				$players[$row['winner_id']]['competitions'][0]['streakwins'] -= 1;
				if( $row['side'] == 0 ){
					$players[$row['winner_id']]['competitions'][0]['axiswins'] -= 1;
				}
				else{
					$players[$row['winner_id']]['competitions'][0]['allieswins'] -= 1;
				}

				// Update loser
				$players[$row['loser_id']]['competitions'][0]['rating'] += round($row['ratingchange']/2);
				//$players[$row['loser_id']]['competitions'][0]['matches'] -= 1;
				$players[$row['loser_id']]['competitions'][0]['losses'] -= 1;
				if( $players[$row['loser_id']]['competitions'][0]['streaklosses'] == $players[$row['loser_id']]['competitions'][0]['longest_lossstreak']){
					$players[$row['loser_id']]['competitions'][0]['longest_lossstreak']-=1;
				}
				$players[$row['loser_id']]['competitions'][0]['streaklosses'] -= 1;
				if( $row['side'] == 0 ){
					$players[$row['loser_id']]['competitions'][0]['allieslosses'] -= 1;
				}
				else{
					$players[$row['loser_id']]['competitions'][0]['axislosses'] -= 1;
				}
			}
			

			
// start transaction
			// Update profiles
			foreach( $players as $uid=>$profile ){
				$sql = "UPDATE ".$this->db->prefix('comp_user_local')." " .
					"SET rating=".$profile['competitions'][0]['rating'].", " .
						"matches=".$profile['competitions'][0]['matches'].", " .
						"wins=".$profile['competitions'][0]['wins'].", " .
						"losses=".$profile['competitions'][0]['losses'].", " .
						"axiswins=".$profile['competitions'][0]['axiswins'].", " .
						"allieswins=".$profile['competitions'][0]['allieswins'].", " .
						"axislosses=".$profile['competitions'][0]['axislosses'].", " .
						"allieslosses=".$profile['competitions'][0]['allieslosses']." " .
					"WHERE xoops_user_id=$uid AND comp_id=".$challenge['comp_id'];
				$result = $this->db->queryF($sql);
			}
		}

		// Update challenge entry
		$sql = "UPDATE ".$this->db->prefix('comp_challenges')." SET chall_status=3 " .
				"WHERE challenge_id=".$challenge['challenge_id'];
		$result = $this->db->queryF($sql);

// end transaction
		// remove old cache files
//cache
		$cache_handler =& xoops_getmodulehandler('cachelite', 'comp');
		$cacheoptions = array('cacheDir' => XOOPS_ROOT_PATH.'/modules/comp/class/cache/',  'lifeTime' => 3600);
		$cache_handler->setOptions($cacheoptions);

		$cacheid = "AccessRights".$challenge['challenger_id'];
		$cache_handler->remove($cacheid);
		$cacheid = "AccessRights".$challenge['challenged_id'];
		$cache_handler->remove($cacheid);

		$cacheid = "UserMenu".$challenge['challenger_id'];
		$cache_handler->remove($cacheid);
		$cacheid = "UserMenu".$challenge['challenged_id'];
		$cache_handler->remove($cacheid);

		$cacheid = "AllLadderStats";
		$cache_handler->remove($cacheid);

		$cacheid = "Standings".$challenge['comp_id'];
		$cache_handler->remove($cacheid);

		$cacheid = "Players".$challenge['comp_id'];
		$cache_handler->remove($cacheid);

		$cacheid = "LocalUserProfile".$challenge['challenger_id'];
		$cache_handler->remove($cacheid);
		$cacheid = "LocalUserProfile".$challenge['challenged_id'];
		$cache_handler->remove($cacheid);

		return true;
	}

	// needed this function to un-report a match
	function unReportChallenge($challenge_id) {
		
		// Get challenge to fix and associated players

		$sql = "SELECT challenge_table.* FROM ".$this->db->prefix('comp_challenges')." AS challenge_table " .
				"WHERE challenge_id=$challenge_id";
		$result = $this->db->query($sql);
		if( $this->db->getRowsNum($result) != 1 ){
			return false;
		}
		$challenge=$this->db->fetchArray($result);
		$player_handler =& xoops_getmodulehandler('player', 'comp');
		$players[$challenge['challenger_id']]=$player_handler->getPlayerProfile($challenge['challenger_id'], $challenge['comp_id'], 3);
		$players[$challenge['challenged_id']]=$player_handler->getPlayerProfile($challenge['challenged_id'], $challenge['comp_id'], 3);

		// Remove the points for the match to unReport
		
		$sql = "SELECT match_table.* FROM ".$this->db->prefix('comp_matches')." AS match_table " .
				"WHERE challenge_id=$challenge_id";
		$result = $this->db->query($sql);
		if( $this->db->getRowsNum($result) > 2 ){
			return false;
		}
		// Only do database update if matches reported
		if( $this->db->getRowsNum($result) > 0 ){
		
		// in revised the matches are 2 games, so this only needs to be done once.
		$players[$challenge['challenger_id']]['competitions'][0]['matches'] -= 1;
		$players[$challenge['challenged_id']]['competitions'][0]['matches'] -= 1;

			while( $row = $this->db->fetchArray($result) ){
				// Update winner
				$players[$row['winner_id']]['competitions'][0]['rating'] -= round($row['ratingchange']/2);
				//$players[$row['winner_id']]['competitions'][0]['matches'] -= 1;
				$players[$row['winner_id']]['competitions'][0]['wins'] -= 1;
				if( $players[$row['winner_id']]['competitions'][0]['streakwins'] == $players[$row['winner_id']]['competitions'][0]['longest_winstreak']){
					$players[$row['winner_id']]['competitions'][0]['longest_winstreak']-=1;
				}
				$players[$row['winner_id']]['competitions'][0]['streakwins'] -= 1;
				if( $row['side'] == 0 ){
					$players[$row['winner_id']]['competitions'][0]['axiswins'] -= 1;
				}
				else{
					$players[$row['winner_id']]['competitions'][0]['allieswins'] -= 1;
				}

				// Update loser
				$players[$row['loser_id']]['competitions'][0]['rating'] += round($row['ratingchange']/2);
				//$players[$row['loser_id']]['competitions'][0]['matches'] -= 1;
				$players[$row['loser_id']]['competitions'][0]['losses'] -= 1;
				if( $players[$row['loser_id']]['competitions'][0]['streaklosses'] == $players[$row['loser_id']]['competitions'][0]['longest_lossstreak']){
					$players[$row['loser_id']]['competitions'][0]['longest_lossstreak']-=1;
				}
				$players[$row['loser_id']]['competitions'][0]['streaklosses'] -= 1;
				if( $row['side'] == 0 ){
					$players[$row['loser_id']]['competitions'][0]['allieslosses'] -= 1;
				}
				else{
					$players[$row['loser_id']]['competitions'][0]['axislosses'] -= 1;
				}
			}
			
		// start transaction2s
			// Update profiles
			foreach( $players as $uid=>$profile ){
				$sql = "UPDATE ".$this->db->prefix('comp_user_local')." " .
					"SET rating=".$profile['competitions'][0]['rating'].", " .
						"matches=".$profile['competitions'][0]['matches'].", " .
						"wins=".$profile['competitions'][0]['wins'].", " .
						"losses=".$profile['competitions'][0]['losses'].", " .
						"axiswins=".$profile['competitions'][0]['axiswins'].", " .
						"allieswins=".$profile['competitions'][0]['allieswins'].", " .
						"axislosses=".$profile['competitions'][0]['axislosses'].", " .
						"allieslosses=".$profile['competitions'][0]['allieslosses'].", " .
						"streakwins=".$profile['competitions'][0]['streakwins'].", " .
						"streaklosses=".$profile['competitions'][0]['streaklosses'].", " .
						"longest_winstreak=".$profile['competitions'][0]['longest_winstreak'].", " .
						"longest_lossstreak=".$profile['competitions'][0]['longest_lossstreak']." " .
						
					"WHERE xoops_user_id=$uid AND comp_id=".$challenge['comp_id'];
				$result = $this->db->queryF($sql);
			}
		}

		// Update challenge entry
		$sql = "UPDATE ".$this->db->prefix('comp_challenges')." SET chall_status=0 " .
				"WHERE challenge_id=".$challenge['challenge_id'];
		$result = $this->db->queryF($sql);
		
		// remove from match table entry
		$sql2 = "DELETE FROM ".$this->db->prefix('comp_matches')." WHERE challenge_id=".$challenge_id;
		$result2 = $this->db->queryF($sql2);

// end transaction
		// remove old cache files
//cache
		$cache_handler =& xoops_getmodulehandler('cachelite', 'comp');
		$cacheoptions = array('cacheDir' => XOOPS_ROOT_PATH.'/modules/comp/class/cache/',  'lifeTime' => 3600);
		$cache_handler->setOptions($cacheoptions);

		$cacheid = "AccessRights".$challenge['challenger_id'];
		$cache_handler->remove($cacheid);
		$cacheid = "AccessRights".$challenge['challenged_id'];
		$cache_handler->remove($cacheid);

		$cacheid = "UserMenu".$challenge['challenger_id'];
		$cache_handler->remove($cacheid);
		$cacheid = "UserMenu".$challenge['challenged_id'];
		$cache_handler->remove($cacheid);

		$cacheid = "AllLadderStats";
		$cache_handler->remove($cacheid);

		$cacheid = "Standings".$challenge['comp_id'];
		$cache_handler->remove($cacheid);

		$cacheid = "Players".$challenge['comp_id'];
		$cache_handler->remove($cacheid);

		$cacheid = "LocalUserProfile".$challenge['challenger_id'];
		$cache_handler->remove($cacheid);
		$cacheid = "LocalUserProfile".$challenge['challenged_id'];
		$cache_handler->remove($cacheid);

		return true;
	}
	
	/**
	 * Returns the invitations of a specific player for a competition
	 * @var age maximum age of invitations to display
	 */
	function getInvitations($comp_id, $user_id) {
		$age = 14;
		$invitations_table = $this->db->prefix('comp_invitations');
		$xoops_user_table = $this->db->prefix('users');
// SQL		
		$sql = "SELECT invitations.*, user.uname, (TO_DAYS(NOW()) - TO_DAYS(invitations.invitation_date)) AS age 
				FROM $invitations_table invitations, 
					$xoops_user_table user 
				WHERE invitations.comp_id = '$comp_id' 
					AND invitations.invited_id = '$user_id' 
					AND invitations.inviter_id = user.uid 
				HAVING age <=$age";
		
		$result = $this->db->query($sql);
		while( $row = $this->db->fetchArray($result) ){
			$invitations[] = $row;
		}		
		
		return $invitations;
	}

	/**
	 * Returns a specific invitation
	 * @var age maximum age of invitations to display
	 */
	function getInvitation($invitation_id) {
		$age = 14;
		$invitations_table = $this->db->prefix('comp_invitations');
		
		$sql = "SELECT *, (TO_DAYS(NOW()) - TO_DAYS(invitation_date)) AS age 
				FROM $invitations_table invitations 
				WHERE invitation_id = '$invitation_id'
				HAVING age <=$age";
		
		$result = $this->db->query($sql);
		$invitation = $this->db->fetchArray($result);
		
		return $invitation;
	}	
	/**
	 * check if a player match the options of the inviter
	 * 
	 * @param $invited_id integer this checks if a specific player matches the criteria
	 * @return mixed array with the information
	 */
	function checkPlayerForInvitation($comp_id,$luck,$rules,$mode,$invited_id) {


		// check player with specific luck options
		switch($luck) {
			//random luck
			case "1":
				$luckparam = "<='2'";
				break;
			
			//low luck
			case "3":
				$luckparam = ">='2'";
				break;
			
			//both/any
			case "2":
				$luckparam = "<4";
				break;
		}

		// check players with specific rules options
		switch($rules) {
			//box rules
			case "1":
				$rulesparam = "<='2'";
				break;
			
			//LHTR rules
			case "3":
				$rulesparam = ">='2'";
				break;
			
			//both/any
			case "2":
				$rulesparam = "<4";
				break;
		}		
		
		// check players with specific mode options
		switch($mode) {
			//pbem
			case "1":
				$modeparam = "<='2'";
				break;
			
			//online
			case "3":
				$modeparam = ">='2'";
				break;
			
			//both/any
			case "2":
				$modeparam = "<4";
				break;
		}		
		
		// users cannot invite themselves (-> no games against self)
		$user_handler =& xoops_getmodulehandler('user', 'comp');
		if ($user_handler->user_id == $invited_id) {
			exit();
		}
//SQL		
		$sql = "SELECT comp_global.*, comp_local.*  
				FROM " . $this->db->prefix('comp_user_local') ." comp_local,
					" . $this->db->prefix('comp_user_global') ." comp_global
				WHERE comp_local.xoops_user_id = $invited_id 
					AND comp_global.xoops_user_id = comp_local.xoops_user_id 
					AND comp_local.comp_id = $comp_id 
					AND comp_global.status = '0' 
					AND comp_local.status = '0' 
					AND comp_local.option_luck $luckparam		
					AND comp_local.option_mode $modeparam		
					AND comp_local.option_rules $rulesparam ";
				
		$result = $this->db->query($sql);
		if ($this->db->getRowsNum($result) != 1) {
			return false;
//			exit(_COMP_ERRORS_INVALID_VALUE);
		}
		
		return true;
	}

	function sendInvitation($inviter_id, $invited_id, $comp_id) {
//SQL
		$sql = "INSERT INTO " . $this->db->prefix('comp_invitations') ."
				SET inviter_id = $inviter_id, invited_id = $invited_id, comp_id = $comp_id, invitation_date = NOW()";
		$result = $this->db->queryF($sql);
		
		if($result) {
			echo _COMP_INVITATION_SET . "<br>";
			
			// send private message
			global $xoopsUser;
			$ladder_handler =& xoops_getmodulehandler('ladder', 'comp');
			$comp_name = $ladder_handler->getLadderName($comp_id);
			
			$subject = $comp_name . ": " . _COMP_INVITED_BY . $xoopsUser->getVar('uname');
			$message = _COMP_INVITATION_MSG ." ". $comp_name ." ". _COMP_FROM ." ". $xoopsUser->getVar('uname');
			
			$msg_id = $this->db->genId('priv_msgs_msg_id_seq');
			$sql = sprintf("INSERT INTO %s (msg_id, msg_image, subject, from_userid, to_userid, msg_time, msg_text, read_msg) VALUES (%u, %s, %s, %u, %u, %u, %s, %u)", $this->db->prefix('priv_msgs'), $msg_id, $this->db->quoteString("icon1.gif"), $this->db->quoteString($subject), $inviter_id, $invited_id, time(), $this->db->quoteString($message), 0);
			$result = $this->db->queryF($sql);
			
			// send email
			global $xoopsConfig;

			$xoopsmember_handler =& xoops_gethandler('member');
        	$invitedUser =& $xoopsmember_handler->getUser($invited_id); 	
			
			include XOOPS_ROOT_PATH."/class/xoopsmailer.php";
			$to = array($invitedUser->getVar('email'));
			
			$xoopsMailer =& getMailer();
	    	$xoopsMailer->useMail(); 
	    	$xoopsMailer->setTemplateDir(XOOPS_ROOT_PATH.'/modules/comp/language/'.$xoopsConfig['language'].'/mail_template');
	    	$xoopsMailer->setTemplate("comp_send_invitation.tpl");
			
			$xoopsMailer->setToEmails($to);
			$xoopsMailer->setFromEmail("admin@tripleawarclub.org");
			$xoopsMailer->setFromName($xoopsUser->getVar('uname'));
			$xoopsMailer->setSubject($subject);
			
			//assign variables 
			$xoopsMailer->assign("INVITED", $invitedUser->getVar('uname'));
			$xoopsMailer->assign("INVITER", $xoopsUser->getVar('uname'));
			$xoopsMailer->assign("COMPETITION", $comp_name);
			$xoopsMailer->assign("SITENAME", $xoopsConfig['sitename']);
			$xoopsMailer->assign("SITEURL", XOOPS_URL."/");
			
			$xoopsMailer->send();
		}
	}

	/**
	 * get the difference of the challenges sent and received from a specific player
	 * 
	 * @return integer
	 */
	function getDifferenceOfChallenges($comp_id, $user_id) {
		$sql = "SELECT COUNT(challenge_id) AS sent
				FROM ".$this->db->prefix("comp_challenges")."
				WHERE challenger_id='$user_id' 
					AND comp_id='$comp_id'
					AND chall_status<>'3'";
		$result = $this->db->query($sql);
		$comp_user_profile=array();
		$row=$this->db->fetchArray($result);
		$challenges_sent = $row['sent'];

		$sql = "SELECT COUNT(challenge_id) AS received
				FROM ".$this->db->prefix("comp_challenges")."
				WHERE challenged_id='$user_id' 
					AND comp_id='$comp_id'
					AND chall_status<>'3'";
		$result = $this->db->query($sql);
		$comp_user_profile=array();
		$row=$this->db->fetchArray($result);
		$challenges_received = $row['received'];
		

		return $challenges_sent - $challenges_received;		
	}
	
	/**
	 * delete an invitation
	 * @return id of the inviter or false 
	 */
	function deleteInvitation($invitation_id, $invited_id = null) {
		$sql = "SELECT inviter_id FROM ". $this->db->prefix("comp_invitations") . " 
				WHERE invitation_id = '$invitation_id'";
		if( isset($invited_id) ){
			$sql .= " AND invited_id = '$invited_id'";
		}
		$result = $this->db->query($sql);
		if ($this->db->getRowsNum($result) != 1) {
			return false;
		}
		$row = $this->db->fetchArray($result);

		$sql = "DELETE FROM ". $this->db->prefix("comp_invitations") . " 
					WHERE invitation_id = '$invitation_id'";
		if( isset($invited_id) ){
			$sql .= " AND invited_id = '$invited_id'";
		}
		$result = $this->db->queryF($sql);
		$rows_affected = $this->db->getAffectedRows();
		
		if ($rows_affected == 1) {
			return $row['inviter_id'];
		}
		else {
			return false;
		}

	}

	/**
	 * Convert an invitation into a challenge
	 * -> insert challenge, delete invitation
	 */
	function invitation2Challenge($comp_id, $inviter_id, $invited_id, $invitation_id) {
		global $xoopsUser, $xoopsConfig;
		
		$sql = "START TRANSACTION; ";
		$result = $this->db->queryF($sql);
		
		$sql = "DELETE FROM ". $this->db->prefix("comp_invitations") . 
					" WHERE invitation_id='$invitation_id'; ";
		$result = $this->db->queryF($sql);
		
		$sql = "INSERT INTO ". $this->db->prefix("comp_challenges") . 
					" SET challenger_id='$inviter_id', challenged_id='$invited_id', comp_id='$comp_id', chall_date=NOW(); ";
		$result = $this->db->queryF($sql);
		$challenge_id = $this->db->getInsertId();
		
		$sql = "COMMIT; ";
		$result = $this->db->queryF($sql);
		
		if(!isset($challenge_id)) {
			exit();
		}		
		
		// gather information for sending PMs and Emails
		$ladder_handler =& xoops_getmodulehandler('ladder', 'comp');
		$comp_name = $ladder_handler->getLadderName($comp_id);
		$xoopsmember_handler =& xoops_gethandler('member');
        $inviterUser =& $xoopsmember_handler->getUser($inviter_id); 		

		// send private message to inviter
		$subject = $comp_name . ": " . _COMP_INVITATION_ACCEPTED1 . $xoopsUser->getVar('uname') . _COMP_INVITATION_ACCEPTED2;
		$message = $comp_name . ": " . _COMP_INVITATION_ACCEPTED1 . $xoopsUser->getVar('uname') . _COMP_INVITATION_ACCEPTED2 . "\n";
		$message .= _COMP_CHALLENGE_SUCCESS_CHALLENGE_ID . " " .$challenge_id;
		
		$msg_id = $this->db->genId('priv_msgs_msg_id_seq');
		$sql = sprintf("INSERT INTO %s (msg_id, msg_image, subject, from_userid, to_userid, msg_time, msg_text, read_msg) VALUES (%u, %s, %s, %u, %u, %u, %s, %u)", $this->db->prefix('priv_msgs'), $msg_id, $this->db->quoteString("icon1.gif"), $this->db->quoteString($subject), $invited_id, $inviter_id, time(), $this->db->quoteString($message), 0);
		$result = $this->db->queryF($sql);

		// send private message to invited		
		$subject = $comp_name . ": " . $xoopsUser->getVar('uname') . _COMP_CHALLENGE_CHALLENGED_BY . $inviterUser->getVar('uname');
		$message = _COMP_CHALLENGE_RECEIVED_FOR . $comp_name . " " . _COMP_FROM . " " . $inviterUser->getVar('uname') . ".\n";
		$message .= _COMP_CHALLENGE_SUCCESS_CHALLENGE_ID . " " .$challenge_id;
			
		$msg_id = $this->db->genId('priv_msgs_msg_id_seq');
		$sql = sprintf("INSERT INTO %s (msg_id, msg_image, subject, from_userid, to_userid, msg_time, msg_text, read_msg) VALUES (%u, %s, %s, %u, %u, %u, %s, %u)", $this->db->prefix('priv_msgs'), $msg_id, $this->db->quoteString("icon1.gif"), $this->db->quoteString($subject), $inviter_id, $invited_id, time(), $this->db->quoteString($message), 0);
		$result = $this->db->queryF($sql);

		// send email
		include XOOPS_ROOT_PATH."/class/xoopsmailer.php";
		$to = array($inviterUser->getVar('email'), $xoopsUser->getVar('email'));
		
		$xoopsMailer =& getMailer();
    	$xoopsMailer->useMail(); 
    	$xoopsMailer->setTemplateDir(XOOPS_ROOT_PATH.'/modules/comp/language/'.$xoopsConfig['language'].'/mail_template');
    	$xoopsMailer->setTemplate("comp_accept_invitation.tpl");
		
		$xoopsMailer->setToEmails($to);
		$xoopsMailer->setFromEmail("admin@tripleawarclub.org");
		$xoopsMailer->setFromName("TripleA Warclub");
		$xoopsMailer->setSubject($subject);
		
		//assign variables 
		$xoopsMailer->assign("INVITED", $xoopsUser->getVar('uname'));
		$xoopsMailer->assign("INVITER", $inviterUser->getVar('uname'));
		$xoopsMailer->assign("COMPETITION", $comp_name);
		$xoopsMailer->assign("CHALLENGE_ID", $challenge_id);
		$xoopsMailer->assign("SITENAME", $xoopsConfig['sitename']);
		$xoopsMailer->assign("SITEURL", XOOPS_URL."/");
		
		$xoopsMailer->send();	
		
		return $challenge_id;
	}
}
?>
