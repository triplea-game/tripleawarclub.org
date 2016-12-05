<?php
// $Id: news_top.php,v 1.13 2004/06/27 08:08:11 mithyt2 Exp $
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

function b_ams_top_show($options) {
    $myts =& MyTextSanitizer::getInstance();
    include_once XOOPS_ROOT_PATH."/modules/AMS/class/class.newsstory.php";
    $block = array();
    if ( !isset($options[4]) || $options[4] == 0 || $options[4] == array(0)) {
        $stories = AmsStory::getAllPublished($options[1],0,false,0,1, true, $options[0]);
    }
    else {
        // If using Xoops 2.0.9.1 way of saving array values
        if (is_array($options[4])) {
            $topics = $options[4];
        }
        else {
            $topics = array_slice($options, 4);
        }
        $stories = AmsStory::getAllPublished($options[1],0,false,$topics, 1, true, $options[0]);
    }
    foreach ( $stories as $key => $story ) {
        switch ($options[0]) {
            case "rating":
                $stat = $story->rating;
                break;
                
            case "counter":
                $stat = $story->counter();
                break;
                
            case "published":
                $stat = formatTimestamp($story->published(), "s");
                break;
        }
        $news = array();
        $title = $story->title();
		if (strlen($title) >= $options[2]) {
			$title = xoops_substr($title,0,($options[2]-1));
		}
		$html = $story->nohtml ? 0 : 1;
		$news['title'] = $title;
		$news['id'] = $story->storyid();
		$news['date'] = formatTimestamp($story->published(),"s");
		$news['hits'] = $stat;
		$news['friendlyurl'] = $story->friendlyurl;
		$news['friendlyurl_enable'] = $story->friendlyurl_enable;
		if ($options[3] > 0) {
		    $news['teaser'] = xoops_substr($myts->displayTarea($story->hometext, $html), 0, $options[3]-1);
		}
		else {
		    $news['teaser'] = "";
		}
		$block['stories'][] = $news;
    }
    return $block;
}

function b_ams_top_edit($options) {
    global $xoopsDB;
    include_once (XOOPS_ROOT_PATH."/class/xoopsformloader.php");
    $form = new XoopsFormElementTray('', '<br/><br />');
    
    $order_select = new XoopsFormSelect(_AMS_MB_NEWS_ORDER, 'options[0]', $options[0]);
    $order_select->addOption('published', _AMS_MB_NEWS_DATE);
    $order_select->addOption('counter', _AMS_MB_NEWS_HITS);
    $order_select->addOption('rating', _AMS_MB_NEWS_RATING);
    $form->addElement($order_select);
    
    $form->addElement(new XoopsFormText(_AMS_MB_NEWS_DISP." x "._AMS_MB_NEWS_ARTCLS, 'options[1]', 10, 10, $options[1]));
    
    $form->addElement(new XoopsFormText(_AMS_MB_NEWS_CHARS." x "._AMS_MB_NEWS_LENGTH, 'options[2]', 10, 10, $options[2]));

    $form->addElement(new XoopsFormText(_AMS_MB_NEWS_TEASER, 'options[3]', 10, 10, $options[3]));
    
    if (!isset($options[4])) {
        $topics = array(0);
    }
    // If using Xoops 2.0.9.1 way of saving array values
    elseif (is_array($options[4])) {
        $topics = $options[4];
    }
    else {
        $topics = array_slice($options, 4);
    }
    
    $topics_select = new XoopsFormSelect(_AMS_MB_TOPIC, 'options[4]', $topics, 7, true);
    
    include_once XOOPS_ROOT_PATH."/modules/AMS/class/class.newstopic.php";
    $xt = new AmsTopic($xoopsDB->prefix("ams_topics"));
    $alltopics = $xt->getAllTopics();
    $topics_select->addOption(0, _AMS_MB_NEWS_ALLTOPICS);
    
    foreach ($alltopics as $topicid => $topic) {
        $topics_select->addOption($topicid, $topic->topic_title());
    }
    $form->addElement($topics_select);

    return $form->render();
}
?>