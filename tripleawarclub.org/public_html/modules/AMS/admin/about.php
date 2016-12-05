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
global $xoopsModule;
if (!isset($xoopsModule) || $xoopsModule->getVar('dirname') != "AMS") {
	$mod_handler =& xoops_gethandler('module');
	$amsModule =& $mod_handler->getByDirname('AMS');
}
else {
	$amsModule =& $xoopsModule;
}

$versioninfo =& $module_handler->get($amsModule->getVar('mid'));
$ams_installedversion=$versioninfo->getInfo('version');
$ams_installedversion=str_replace(' ','+',$ams_installedversion);

xoops_cp_header();
adminmenu(-1);
echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr><td width='100%' class=\"odd\">";
echo "<center><b>AMS Brought To You By:</b></center><br />";
echo "<center><a href='http://www.novasmarttechnology.com' target='_blank'><h3>NovaSmart Technology</a></center><br />";
echo "<center><b>Special Thanks To:</b></center><br />";
echo "<center><a href='http://www.it-hq.org' target='_blank'><h3>IT Headquarters</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.iis-resources.com' target='_blank'>IIS Resources</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.web-udvikling.dk' target='_blank'>JKP Software Development</h3></a></center><br />";
echo '</td></tr>';
echo "<tr><td width='100%' class=\"odd\">";
echo "<iframe src=http://xoops.novasmarttechnology.com/version/latestversion.php?app=ams&amp;myversion=$ams_installedversion width='100%' height='150' frameborder='0' scrolling='no'></iframe>";
echo "</td></tr></table>";
echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr>";
echo "<td width='48%' class=\"odd\">";
echo "<center><b>AMS Module Support</b></center><br />";
echo "Need help with using AMS? <br /><br />- <a href='http://xoops.novasmarttechnology.com/modules/AMS/index.php?storytopic=10&storynum=30' target='_blank'>AMS User Documentation</a><br /><br />";
echo "Still need additional support?<br /><br />- <a href='http://xoops.novasmarttechnology.com/modules/newbb' target='_blank'>AMS Support Forums</a><br /><br />";
echo "</td>";
echo "<td width='48%' class=\"odd\">";
echo "<center><b>Make A Donation</b></center><br />Thank you very much for using AMS. If you find the AMS module useful and plan to use it on your site, please show your appreciation by making a small donation to ensure its ongoing development. <br /><br />";
echo "<center>";
echo "<form action='https://www.paypal.com/cgi-bin/webscr' method='post'>";
echo "<SELECT NAME='amount'>";
echo "<OPTION VALUE='5.00'>USD  5.00</option>";
echo "<OPTION VALUE='10.00'>USD  10.00</option>";
echo "";
echo "<OPTION VALUE='15.00' selected>USD  15.00</option>";
echo "<OPTION VALUE='20.00' >USD  20.00</option>";
echo "<OPTION VALUE='50.00' >USD  50.00</option>";
echo "<OPTION VALUE='100.00' >USD  100.00</option>";
echo "</SELECT>";
echo "";
echo "<br>for<br>";
echo "";
echo "<SELECT NAME='item_name'>";
echo "<OPTION VALUE='AMS'>AMS</option>";
echo "<OPTION VALUE='Nova Mass Email' >Nova Mass Email</option>";
echo "<OPTION VALUE='Dictionary'>Dictionary</option>";
echo "<OPTION VALUE='XM-Memberstats'>XM-Memberstats</option>";
echo "<OPTION VALUE='SEO XOOPS'>SEO XOOPS</option>";
echo "<OPTION VALUE='All Modules & Hack' selected>All Modules & Hack</option>";
echo "</SELECT>";
echo "<br><br>";
echo "";
echo "";
echo "<input type='hidden' name='cmd' value='_donations'>";
echo "<input type='hidden' name='business' value='admin@NovaSmartTechnology.com'>";
echo "";
echo "<input type='hidden' name='item_number' value='123456'>";
echo "";
echo "<input type='hidden' name='page_style' value='PayPal'>";
echo "<input type='hidden' name='no_shipping' value='1'>";
echo "<input type='hidden' name='no_note' value='1'>";
echo "<input type='hidden' name='currency_code' value='USD'>";
echo "<input type='hidden' name='tax' value='0'>";
echo "<input type='hidden' name='lc' value='MY'>";
echo "<input type='hidden' name='bn' value='PP-DonationsBF'>";
echo "<input type='image' src='https://www.paypal.com/en_US/i/btn/x-click-butcc-donate.gif' border='0' name='submit' alt='Make payments with PayPal - it's fast, free and secure!'>";
echo "";
echo "</form>";
echo "<br><br>* Credit card also accepted through paypal";
echo "</center>";



echo '</td></tr></table>';



xoops_cp_footer();
?>