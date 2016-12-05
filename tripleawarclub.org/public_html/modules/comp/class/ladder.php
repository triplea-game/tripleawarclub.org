<?php
/*
 * Created on 26.08.2006
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 


class CompLadderHandler {
	
	var $db;
	var $comp_ladders;
	var $comp_ladder_stats;
	
	//constructor
	function CompLadderHandler() {
		
		// get database connection
		$this->db = XoopsDatabaseFactory::getDatabaseConnection();	
	}
	

	/**
	 * get a complete list of all ladders from the database or the cache
	 * 
	 * @return mixed array containing all ladders with all information from comp_competitions table
	 */	
	function getAllLadders() {
		
		if(!isset($this->comp_ladders)){
			// Create a Cache_Lite object
			$cache_handler =& xoops_getmodulehandler('cachelite', 'comp');
//			$cacheoptions = array('cacheDir' => XOOPS_ROOT_PATH.'/modules/comp/class/cache/',  'lifeTime' => 3600);
//			$cache_handler->setOptions($cacheoptions);
			$cacheid = "AllLadders";
	
			// Check cache for information
			if ($this->comp_ladders = $cache_handler->get($cacheid)) {
//				$this->comp_ladders = unserialize($data);
//				unset($data);
			}
			// Check database for information
			else {
		        $sql = "SELECT * FROM ".$this->db->prefix("comp_competitions")." WHERE comp_type='1' ORDER BY comp_name";
		        $result = $this->db->query($sql);
		        $comp_ladders=array();
		        while ($row=$this->db->fetchArray($result)) {
		            $comp_ladders[$row["comp_id"]] = $row;		
				}

				$this->comp_ladders = $comp_ladders;
				//export information to cache
//				$ladders_export = serialize($comp_ladders);
//				$cache_handler->save($ladders_export,$cacheid);
				$cache_handler->save($this->comp_ladders,$cacheid);
//				unset($ladders_export);
				unset($comp_ladders);
			}
		}
		
		//return array with information
        return $this->comp_ladders;
    }

	/**
	 * get a complete list of all ladder stats from the database or the cache
	 * 
	 * @return mixed array containing all ladder comp_ids with statistical information
	 */		
	function getLadderStats () {
		
		if(!isset($this->comp_ladder_stats)){

			// Create a Cache_Lite object
			$cache_handler =& xoops_getmodulehandler('cachelite', 'comp');
//			$cacheoptions = array('cacheDir' => XOOPS_ROOT_PATH.'/modules/comp/class/cache/',  'lifeTime' => 3600);
//			$cache_handler->setOptions($cacheoptions);
			$cacheid = "AllLadderStats";
	
			// Check cache for information
			if ($this->comp_ladder_stats = $cache_handler->get($cacheid)) {
//				$this->comp_ladder_stats = unserialize($data);
//				unset($data);
			}
			// Check database for information
			else {
				$usertable = $this->db->prefix("comp_user_local");
				$comptable = $this->db->prefix("comp_competitions");
				$matchtable = $this->db->prefix("comp_matches");
				
				// get number of players for all ladders
		        $sql = "SELECT $usertable.comp_id, COUNT(*) AS players 
		        		FROM  $usertable, $comptable 
		        		WHERE $usertable.comp_id = $comptable.comp_id 
		        			AND $comptable.comp_type='1'
							AND $usertable.status='0'
		        		GROUP BY $usertable.comp_id ";
		        $result = $this->db->query($sql);
		        $comp_ladder_stats=array();
		        while ($row=$this->db->fetchArray($result)) {
		            $comp_ladder_stats[$row["comp_id"]]["players"] = $row["players"];		
				}

				// get number of matches for all ladders
		        $sql = "SELECT $matchtable.comp_id, COUNT(*) AS matches
		        		FROM  $matchtable, $comptable
		        		WHERE $matchtable.comp_id = $comptable.comp_id
		        		GROUP BY $matchtable.comp_id ";
		        $result = $this->db->query($sql);
		        while ($row=$this->db->fetchArray($result)) {
		            $comp_ladder_stats[$row["comp_id"]]["matches"] = $row["matches"];		
				}

				$this->comp_ladder_stats = $comp_ladder_stats;
								
				//export information to cache
//				$ladder_stats_export = serialize($comp_ladder_stats);
//				$cache_handler->save($ladder_stats_export,$cacheid);
				$cache_handler->save($this->comp_ladder_stats,$cacheid);
//				unset($ladder_stats_export);
				unset($usertable);
				unset($comptable);
				unset($matchtable);
				unset($comp_ladder_stats);
			}			
		}	
			
		//return array with information
        return $this->comp_ladder_stats;			
	}
	
	/** 
	 * get the name of a specific ladder
	 */
	function getLadderName($comp_id) {
		if(!isset($this->comp_ladders)){
			$this->getAllLadders();
		}
		return $this->comp_ladders[$comp_id]['comp_name'];
	}
}
?>
