<?php
/**
 * Block for displaying the Competitions
 * 
 * @module Comp
 * @version 1.0
 * @author Andreas Menrath <clausewitz_triplea@gmx.de>
 * 
 * last modification: 2006-12-27
*/

function comp_menu_show () {
	global $xoopsUser;
	$block = array();

	/* check if user is guest
	 * if user is guest $xoopsUser won't be an object
	 */
	if(is_object($xoopsUser) && !empty($xoopsUser)) {
		
		//get user id
		$user_id = $xoopsUser->getVar('uid');

		//cache				
		$cache_handler = &xoops_getmodulehandler('cachelite', 'comp');
		$cache_handler->setOption('lifeTime', 3600);
		$cacheid = "UserMenu".$user_id;
		$group_id = "BlockMenu";	
		
		// check if the information	is in the cache	
		if ( $ladders = $cache_handler->get($cacheid,$group_id) ) {
			// do nothing
		}
		//check for information outside the cache
		else {
								
			$ladder_handler = &xoops_getmodulehandler('ladder', 'comp');
			$comp_ladders = $ladder_handler->getAllLadders();
			
			$user_handler = &xoops_getmodulehandler('user', 'comp');
			$user_status = $user_handler->getStatus();
			
			//check if player is active
			if ($user_status <= 1) {

				foreach ($comp_ladders as $comp_id => $ladder) {
					
					$is_player = $user_handler->isPlayer($comp_id);
					$is_admin = $user_handler->isAdmin($comp_id);
	
					if($is_player==true){
					$joined=true;									
					}

					$ladders[] = (array("title" => $ladder["comp_name"],
										"comp_id" => $comp_id,
										"is_player" => $is_player,
										"is_admin" => $is_admin
										)
									);
									
									
			
				}
				
				//export information to the cache		
				$cache_handler->save($ladders,$cacheid,$group_id);			

			}	
			else {
				echo "<script>alert('" . _COMP_BLOCK_ERROR_STATUS . "');</script>";
			}
						
		}
	}


	// menu for guests
	else {
		//cache
		$cache_handler = &xoops_getmodulehandler('cachelite', 'comp');
		$cache_handler->setOption('lifeTime', 3600);
		$cacheid = "GuestMenu";
		$group_id = "BlockMenu";	
				
		// check if the information	is in the cache	
		if ( $ladders = $cache_handler->get($cacheid,$group_id) ) {
			// do nothing
		}
		//check for information outside the cache
		else {
								
			$ladder_handler = &xoops_getmodulehandler('ladder', 'comp');
			$comp_ladders = $ladder_handler->getAllLadders();
			
			foreach ($comp_ladders as $comp_id => $ladder) {
				
				$ladders[] = (array("title" => $ladder["comp_name"],
									"comp_id" => $comp_id
									)
								);
		
			}
			
			//export information to the cache		
			$cache_handler->save($ladders,$cacheid,$group_id);
		}		
		
	}
	
	
	$block['ladders'] = $ladders;		
 	return $block;

}
?>
