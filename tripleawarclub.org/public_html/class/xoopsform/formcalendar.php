<?php
/**
 * CALENDAR form element
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         kernel
 * @subpackage      form
 * @since           2.4.0
 * @author          Laurent JEN <dugris@frxoops.org>
 * @version         $Id: formcalendar.php 2913 2009-03-08 20:31:09Z dugris $
 */
defined("XOOPS_ROOT_PATH") or die("XOOPS root path not defined");

xoops_load('XoopsFormElement');

/**
 * See File: class/calendar/calendar.php | (c) dynarch.com 2004
 * Distributed as part of "The Coolest DHTML Calendar"
 * under the same terms.
 *
 * www.dynarch.com/projects/calendar
 */


class XoopsFormCalendar extends XoopsFormText
{
    var $calendarHandler;

    /**
     * Constuctor
     *
     * @param       string      $caption        caption
     * @param       string      $name           name
     * @param       string      $size           field size ( default : 15 )
     * @param       int         $value          field value ( default : time() )
     */
    function XoopsFormCalendar($caption, $name, $size = 15, $value = 0)
    {
        xoops_load('XoopsCalendar');
        $this->calendarHandler =& XoopsCalendar::getInstance();
        $this->calendarHandler->loadHandler();

        $value = !is_numeric($value) ? time() : intval($value);
        $size = !is_numeric($size) ? 15 : intval($size);

        $this->setCaption($caption);
        $this->setName($name);
        $this->setValue($value);
        $this->setSize($size);
    }

    function setConfig($name, $val)
    {
        return $this->calendarHandler->setConfig($name, $val);
    }

    function setSize($size) {
        $this->_size = intval($size);
    }

    function getSize() {
        return $this->_size;
    }

    function render()
    {
        return $this->calendarHandler->render($this);
    }

}
?>