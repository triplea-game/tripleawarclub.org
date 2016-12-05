<?php

/**
 * Class to handle standings for competitions.
 * 
 * Contains the information necessary to display the Standings for competitions.
 */
class CompStandingsHandler {
	var $db;
	
	/**
	 *  Constructor
	 */
	function CompStandingsHandler() {
		// get database connection
		$this->db = XoopsDatabaseFactory::getDatabaseConnection();	
	}

	/**
	 * Returns information about users for the given competition id from the
	 * comp_player_local table or cache. User names, player results, and player
	 * statistics are included.
	 * 
	 * @var $comp_id competition id to retrieve information about
	 * @return mixed array of all players from the competition with given id sorted by rating
	 */
	function getStandings($comp_id) {
		
		// Create a Cache_Lite object
		$cache_handler =& xoops_getmodulehandler('cachelite');
		$cacheoptions = array('cacheDir' => XOOPS_ROOT_PATH.'/modules/comp/class/cache/',  'lifeTime' => 3600);
		$cache_handler->setOptions($cacheoptions);
		$cacheid = 'Standings'.$comp_id;

		// Check cache for information
		if( $data = $cache_handler->get($cacheid) ){
			$comp_standings = unserialize($data);
			unset($data);
		}
		// Check database for information
		else {

 			$comp_user_table = $this->db->prefix('comp_user_local');
 			$comp_user_global_table = $this->db->prefix('comp_user_global');
 			$xoops_user_table = $this->db->prefix('users');
 			$sql = "SELECT $comp_user_table.*, $xoops_user_table.uname, $xoops_user_table.email, " .
 					"$comp_user_global_table.country, $comp_user_global_table.status AS global_status, " .
	 				"IF(matches > 0, round(wins/(wins+losses)*100,1), 0) AS winpercent, " .
 					"IF(matches > 0, round(losses/(wins+losses)*100,1), 100) AS losspercent, " .
	 				"allieswins+allieslosses AS alliesmatches, " .
 					"IF(allieswins+allieslosses > 0, round(allieswins/(allieswins+allieslosses)*100,1), 0) AS allieswinpercent, " .
 					"IF(allieswins+allieslosses > 0, round(allieslosses/(allieswins+allieslosses)*100,1), 100) AS allieslosspercent, " .
 					"axiswins+axislosses AS axismatches, " .
 					"IF(axiswins+axislosses > 0, round(axiswins/(axiswins+axislosses)*100,1), 0) AS axiswinpercent, " .
 					"IF(axiswins+axislosses > 0, round(axislosses/(axiswins+axislosses)*100,1), 100) AS axislosspercent " .
 					"FROM $comp_user_table, $comp_user_global_table, $xoops_user_table " .
 					"WHERE $comp_user_table.xoops_user_id = $xoops_user_table.uid " .
 						"AND $comp_user_table.comp_id = $comp_id " .
 						"AND $xoops_user_table.uid = $comp_user_global_table.xoops_user_id " .
 						"AND $comp_user_table.matches > 0 " .
 						"AND $comp_user_global_table.status < 2 " .
 						"AND $comp_user_table.status = 0 " .
						"AND $comp_user_table.provisional = 0 " .
 					"ORDER BY $comp_user_table.rating DESC";
			
			$result = $this->db->query($sql);
			$comp_standings = array();
			$player_handler =& xoops_getmodulehandler('player');
			$i=0;
			while( $row = $this->db->fetchArray($result) ){

				// Get the karma rating
				$rating = $player_handler->getPlayerKarmaRating($row['xoops_user_id']);
				$row['num_negative'] = $rating['num_negative'];
				$row['num_neutral'] = $rating['num_neutral'];
				$row['num_positive'] = $rating['num_positive'];
				$row['karma_rating'] = $rating['karma_rating'];

				// Determine the match count image to display
				switch(true){
					case ($row['matches'] >= 50):
						$row['gameimage'] = '100games';
						break;
					case ($row['matches'] >= 25):
						$row['gameimage'] = '50games';
						break;
					case ($row['matches'] >= 10):
						$row['gameimage'] = '20games';
						break;
				}
				
				$row['matches'] = 2 * $row['matches'];
				//hmm 
				
				// Determine which options images to display
				$row['options'] = $player_handler->getPlayerOptions(
					$row['option_rules'], $row['option_luck'], $row['option_mode']);

				// Save the player's rank
				if($i==0){ // top player
					$row['rank'] = _COMP_FIELDMARSHALL_RANK;
					$i++;
				} else{
					$row['rank'] = $player_handler->getPlayerRank($row['rating']);
				}
				$comp_standings[] = $row;
			}
			unset($result);

			// Export information to cache
			$standings_export = serialize($comp_standings);
			$cache_handler->save($standings_export,$cacheid);
			unset($standings_export);
			unset($comp_user_table);
			unset($comp_user_global_table);
			unset($xoops_user_table);
		}
	
		// Return the selected standings.
		return $comp_standings;
	}

}
?>

<?php

/**
 * Class to handle standings for competitions.
 * 
 * Contains the information necessary to display the Standings for competitions.
 */
class CompStandingsHandler {
	var $db;
	
	/**
	 *  Constructor
	 */
	function CompStandingsHandler() {
		// get database connection
		$this->db = XoopsDatabaseFactory::getDatabaseConnection();	
	}

	/**
	 * Returns information about users for the given competition id from the
	 * comp_player_local table or cache. User names, player results, and player
	 * statistics are included.
	 * 
	 * @var $comp_id competition id to retrieve information about
	 * @return mixed array of all players from the competition with given id sorted by rating
	 */
	function getStandings($comp_id) {
		
		// Create a Cache_Lite object
		$cache_handler =& xoops_getmodulehandler('cachelite');
		$cacheoptions = array('cacheDir' => XOOPS_ROOT_PATH.'/modules/comp/class/cache/',  'lifeTime' => 3600);
		$cache_handler->setOptions($cacheoptions);
		$cacheid = 'Standings'.$comp_id;

		// Check cache for information
		if( $data = $cache_handler->get($cacheid) ){
			$comp_standings = unserialize($data);
			unset($data);
		}
		// Check database for information
		else {

 			$comp_user_table = $this->db->prefix('comp_user_local');
 			$comp_user_global_table = $this->db->prefix('comp_user_global');
 			$xoops_user_table = $this->db->prefix('users');
 			$sql = "SELECT $comp_user_table.*, $xoops_user_table.uname, $xoops_user_table.email, " .
 					"$comp_user_global_table.country, $comp_user_global_table.status AS global_status, " .
	 				"IF(matches > 0, round(wins/(wins+losses)*100,1), 0) AS winpercent, " .
 					"IF(matches > 0, round(losses/(wins+losses)*100,1), 100) AS losspercent, " .
	 				"allieswins+allieslosses AS alliesmatches, " .
 					"IF(allieswins+allieslosses > 0, round(allieswins/(allieswins+allieslosses)*100,1), 0) AS allieswinpercent, " .
 					"IF(allieswins+allieslosses > 0, round(allieslosses/(allieswins+allieslosses)*100,1), 100) AS allieslosspercent, " .
 					"axiswins+axislosses AS axismatches, " .
 					"IF(axiswins+axislosses > 0, round(axiswins/(axiswins+axislosses)*100,1), 0) AS axiswinpercent, " .
 					"IF(axiswins+axislosses > 0, round(axislosses/(axiswins+axislosses)*100,1), 100) AS axislosspercent " .
 					"FROM $comp_user_table, $comp_user_global_table, $xoops_user_table " .
 					"WHERE $comp_user_table.xoops_user_id = $xoops_user_table.uid " .
 						"AND $comp_user_table.comp_id = $comp_id " .
 						"AND $xoops_user_table.uid = $comp_user_global_table.xoops_user_id " .
 						"AND $comp_user_table.matches > 0 " .
 						"AND $comp_user_global_table.status < 2 " .
 						"AND $comp_user_table.status = 0 " .
						"AND $comp_user_table.provisional = 0 " .
 					"ORDER BY $comp_user_table.rating DESC";
			
			$result = $this->db->query($sql);
			$comp_standings = array();
			$player_handler =& xoops_getmodulehandler('player');
			$i=0;
			while( $row = $this->db->fetchArray($result) ){

				// Get the karma rating
				$rating = $player_handler->getPlayerKarmaRating($row['xoops_user_id']);
				$row['num_negative'] = $rating['num_negative'];
				$row['num_neutral'] = $rating['num_neutral'];
				$row['num_positive'] = $rating['num_positive'];
				$row['karma_rating'] = $rating['karma_rating'];

				// Determine the match count image to display
				switch(true){
					case ($row['matches'] >= 50):
						$row['gameimage'] = '100games';
						break;
					case ($row['matches'] >= 25):
						$row['gameimage'] = '50games';
						break;
					case ($row['matches'] >= 10):
						$row['gameimage'] = '20games';
						break;
				}
				
				$row['matches'] = 2 * $row['matches'];
				//hmm 
				
				// Determine which options images to display
				$row['options'] = $player_handler->getPlayerOptions(
					$row['option_rules'], $row['option_luck'], $row['option_mode']);

				// Save the player's rank
				if($i==0){ // top player
					$row['rank'] = _COMP_FIELDMARSHALL_RANK;
					$i++;
				} else{
					$row['rank'] = $player_handler->getPlayerRank($row['rating']);
				}
				$comp_standings[] = $row;
			}
			unset($result);

			// Export information to cache
			$standings_export = serialize($comp_standings);
			$cache_handler->save($standings_export,$cacheid);
			unset($standings_export);
			unset($comp_user_table);
			unset($comp_user_global_table);
			unset($xoops_user_table);
		}
	
		// Return the selected standings.
		return $comp_standings;
	}

}
?>

