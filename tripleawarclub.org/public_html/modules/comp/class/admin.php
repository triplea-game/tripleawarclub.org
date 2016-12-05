<?php
/**
 * Class for admin functions
 * 
 * @module Comp
 * @version 1.0
 * @author Andreas Menrath <clausewitz_triplea@gmx.de>
 * @author Kurtis ... <minionofchaos@gmail.com>
 * 
 * last modification: 2006-12-27
*/

class CompAdminHandler {
	
/*
 * TO DO: delete the cache groups when a player's status changes
 */
	
	var $db;
	var $comp_admins;
	
	//constructor
	function CompAdminHandler() {
		// get database connection
		$this->db = XoopsDatabaseFactory::getDatabaseConnection();
	}
	
	/**
	 * get a list of all admins from the database or the cache
	 * 
	 * @return mixed array containing the admins for all competitions 
	 */
	function getAdmins() {
		
		if(!isset($this->comp_admins)){

			// Create a Cache_Lite object
			$cache_handler =& xoops_getmodulehandler('cachelite', 'comp');
			$cacheid = "CompAdmins";
	
			//check cache for information
			if ($this->comp_admins = $cache_handler->get($cacheid)) {
				// do nothing
			}
			//check database for information
			else {
		        $sql = "SELECT * FROM ".$this->db->prefix("comp_admins")." ORDER BY 'comp_id'";
		        $result = $this->db->query($sql);
		        $comp_admins=array();
		        while ($row=$this->db->fetchArray($result)) {
		            $comp_admins[$row["comp_id"]][] = $row["xoops_user_id"];
				}		

			$this->comp_admins = $comp_admins;
			
			//export information to the cache		
			$cache_handler->save($comp_admins,$cacheid);
			unset($comp_admins);
			}
			
		}
		
		//return array with the data
		return $this->comp_admins;		
	}
	
	/**
	 * Check if a user is admin of that competition
	 * 
	 * This is a save function! It does not use the cache.
	 * 
	 * @return true or false
	 */
	function isAdmin($comp_id){
		global $xoopsUser;
		
		if(is_object($xoopsUser)) {
			$user_id = $xoopsUser->getVar('uid');
			
			$sql = "SELECT xoops_user_id FROM ".$this->db->prefix("comp_admins")." WHERE comp_id = '$comp_id' AND xoops_user_id='$user_id'";
			$result = $this->db->query($sql);
			if ($this->db->getRowsNum($result)==1) {
				return true;
			}
			else {
				return false;
			}
		}
	}

	/**
	 * Delete a player (set global status to 3)
	 * 
	 * @var $player_id id of player to delete
	 * @return boolean true or false
	 */
	function deletePlayer($player_id) {
// Rule handles open challenges on player deletion, code left here for possible later use.
		// Get player's active challenges (no easy function for all challenges per user)
//		$sql = "SELECT challenge_id FROM ".$this->db->prefix("comp_challenges") .
//				" WHERE chall_status < 2 AND (challenger_id = $player_id OR challenged_id = $player_id)";
//		$result = $this->db->query($sql);
//		$challenge_handler =& xoops_getmodulehandler('challenges', 'comp');
//		while( $row = $this->db->fetchArray($result) ){
//			if( $challenge_handler->deleteChallenge($row['challenge_id']) == false ){
//				return false;
//			}
//		}


		// Delete player's active invitations
		$sql = "DELETE FROM ". $this->db->prefix("comp_invitations") . " 
					WHERE inviter_id = '$player_id' OR invited_id = '$player_id'";

		// Delete player
		$sql = "UPDATE ".$this->db->prefix("comp_user_global")." SET status='3' WHERE xoops_user_id='$player_id'";
		$result = $this->db->queryF($sql);

		$rows_affected = $this->db->getAffectedRows();
		
		if ($rows_affected == 1) {
			// delete all cache files
			$cache_handler =& xoops_getmodulehandler('cachelite', 'comp');
			$cache_handler->clean();
			
			return true;
		}
		else {
			return false;
		}

	}

	/**
	 * Undelete a player (set global status to 1 by default)
	 * 
	 * @var $player_id id of player to undelete
	 * @return true on success, false otherwise
	 */
	function undeletePlayer($player_id) {
		// Undelete player
		$sql = "UPDATE ".$this->db->prefix("comp_user_global")." SET status='1' WHERE xoops_user_id='$player_id'";
		$result = $this->db->queryF($sql);
		$rows_affected = $this->db->getAffectedRows();
		
		if ($rows_affected == 1) {
			$bool = true;
		}
		
		// Update last login to current date
		$sql = "UPDATE ".$this->db->prefix("users")." SET last_login = '".time()."' WHERE uid='$player_id'";
		$result = $this->db->queryF($sql);

		if ($bool == true) {
			// delete all cache files
			$cache_handler =& xoops_getmodulehandler('cachelite', 'comp');
			$cache_handler->clean();
			return true;
		}
		else {
			return false;
		}
	}

	/**
	 * Deactivate a player (set global status to 2)
	 * 
	 * @var $player_id id of player to deactivate
	 * @return true on success, false otherwise
	 */
	function deactivatePlayer($player_id){

		// Delete player's active invitations
		$sql = "DELETE FROM ". $this->db->prefix("comp_invitations") . " 
					WHERE inviter_id = '$player_id' OR invited_id = '$player_id'";
					
		// Deactivate player
		$sql = "UPDATE ".$this->db->prefix("comp_user_global")." SET status='2' WHERE xoops_user_id='$player_id'";
		$result = $this->db->queryF($sql);
		$rows_affected = $this->db->getAffectedRows();
		if ($rows_affected == 1) {
			// delete all cache files
			$cache_handler =& xoops_getmodulehandler('cachelite', 'comp');
			$cache_handler->clean();
			return true;
		}
		else {
			return false;
		}		
		
	}

	/**
	 * Activate a player (set global status to 1 by default)
	 * 
	 * @var $player_id id of player to reactivate
	 * @return true on success, false otherwise
	 */
	function activatePlayer($player_id) {
		// Reactivate player
		$sql = "UPDATE ".$this->db->prefix("comp_user_global")." SET status='1' WHERE xoops_user_id='$player_id'";
		$result = $this->db->queryF($sql);
		$rows_affected = $this->db->getAffectedRows();

		if ($rows_affected == 1) {
			$bool = true;
		}
				
		// Update last login to current date
		$sql = "UPDATE ".$this->db->prefix("users")." SET last_login = '".time()."' WHERE uid='$player_id'";
		$result = $this->db->queryF($sql);
		
		if ($bool == true) {
			// delete all cache files
			$cache_handler =& xoops_getmodulehandler('cachelite', 'comp');
			$cache_handler->clean();
			return true;
		}
		else {
			return false;
		}

	}
	
	
		/**
	 * Find whos been making more then one account!
	 * 
	 * @return array {userid,username,userip}
	 */
	function checkMultiple() {
		// Check the database
		
		$ip_log = $this->db->prefix("comp_ip_log");
		$users = $this->db->prefix("users");
		
		$sql = "SELECT $ip_log.user_ip, $ip_log.xoops_user_id, $users.uname	FROM $ip_log LEFT JOIN $users ON $ip_log.xoops_user_id=$users.uid WHERE $ip_log.user_ip in (select user_ip from $ip_log group by user_ip having count(xoops_user_id) > 1)";
			
		$result = $this->db->queryF($sql);

		echo("<br><table border=1><tr><td colspan=3>IPs with multiple users</td></tr><tr><td>IP</td><td>UserID</td><td>UserName</td></tr>");
		while( $row = $this->db->fetchArray($result) ){
			//print_r($row);
			//$row['user_ip'].$row['xoops_user_id'].$row['uname']
			echo "<tr><td>".$row['user_ip']."</td><td>".$row['xoops_user_id']."</td><td>".$row['uname']."</td></tr>";
		}
		echo("</table>");

	}
	
	
	
}

?>
