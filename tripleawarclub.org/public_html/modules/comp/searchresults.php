<?php
/*
 * Created on 08.10.2006
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

$xoopsOption['template_main'] = "searchresults.html";
include XOOPS_ROOT_PATH.'/header.php';

$user_handler =& xoops_getmodulehandler('user');

if (!isset($lid)) {
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
}
if (!$user_handler->isplayer($lid)) {
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_RIGHTS_VIEW));
}

if(!isset($rules) || !isset($luck) || !isset($mode)) {
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
}

///////////////////////////
//main script starts here//
///////////////////////////


// check if input data is true
$profile = $user_handler->getUserProfile();
$uid = $profile[$lid]['xoops_user_id'];

// Not sure why we are limiting people's search options -- commented out.

/*
 $luckoptions = array();
 switch($profile[$lid]["option_luck"]) {

	//random luck
	case "1":
		$luckoptions[] = 1;
		break;
		
	//low luck
	case "3":
		$luckoptions[] = 3;
		break;
	
	//both 
	case "2":
		$luckoptions[] = 1;
		$luckoptions[] = 2;
		$luckoptions[] = 3;
		break;
}
// exit if user has posted false data
if(!in_array($luck, $luckoptions)){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_POST));
}

$rulesoptions = array();
switch($profile[$lid]["option_rules"]) {
	//box rules
	case "1":
		$rulesoptions[] = 1;
		break;
		
	//LHTR
	case "3":
		$rulesoptions[] = 3;
		break;
	
	//both 
	case "2":
		$rulesoptions[] = 1;
		$rulesoptions[] = 2;
		$rulesoptions[] = 3;
		break;
}
// exit if user has posted false data
if(!in_array($rules, $rulesoptions)){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_POST));
}
 
$modeoptions = array();
switch($profile[$lid]["option_mode"]) {
	//pbem
	case "1":
		$modeoptions[] = 1;
		break;
		
	//online
	case "3":
		$modeoptions[] = 3;
		break;
	
	//both 
	case "2":
		$modeoptions[] = 1;
		$modeoptions[] = 2;
		$modeoptions[] = 3;
		break;
}
// exit if user has posted false data
if(!in_array($mode, $modeoptions)){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_POST));
}

unset($luckoptions);
unset($rulesoptions);
unset($modeoptions); */
//end of checking for false data 

$challenge_diff = $user_handler->getDifferenceOfChallenges($lid);

//echo "<script>alert('$challenge_diff');</script>";
$nos=null;$map=null;
if($challenge_diff <=3){

	$matches_handler =& xoops_getmodulehandler('matches');
	$content = $matches_handler->getAvailablePlayers($lid,$uid,$luck,$rules,$mode,$nos,$map);

	if(count($content)==0){
		$xoopsTpl->assign('error', "no_players");
	}	
	else {
		$xoopsTpl->assign('content', $content);
		$xoopsTpl->assign('show', "yes");
	}

	$xoopsTpl->assign('difference', $challenge_diff);


}
else {
	echo _COMP_SENT_CHALLENGES1 . "<b> " . $challenge_diff . " </b>" . _COMP_SENT_CHALLENGES2 . "<br>";
	echo "<h2>" . _COMP_ERRORS_CHALLENGE_DIFFERENCE . "</h2>";
}

?>
