<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code 
 which is considered copyrighted (c) material of the original comment or credit authors.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * XOOPS global search
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         kernel
 * @since           2.0.0
 * @author          Kazumi Ono (AKA onokazu) 
 * @author          Taiwen Jiang <phppp@users.sourceforge.net>
 * @version         $Id: search.php 1529 2008-05-01 08:14:55Z phppp $
 * @package         core
 * @todo            Modularize; Both search algorithms and interface will be redesigned
 */

include 'mainfile.php';

$groups = is_object($xoopsUser) ? $xoopsUser -> getGroups() : XOOPS_GROUP_ANONYMOUS;
$gperm_handler = & xoops_gethandler( 'groupperm' );
$available_modules = $gperm_handler->getItemIds('module_read', $groups);

    include XOOPS_ROOT_PATH.'/header.php';
include('toc.html');
//include('toc3.html');

    include XOOPS_ROOT_PATH.'/footer.php';
?>
