<?php
/*
 * Just a quick fix to avoid problems with cached information
 * when something was changed
 */

include '../../mainfile.php';
$xoopsOption['template_main'] = "comp_index.html";
include XOOPS_ROOT_PATH.'/header.php';

$comp_id = $_GET['cid'];
$op = $_GET['op'];

$user_handler = xoops_getmodulehandler('user', 'comp');

// check if user has admin rights
if($user_handler->isAdmin($comp_id)) {
//	echo "you are admin<p>";
	
	switch ($op) {
    	case "clearall":
    		$admin_handler = xoops_getmodulehandler('admin', 'comp');
    		if ($admin_handler->isAdmin($comp_id)) {
    			$cache_handler = xoops_getmodulehandler('cache', 'comp');
    			if( $cache_handler->clean() ) {
    				echo "cache was deleted successfully<p>";
    			}
    			else {
    				echo "cache could not be deleted<p>";
    			}
    		}
    		
    		break;

	/*	//deleting single groups and not the complete cache might be interesting later...
	 
		case "cleargroup":
			
			break;
		default :
		
			break;
	*/
	
	}
	
	//display link to delete cache files
	echo '<a href="cache.php?cid=' . $comp_id . '&op=clearall">clear all cache files</a>';
}
else {
	echo _COMP_ERRORS_RIGHTS_VIEW;
}


include_once XOOPS_ROOT_PATH.'/footer.php';
?>