<?php
// $Id: class.newsstory.php,v 1.24 2004/07/26 17:51:25 hthouzard Exp $
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
// ------------------------------------------------------------------------- //

class NewsUpgrade
{
	function prepare2upgrade() {
	    include_once XOOPS_ROOT_PATH.'/modules/AMS/upgrade/class/dbmanager.php';
	    include_once XOOPS_ROOT_PATH.'/modules/AMS/upgrade/language/install.php';
	    $dbm = new db_manager;
	    $dbm->queryFromFile(XOOPS_ROOT_PATH.'/modules/AMS/sql/mysql.sql');
	    return $dbm->report();
	}
}
?>
