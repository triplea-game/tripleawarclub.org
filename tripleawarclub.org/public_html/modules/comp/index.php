<?php
// $Id: index.php,v 1.16 2006/06/09 14:32:47 mithyt2 Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

include '../../mainfile.php';
$xoopsOption['template_main'] = "comp_index.html";


/* check if user is guest -EDITJul2010: Removing this requirement for main ladder pages (home/rules/standings/players/challenges)
 * if user is guest $xoopsUser won't be an object
*/
$isPlayer=false;
if(is_object($xoopsUser)) {
	$comp_user_id = $xoopsUser->getVar('uid');
	$comp_user_handler = xoops_getmodulehandler('user');
	$isPlayer=true;
}

	include '../../header.php'; // i have no idea why this doesnt work on index.php, but works everywhere else

	$ladder_handler = xoops_getmodulehandler('ladder');
	
	$ladders = $ladder_handler->getAllLadders();
	$ladder_stats = $ladder_handler->getLadderStats();

	foreach ($ladders as $row) {

		$ladder[$row["comp_id"]] = array(
						'comp_id' => $row["comp_id"],
						'comp_name' => $row["comp_name"], 
						'comp_desc' => $row["comp_desc"], 
						'comp_rulebook' => $row["comp_rulebook"], 
						'comp_errata' => $row["comp_errata"], 
			//			'link' => XOOPS_URL . '/modules/' . $xoopsModule->dirname() . "", 
						'comp_image' => XOOPS_URL . '/modules/' . $xoopsModule->dirname() . $row["comp_image"],
						'comp_players' => "0",
						'comp_matches' => "0",
						 
						);

						if($isPlayer==true){
							$ladder[$row["comp_id"]]['is_player'] = $comp_user_handler->isPlayer($row["comp_id"]);
						} else {
							$ladder[$row["comp_id"]]['is_player'] = false;
						}

			if (array_key_exists($row["comp_id"], $ladder_stats)) {
			    		$ladder[$row["comp_id"]]['comp_players'] = $ladder_stats[$row["comp_id"]]["players"];
						$ladder[$row["comp_id"]]['comp_matches'] = $ladder_stats[$row["comp_id"]]["matches"];
			}

	}

	$xoopsTpl->append('index', $ladder);	
	
	   

//} else {
//	include_once("redirect.html");
//}

include_once XOOPS_ROOT_PATH.'/footer.php';
?>
