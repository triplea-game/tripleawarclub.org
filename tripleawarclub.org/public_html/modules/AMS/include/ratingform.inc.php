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
$sform = new XoopsThemeForm(_AMS_NW_RATEARTICLE, "ratingform", XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname').'/ratefile.php');
$sform->setExtra('enctype="multipart/form-data"');

$sform->addElement(new XoopsFormHidden('storyid', $article->storyid));

$rating_select = new XoopsFormRadio(_AMS_NW_RATE, 'rating', 0);
for ($i = 1; $i <= 10; $i++) {
    $rating_select->addOption($i);
}
$sform->addElement($rating_select, true);

$sform->addElement(new XoopsFormButton('', 'submit', _AMS_NW_SUBMITRATING, 'submit'));

$sform->assign($xoopsTpl);
?>