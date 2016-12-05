<?php
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
include_once "functions.php"; 
xoops_cp_header();

adminmenu(4);

$spotlight_handler =& xoops_getmodulehandler('spotlight', $xoopsModule->getVar('dirname'));
$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : 'list';

switch ($op) {
    case "list":
    default:
        $block_handler =& xoops_gethandler('block');
        $spotlightBlock = $block_handler->getObjects(new Criteria('b.func_file', "ams_spotlight.php"));
        $spotlightBlock = isset($spotlightBlock[0]) ? $spotlightBlock[0] : null;
        $block = $spotlight_handler->getSpotlightBlock(false);
        $spotlights = isset($block['spotlights']) ? $block['spotlights'] : array();
        $output = "<div align='right'>
                        <a href='spotlight.php?op=add'><img src='../images/new.png' />"._AMS_AM_SPOT_ADD."</a>";
        if (is_object($spotlightBlock)) {
            $output .= "<br />
                        <a href='".XOOPS_URL."/modules/system/admin.php?fct=blocksadmin&op=edit&bid=".$spotlightBlock->getVar('bid')."'><img src='../images/edit.png' />"._AMS_AM_SPOT_EDITBLOCK."</a>";
        }
        $output .= "</div>";
        
        $output .= "<div><form name='spotform' id='spotform' action='spotlight.php' method='POST'>";
        $output .= "<table>";
        
        $output .= "<tr><th>"._AMS_AM_SPOT_NAME."</th><th></th><th>"._AMS_AM_SPOT_IMAGE."</th><th>"._AMS_AM_SPOT_WEIGHT."</th><th>"._AMS_AM_SPOT_DISPLAY."</th><th>"._AMS_AM_ACTION."</th>";
        include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
        $minis = 0;
        if (count($spotlights) > 0) {
            foreach (array_keys($spotlights) as $i) {
                if ($spotlights[$i]['autoteaser'] == 1) {
                    $spotlights[$i]['text'] = "[auto]".$spotlights[$i]['text'];
                }
                $weight_select = new XoopsFormText('', 'weight['.$spotlights[$i]['spotid'].']', 10, 10, $spotlights[$i]['weight']);
                $display_select = new XoopsFormRadioYN('', 'display['.$spotlights[$i]['spotid'].']', $spotlights[$i]['display']);
                if (isset($class) && $class == 'odd') {
                    $class = 'even';
                }
                else {
                    $class = 'odd';
                }
                $output .= "<tr class='".$class."'>";
                $minis++;
                $output .= "<td>".$spotlights[$i]['title']."</td>";
                $output .= "<td>".$spotlights[$i]['text']."</td>";
                $output .= "<td>".$spotlights[$i]['image'] ."</td>";
                $output .= "<td>". $weight_select->render()."</td>";
                $output .= "<td>". $display_select->render()."</td>";
                $output .= "<td><a href='spotlight.php?op=edit&amp;id=".$spotlights[$i]['spotid']."'>". _AMS_AM_EDIT."</a>";
                $output .= "&nbsp;<a href='spotlight.php?op=delete&amp;id=".$spotlights[$i]['spotid']."'>"._AMS_AM_DELETE."</a></td>";
                $output .= "</tr>";
                unset($weight_select);
                unset($display_select);
            }
        }
        $output .= "<tr>
                        <td colspan='3'></td>
                        <td colspan='2' align='center'>
                            <input type='hidden' name='op' value='reorder' />
                            <input type='submit' name='submit' value='"._AMS_AM_SUBMIT."' />
                        </td>
                        <td></td>
                    </tr>";
        $output .= "</table></form></div>";
        echo $output;
        break;
        
    case "add":
        $spotlight =& $spotlight_handler->create();
        $form =& $spotlight->getForm();
        $form->display();
        break;
        
    case "edit":
        $spot =& $spotlight_handler->get($_REQUEST['id']);
        $form =& $spot->getForm();
        $form->display();
        break;
        
    case "save":
        if (isset($_REQUEST['id'])) {
            $spot =& $spotlight_handler->get($_REQUEST['id']);
        }
        else {
            $spot =& $spotlight_handler->create();
        }
        $spot->setVar('showimage', $_REQUEST['showimage']);
        $spot->setVar('image', $_REQUEST['image']);
        $spot->setVar('teaser', $_REQUEST['teaser']);
        $spot->setVar('autoteaser', $_REQUEST['autoteaser']);
        $spot->setVar('maxlength', $_REQUEST['maxlength']);
        $spot->setVar('display', $_REQUEST['display']);
        $spot->setVar('mode', $_REQUEST['mode']);
        $spot->setVar('weight', $_REQUEST['weight']);
        switch ($_REQUEST['mode']) {
            case 1:
                $spot->setVar('topicid', 0);
                $spot->setVar('storyid', 0);
                break;
                
            case 2:
                $spot->setVar('topicid', $_REQUEST['topicid']);
                break;
                
            case 3:
                $spot->setVar('storyid', $_REQUEST['storyid']);
                break;
        }
        if ($spotlight_handler->insert($spot)) {
            redirect_header('spotlight.php', 3, _AMS_AM_SPOT_SAVESUCCESS);
        }
        else {
            echo $spot->getHtmlErrors();
            $form =& $spot->getForm();
            $form->display();
        }
        break;
        
    case "delete":
        if (isset($_REQUEST['ok']) && intval($_REQUEST['ok']) === 1) {
            $spot =& $spotlight_handler->get($_REQUEST['id']);
            if ($spotlight_handler->delete($spot)) {
                redirect_header('spotlight.php', 3, _AMS_AM_SPOT_DELETESUCCESS);
            }
            else {
                echo $spot->getHtmlErrors();
            }
        }
        else {
            xoops_confirm(array('ok' => 1, 'id' => $_REQUEST['id'], 'op' => 'delete'), 'spotlight.php', _AMS_AM_RUSUREDELSPOTLIGHT);
        }
        break;
        
    case "reorder":
        if (!isset($_POST['weight']) || !is_array($_POST['weight']) || count($_POST['weight'] == 0)) {
            header("location:spotlight.php");
        }
        $criteria = new Criteria('spotlightid', "(".implode(',', array_keys($_POST['weight']) ).")", 'IN');
        $spots = $spotlight_handler->getObjects($criteria, true);

        foreach ($_POST['weight'] as $id => $weight) {
            $spots[$id]->setVar('weight', $weight);
            $spots[$id]->setVar('display', $_POST['display'][$id]);
            if (!$spotlight_handler->insert($spots[$id])) {
                $errors++;
            }
        }
        if ($errors) {
            header('Location: spotlight.php');
        }
        else {
            header('Location: spotlight.php');
        }
        break;
}

xoops_cp_footer();
?>