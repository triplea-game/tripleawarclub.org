<?php
/*
 * Created on 04.10.2006
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

//$xoopsOption['template_main'] = "";
include XOOPS_ROOT_PATH.'/header.php';

$user_handler =& xoops_getmodulehandler('user');
$ladder_handler =& xoops_getmodulehandler('ladder');

if (isset($lid) && !$user_handler->isplayer($lid)) {
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_RIGHTS_VIEW));
}

echo "<h2 class=\"siteheader\">Find Opponents</h2>";
echo "<p>Dont see any choices? You need to select your game play options by <a href=\"profile.php\">updating your profile</a>!</p><br>";

$profile = $user_handler->getUserProfile();
$comp_id = ( isset( $comp_id ) ) ? $comp_id : false;
	if(!$comp_id){
		
		// loop through all ladders
		$ladders = $ladder_handler->getAllLadders();
		$lids = array_keys($ladders);
		foreach($lids as $lid){
		
		if($user_handler->isPlayer($lid)){
		
			echo "<h3 class=\"comp\">".$ladders[$lid]['comp_name']."</h3>";
			$challenge_diff = $user_handler->getDifferenceOfChallenges($lid);
			if($challenge_diff <=3){
				echo "<p>" . _COMP_SENT_CHALLENGES1 . "<b> $challenge_diff </b>" . _COMP_SENT_CHALLENGES2 . ". " . _COMP_VALID_CHALLENGE_DIFFERENCE . ".</p></br>";
				include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
				$frm = new XoopsThemeForm(_COMP_SEARCH_OPPONENTS, 'entry_form', "matches.php?op=searchresults&lid=$lid", 'POST'); 
				$luck = new XoopsFormSelect(_COMP_LUCK_OPTION, "luck");				
				$rules = new XoopsFormSelect(_COMP_RULES_OPTION, "rules");
				$mode = new XoopsFormSelect(_COMP_MODE_OPTION, "mode");
				

						$luck->addOption("1", _COMP_REGULARLUCK);
						$luck->addOption("3", _COMP_LL);
						$luck->addOption("2", _COMP_BOTH);
						$luck->setValue($profile[$lid]["option_luck"]);		
				
						$mode->addOption("1", _COMP_PBEM);
						$mode->addOption("3", _COMP_ONLINE);
						$mode->addOption("2", _COMP_BOTH);
						$mode->setValue($profile[$lid]["option_mode"]);

						//ABSTRACT LAYTOR PLZ
						if($lid=="6"){ // aa50

						$map = new XoopsFormSelect(_COMP_MAP, "map");
						$map->addOption("1", _COMP_1941);
						$map->addOption("3", _COMP_1942);
						$map->addOption("2", _COMP_BOTH);

						$map->setValue($profile[$lid]["map"]);

						//$nos = new XoopsFormSelect(_COMP_NOS, "nos");
						//$nos->addOption("1", _COMP_OFF);
						//$nos->addOption("3", _COMP_ON);
						//$nos->addOption("2", _COMP_BOTH);					

						//$nos->setValue($profile[$lid]["nos"]);						
						
						$rules->addOption("1", _COMP_5TH);					
						
						} else { // rev
						
						$rules->addOption("1", _COMP_4TH);
						$rules->addOption("3", _COMP_LHTR);
						$rules->addOption("2", _COMP_BOTH);
						
						}
									
						$rules->setValue($profile[$lid]["option_rules"]);
				
				$frm->addElement($rules);
				$frm->addElement($luck);
				$frm->addElement($mode);
				//$frm->addElement($nos);
				$frm->addElement($map);
				$frm->addElement(new XoopsFormButton('', '', _COMP_SUBMIT, "submit"));	
				$frm->display();
				echo "<br>";
			} else {
				echo "<p>". _COMP_SENT_CHALLENGES1 . "<b> " . $challenge_diff . " </b>" . _COMP_SENT_CHALLENGES2 . ".</p>";
				echo "<h4>" . _COMP_ERRORS_CHALLENGE_DIFFERENCE . "</h4>";
			}
			unset($rules);
			unset($luck);
			unset($mode);
			unset($nos);
			unset($map);
			unset($frm);
			
			} // end isPlayer

		} // end foreach
		
	} else {
	
			$challenge_diff = $user_handler->getDifferenceOfChallenges($lid);
			if($challenge_diff <=3){
				echo "<p>" . _COMP_SENT_CHALLENGES1 . "<b> $challenge_diff </b>" . _COMP_SENT_CHALLENGES2 . ".</p>";
				echo "<p>" . _COMP_VALID_CHALLENGE_DIFFERENCE . ".</p></br>";
				include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
				$frm = new XoopsThemeForm(_COMP_SEARCH_OPPONENTS, 'entry_form', "matches.php?op=searchresults&lid=$lid", 'POST'); 
				$rules = new XoopsFormSelect(_COMP_RULES_OPTION, "rules");
				$luck = new XoopsFormSelect(_COMP_LUCK_OPTION, "luck");
				$mode = new XoopsFormSelect(_COMP_MODE_OPTION, "mode");
				switch($profile[$lid]["option_luck"]) {
					//random luck
					case "1":
						$luck->addOption("1", _COMP_REGULARLUCK);
						break;
					//low luck
					case "3":
						$luck->addOption("3", _COMP_LL);
						break;
					//both 
					case "2":
						$luck->addOption("1", _COMP_REGULARLUCK);
						$luck->addOption("3", _COMP_LL);
						$luck->addOption("2", _COMP_BOTH);
						//set selected value to "both"
						$luck->setValue("2");
						break;
				}
				switch($profile[$lid]["option_mode"]) {
					//pbem
					case "1":
						$mode->addOption("1", _COMP_PBEM);
						break;
					//online
					case "3":
						$mode->addOption("3", _COMP_ONLINE);
						break;
					//both
					case "2":
						$mode->addOption("1", _COMP_PBEM);
						$mode->addOption("3", _COMP_ONLINE);
						$mode->addOption("2", _COMP_BOTH);
						//set selected value to "both"
						$mode->setValue("2");
						break;
				}
				
				switch($profile[$lid]["option_rules"]) {
					//box rules
					case "1":
						$rules->addOption("1", _COMP_4TH);
						break;
					//LHTR rules
					case "3":
						$rules->addOption("3", _COMP_LHTR);
						break;
					//both
					case "2":
						$rules->addOption("1", _COMP_4TH);
						$rules->addOption("3", _COMP_LHTR);
						$rules->addOption("2", _COMP_BOTH);
						//set selected value to "both"
						$rules->setValue("2");
						break;
				}
				$frm->addElement($rules);
				$frm->addElement($luck);
				$frm->addElement($mode);
				$frm->addElement(new XoopsFormButton('', '', _COMP_SUBMIT, "submit"));	
				$frm->display();
			} else {
				echo "<p>". _COMP_SENT_CHALLENGES1 . "<b> " . $challenge_diff . " </b>" . _COMP_SENT_CHALLENGES2 . ".</p>";
				echo "<h4>" . _COMP_ERRORS_CHALLENGE_DIFFERENCE . "</h4>";
			}	
	
	}		

?>
