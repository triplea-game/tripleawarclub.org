<?php
/*
 * Created on Oct 24, 2006
 */
include '../../mainfile.php';
include XOOPS_ROOT_PATH.'/header.php';

$lid = filter_input( INPUT_GET, 'lid', FILTER_SANITIZE_STRING );
$uid = filter_input( INPUT_GET, 'uid', FILTER_SANITIZE_STRING );
$ref = filter_input( INPUT_GET, 'ref', FILTER_SANITIZE_STRING );
$action = filter_input( INPUT_POST, 'action', FILTER_SANITIZE_STRING );
$slot = filter_input( INPUT_POST, 'chall_slot', FILTER_SANITIZE_STRING );
$luck = filter_input( INPUT_POST, 'luck', FILTER_SANITIZE_STRING );
$mode = filter_input( INPUT_POST, 'mode', FILTER_SANITIZE_STRING );
$rules = filter_input( INPUT_POST, 'rules', FILTER_SANITIZE_STRING );
$map = filter_input( INPUT_POST, 'map', FILTER_SANITIZE_STRING );

// Only useful for logged in users
if( !is_object($xoopsUser) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_NEED_LOGIN));
}
// Check for required value
elseif( !isset($uid) || !isset($lid) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
}
// Check if current user is the profile to edit
elseif( ($xoopsUser->getVar('uid') != $uid) || !is_numeric($lid) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
}
else{

	// First display of page
	if( !isset($action) ){
		$player_handler =& xoops_getmodulehandler('player');
		$profile = $player_handler->getPlayerProfile($uid, $lid);

		echo "<h2 class=\"siteheader\">Profile</h2>";

		if( $ref=="join"){
			echo "<p><strong>Congratulations, you've joined the ladder!</strong></p><p>For your reference:</p>";
			echo "<ul><li>The ladder rules are available on the left menu.</li>";

			if($lid==6){
				echo "<li>The ruleset for the Anniversary Edition AA50 (1941/1942 Setups) is <a href=\"http://wizards.com/%5CAvalonHill%5Crules%5CAxAl-AnEd_Rules.pdf\">here</a></li>";
				echo "<li>And the AA50 FAQ is <a href=\"http://wizards.com/%5CAvalonHill%5Crules%5CAxAl-AnEd_Errata.pdf\">here</a>.</li>";
			} else {
				echo "<li>The \"Revised Edition\" / 4th Edition ruleset (what comes in the box) can be downloaded <a href=\"http://www.wizards.com/default.asp?x=ah/downloads\" target=\"_blank\">here</a>.</li>";
				echo "<li>The Larry Harris Tournament Rules (LHTR) can be viewed <a href=\"http://www.axisandallies.org/LHTR\" target=\"_blank\">here</a>.</li>";
			}
			echo "</ul><br><p>Now you must select your playing options for competition.</p>";
		} else {
			echo "<p>Here you can update your playing options for the ladder.</p>";
		}
		echo "<p>For the dice options, an explanation of lowluck can be found in our FAQ <a href=\"http://www.tripleawarclub.org/modules/smartfaq/faq.php?faqid=16\" target=\"_blank\">here</a>.</p>";
		echo "<br>";
		include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';

		$form = new XoopsThemeForm('Update options', 'profileupdate', 'editlocalprofile.php?uid='.$uid.'&lid='.$lid, 'POST');

		// Challenge slot
		$current_chall_slot = $profile['competitions'][0]['challengeslot']; // Only one competition in array
		$slot_select = new XoopsFormRadio(ucwords(_COMP_CHALLENGESLOT), "chall_slot", $current_chall_slot, '&nbsp;&nbsp;');
		$slot_select->addOption(0, ucwords(_COMP_CHALLENGESLOT_OPEN));
		$slot_select->addOption(1, ucwords(_COMP_CHALLENGESLOT_CLOSED));
		$form->addElement($slot_select);

		// Rule selection
		$current_rules = $profile['competitions'][0]['option_rules'];
		$rule_select = new XoopsFormSelect(ucwords(_COMP_RULES_OPTION), "rules", $current_rules, 1);
		
		if($lid==6){
		$rule_select->addOption(1, ucwords(_COMP_5TH));
		} else {
		$rule_select->addOption(1, ucwords(_COMP_4TH));
		$rule_select->addOption(2, ucwords(_COMP_BOTH));
		$rule_select->addOption(3, ucwords(_COMP_LHTR));
		}
		
		$form->addElement($rule_select);

		// Luck selection
		$current_luck = $profile['competitions'][0]['option_luck'];
		$luck_select = new XoopsFormSelect(ucwords(_COMP_LUCK_OPTION), "luck", $current_luck, 1);
		$luck_select->addOption(1, ucwords(_COMP_REGULARLUCK));
		$luck_select->addOption(2, ucwords(_COMP_BOTH));
		$luck_select->addOption(3, ucwords(_COMP_LL));
		$form->addElement($luck_select);

		// Mode selection
		$current_mode = $profile['competitions'][0]['option_mode'];
		$mode_select = new XoopsFormSelect(ucwords(_COMP_MODE_OPTION), "mode", $current_mode, 1);
		$mode_select->addOption(1, ucwords(_COMP_PBEM));
		$mode_select->addOption(2, ucwords(_COMP_BOTH));
		$mode_select->addOption(3, ucwords(_COMP_ONLINE));
		$form->addElement($mode_select);

		//if($lid==6){
		// NOs selection
		//$current_nos = $profile['competitions'][0]['nos'];
		//$nos_select = new XoopsFormSelect(ucwords(_COMP_NOS), "nos", $current_nos, 1);
		//$nos_select->addOption(1, ucwords(_COMP_OFF));
		//$nos_select->addOption(2, ucwords(_COMP_BOTH));
		//$nos_select->addOption(3, ucwords(_COMP_ON));
		//$form->addElement(&$nos_select);
		//}
		
		if($lid==6){
		// Map selection
		$current_map = $profile['competitions'][0]['map'];
		$map_select = new XoopsFormSelect(ucwords(_COMP_MAP), "map", $current_map, 1);
		$map_select->addOption(1, ucwords(_COMP_1941));
		$map_select->addOption(2, ucwords(_COMP_BOTH));
		$map_select->addOption(3, ucwords(_COMP_1942));
		$form->addElement($map_select);
		}

		// Submit button
		$form->addElement(new XoopsFormButton("", "action", ucwords(_COMP_SAVE), "submit"));

		$form->display();
	}
	// Update the player's local profile
	else{
		// Check for necessary values.
		if( !isset($rules) || !isset($mode) || !isset($luck) || !isset($slot) ){
			redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
		}
		else{
					
			// Check for invalid values. 
			if(isset($map)){
				if(is_numeric($map)){
					if( ($map < 1) || ($map > 3) ){
						redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
					}
				} else {
					redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
				}
			}
		
			// Check for invalid values.
			switch(true){
				case (($rules < 1) || ($rules > 3)):
				case (($mode < 1) || ($mode > 3)):
				case (($luck < 1) || ($luck > 3)):
				case (($slot != 0) && ($slot != 1)):
					redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
			}
			
			//echo "<h2 class=\"siteheader\">Profile</h2><br>";
			$user_handler =& xoops_getmodulehandler('user');

			redirect_header("profile.php", 3, $user_handler->updateLocalProfile($lid, $slot, $rules, $luck, $mode, $nos, $map));
			
		}
	}
}

include XOOPS_ROOT_PATH.'/footer.php';
?>
