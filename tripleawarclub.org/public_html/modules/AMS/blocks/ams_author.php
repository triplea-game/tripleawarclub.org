<?php
// $Id: news_top.php,v 1.13 2004/06/27 08:08:11 mithyt2 Exp $
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

function b_ams_author_show($options) {
    if (!isset($options[3])) {
        $options[3] = "average";
    }
    include_once XOOPS_ROOT_PATH."/modules/AMS/class/class.newsstory.php";
    $block = array();
    $authors = AmsStory::getAuthors($options[1], $options[0], $options[2], $options[3]);
    if (is_array($authors) && count($authors) > 0) {
        $block['authors'] = $authors;
    }
    return $block;
}

function b_ams_author_edit($options) {
    include_once (XOOPS_ROOT_PATH."/class/xoopsformloader.php");
    $form = new XoopsFormElementTray('', '<br/>');
    
    $sort_select = new XoopsFormSelect(_AMS_MB_NEWS_ORDER, 'options[0]', $options[0]);
    $sort_select->addOption('count', _AMS_MB_NEWS_ARTCOUNT);
    $sort_select->addOption('read', _AMS_MB_NEWS_HITS);
    $sort_select->addOption('rating', _AMS_MB_NEWS_RATING);
    $form->addElement($sort_select);
    
    $form->addElement(new XoopsFormText(_AMS_MB_NEWS_DISP, 'options[1]', 20, 15, $options[1]));
    
    $name_select = new XoopsFormSelect(_AMS_MB_NEWS_DISPLAYNAME, 'options[2]', $options[2]);
    $name_select->addOption('uname', _AMS_MB_NEWS_USERNAME);
    $name_select->addOption('name', _AMS_MB_NEWS_REALNAME);
    $form->addElement($name_select);
    
    $average_select = new XoopsFormSelect(_AMS_MB_NEWS_COMPUTING, 'options[3]', $options[3]);
    $average_select->addOption('average', _AMS_MB_NEWS_AVERAGE);
    $average_select->addOption('total', _AMS_MB_NEWS_TOTAL);
    $form->addElement($average_select);
    return $form->render();
}
?>