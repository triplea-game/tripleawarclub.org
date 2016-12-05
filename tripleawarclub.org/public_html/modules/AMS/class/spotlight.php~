<?php
// ------------------------------------------------------------------------ //
//               XOOPS - PHP Content Management System                      //
//                   Copyright (c) 2000 XOOPS.org                           //
//                      <http://www.xoops.org/>                             //
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
if (!class_exists('IdgObjectHandler')) {
    include_once XOOPS_ROOT_PATH."/modules/AMS/class/idgobject.php";
}

class AmsSpotlight extends XoopsObject {
    function AmsSpotlight() {
        $this->initVar('spotlightid', XOBJ_DTYPE_INT);
        $this->initVar('showimage', XOBJ_DTYPE_INT, 1);
        $this->initVar('image', XOBJ_DTYPE_TXTBOX, "");
        $this->initVar('teaser', XOBJ_DTYPE_TXTAREA, "");
        $this->initVar('autoteaser', XOBJ_DTYPE_INT, 1);
        $this->initVar('maxlength', XOBJ_DTYPE_INT, 100);
        $this->initVar('display', XOBJ_DTYPE_INT, 1);
        $this->initVar('mode', XOBJ_DTYPE_INT, 1);
        $this->initVar('storyid', XOBJ_DTYPE_INT, 0);
        $this->initVar('topicid', XOBJ_DTYPE_INT, 1);
        $this->initVar('weight', XOBJ_DTYPE_INT, 1);
    }

    /**
	* Get a {@link XoopsForm} object for creating/editing Spotlight articles
	*
	* @return object
	*/
    function getForm($action = false) {
        if ($action === false) {
            $action = $_SERVER['REQUEST_URI'];
        }
        $title = _AMS_AM_SPOTLIGHT;
        include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
        include_once(XOOPS_ROOT_PATH."/modules/AMS/class/formimageselect.php");
        $form = new XoopsThemeForm($title, 'spotlightform', $action);
        if (!$this->isNew()) {
            $form->addElement(new XoopsFormHidden('id', $this->getVar('spotlightid')));
        }
        $mode_select = new XoopsFormRadio('', 'mode', $this->getVar('mode'));
        $mode_select->addOption(1, _AMS_AM_SPOT_LATESTARTICLE);
        $mode_select->addOption(2, _AMS_AM_SPOT_LATESTINTOPIC);
        $mode_select->addOption(3, _AMS_AM_SPOT_SPECIFICARTICLE);
        $mode_select->addOption(4, _AMS_AM_SPOT_CUSTOM);

        include_once(XOOPS_ROOT_PATH."/class/tree.php");
        include_once(XOOPS_ROOT_PATH."/modules/AMS/class/class.newstopic.php");
        include_once(XOOPS_ROOT_PATH."/modules/AMS/class/class.newsstory.php");
        $xt = new AmsTopic($GLOBALS['xoopsDB'] -> prefix("ams_topics"));
        $allTopics = $xt->getAllTopics();
        $topic_obj_tree = new XoopsObjectTree($allTopics, 'topic_id', 'topic_pid');
        $topic_select = new XoopsFormLabel(_AMS_AM_TOPIC, $topic_obj_tree->makeSelBox('topicid', 'topic_title', '--', $this->getVar('topicid'), false));
        $topic_select->setDescription(_AMS_AM_SPOT_TOPIC_DESC);
        
        $article_select = new XoopsFormSelect(_AMS_AM_ARTICLE, 'storyid', $this->getVar('storyid'));
        $article_select->addOptionArray(AmsStory::getAllPublished($GLOBALS['xoopsModuleConfig']['spotlight_art_num'], 0, false, 0, 1, false));
        $article_select->setDescription(_AMS_AM_SPOT_ARTICLE_DESC);

        $mode_tray = new XoopsFormElementTray(_AMS_AM_SPOT_MODE_SELECT);
        $mode_tray->addElement($mode_select);
        
        $showimage_select = new XoopsFormRadio(_AMS_AM_SPOT_SHOWIMAGE, 'showimage', $this->getVar('showimage'));
        $showimage_select->addOption(0, _AMS_AM_SPOT_SPECIFYIMAGE);
        $showimage_select->addOption(1, _AMS_AM_SPOT_TOPICIMAGE);
        $showimage_select->addOption(2, _AMS_AM_SPOT_AUTHORIMAGE);
        $showimage_select->addOption(3, _AMS_AM_SPOT_NOIMAGE);
        $showimage_select->setDescription(_AMS_AM_SPOT_SHOWIMAGE_DESC);

        $image_select = new XoopsFormImageSelect(_AMS_AM_SPOT_IMAGE, 'image', $this->getVar('image', 'e'), 70, 255);

        $autoteaser_select = new XoopsFormRadioYN(_AMS_AM_SPOT_AUTOTEASER, 'autoteaser', $this->getVar('autoteaser'));

        $teaser_text = new XoopsFormDhtmlTextArea(_AMS_AM_SPOT_TEASER, 'teaser', $this->getVar('teaser', 'e'));

        $maxlength_text = new XoopsFormText(_AMS_AM_SPOT_MAXLENGTH, 'maxlength', 10, 10, $this->getVar('maxlength'));

        $display_select = new XoopsFormRadioYN(_AMS_AM_SPOT_DISPLAY, 'display', $this->getVar('display'));

        $weight_text = new XoopsFormText(_AMS_AM_SPOT_WEIGHT, 'weight', 10, 10, $this->getVar('weight'));

        $form->addElement($mode_tray);
        $form->addElement($topic_select);
        $form->addElement($article_select);

        $form->addElement($showimage_select);
        $form->addElement($image_select);
        $form->addElement($autoteaser_select);
        $form->addElement($maxlength_text);
        $form->addElement($teaser_text);
        $form->addElement($display_select);
        $form->addElement($weight_text);
        $form->addElement(new XoopsFormHidden('op', 'save'));
        $form->addElement(new XoopsFormButton('', 'spotlightsubmit', _AMS_AM_SUBMIT, 'submit'));

        return $form;
    }

    function getImage($article) {
        $myts =& MyTextSanitizer::getInstance();
        if ($this->getVar('mode') == 4) {
            if ($this->getVar('image') == "") {
                return "";
            }
            $this->setVar('showimage', 0);
        }
        if (!is_object($article)) {
            return "";
        }
        switch ($this->getVar('showimage')) {
            case 0:
                return $myts->displayTarea($this->getVar('image', 'n'));
               
            case 1:
                return $article->imglink(false);
                
            case 2:
                return $article->imglink(true);
                
            case 3:
                return "";
        }
        return "";
    }
}

class AmsSpotlightHandler extends IdgObjectHandler {
    function AmsSpotlightHandler(&$db) {
        $this->IdgObjectHandler($db, 'ams_spotlight', 'AmsSpotlight', 'spotlightid');
    }
    
    function getSpotlightBlock($display_only = true) {
        $myts =& MyTextSanitizer::getInstance();
        include_once XOOPS_ROOT_PATH."/modules/AMS/class/class.newsstory.php";
        $block = array();
    
        if ($display_only) {
            $criteria = new Criteria('display', 1);
        }
        else {
            $criteria = new Criteria('spotlightid', 0, ">");
        }
        $criteria->setSort('weight');
        $spots =& $this->getObjects($criteria);
        if (count($spots) == 0) {
            return $block;
        }
        $ids = array();
        foreach (array_keys($spots) as $i) {
            switch ($spots[$i]->getVar('mode')) {
                // Latest Article
                case 1:
                    $article_arr = AmsStory::getAllPublished(1, 0, false, 0, 1, true, 'published', $ids);
                    $article =& $article_arr[0];
                    if (!is_object($article)) {
                        continue;
                    }
                    $ids[$article->storyid()] = $article->storyid();
                    $uids[] = $article->uid();
                    break;
                    
                // Latest Article in Topic
                case 2:
                    $article_arr = AmsStory::getAllPublished(1, 0, false, $spots[$i]->getVar('topicid'), 1, true, 'published', $ids);
                    $article =& $article_arr[0];
                    if (!is_object($article)) {
                        continue;
                    }
                    $ids[$article->storyid()] = $article->storyid();
                    $uids[] = $article->uid();
                    break;
                    
                // Specific Article
                case 3:
                    $article = new AmsStory($spots[$i]->getVar('storyid'));
                    if (!is_object($article)) {
                        continue;
                    }
                    $ids[$article->storyid()] = $article->storyid();
                    $uids[] = $article->uid();
                    break;
                    
                case 4:
                    $article = "";
            }
            $spotarticles[] = $article;
        }
        $member_handler =& xoops_gethandler('member');
        $users = $member_handler->getUsers(new Criteria('uid', "(".implode(',', array_unique($uids)).")", 'IN'), true);
        foreach (array_keys($spotarticles) as $i) {
            $article =& $spotarticles[$i];
            $image = $spots[$i]->getImage($article);
            if (is_object($article)) {
                $article->uname($users);
                
                $teaser = $article->hometext(); //$spots[$i]->getVar('autoteaser') != 1 ? $myts->displayTarea($spots[$i]->getVar('teaser', 'n'), 1) : ($spots[$i]->getVar('maxlength') > 0 ? xoops_substr($article->hometext(), 0, $spots[$i]->getVar('maxlength'), "") : $article->hometext());
                $id = $article->storyid();
                $title = $article->title();
                $hits = $article->counter();
                $poster = $article->uname;
                $posterid = $article->uid();
                $posttime = formatTimestamp($article->published());
                $custom = 0;
				$friendlyurl_enable = $article->friendlyurl_enable;
				$friendlyurl = $article->friendlyurl;
            }
            else {
                $id = 0;
                $title = "";
                $hits = 0;
                $custom = 1;
                $posterid = 0;
                $posttime = "";
                $poster = "";
                $teaser = $myts->displayTarea($spots[$i]->getVar('teaser', 'n'), 1);
            }
            $block['spotlights'][] = array('spotid' => $spots[$i]->getVar('spotlightid'), 'id' => $id, 'title' => $title, 'hits' => $hits, 'image' => $image, 'text' => $teaser, 'weight' => $spots[$i]->getVar('weight'), 'display' => $spots[$i]->getVar('display'), 'posttime' => $posttime, 'poster' => $poster, 'posterid' => $posterid, 'autoteaser' => $spots[$i]->getVar('autoteaser'), 'custom' => $custom, 'friendlyurl_enable' => $friendlyurl_enable, 'friendlyurl' => $friendlyurl);
        }
        $block['ids'] = $ids;
        return $block;
    }
}
?>