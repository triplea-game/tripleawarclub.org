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
 * CALENDAR class For XOOPS
 *
 * @copyright       The XOOPS project http://sourceforge.net/projects/xoops/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @since           2.4.0
 * @package         class
 * @subpackage      CALENDAR
 * @author          Laurent JEN (aka DuGris) <dugris@afux.org>
 * @version         $Id: xoopscalendar.php 4075 2010-01-02 17:43:31Z dhcst $
 */

class XoopsCalendar
{

    //static $instance;
    var $active;
    var $handler;
    var $path;
    var $name;
    var $url;

    var $config    = array();

    function __construct()
    {
        xoops_loadLanguage("calendar");

        // Load static configurations
        $this->path = XOOPS_ROOT_PATH . "/class/calendar/";
        $this->url = XOOPS_URL . "/class/calendar/";
        $this->config = $this->loadConfig();
    }

    function XoopsCalendar()
    {
        $this->__construct();
    }

    function &getInstance()
    {
        static $instance;
        if (!isset($instance)) {
            $class = __CLASS__;
            $instance = new $class();
        }
        return $instance;
    }

    function loadConfig($filename = null)
    {
        $filename = empty($filename) ? "config.php" : "config.{$filename}.php";
        $config = @include "{$this->path}/{$filename}";

        return $config;
    }

    function isActive()
    {
        if (isset($this->active)) {
            return $this->active;
        }
        if (!isset($this->handler) ) {
            $this->loadHandler();
        }
        $this->active = isset( $this->handler );

        return $this->active;
    }

    function loadHandler($name = null)
    {
        $name = !empty($name) ? $name : "JSCal2";
        $class = "XoopsCalendar" . ucfirst($name);
        if (!empty($this->handler) && get_class($this->handler) == $class) {
            return $this->handler;
        }

        $this->handler = null;
        if (!file_exists( $calendar = "{$this->path}/{$name}/{$name}.php" ) ) {
            $calendar = "{$this->path}/JSCal2/JSCal2.php";
        }
        include_once $calendar;

        $handler = new $class($this);
        if ($handler->isActive()) {
            $this->handler = $handler;
        }

        return $this->handler;

    }

    function setConfigs($configs)
    {
        foreach ($configs as $key => $val) {
            $this->setConfig($key, $val);
        }

        return true;
    }

    function setConfig($name, $val)
    {
        if (isset($this->$name)) {
            $this->$name = $val;
        } else {
            $this->config[$name] = $val;
        }

        return true;
    }

    function render($formHandler)
    {
        return $this->handler->render($formHandler);
    }
}

/**
 * Abstract class for CALENDAR method
 */
class XoopsCalendarMethod
{
    var $handler;
    var $config;

    function __construct($handler = null)
    {
        $this->handler = $handler;
    }

    function XoopsCalendarMethod($handler = null)
    {
        $this->__construct($handler);
    }

    function isActive()
    {
        return true;
    }

    function loadConfig($name)
    {
        $this->config = empty($name) ? $this->handler->config : array_merge($this->handler->config, $this->handler->loadConfig($name));
    }

    function loadLanguage()
    {
        if (!file_exists($lang = $this->handler->path . $this->handler->config["mode"] . "/language/" . $GLOBALS['xoopsConfig']['language'] . ".php")) {
            $lang = $this->handler->path . $this->handler->config["mode"] . "/language/english.php";
        }
        include_once $lang;
    }

    function render()
    {
    }
}
?>