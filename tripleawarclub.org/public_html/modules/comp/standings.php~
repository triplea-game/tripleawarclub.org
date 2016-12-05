<?php
/*
 * Created on Sep 6, 2006
 */
include '../../mainfile.php';
$xoopsOption['template_main'] = "standings.html";
include XOOPS_ROOT_PATH.'/header.php';

// Get the competitions id
$comp_id = $_GET['lid'];

// Check comp_id
if( !isset($comp_id) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
}
elseif( !is_numeric($comp_id) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
}
else{

	// Get the standings
	$standings_handler =& xoops_getmodulehandler('standings');
	$standings = $standings_handler->getStandings($comp_id,0);
	$standingsProvisional = $standings_handler->getStandings($comp_id,1);
		
		// Get the competition name
		$ladder_handler =& xoops_getmodulehandler('ladder');
		$ladders = $ladder_handler->getAllLadders();
		$params = array('name'=>$ladders[$comp_id]['comp_name'], 'standings'=>$standings);
		$paramsProv = array('name'=>$ladders[$comp_id]['comp_name'], 'standingsProvisional'=>$standingsProvisional);
		
		// Send to template
		$xoopsTpl->assign('count', count($standings));
		$xoopsTpl->assign('countProv', count($standingsProvisional));
		$xoopsTpl->assign('params', $params);
		$xoopsTpl->assign('paramsProv', $paramsProv);
	//}
	//else{
		//redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_NO_PLAYERS_FOUND));
	//}
}

include_once XOOPS_ROOT_PATH.'/footer.php';
?>