<?php
// $Id: index.php,v 1.17 2004/07/26 17:51:25 hthouzard Exp $
// ------------------------------------------------------------------------ //
// XOOPS - PHP Content Management System                      //
// Copyright (c) 2000 XOOPS.org                           //
// <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------ //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //
// //
// You may not change or alter any portion of this comment or credits       //
// of supporting developers from this source code or any supporting         //
// source code which is considered copyrighted (c) material of the          //
// original comment or credit authors.                                      //
// //
// This program is distributed in the hope that it will be useful,          //
// but WITHOUT ANY WARRANTY; without even the implied warranty of           //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
// GNU General Public License for more details.                             //
// //
// You should have received a copy of the GNU General Public License        //
// along with this program; if not, write to the Free Software              //
// Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------ //
include '../../../include/cp_header.php';
include 'functions.php';
include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
include_once XOOPS_ROOT_PATH."/modules/AMS/include/functions.inc.php";

global $xoopsModule;
if (!isset($xoopsModule) || $xoopsModule->getVar('dirname') != "AMS") {
	$mod_handler =& xoops_gethandler('module');
	$amsModule =& $mod_handler->getByDirname('AMS');
}
else {
	$amsModule =& $xoopsModule;
}


xoops_cp_header();
adminmenu(-1);

//load AMS SEO class
$SEO_handler =& xoops_getmodulehandler('seo', 'AMS');

//if process form submitted
if (isset($_POST['submit']))
{
    AMS_updateCache();
	$myts =& MyTextSanitizer::getInstance();
	$SEO_is_Enable=intval($_POST['friendlyurl_enable']);
	$SEO_URL_Template='[XOOPS_URL]/'.$myts->htmlSpecialChars($_POST['urltemplate']);
	
	//Save setting into cache
	$thisSEO= $SEO_handler->save_setting(Array('friendlyurl_enable'=>$SEO_is_Enable,'urltemplate'=>$SEO_URL_Template));

}else //just print form. Don't process anything
{
}
//load AMS SEO setting from cache
$thisSEO= $SEO_handler->read_setting();

$pattern = "/\[XOOPS_URL\]\//";
$rep_pat = "";
$thisSEO['urltemplate'] = preg_replace($pattern, $rep_pat, $thisSEO['urltemplate']);

$sform = new XoopsThemeForm(_AMS_AM_SEO_SUBMITFORM, "seoform", XOOPS_URL.'/modules/'.$amsModule ->getVar('dirname').'/admin/seo.php');

$friendly_url_tray= new XoopsFormElementTray(_AMS_AM_SEO_FRIENDLYURL,'<br />');
$friendly_url_tray->addElement(new XoopsFormRadioYN(_AMS_AM_SEO_ENABLE, 'friendlyurl_enable',$thisSEO['friendlyurl_enable'], _AMS_AM_YES, _AMS_AM_NO));

$friendly_url_type = new XoopsFormText(_AMS_AM_SEO_URLTEMPLATE." = [XOOPS_URL]/", 'urltemplate',60,100,$thisSEO['urltemplate']);
$friendly_url_tray->addElement($friendly_url_type);
unset($friendly_url_type);
$friendly_url_type = new XoopsFormLabel(_AMS_AM_SEO_VALIDTAG. " = [TOPIC],[AUDIENCE],[AMS_DIR]");
$friendly_url_tray->addElement($friendly_url_type);
	
$sform->addElement($friendly_url_tray);


//Submit buttons
$button_tray = new XoopsFormElementTray('' ,'');
$submit_btn = new XoopsFormButton('', 'submit', _SUBMIT, 'submit');
$button_tray->addElement($submit_btn);
$sform->addElement($button_tray);

$sform->display();
unset ($sform);
xoops_cp_footer();
?>