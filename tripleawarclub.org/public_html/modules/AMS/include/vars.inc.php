<?php
// $Id: vars.inc.php,v 1.00 2008/08/09 15:10:18 NovaSmart Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
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
//  Author: NovaSmart (admin[at]novasmarttechnology.com)                                  //
//  URL: http://www.novasmarttechnology.com, http://xoops.novasmarttechnology.com                         //
//  Project: Article Management System (AMS)                                           //
//  ------------------------------------------------------------------------ //

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}

// AMS cookie structure
//create in AMS 2.50 but for future CLONEABLE ability
/* -- Cookie settings -- */
$AMSCookie['domain'] = "";
$AMSCookie['path'] = "/";
$AMSCookie['secure'] = false;
$AMSCookie['expire'] = time() + 3600 * 24 * 30; // one month
$AMSCookie['prefix'] = '';

// set cookie name to avoid subsites confusion such as: domain.com, sub1.domain.com, sub2.domain.com, domain.com/xoopss, domain.com/xoops2
if(empty($AMSCookie['prefix'])){
	$cookie_prefix = preg_replace("/[^a-z_0-9]+/i", "_", preg_replace("/(http(s)?:\/\/)?(www.)?/i","",XOOPS_URL));
	$cookie_userid = (is_object($xoopsUser))?$xoopsUser->getVar('uid'):0;
	$AMSCookie['prefix'] = $cookie_prefix."_".$xoopsModule->dirname().$cookie_userid."_";
}
?>
