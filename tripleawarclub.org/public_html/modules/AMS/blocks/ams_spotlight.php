<?php
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
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

function b_ams_spotlight_show($options) {
    include_once XOOPS_ROOT_PATH."/modules/AMS/class/class.newsstory.php";
    global $xoopsModule;
    if (!isset($xoopsModule) || $xoopsModule->getVar('dirname') != "AMS") {
        $mod_handler =& xoops_gethandler('module');
        $amsModule =& $mod_handler->getByDirname('AMS');
    }
    else {
        $amsModule =& $xoopsModule;
    }

    $spotlight_handler =& xoops_getmodulehandler('spotlight', 'AMS');
    $block =& $spotlight_handler->getSpotlightBlock();
    
	//load special block instruction if exist
	if (file_exists(XOOPS_ROOT_PATH.'/modules/AMS/templates/'.$options[2].'.php'))
	{
		include XOOPS_ROOT_PATH.'/modules/AMS/templates/'.$options[2].'.php';
	}
	
    $GLOBALS['xoopsTpl']->assign('spotlights', $block['spotlights']);
    $block['spotlightcontent'] = $GLOBALS['xoopsTpl']->fetch('db:'.$options[2]);
    $GLOBALS['xoopsTpl']->clear_assign('spotlights');

    if (count($options) > 0) {
        if (intval($options[0]) > 0) {
        		// fourth input: 2 news only
            $stories = AmsStory::getAllPublished(intval($options[0]), 0, false, 2, 1, true, 'published', $block['ids']);
            $count = 0;
            foreach (array_keys($stories) as $i) {
            	 $published=date("Y/n/j", $stories[$i]->published());
                $block['stories'][] = array('id' => $stories[$i]->storyid(), 'title' => $stories[$i]->title(),'published' => $published, 'hits' => $stories[$i]->counter(), 'friendlyurl_enable'=>$stories[$i]->friendlyurl_enable, 'friendlyurl'=>$stories[$i]->friendlyurl );
                $count ++;
            }
        }

        if ($options[1] == 1) {
            $block['total_art'] = AmsStory::countPublishedByTopic();
            $block['total_read'] = AmsStory::countReads();
            $comment_handler =& xoops_gethandler('comment');
            $block['total_comments'] = $comment_handler->getCount(new Criteria('com_modid', $amsModule->getVar('mid')));
        }
        $block['showministats'] = $options[1];
        $block['showother'] = intval($options[0]) > 0;
    }

    return $block;
}

function b_ams_spotlight_edit($options) {
    include_once (XOOPS_ROOT_PATH."/class/xoopsformloader.php");
    include_once XOOPS_ROOT_PATH."/modules/AMS/include/functions.inc.php";
    
	global $xoopsModule;
    AMS_updateCache();
	if (!isset($xoopsModule) || $xoopsModule->getVar('dirname') != "AMS")
	{
		$module_handler =& xoops_gethandler('module');
		$module =& $module_handler->getByDirname("AMS");
	}
    else {
        $module =& $xoopsModule;
    }	
	$config_handler =& xoops_gethandler('config');
	$moduleConfig =& $config_handler->getConfigsByCat(0, $module->getVar('mid'));
	$templates_list=array_flip($moduleConfig['spotlight_template']);

	//fix template list value lost after module update
	foreach ($templates_list as $k => $v)
	{
		$templates_list[$k] = substr($k,20,strlen($k)-25);
	}

	
    $form = new XoopsFormElementTray('', '<br/><br />');
    $numarticles_select = new XoopsFormText(_AMS_MB_SPOT_NUMARTICLES, 'options[0]', 10, 10, $options[0]);
    $form->addElement($numarticles_select);

    $form->addElement(new XoopsFormRadioYN(_AMS_MB_SPOT_SHOWMINISTATS, 'options[1]', $options[1]));
    
	//spotlight template selection
    $template_select = new XoopsFormSelect(_AMS_MB_SPOTLIGHT_TEMPLATE, 'options[2]', $options[2]);
    $template_select->addOptionArray($templates_list);
	$template_select->setExtra( "onchange='showImgSelected(\"template_preview\", \"options[2]\", \"" . '/modules/AMS/images/spotlight_preview' . "\", \".jpg\", \"" . XOOPS_URL . "\")'" );
    $template_select->setDescription(_AMS_MB_SPOTLIGHT_TEMPLATE_DESC);
    $form->addElement($template_select);

	//spotlight preview image
    $imgpath=sprintf('', "modules/AMS/images/spotlight_preview/" );
	$form -> addElement( new XoopsFormLabel( '', "<br /><img src='" . XOOPS_URL . "/modules/AMS/images/spotlight_preview/".$options[2].".jpg' name='template_preview' id='template_preview' alt='' />" ) );

	
    return $form->render();
}
?>