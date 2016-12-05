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

$xoopsOption['pagetype'] = "search";
include "../../mainfile.php";
if (file_exists(XOOPS_ROOT_PATH.'/modules/AMS/language/'.$xoopsConfig['language'].'/main.php')) {
    include_once XOOPS_ROOT_PATH.'/modules/AMS/language/'.$xoopsConfig['language'].'/main.php';
} else {
    include_once XOOPS_ROOT_PATH.'/modules/AMS/language/english/main.php';
}
if (!$xoopsUser) {
    redirect_header(XOOPS_URL.'/modules/AMS/index.php', 3, _NOPERM);
}
include_once XOOPS_ROOT_PATH.'/modules/AMS/class/class.newsstory.php';
$storyid = (isset($_POST['storyid'])) ? intval($_POST['storyid']) : (isset($_GET['storyid']) ? intval($_GET['storyid']) : 0);
if (!$storyid) {
    redirect_header(XOOPS_URL."/modules/AMS/index.php",2,_AMS_NW_NOSTORY);
    exit();
}
$article = new AmsStory($storyid);
if ($xoopsUser->getVar('uid') != $article->uid()) {
    $gperm_handler =& xoops_gethandler('groupperm');
    $groups = $xoopsUser->getGroups();
    if (!$gperm_handler->checkRight("ams_approve", $article->topicid(), $groups, $xoopsModule->getVar('mid'))) {
        redirect_header(XOOPS_URL.'/modules/AMS/index.php', 3, _NOPERM);
        exit();
    }
}

$op = (isset($_POST['op'])) ? $_POST['op'] : "default";
$myts =& MyTextSanitizer::getInstance();

$xoopsConfigSearch =& $config_handler->getConfigsByCat(XOOPS_CONF_SEARCH);
$xoopsConfig['module_cache'][$xoopsModule->getVar('mid')] = 0; // disable caching
$xoopsOption['template_main'] = 'ams_searchform.html';
include_once XOOPS_ROOT_PATH.'/header.php';

$username = (isset($_POST['username']) && $_POST['username'] != "") ? $_POST['username'] : '';
$username = $myts->addSlashes($username);
$queries = array();
$andor = isset($_POST['andor']) ? $_POST['andor'] : "AND";

switch($op) {
    case 'default':
    default:
    break;
    
    case 'results':
    $results = array();
    if ( $andor != "exact" ) {
        $ignored_queries = array(); // holds kewords that are shorter than allowed minmum length
        $temp_queries = preg_split('/[\s,]+/', $_POST['query']);
        foreach ($temp_queries as $q) {
            $q = trim($q);
            if (strlen($q) >= $xoopsConfigSearch['keyword_min']) {
                $queries[] = $myts->addSlashes($q);
            } else {
                $ignored_queries[] = $myts->addSlashes($q);
            }
        }
    }
    else {
        $query = trim($_POST['query']);
        if (strlen($query) < $xoopsConfigSearch['keyword_min']) {
            //query string too short
        }
        $queries = array($myts->addSlashes($query));
    }
    $module_handler =& xoops_gethandler('module');
    if ($username != "") {
        $member_handler =& xoops_gethandler('member');
        $criteria = new Criteria('uname', '%'.$username.'%', 'LIKE');
        $users = $member_handler->getUserList($criteria);
    }
    else {
        $users = 0;
    }
    foreach ($_POST['mids'] as $mid) {
        $thismodule =& $module_handler->get($mid);
        if ($users == 0) {
            $thisresult = $thismodule->search($queries, $andor, 10, 0, 0, $article->storyid());
            if (count($thisresult) > 0) {
                foreach ($thisresult as $key => $searchresult) {
                    if ($mid == $xoopsModule->getVar('mid')) {
                        if (isset($searchresult['id']) && ($searchresult['id'] == $storyid)) {
                            unset($thisresult[$key]);
                            continue;
                        }
                    }
                    $thisresult[$key]['title'] = $myts->htmlSpecialChars($searchresult['title']);
                }
                $results[$mid]['results'][0] = $thisresult;
            }
        }
        else {
            foreach ($users as $userid => $username) {
                $thisresult = $thismodule->search($queries, $andor, 10, 0, $userid, $article->storyid());
                if (count($thisresult) > 0) {
                    foreach ($thisresult as $key => $searchresult) {
                        if ($mid == $xoopsModule->getVar('mid')) {                        
                            if (isset($searchresult['id']) && ($searchresult['id'] == $storyid)) {
                                unset($thisresult[$key]);
                                continue;
                            }
                        }
                        $thisresult[$key]['title'] = $myts->htmlSpecialChars($searchresult['title']);
                    }
                    $results[$mid]['results'][$userid] = $thisresult;
                }
            }
        }
        if (isset($results[$mid]) && !isset($results[$mid]['modulename'])) {
            $results[$mid]['modulename'] = $thismodule->name();
            $results[$mid]['dirname'] = $thismodule->dirname();
            $results[$mid]['moduleid'] = $thismodule->mid();
        }
    }
    if (count($results) > 0) {
        $xoopsTpl->assign('results', $results);
    }
    else {
        $xoopsTpl->assign('message', _SR_NOMATCH);
    }
    break;
    
    case 'addexternallink':
        if ((isset($_POST['url']) && $_POST['url'] != "") && (isset($_POST['title']) && $_POST['title'] != "")) {
            if (!$article->addLink(-1, $_POST['url'], $myts->addSlashes($_POST['title']), $_POST['position'])) {
                $xoopsTpl->assign('message', $article->renderErrors());
            }
        }
    break;
    
    case 'addlink':
    if (isset($_POST['linkids'])) {
        $linkids = $_POST['linkids'];
        $modules = $_POST['modules'];
        $links = $_POST['links'];
        $titles = $_POST['titles'];
    }
    else {
        $linkids = array();
        $xoopsTpl->assign('message', 'No Link Selected');
    }
    if (count($linkids) > 0) {
        $errors = 0;
        foreach ($linkids as $key => $link) {
            if (!$article->addLink($modules[$key], $links[$key], $titles[$key], $_POST['position'])) {
                $errors = 1;
            }
        }
        if ($errors == 1) {
            $xoopsTpl->assign('message', $article->renderErrors());
        }
    }
    break;
    
    case 'dellink':
    if (isset($_POST['linkids'])) {
        $errors = 0;
        foreach ($_POST['linkids'] as $linkid) {
            if (!$article->deleteLink($linkid)) {
                $errors = 1;
            }
        }
        if ($errors == 1) {
            $xoopsTpl->assign('message', $article->renderErrors());
        }
    }
    else {
        $xoopsTpl->assign('message', "No link selected");
    }
    break;
}
$existing_links = $article->getLinks();
include 'include/searchform.php';
$search_form->assign($xoopsTpl);
if (count($existing_links)>0) {
    $xoopsTpl->assign('related', $existing_links);
}
$xoopsTpl->assign('breadcrumb', $article->getPath(true)." > "._AMS_NW_MANAGELINK);
$xoopsTpl->assign('story', $article->toArray());
$xoopsTpl->assign('lang_on', _ON);
$xoopsTpl->assign('lang_postedby', _POSTEDBY);
$xoopsTpl->assign('lang_reads', _READS);
$xoopsTpl->assign('xoops_pagetitle', $myts->htmlSpecialChars($xoopsModule->name()) . ' - ' . $myts->htmlSpecialChars($article->title()));
include XOOPS_ROOT_PATH.'/footer.php';
?>