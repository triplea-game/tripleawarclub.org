<?php
/*
 * Created on 31.08.2006
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 
 */
class CompUserHandler {
	
	var $db;
	var $user_id;
	var $user_profile;
	var $access_rights;
	
	//constructor
	function CompUserHandler() {
		// get database connection
		$this->db = XoopsDatabaseFactory::getDatabaseConnection();
		
		// get user id
		global $xoopsUser;
		$this->user_id = $xoopsUser->getVar('uid');
		if(!isset($this->user_id)) {
			exit();
		}
	}
	
	/*
	 * get a local user profile from the database or the cache
	 * 
	 * @var user_id string XOOPS user id
	 * @return mixed array containing the user_profiles for all competitions 
	 * 				with all information from comp_user_local table
	 */
	function getUserProfile() {
		global $xoopsUser;
//		static $comp_user_profile;
		
		if(!isset($this->user_profile)){

			/** check if user is guest
			 * if user is guest $xoopsUser won't be an object
			 */
			if(is_object($xoopsUser)) {
							
/*				// Create a Cache_Lite object
				$cache_handler = xoops_getmodulehandler('cachelite');
				$cacheoptions = array('cacheDir' => XOOPS_ROOT_PATH.'/modules/comp/class/cache/',  'lifeTime' => 3600);
				$cache_handler->setOptions($cacheoptions);
				$cacheid = "LocalUserProfile".$this->user_id;
		
				//check cache for information
				if ($data = $cache_handler->get($cacheid)) {
					$this->user_profile = unserialize($data);
					unset($data);
				}
				//check database for information
				else {
*/			        $sql = "SELECT * FROM ".$this->db->prefix("comp_user_local")." WHERE xoops_user_id='$this->user_id'";
			        $result = $this->db->query($sql);
			        $comp_user_profile=array();
			        while ($row=$this->db->fetchArray($result)) {
			            $comp_user_profile[$row["comp_id"]] = $row;
					}
					$this->user_profile = $comp_user_profile;		

#					//export information to the cache		
#					$user_profile_export = serialize($comp_user_profile);
#					$cache_handler->save($user_profile_export,$cacheid);			
#					unset($user_profile_export);
#					unset($comp_user_profile);
#				}
			}	
		}
		
		//return array with the data
		return $this->user_profile;		
	}
	
function multi_array_key_exists( $needle, $haystack, $value ) {
 
    foreach ( $haystack as $key => $value ) :

        if ( $needle == $key && $haystack[$needle]=="true" )
            return true;
       
        if ( is_array( $value ) ) :
             if ( $this->multi_array_key_exists( $needle, $value ) == true )
                return true;
             else
                 continue;
        endif;
       
    endforeach;
   
    return false;
} 
	
	/**
	 * Check if a user is registered in that competition
	 * 
	 * @return true or false
	 */
	function isPlayer($comp_id) {
					
		if(!isset($this->access_rights)){
			$this->getAccessRights();
		}
		
		if(isset($comp_id)){
		
				if(isset($this->access_rights[$comp_id])){
					
					if (isset($this->access_rights[$comp_id]["is_player"]) && $this->access_rights[$comp_id]["is_player"] == true) {
					//if($this->multi_array_key_exists("is_player",$this->access_rights)){
						return true;
					}
					else {
						return false;
					}
				}
				else {
					return false;
				}	
		
		} else {
		
		echo "NOT SET";
				//if($this->multi_array_key_exists("is_player",$this->access_rights)){
				//echo("hell yea");
				//}
				
				//print_r($this->access_rights);
				//if $comp_id is in array $comp_access_rights
		
				if(isset($this->access_rights)){
					
					//if (isset($this->access_rights[$comp_id]["is_player"]) && $this->access_rights[$comp_id]["is_player"] == true) {
					if($this->multi_array_key_exists("is_player",$this->access_rights)){
						return true;
					}
					else {
						return false;
					}
				}
				else {
					return false;
				}
		
		}		
	}


	/**
	 * Check if a user is admin of that competition
	 * 
	 * This is not a save function! The cache might be volunerable for hackers.
	 * Use the admin handler for checking admin rights in secure areas!
	 * 
	 * @return true or false
	 */
	function isAdmin($comp_id) {
					
		if(!isset($this->access_rights)){
			$this->getAccessRights();
		}
		
		//if $comp_id is in array $comp_access_rights
		if(isset($this->access_rights[$comp_id])){
			if (isset($this->access_rights[$comp_id]["is_admin"]) && $this->access_rights[$comp_id]["is_admin"] == true) {
				return true;
			}
			else {
				return false;
			}
				}
		else {
			return false;
		}
		
	}	
	
	/**
	 * get all access rights of a user from the database or the cache
	 * 
	 * @return mixed array containing the user's access rights for all competitions 
	 */	
	function getAccessRights() {
		global $xoopsUser;
		
		if(!isset($this->access_rights)){
			/* check if user is guest
			 * if user is guest $xoopsUser won't be an object
			 */
			if(is_object($xoopsUser)) {
				
/*				// Create a Cache_Lite object
				$cache_handler = xoops_getmodulehandler('cachelite');
				$cacheoptions = array('cacheDir' => XOOPS_ROOT_PATH.'/modules/comp/class/cache/',  'lifeTime' => 3600);
				$cache_handler->setOptions($cacheoptions);
				$cacheid = "AccessRights".$this->user_id;
		
				// Check cache for information
				if ($data = $cache_handler->get($cacheid)) {
					$this->access_rights = unserialize($data);
					unset($data);
				}
				// Check database for information
				else {
*/			        // check for user rights
			        $sql = "SELECT comp_id FROM ".$this->db->prefix("comp_user_local")." WHERE xoops_user_id='$this->user_id' AND status='0' ORDER BY comp_id";
			        $result = $this->db->query($sql);
			        $comp_access_rights=array();
			        while ($row=$this->db->fetchArray($result)) {
			            $comp_access_rights[$row["comp_id"]]["is_player"] = "true";		
					}
					
					// check for admin rights
			        $sql = "SELECT comp_id FROM ".$this->db->prefix("comp_admins")." WHERE xoops_user_id='$this->user_id' ORDER BY comp_id";
			        $result = $this->db->query($sql);
			        while ($row=$this->db->fetchArray($result)) {
			            $comp_access_rights[$row["comp_id"]]["is_admin"] = "true";		
					}
					
					// check status
			        $sql = "SELECT status FROM ".$this->db->prefix("comp_user_global")." WHERE xoops_user_id='$this->user_id'";
			        $result = $this->db->query($sql);
			        $row = $this->db->fetchArray($result);
			        $comp_access_rights["status"] = $row["status"];		
					
					$this->access_rights = $comp_access_rights;

					//export information to cache
#					$access_rights_export = serialize($comp_access_rights);
#					$cache_handler->save($access_rights_export,$cacheid);
#					unset($access_rights_export);
#					unset($comp_access_rights);
#				}

			}	
		}
		
		//return array with the data
		return $this->access_rights;						
	}



	/**
	 * Return the user's status 
	 * 
	 * @return int
	 */
	function getStatus() {
	
		if(!isset($this->access_rights)){
			$this->getAccessRights();
		}
		
		return $this->access_rights["status"];
		
	}

	function joinCompetition($comp_id) {
		global $xoopsUser;
		
		if(is_object($xoopsUser)) {
				
			//check status
			$status = $this->getStatus();
			if($status >= 1) {
				exit(_COMP_ERRORS_NOT_ACTIVE);
			}
			
			//already a player?
			if($this->isPlayer($comp_id)) {
				exit(_COMP_ERRORS_ALREADY_A_PLAYER);
			}
			
			// ladder exists?
			$ladder_handler = xoops_getmodulehandler('ladder', 'comp');
			$competitions = $ladder_handler->getAllLadders();
			if(!isset($competitions[$comp_id])) {
				exit();
			}
			
			// check if an inactive profile exists
			$sql = "SELECT * FROM ".$this->db->prefix("comp_user_local")." WHERE xoops_user_id='$this->user_id' AND comp_id='$comp_id' AND status='1'";
			$result = $this->db->query($sql);
			if( $this->db->getRowsNum($result) == 1 ){
		        $sql = "UPDATE ".$this->db->prefix("comp_user_local")." SET status='0' WHERE xoops_user_id='$this->user_id' AND comp_id='$comp_id'";
	        	$result = $this->db->query($sql);

	        	$return_msg = _COMP_ACCOUNT_REACTIVATED;
			}		
			else {
				// player starts with 1000 points. The startrating may be stored in the competition table.
				$rating = 1000;

		        $sql = "INSERT INTO ".$this->db->prefix("comp_user_local")." SET xoops_user_id='$this->user_id', comp_id='$comp_id', rating='$rating', highest_rating='$rating', lowest_rating='$rating', challengeslot='1'";
		        $result = $this->db->query($sql);

		        // create a global profile if this is the first competition
		        $sql = "SELECT * FROM ".$this->db->prefix("comp_user_global")." WHERE xoops_user_id='$this->user_id'";
				$result = $this->db->query($sql);
				if( $this->db->getRowsNum($result) == 0 ){
			        $sql = "INSERT INTO ".$this->db->prefix("comp_user_global")." SET xoops_user_id='$this->user_id', user_ip='".$_SERVER['REMOTE_ADDR']."'";
					$result = $this->db->query($sql);
				}

		        
		        $return_msg = _COMP_WELCOME_MESSAGE;
			}
			// remove old cache files
			$cache_handler = xoops_getmodulehandler('cachelite');
			$cacheoptions = array('cacheDir' => XOOPS_ROOT_PATH.'/modules/comp/class/cache/',  'lifeTime' => 3600);
			$cache_handler->setOptions($cacheoptions);

			$cacheid = "AccessRights".$this->user_id;
			$cache_handler->remove($cacheid);
			
			$cacheid = "UserMenu".$this->user_id;
			$cache_handler->remove($cacheid);

			$cacheid = "LocalUserProfile".$this->user_id;
			$cache_handler->remove($cacheid);

			$cacheid = "AllLadderStats";
			$cache_handler->remove($cacheid);

			$cacheid = "Standings".$comp_id;
			$cache_handler->remove($cacheid);

			$cacheid = "Players".$comp_id;
			$cache_handler->remove($cacheid);
									
			return $return_msg;	
		}	
	}

	function leaveCompetition($comp_id) {
		$sql = "UPDATE ".$this->db->prefix("comp_user_local")." SET status='1' WHERE xoops_user_id='$this->user_id' AND comp_id='$comp_id'";
	    $result = $this->db->queryF($sql);

		// remove old cache files
		$cache_handler = xoops_getmodulehandler('cachelite');
		$cacheoptions = array('cacheDir' => XOOPS_ROOT_PATH.'/modules/comp/class/cache/',  'lifeTime' => 3600);
		$cache_handler->setOptions($cacheoptions);

		$cacheid = "AccessRights".$this->user_id;
		$cache_handler->remove($cacheid);
		
		$cacheid = "UserMenu".$this->user_id;
		$cache_handler->remove($cacheid);

		$cacheid = "LocalUserProfile".$this->user_id;
		$cache_handler->remove($cacheid);

		$cacheid = "AllLadderStats";
		$cache_handler->remove($cacheid);

		$cacheid = "Standings".$comp_id;
		$cache_handler->remove($cacheid);

		$cacheid = "Players".$comp_id;
		$cache_handler->remove($cacheid);
	}
	
	/**
	 * return the rating of the user for a specific competition
	 */
	function getRating($comp_id) {
		if(!isset($this->user_profile)){
			$this->getUserProfile();
		}
		
		return $this->user_profile[$comp_id]['rating'];		
	}

	/**
	 * get the difference of the challenges sent and received
	 * 
	 * @return integer
	 */
	function getDifferenceOfChallenges($comp_id) {
		$sql = "SELECT COUNT(challenge_id) AS sent
				FROM ".$this->db->prefix("comp_challenges")."
				WHERE challenger_id='$this->user_id' 
					AND comp_id='$comp_id'
					AND chall_status<>'3'";
		$result = $this->db->query($sql);
		$comp_user_profile=array();
		$row=$this->db->fetchArray($result);
		$challenges_sent = $row['sent'];
		
		$sql = "SELECT COUNT(challenge_id) AS received
				FROM ".$this->db->prefix("comp_challenges")."
				WHERE challenged_id='$this->user_id' 
					AND comp_id='$comp_id'
					AND chall_status<>'3'";
		$result = $this->db->query($sql);
		$comp_user_profile=array();
		$row=$this->db->fetchArray($result);
		$challenges_received = $row['received'];
		

		return $challenges_sent - $challenges_received;		
	}

	/**
	 * Updates the user's global profile with the given arguments.
	 *
	 * @var $country the new two letter country code for the user
	 * @var $status the new user status (an int)
	 * @var $return_date the return date of the user (string as YYYY-MM-DD)
	 * @return returns message on successful update
	 */
	function updateGlobalProfile($country, $status, $return_date){
		global $xoopsUser;

		if(is_object($xoopsUser)) {
			// Verify status is valid
			if( ($status != 0) && ($status != 1) ){
				exit(_COMP_ERRORS_INVALID_VALUE);
			}

			// Verify the country is recognized
			include_once XOOPS_ROOT_PATH."/class/xoopslists.php";
			$country_list = XoopsLists::getCountryList();
			if( !isset($country_list[$country]) ){
				exit(_COMP_ERRORS_INVALID_VALUE);
			}

			// Check the return date
			if( !($date = strtotime($return_date)) ){
				exit(_COMP_ERRORS_INVALID_VALUE);
			}

			// Update the comp_user_global table
			$date_units = getdate($date);
			$sql_date = $date_units['year'].'-'.$date_units['mon'].'-'.$date_units['mday'];

	        $sql = "UPDATE ".$this->db->prefix("comp_user_global")." " .
	        	"SET status=$status, return_date='$sql_date', country='$country' " .
	        	"WHERE xoops_user_id='$this->user_id'";
			$result = $this->db->queryF($sql);

			// remove old cache files
			$cache_handler = xoops_getmodulehandler('cachelite');
			$cacheoptions = array('cacheDir' => XOOPS_ROOT_PATH.'/modules/comp/class/cache/',  'lifeTime' => 3600);
			$cache_handler->setOptions($cacheoptions);

			$cacheid = "AccessRights".$this->user_id;
			$cache_handler->remove($cacheid);
			
			$cacheid = "UserMenu".$this->user_id;
			$cache_handler->remove($cacheid);

			foreach($this->getUserProfile() as $key=>$value){
				$cacheid = "Standings".$key;
				$cache_handler->remove($cacheid);
				$cacheid = "Players".$key;
				$cache_handler->remove($cacheid);
			}

			$cacheid = "LocalUserProfile".$this->user_id;
			$cache_handler->remove($cacheid);

			return ucfirst(_COMP_GLOBAL_PROFILE_UPDATED);
		}
	}

	/**
	* Updates the user's challenge slot setting
	*
	* @var $lid competition id to update
	* @var $slot challenge slot status 0 open, 1 closed
	* @return message on succesful update
	*/
	function updateChallengeSlot($lid,$slot){
		global $xoopsUser;
		
		// Verify arguments
		if ($slot != 0 && $slot != 1){
			exit(_COMP_ERRORS_INVALID_VALUE);
		}
		
			$sql = "UPDATE ".$this->db->prefix("comp_user_local")." " .
	        	"SET challengeslot=$slot " .
	        	"WHERE xoops_user_id=$this->user_id AND comp_id=$lid";
			$result = $this->db->queryF($sql);
		
		if($slot==0){
			return ucfirst(_COMP_CHALLENGE_SLOT_OPENED);
		} else {
			return ucfirst(_COMP_CHALLENGE_SLOT_CLOSED);
		}
		exit(_COMP_ERRORS_INVALID_VALUE);
	}
	
	/** 
	* Check and update the player's Provisional status
	*
	* @var $player_profile player's profile array
	* @var $lid competition id to update
	*/
	
	function provisionalStatus($player_profile,$lid){
	
		if($player_profile['provisional']==1){
			if($player_profile['streakwins']>=4 || $player_profile['matches']>=4){
				$sql = "UPDATE ".$this->db->prefix("comp_user_local")." " .
	        	"SET provisional=0 " .
	        	"WHERE xoops_user_id=".$player_profile['xoops_user_id']." AND comp_id=".$lid;
				$result = $this->db->queryF($sql);
			}
		}
	
	}
	
	/**
	 * Updates the user's local profile with the given arguments.
	 *
	 * @var $lid competition id to update
	 * @var $slot new challenge slot status (0=open, 1=closed)
	 * @var $rules new rule option (1=4th, 2=both, 3=LHTR)
	 * @var	$luck new luck option (1=regular, 2=both, 3=LL)
	 * @var $mode new mode option (1=PBEM, 2=both, 3=online)
	 * @var $nos new NOs option (1=Off, 2=both, 3=On)
	 * @var $map new map option (1=1941, 2=both, 3=1942)
	 * @return returns message on successful update
	 */
	function updateLocalProfile($lid, $slot, $rules, $luck, $mode, $nos, $map){
		global $xoopsUser;

		if(is_object($xoopsUser)) {
			// Verify arguments
			switch(true){
				case( ($slot != 0) && ($slot != 1) ):
				case( ($rules < 1) || ($rules > 3) ):
				case( ($luck < 1) || ($luck > 3) ):
				case( ($mode < 1) || ($mode > 3) ):
					exit(_COMP_ERRORS_INVALID_VALUE);
			}

			// Only allow player to open challenge slot if active
			$status = $this->getStatus();
			if( ($status >= 1) && ($slot == 0) ) {
				exit(_COMP_ERRORS_NOT_ACTIVE);
			}

			// Update the comp_user_local table

	        $sql = "UPDATE ".$this->db->prefix("comp_user_local")." ";
	        if($lid==6){
	        //$sql .= "SET challengeslot=$slot, option_luck=$luck, option_mode=$mode, option_rules=$rules, nos=$nos, map=$map ";
	        $sql .= "SET challengeslot=$slot, option_luck=$luck, option_mode=$mode, option_rules=$rules, map=$map ";
	        } else {
	        $sql .= "SET challengeslot=$slot, option_luck=$luck, option_mode=$mode, option_rules=$rules ";
	        }
	        $sql .= "WHERE xoops_user_id=$this->user_id AND comp_id=$lid";
	        
			$result = $this->db->queryF($sql);

			// remove old cache files
			$cache_handler = xoops_getmodulehandler('cachelite');
			$cacheoptions = array('cacheDir' => XOOPS_ROOT_PATH.'/modules/comp/class/cache/',  'lifeTime' => 3600);
			$cache_handler->setOptions($cacheoptions);

			$cacheid = "AccessRights".$this->user_id;
			$cache_handler->remove($cacheid);
			
			$cacheid = "UserMenu".$this->user_id;
			$cache_handler->remove($cacheid);

			$cacheid = "Standings".$lid;
			$cache_handler->remove($cacheid);
			$cacheid = "Players".$lid;
			$cache_handler->remove($cacheid);

			$cacheid = "LocalUserProfile".$this->user_id;
			$cache_handler->remove($cacheid);

			return ucfirst(_COMP_LOCAL_PROFILE_UPDATED);
		}
	}

	/**
	 * Update the database by inserting the new matches and updating other tables.
	 *
	 * @var $challenge_id id of challenge to report on 
	 * @var $axis_result result of user's game as the Axis (2=loss, 1=win)
	 * @var $allies_result result of user's game as the Allies (2=loss, 1=win)
	 * @return returns message on success
	 */
	function reportChallenge($challenge_id, $axis_result, $allies_result, $map, $luck, $nos, $max_rating_diff = 300) {
		global $xoopsUser;

		if( is_object($xoopsUser) ){
			// Check status
			$status = $this->getStatus();
			if($status >= 1) {
				exit(_COMP_ERRORS_NOT_ACTIVE);
			}

			// Verify it is a valid challenge id
			$challenges_handler = xoops_getmodulehandler('challenges');
			$challenge = $challenges_handler->getChallenge($challenge_id);
			if( count($challenge) < 1 ){
				exit(_COMP_ERRORS_INVALID_VALUE);
			}
			if( $challenge['chall_status'] > 1 ){
				exit(_COMP_ERRORS_CHALLENGE_CLOSED);
			}
			// Database has one game already reported (error)
			elseif( $challenge['chall_status'] > 0 ){
				exit(_COMP_ERRORS_ONE_MATCH_REPORTED);
			}

			// include elo ratings stuff
			include_once('include.elo.php');
			
			// Get the opponent's id
			if( $challenge['challenger_id'] == $this->user_id ){
				$opponent_id = $challenge['challenged_id'];
			}
			else{
				$opponent_id = $challenge['challenger_id'];
			}
			
			$sql = 'SELECT * FROM '.$this->db->prefix('comp_user_local').' ' .
				'WHERE xoops_user_id='.$this->user_id.' AND comp_id='.$challenge['comp_id'];
			$result = $this->db->query($sql);
			$row=$this->db->fetchArray($result);
			$user_profile = $row;
			$sql = 'SELECT * FROM '.$this->db->prefix('comp_user_local').' ' .
				'WHERE xoops_user_id='.$opponent_id.' AND comp_id='.$challenge['comp_id'];
			$result = $this->db->query($sql);
			$row=$this->db->fetchArray($result);
			$opponent_profile = $row;
			
			$user_diff = $opponent_profile['rating'] - $user_profile['rating'];
			
			// New Elo Methods
			
				if($challenge['comp_id']==6){
				// Calculate the points for each match
				$konstantArr[0] = array(2000,40);
				$konstantArr[1] = array(2400,20);
				$konstantArr[2] = array(2400,10);
				} else {
				// Calculate the points for each match
				$konstantArr[0] = array(2000,150);
				$konstantArr[1] = array(2400,100);
				$konstantArr[2] = array(2400,50);			
				}				
				
					 // @var $axis_result result of user's game as the Axis (2=loss, 1=win)
					 // @var $allies_result result of user's game as the Allies (2=loss, 1=win)
					 // user will be playerA, opponent will be playerB
					 
				if($allies_result==2){
					$alliesWinner=1; // opponent won, input 1 == playerB
				} else {
					$alliesWinner=0; // user won, input 0 == playerA
				}
				if($axis_result==2){
					$axisWinner=1; // opponent won, input 1 == playerB
				} else {
					$axisWinner=0; // user won, input 0 == playerA
				}
				
				$newRatings = calculateEloRatings( $user_profile['rating'], $opponent_profile['rating'], $alliesWinner, $axisWinner, 350, 1, $konstantArr);
				
				$user_profile['rating'] = $newRatings[0];
				$opponent_profile['rating'] = $newRatings[1];
				$ratingchange = $newRatings[2];
			
			/*
			if( abs($user_diff) > $max_rating_diff ){
				$user_diff = $user_diff > 0 ? $max_rating_diff : -$max_rating_diff;
			}
			$user_points = round(25 + 25 * tanh($user_diff / 500));
			$opponent_points = 50 - $user_points; */

			// Record through match reporting
			$user_new_streak = 0;
			$opponent_new_streak = 0;

			// Update the challenge table
	        $sql = 'UPDATE '.$this->db->prefix('comp_challenges').' ' .
	        	'SET chall_status=2 WHERE challenge_id='.$challenge_id;
			$result = $this->db->queryF($sql);

			// Insert Axis match into matches table
	        $sql = 'INSERT INTO '.$this->db->prefix('comp_matches').' ' .
					'SET comp_id='.$challenge['comp_id'].', ';
					if( $axis_result == 2 ){
						$sql .= 'winner_id='.$opponent_id.', loser_id='.$this->user_id.', side=1, ' .
							  'ratingchange='.$ratingchange.', ';
						//'ratingchange='.$opponent_points.', ';
						//$user_profile['rating'] -= $opponent_points;
						//$opponent_profile['rating'] += $opponent_points;
												
						$user_profile['losses']++;
						$user_profile['axislosses']++;
						$opponent_profile['wins']++;
						$opponent_profile['allieswins']++;
						$user_new_streak--;
						$opponent_new_streak++;
					}
					else{
						$sql .= 'winner_id='.$this->user_id.', loser_id='.$opponent_id.', side=0, ' .
							'ratingchange='.$ratingchange.', ';
							//'ratingchange='.$user_points.', ';
						//$user_profile['rating'] += $user_points;
						//$opponent_profile['rating'] -= $user_points;
						
						$user_profile['wins']++;
						$user_profile['axiswins']++;
						$opponent_profile['losses']++;
						$opponent_profile['allieslosses']++;
						$user_new_streak++;
						$opponent_new_streak--;
					}

						if($map!=0){
						$sql .= 'map='.$map.', ';
						}
						if($luck!=0){
						$sql .= 'luck='.$luck.', ';
						}
						if($nos!=0){
						$sql .= 'nos='.$nos.', ';
						}					
					
						$sql .= 'match_date=NOW(), ' .
						'challenge_id='.$challenge_id;
	        $result = $this->db->queryF($sql);

			// Insert Allies match into matches table
	        $sql = 'INSERT INTO '.$this->db->prefix('comp_matches').' ' .
					'SET comp_id='.$challenge['comp_id'].', ';
					if( $allies_result == 2 ){
						$sql .= 'winner_id='.$opponent_id.', loser_id='.$this->user_id.', side=0, ' .
							'ratingchange='.$ratingchange.', ';
							//'ratingchange='.$opponent_points.', ';
						//$user_profile['rating'] -= $opponent_points;
						//$opponent_profile['rating'] += $opponent_points;
						$user_profile['losses']++;
						$user_profile['allieslosses']++;
						$opponent_profile['wins']++;
						$opponent_profile['axiswins']++;
						$user_new_streak--;
						$opponent_new_streak++;
					}
					else{
						$sql .= 'winner_id='.$this->user_id.', loser_id='.$opponent_id.', side=1, ' .
							'ratingchange='.$ratingchange.', ';
							//'ratingchange='.$user_points.', ';
						//$user_profile['rating'] += $user_points;
						//$opponent_profile['rating'] -= $user_points;
						$user_profile['wins']++;
						$user_profile['allieswins']++;
						$opponent_profile['losses']++;
						$opponent_profile['axislosses']++;
						$user_new_streak++;
						$opponent_new_streak--;
					}
					
						if($map!=0){
						$sql .= 'map='.$map.', ';
						}
						if($luck!=0){
						$sql .= 'luck='.$luck.', ';
						}
						if($nos!=0){
						$sql .= 'nos='.$nos.', ';
						}					
					
						$sql .= 'match_date=NOW(), ' .
						'challenge_id='.$challenge_id;
	        $result = $this->db->queryF($sql);

			$opponent_profile['matches'] = $opponent_profile['matches']+1;
			$user_profile['matches'] = $user_profile['matches']+1;
			
			// Update the user profile
			if( $user_profile['rating'] < 0 ){
				$user_profile['rating'] = 0;
			}
			switch(true){
				case( $user_new_streak > 0 ):
					$user_profile['streakwins'] += $user_new_streak;
					$user_profile['streaklosses'] = 0;
					break;
				case( $user_new_streak < 0 ):
					$user_profile['streakwins'] = 0;
					$user_profile['streaklosses'] -= $user_new_streak;
					break;
				default:
					$user_profile['streakwins'] = 0;
					$user_profile['streaklosses'] = 0;
					break;
			}
			$sql = 'UPDATE '.$this->db->prefix('comp_user_local').' ' .
				'SET rating='.$user_profile['rating'].', ' .
					'wins='.$user_profile['wins'].', ' .
					'losses='.$user_profile['losses'].', ' .
					'axiswins='.$user_profile['axiswins'].', ' .
					'allieswins='.$user_profile['allieswins'].', ' .
					'axislosses='.$user_profile['axislosses'].', ' .
					'allieslosses='.$user_profile['allieslosses'].', ' .
					'streakwins='.$user_profile['streakwins'].', ' .
					'streaklosses='.$user_profile['streaklosses'].', ';
					if( $user_profile['rating'] > $user_profile['highest_rating'] ){
						$sql .= 'highest_rating='.$user_profile['rating'].', ';
					}
					elseif( $user_profile['rating'] < $user_profile['lowest_rating'] ){
						$sql .= 'lowest_rating='.$user_profile['rating'].', ';
					}
					if( $user_profile['streakwins'] > $user_profile['longest_winstreak'] ){
						$sql .= 'longest_winstreak='.$user_profile['streakwins'].', ';
					}
					if( $user_profile['streaklosses'] > $user_profile['longest_lossstreak'] ){
						$sql .= 'longest_lossstreak='.$user_profile['streaklosses'].', ';
					}
					$sql .= 'matches='.($user_profile['matches']).' ' .
				'WHERE xoops_user_id='.$this->user_id.' AND comp_id='.$challenge['comp_id'];
	        $result = $this->db->queryF($sql);

			// Update the opponent profile
			if( $opponent_profile['rating'] < 0 ){
				$opponent_profile['rating'] = 0;
			}
			switch(true){
				case( $opponent_new_streak > 0 ):
					$opponent_profile['streakwins'] += $opponent_new_streak;
					$opponent_profile['streaklosses'] = 0;
					break;
				case( $opponent_new_streak < 0 ):
					$opponent_profile['streakwins'] = 0;
					$opponent_profile['streaklosses'] -= $opponent_new_streak;
					break;
				default:
					$opponent_profile['streakwins'] = 0;
					$opponent_profile['streaklosses'] = 0;
					break;
			}
			
			
			
			$sql = 'UPDATE '.$this->db->prefix('comp_user_local').' ' .
				'SET rating='.$opponent_profile['rating'].', ' .
					'wins='.$opponent_profile['wins'].', ' .
					'losses='.$opponent_profile['losses'].', ' .
					'axiswins='.$opponent_profile['axiswins'].', ' .
					'allieswins='.$opponent_profile['allieswins'].', ' .
					'axislosses='.$opponent_profile['axislosses'].', ' .
					'allieslosses='.$opponent_profile['allieslosses'].', ' .
					'streakwins='.$opponent_profile['streakwins'].', ' .
					'streaklosses='.$opponent_profile['streaklosses'].', ';
					if( $opponent_profile['rating'] > $opponent_profile['highest_rating'] ){
						$sql .= 'highest_rating='.$opponent_profile['rating'].', ';
					}
					elseif( $opponent_profile['rating'] < $opponent_profile['lowest_rating'] ){
						$sql .= 'lowest_rating='.$opponent_profile['rating'].', ';
					}
					if( $opponent_profile['streakwins'] > $opponent_profile['longest_winstreak'] ){
						$sql .= 'longest_winstreak='.$opponent_profile['streakwins'].', ';
					}
					if( $opponent_profile['streaklosses'] > $opponent_profile['longest_lossstreak'] ){
						$sql .= 'longest_lossstreak='.$opponent_profile['streaklosses'].', ';
					}
					$sql .= 'matches='.($opponent_profile['matches']).' ' .
				'WHERE xoops_user_id='.$opponent_id.' AND comp_id='.$challenge['comp_id'];
	        $result = $this->db->queryF($sql);

			// check/update provisional status
			$this->provisionalStatus($user_profile,$challenge['comp_id']);
			$this->provisionalStatus($opponent_profile,$challenge['comp_id']);
			
			// remove old cache files
			$cache_handler = xoops_getmodulehandler('cachelite');
			$cacheoptions = array('cacheDir' => XOOPS_ROOT_PATH.'/modules/comp/class/cache/',  'lifeTime' => 3600);
			$cache_handler->setOptions($cacheoptions);

			$cacheid = "AccessRights".$this->user_id;
			$cache_handler->remove($cacheid);
			$cacheid = "AccessRights".$opponent_id;
			$cache_handler->remove($cacheid);
			
			$cacheid = "UserMenu".$this->user_id;
			$cache_handler->remove($cacheid);
			$cacheid = "UserMenu".$opponent_id;
			$cache_handler->remove($cacheid);

			$cacheid = "AllLadderStats";
			$cache_handler->remove($cacheid);

			$cacheid = "Standings".$challenge['comp_id'];
			$cache_handler->remove($cacheid);

			$cacheid = "Players".$challenge['comp_id'];
			$cache_handler->remove($cacheid);

			$cacheid = "LocalUserProfile".$this->user_id;
			$cache_handler->remove($cacheid);
			$cacheid = "LocalUserProfile".$opponent_id;
			$cache_handler->remove($cacheid);

			return ucfirst(_COMP_MATCH_REPORTED);
		}
	}

	/**
	 * Add a rating the user has made to the database
	 *
	 * @var $challenge_id id of challenge to add rating to 
	 * @var $rating rating against the other player (1=Positive, 0=Neutral, -1=Negative)
	 * @var $comments any comment made by user
	 * @return returns message on success
	 */
	function ratePlayer($challenge_id, $rating, $comments) {
		// Verify rating argument
		if( ($rating != 1) && ($rating != 0) && ($rating != -1) ){
			exit(_COMP_ERRORS_INVALID_VALUE);
		}

		// Verify the user has not entered a rating for this challenge already.
		$comp_rating_table = $this->db->prefix('comp_rating');
		$sql = "SELECT * FROM $comp_rating_table WHERE challenge_id=$challenge_id AND rater_id=$this->user_id";
		$result = $this->db->query($sql);
		if( $this->db->getRowsNum($result) > 0){
			exit(_COMP_ERRORS_INVALID_VALUE);
		}

		// Get the information from the challenge
		$challenges_handler = xoops_getmodulehandler('challenges');
		$challenge = $challenges_handler->getChallenge($challenge_id);
		if( $this->user_id == $challenge['challenger_id'] ){
			$opponent_id = $challenge['challenged_id'];
		}
		elseif( $this->user_id == $challenge['challenged_id']){
			$opponent_id = $challenge['challenger_id'];
		}
		else{
			exit(_COMP_ERRORS_INVALID_VALUE);
		}

		// Insert new rating into the database
		$sql = "INSERT INTO $comp_rating_table SET " .
					"challenge_id=$challenge_id, rater_id=$this->user_id, rated_id=$opponent_id, " .
					"rating=$rating, rating_comment='".addslashes($comments)."', rating_date=NOW()";
        $result = $this->db->queryF($sql);

		// remove old cache files
		$cache_handler = xoops_getmodulehandler('cachelite');
		$cacheoptions = array('cacheDir' => XOOPS_ROOT_PATH.'/modules/comp/class/cache/',  'lifeTime' => 3600);
		$cache_handler->setOptions($cacheoptions);

		$cacheid = "Standings".$challenge['comp_id'];
		$cache_handler->remove($cacheid);

		$cacheid = "Players".$challenge['comp_id'];
		$cache_handler->remove($cacheid);

		$cacheid = "LocalUserProfile".$this->user_id;
		$cache_handler->remove($cacheid);
		$cacheid = "LocalUserProfile".$opponent_id;
		$cache_handler->remove($cacheid);

		return ucfirst(_COMP_RATING_SUCCESS);

	}
	
}

?>
