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
$sform = new XoopsThemeForm(_AMS_NW_VERSIONCONFLICT, "overrideform", XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname').'/submit.php');
$sform->setExtra('enctype="multipart/form-data"');

$sform->addElement(new XoopsFormLabel('', _AMS_NW_CONFLICTWHAT2DO));

$sform->addElement(new XoopsFormHidden('storyid', $story->storyid));
$sform->addElement(new XoopsFormHidden('change', $story->change));
$sform->addElement(new XoopsFormHidden('hometext', $story->hometext));
$sform->addElement(new XoopsFormHidden('bodytext', $story->bodytext));

$submit_tray = new XoopsFormElementTray('');
$submit_tray->addElement(new XoopsFormButton('', 'op', _AMS_NW_OVERRIDE, 'submit'));
$submit_tray->addElement(new XoopsFormButton('', 'op', _AMS_NW_FINDVERSION, 'submit'));
$cancel_button = new XoopsFormButton('', 'cancel', _CANCEL, 'button');
$cancel_button->setExtra('onclick="javascript:history.go(-1);"');
$submit_tray->addElement($cancel_button);
$sform->addelement($submit_tray);
$sform->display();
?>