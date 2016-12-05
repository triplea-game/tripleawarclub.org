<?php
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
include "../../mainfile.php";

$lid = isset($_GET['lid']) ? intval($_GET['lid']) : 0;
$rev = isset($_GET['rev']) ? true : false;

$linkHandler =& xoops_getmodulehandler('link', 'AMS');
$link =& $linkHandler->get($lid);
$link->increment();
if ($rev) {
    header('location: '.XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname').'/article.php?storyid='.$link->getVar('storyid'));
    exit();
}

if ($link->getVar('link_module') > 0) {
    if ($link->getVar('link_module') != $xoopsModule->getVar('mid')) {
        $module_handler =& xoops_gethandler('module');
        $module =& $module_handler->get($link->getVar('link_module'));
    }
    else {
        $module =& $xoopsModule;
    }
    header('location: '.XOOPS_URL.'/modules/'.$module->getVar('dirname').'/'.$link->getVar('link_link'));
}
else {
    header('location: '.$link->getVar('link_link'));
}
?>