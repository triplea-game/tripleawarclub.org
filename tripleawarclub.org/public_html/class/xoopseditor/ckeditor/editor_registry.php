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
 *  FCKeditor adapter for XOOPS
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         class
 * @subpackage      editor
 * @since           2.3.0
 * @author          Taiwen Jiang <phppp@users.sourceforge.net>
 * @version         $Id: editor_registry.php 3496 2009-08-25 14:21:12Z dugris $
 */

return $config = array(
        "class"     =>  "XoopsFormCkeditor",
        "file"      =>  XOOPS_ROOT_PATH . "/class/xoopseditor/ckeditor/ckeditor.php",
        "title"     =>  _XOOPS_EDITOR_CKEDITOR,
        "order"     =>  3,
        "nohtml"    =>  0
    );
?>