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
$xoopsOption['template_main'] = "comp_sandbox.html";
include XOOPS_ROOT_PATH.'/header.php';

/* check if user is guest
 * if user is guest $xoopsUser won't be an object
*/
if(is_object($xoopsUser)) {
	echo "hello world! <br>";
	$comp_user_id = $xoopsUser->getVar('uid');
	$comp_user_name = $xoopsUser->getVar('uname');
	$comp_user_email = $xoopsUser->getVar('email');
	$comp_user_lastlogin = $xoopsUser->getVar('last_login');
	$comp_user_lastlogin = formatTimestamp($comp_user_lastlogin,"s");	// see /include/functions.php:167
	$comp_user_avatar = $xoopsUser->getVar('user_avatar');
	echo "your ID is $comp_user_id and your name is $comp_user_name !<br>";
	echo "your email is $comp_user_email and your last login was $comp_user_lastlogin <br>";
	echo "your avatar is: $comp_user_avatar <br>";
	echo "<br>";
	
	if ( is_object($xoopsUser) && $xoopsUser->isAdmin() ) {
		echo "wow, you are an xoops admin! <br>";
	}
	else {
		echo "looks, like you are just an ordinary user...<br>";
	}
	if ( is_object($xoopsUser) && $xoopsUser->isGuest() ) {
		echo "you are a visitor <br>";	
	}
	
	
	
	/* Now Templates are used...
	 * 
	 * see http://smarty.php.net/crashcourse.php
	 * and the manual(english) http://smarty.php.net/manual/en/ 
	 * manual (german) http://smarty.php.net/manual/de/
	 */
	
	
	
	
	// $xoopsTpl uses template defined in $xoopsOption['template_main'] in the /module/templates folder
	/* Steps to use Templates:
	 * 1) create template file with smarty variables
	 * 2) add template file and description in xoops_version.php
	 * 3) $xoopsOption['template_main'] = "filename.html";
	 * 4) include the header AFTER setting $xoopsOption['template_main']
	 * 		include XOOPS_ROOT_PATH.'/header.php';
	 * 5) assign the smarty variables via
	 * 		$xoopsTpl->assign('variablename', "content");
	 * 6) Note: the templates are cached. Whenever a change was made to the template, you have to 
	 * 		update the module in the system_admin/modules section of XOOPS
	 * 		OR you set "Check templates for modifications ?" to yes in XOOPS:System Admin->Preferences->General Settings->Check templates for modifications
	 */
	 
	$xoopsTpl->assign('name', "andreas menrath");
	$xoopsTpl->assign('email', "clausewitz_triplea@gmx.de");
	
	// Greeting text for admins
	if ( is_object($xoopsUser) && $xoopsUser->isAdmin() ) {
		$xoopsTpl->assign('admin', "yes");
	}
	
	// creating a simple table with smarty...
	/*
	 * 	$xoopsTpl->assign('headcol1', "Ladders");
	 * no longer needed. smarty can directly access defined values
	 * ->/language/english/main.php-> _COMP_LADDERS
	 */
	
		$xoopsTpl->assign('headcol2', "name");
		$xoopsTpl->assign('headcol3', "some info");
		$xoopsTpl->assign('headcol4', "link");
		
		$image_array = array(
						XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/images/triplea/battleship.png',
						XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/images/triplea/armour.png',
						XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/images/triplea/aaGun.png',
						XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/images/triplea/factory.png',
						XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/images/triplea/fighter.png',
						XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/images/triplea/submarine.png');
		
		$start = 0;
		$end = 5;
		while ( $start < $end ) {
		
		    if ((isset($class))&&($class=="even")) {
		        $class = "odd";
		    }
		    else {
		        $class = "even";
		    }
		    
		    // sending information to smarty. Each row is called "row" in this example
			$xoopsTpl->append('row', 
				array('number' => $start, 
						'name' => "name".$start, 
						'info' => "info".$start, 
						'infocolor' => "#aaaaaa", 
						'link' => "link".$start, 
						'class' => $class,
						'compimage' => $image_array[$start]
				)
			);
			// also works in one line:
			// $xoopsTpl->append('row', array('number' => $start, 'name' => "name".$start, 'info' => "info".$start, 'infocolor' => "#aaaaaa", 'link' => "link".$start, 'class' => $class));
		
			$start++;
		}
	// end of table designing
	

/*		

		$cache_handler =& xoops_getmodulehandler('cache');
		$cacheoptions = array('cacheDir' => XOOPS_ROOT_PATH.'/modules/comp/class/cache/',  'lifeTime' => 3600);
		$cache_handler->setOptions($cacheoptions);
		$cacheid = "AllLadders";
		$data = $cache_handler->get($cacheid);
	//	echo "cachehandler has found: $data";
		
		$user_handler =& xoops_getmodulehandler('user');
		$user_access_rights = $user_handler->getAccessRights();
		
		print_r($user_access_rights);

		include_once XOOPS_ROOT_PATH."/include/xoopscodes.php";
	    echo "<td class='even'>";
        xoopsCodeTarea("message",37,8);
        xoopsSmilies("message");
        echo "</td>";
*/        

		$admin_handler =& xoops_getmodulehandler('user');
		$all_admins = $admin_handler->getAccessRights();
		$all_admins = $admin_handler->getAccessRights();
				
		print_r($all_admins);
	
	//sql injection
	include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
	
	$url = XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/join.php?lid=evilstuff';
	$frm = new XoopsThemeForm('Accept the Rules', 'entry_form', "$url", 'POST'); 	
	$agree_chk = new XoopsFormCheckBox('', 'accept_rules' );
	$agree_chk->addOption(1, _COMP_ACCEPT_RULES);
	$frm->addElement($agree_chk);
	
	$frm->addElement(new XoopsFormButton("", "submit", _COMP_SUBMIT, "submit"));

	$frm->display();

        
}
else {
	echo "this zone is for registered users only!";
}

include_once XOOPS_ROOT_PATH.'/footer.php';
?>
