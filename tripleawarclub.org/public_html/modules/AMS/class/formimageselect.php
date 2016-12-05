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
/**
 * Image selection field
 * 
 * @author	Jan Keller Pedersen	<mithrandir@xoops.org>
 * @copyright	copyright (c) 2000-2005 XOOPS.org
 * 
 * @package     Cappello
 * @subpackage  form
 */
class XoopsFormImageSelect extends XoopsFormElementTray
{

	function XoopsFormImageSelect($caption, $name, $value=0, $size, $maxlength)
	{
		$this->XoopsFormElementTray($caption, '&nbsp;');
		$this->addElement(new XoopsFormText('', $name, $size, $maxlength, $value));
		$this->addElement(new XoopsFormLabel('', "<img onmouseover='style.cursor=\"hand\"' onclick='javascript:openWithSelfMain(\"".XOOPS_URL."/imagemanager.php?target=".$name."\",\"imgmanager\",400,430);' src='".XOOPS_URL."/images/image.gif' alt='image' />"));
	}
}
?>