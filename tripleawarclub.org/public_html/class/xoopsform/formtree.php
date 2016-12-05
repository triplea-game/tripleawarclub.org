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
 *  Xoops Form Class Elements
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/ 
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         kernel
 * @subpackage      form
 * @since           2.3.0
 * @author          John Neill <catzwolf@xoops.org>
 * @version         $Id: formtree.php 0000 14/04/2009 19:01:48 catzwolf $
 */
defined('XOOPS_ROOT_PATH') or die('Restricted access');

/**
 * xo_Form Tree
 * This class is much the same as XoopsTree class but can be used directly within forms by developers
 *
 * @author 		John Neill <catzwolf@xoops.org>
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/ 
 * @package 	kernel
 * @subpackage 	form
 * @access 		public 
 */
class xo_FormTree extends xo_FormElement
{
    var $_parentId;
    var $_myId;
    var $_rootId = null;
    var $_tree = array();
    var $_objects;
    var $_name;
    var $_fieldName;
    var $_prefix;
    var $_selected;
    var $_addEmptyOption;
    var $_key;
    
    /**
     * xo_FormTree::xo_FormTree()
     *
     * @param mixed $caption
     * @param mixed $name
     * @param mixed $fieldName
     * @param string $prefix
     * @param string $selected
     * @param mixed $addEmptyOption
     * @param mixed $key
     */
    function xo_FormTree($caption, $name, $fieldName, $prefix = '-', $selected = '', $addEmptyOption = false, $key = 0)
    {
        $this->setCaption($caption);
        $this->_name = $name;
        $this->_fieldName = $fieldName;
        $this->_prefix = $prefix;
        $this->_selected = $selected;
        $this->_addEmptyOption = $addEmptyOption ? 1 : 0;
        $this->_key = $key;
    }
    
    /**
     * xo_FormTree::addOptions()
     *
     * @param mixed $objectArr
     * @param mixed $myId
     * @param mixed $parentId
     * @param mixed $rootId
     * @return
     */
    function addOptions(&$objectArr, $myId, $parentId, $rootId = null)
    {
        $this->_objects = &$objectArr;
        $this->_myId = $myId;
        $this->_parentId = $parentId;
        if (isset($rootId)) {
            $this->_rootId = $rootId;
        }
        $this->_initialize();
    }
    
    /**
     * xo_FormTree::_initialize()
     *
     * @return
     */
    function _initialize()
    {
        if (! count($this->_objects)) {
            foreach(array_keys((array) $this->_objects) as $i) {
                $key1 = $this->_objects[$i]->getVar($this->_myId);
                $this->_tree[$key1]['obj'] = &$this->_objects[$i];
                $key2 = $this->_objects[$i]->getVar($this->_parentId);
                $this->_tree[$key1]['parent'] = $key2;
                $this->_tree[$key2]['child'][] = $key1;
                if (isset($this->_rootId)) {
                    $this->_tree[$key1]['root'] = $this->_objects[$i]->getVar($this->_rootId);
                }
            }
        }
    }
    
    /**
     * xo_FormTree::getTree()
     *
     * @return
     */
    function &getTree()
    {
        return $this->_tree;
    }
    
    /**
     * xo_FormTree::getByKey()
     *
     * @param mixed $key
     * @return
     */
    function &getByKey($key)
    {
        return $this->_tree[$key]['obj'];
    }
    
    /**
     * xo_FormTree::getFirstChild()
     *
     * @param mixed $key
     * @return
     */
    function &getFirstChild($key)
    {
        $ret = array();
        if (isset($this->_tree[$key]['child'])) {
            foreach($this->_tree[$key]['child'] as $childkey) {
                $ret[$childkey] = &$this->_tree[$childkey]['obj'];
            }
        }
        return $ret;
    }
    
    /**
     * xo_FormTree::getAllChild()
     *
     * @param mixed $key
     * @param array $ret
     * @return
     */
    function &getAllChild($key, $ret = array())
    {
        if (isset($this->_tree[$key]['child'])) {
            foreach($this->_tree[$key]['child'] as $childkey) {
                $ret[$childkey] = &$this->_tree[$childkey]['obj'];
                $children = &$this->getAllChild($childkey, $ret);
                foreach(array_keys($children) as $newkey) {
                    $ret[$newkey] = &$children[$newkey];
                }
            }
        }
        return $ret;
    }
    
    /**
     * xo_FormTree::getAllParent()
     *
     * @param mixed $key
     * @param array $ret
     * @param mixed $uplevel
     * @return
     */
    function &getAllParent($key, $ret = array(), $uplevel = 1)
    {
        if (isset($this->_tree[$key]['parent']) && isset($this->_tree[$this->_tree[$key]['parent']]['obj'])) {
            $ret[$uplevel] = &$this->_tree[$this->_tree[$key]['parent']]['obj'];
            $parents = &$this->getAllParent($this->_tree[$key]['parent'], $ret, $uplevel + 1);
            foreach(array_keys($parents) as $newkey) {
                $ret[$newkey] = &$parents[$newkey];
            }
        }
        return $ret;
    }
    
    /**
     * xo_FormTree::_makeSelBoxOptions()
     *
     * @param mixed $key
     * @param mixed $ret
     * @param mixed $prefix_orig
     * @param string $prefix_curr
     * @return
     */
    function _makeSelBoxOptions($key, &$ret, $prefix_orig, $prefix_curr = '')
    {
        if ($key > 0) {
            $value = $this->_tree[$key]['obj']->getVar($this->_myId);
            $ret .= '<option value="' . $value . '"';
            if ($value == $this->_selected) {
                $ret .= ' selected="selected"';
            }
            $ret .= '>' . $prefix_curr . $this->_tree[$key]['obj']->getVar($this->_fieldName) . '</option>';
            $prefix_curr .= $prefix_orig;
        }
        if (isset($this->_tree[$key]['child']) && ! empty($this->_tree[$key]['child'])) {
            foreach($this->_tree[$key]['child'] as $childkey) {
                $this->_makeSelBoxOptions($childkey, $ret, $prefix_orig, $prefix_curr);
            }
        }
    }
    
    /**
     * xo_FormTree::render()
     *
     * @return
     */
    function render()
    {
        $ret = '<select name=' . $this->_name . ' id=' . $this->_name . ' title=' . $this->getTitle() . '>';
        if (false != $this->_addEmptyOption) {
            $ret .= '<option value=" ">-----------------</option>';
        }
        $this->_makeSelBoxOptions($this->_key, $ret, $this->_prefix);
        $ret .= '</select>';
        return $ret;
    }
}

?>