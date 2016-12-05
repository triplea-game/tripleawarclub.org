<?php
// $Id: storyform.inc.php,v 1.10 2004/05/29 15:10:17 mithyt2 Exp $
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
include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";

include_once(XOOPS_ROOT_PATH."/class/tree.php");

$fform = new XoopsThemeForm(_AMS_AM_FILTER, "filterform", 'index.php');
$fform->setExtra('enctype="multipart/form-data"');

$first_row = new XoopsFormElementTray(_OPTIONS);

$first_row->addElement(new XoopsFormText(_AMS_AM_TITLE, 'title', 50, 80, $title));
global $xoopsDB;
$xt = new AmsTopic($xoopsDB->prefix("ams_topics"));
$alltopics = $xt->getAllTopics();
$topic_obj_tree = new XoopsObjectTree($alltopics, 'topic_id', 'topic_pid');
$first_row->addElement(new XoopsFormLabel(_AMS_AM_TOPIC, $topic_obj_tree->makeSelBox('topicid', 'topic_title', '--', $topicid, true)));

$author_select = new XoopsFormSelect(_AMS_AM_POSTER, 'author', $author, 5, true);
$authors = $xt->getAllAuthors();
//$authors = array_flip($authors);

foreach ($authors as $key => $user_arr) {
    $author_select->addOption($user_arr['uid'], $user_arr['uname']);
}

$first_row->addElement($author_select);

$second_row = new XoopsFormElementTray(_AMS_AM_SORTING);
$status_select = new XoopsFormSelect(_AMS_AM_STATUS, 'status', $status);
$status_select->addOption('none', '---');
$status_select->addOption('published', _AMS_AM_PUBLISHED);
$status_select->addOption('expired', _AMS_AM_EXPIRED);
$second_row->addElement($status_select);



$order = (isset($order)) ? $order : "DESC";
$order_select = new XoopsFormSelect(_AMS_AM_ORDER, 'order', $order);
$order_select->addOption('DESC', _DESCENDING);
$order_select->addOption('ASC', _ASCENDING);
$second_row->addElement($order_select);

$sort = isset($sort) ? $sort : 0;
$sort_select = new XoopsFormSelect(_AMS_AM_SORT, 'sort', $sort);
$sort_select->addOption('n.storyid', _AMS_AM_STORYID);
$sort_select->addOption('n.title', _AMS_AM_TITLE);
$sort_select->addOption('n.published', _AMS_AM_PUBLISHED);
$sort_select->addOption('n.counter', _AMS_AM_HITS);
$sort_select->addOption('n.rating', _AMS_AM_RATING);
$second_row->addElement($sort_select);

$fform->addElement($first_row);
$fform->addElement($second_row);

$fform->addElement(new XoopsFormHidden('op', 'newarticle'));
$button_row = new XoopsFormElementTray('');
$button_row->addElement(new XoopsFormButton('', 'submit', _AMS_AM_FILTER, 'submit'));
//$button_row->addElement(new XoopsFormButton('', 'reset', _AMS_AM_RESET, 'reset'));
$fform->addElement($button_row);
?>