<?php
// $Id: news_topics.php,v 1.2 2004/01/29 17:15:54 mithyt2 Exp $
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

function b_ams_topics_show() {
	global $xoopsDB, $storytopic;
	$block = array();
	include_once XOOPS_ROOT_PATH."/class/xoopstopic.php";
	$xt = new XoopsTopic($xoopsDB->prefix("ams_topics"));
	$jump = XOOPS_URL."/modules/AMS/index.php?storytopic=";
	$storytopic = !empty($storytopic) ? intval($storytopic) : 0;
	ob_start();
	$xt->makeTopicSelBox(1, $storytopic,"storytopic","location=\"".$jump."\"+this.options[this.selectedIndex].value");
	$block['selectbox'] = ob_get_contents();
	ob_end_clean();
	return $block;
}
?>