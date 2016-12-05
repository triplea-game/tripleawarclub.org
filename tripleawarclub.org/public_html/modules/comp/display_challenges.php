<?php
/*
 * Created on Oct 8, 2006
 */
$xoopsOption['template_main'] = "challenges.html";
include XOOPS_ROOT_PATH.'/header.php';

// Get the challenges
$challenges_handler =& xoops_getmodulehandler('challenges');
$challenges = $challenges_handler->getChallenges($comp_id, $user_id);

// Check for a valid competition id
$num_challenges = count($challenges);
if( $num_challenges > 0 ){

	// Get the organization
	include "include/functions.inc.php";
	$org = getPageOrganization($num_challenges, $challenges_per_page, $page_num);
	if( count($org) < 1 ){
		redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
	}

	// Get the competition name
	$ladder_handler = xoops_getmodulehandler('ladder');
	$ladders = $ladder_handler->getAllLadders();
	$isAdmin=false;
	if($user_id){
		$user_handler = xoops_getmodulehandler('user');
		$isAdmin = $user_handler->isAdmin($comp_id);
		
		// make sure we have the actual user so we can initialize slowplay availability
		global $xoopsUser;
		$currentUserID = $xoopsUser->getVar('uid');
		if($currentUserID==$user_id){
			$isPlayer=true;
		} else {
			$isPlayer=false;
		}
	}

	$params = array( 
		'comp_id'=>$comp_id,
		'challenges'=>$challenges,
		'num_pages'=>$org['num_pages'],
		'page_num'=>$org['page_num'],
		'start_challenge'=>$org['start_item'],
		'end_challenge'=>$org['end_item'],
		'user_id'=>$user_id,
		'isAdmin'=>$isAdmin
	);
	if( !is_null( $comp_id ) ) $params['name'] = $ladders[$comp_id]['comp_name'];
	if($user_id){
		$params['isPlayer']=$isPlayer;
	}			
				
	// Send to template
	$xoopsTpl->assign('params', $params);

	/*if (isset($user_id)) {
		// Get all invitations
		$challenges_handler =& xoops_getmodulehandler('challenges');
		$invitations = $challenges_handler->getInvitations($comp_id,$user_id);
		
		if (count($invitations) >= 1) {
			$xoopsTpl->assign('invitations', 'yes');
			$xoopsTpl->assign('inv_data', $invitations);
		}
	}*/
}
else{
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_NO_CHALLENGES_FOUND));
}
?>
