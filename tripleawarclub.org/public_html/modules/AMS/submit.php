<?php
// $Id: submit.php,v 1.13 2004/05/29 15:10:18 mithyt2 Exp $
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

include_once '../../mainfile.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->getVar('dirname').'/class/class.newsstory.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->getVar('dirname').'/class/class.sfiles.php';
include_once XOOPS_ROOT_PATH.'/class/uploader.php';

$xoopsConfig['module_cache'][$xoopsModule->getVar('mid')] = 0;
include_once XOOPS_ROOT_PATH.'/header.php';
if (file_exists(XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->getVar('dirname').'/language/'.$xoopsConfig['language'].'/admin.php')) {
    include_once 'language/'.$xoopsConfig['language'].'/admin.php';
}
else {
    include_once 'language/english/admin.php';
}
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->getVar('dirname').'/include/functions.inc.php';
$module_id = $xoopsModule->getVar('mid');
$groups = $xoopsUser ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;

$gperm_handler =& xoops_gethandler('groupperm');
$perm_itemid = isset($_POST['topic_id']) ? intval($_POST['topic_id']) : 0;

//If no access
if (!$gperm_handler->checkRight("ams_submit", $perm_itemid, $groups, $module_id)) {
    redirect_header(XOOPS_URL.'/modules/AMS/index.php', 3, _NOPERM);
}

$op = 'form';
$myts =& MyTextSanitizer::getInstance();

//If approve privileges
$approveprivilege = 0;
if ($xoopsUser && $gperm_handler->checkRight("ams_approve", $perm_itemid, $groups, $module_id)) {
    $approveprivilege = 1;
}

if (isset($_REQUEST['hometext'] ))
{
	$hometext = $myts->stripSlashesGPC($_REQUEST['hometext']);
}

if (isset($_REQUEST['bodytext'] ))
{
	$bodytext = $myts->stripSlashesGPC($_REQUEST['bodytext']);
}

if (isset($_REQUEST['storyid'] ))
{
	$storyid = intval($_REQUEST['storyid']);
}
		
if ( isset($_REQUEST['preview'] ))
{
	$op = 'preview';
}elseif ( isset($_REQUEST['post']))
{
	$op = 'post';
}elseif ( (isset($_REQUEST['op']) ) && (isset($_REQUEST['storyid'])))
{
    if ($approveprivilege && (($_REQUEST['op']  == 'edit') ))
	{
        $op = 'edit';
    }
    elseif ($approveprivilege && (($_REQUEST['op'] == 'delete') ))
	{
        $op = 'delete';
    }elseif ($approveprivilege && (($_REQUEST['op'] == _AMS_NW_OVERRIDE) ))
	{
		$op = _AMS_NW_OVERRIDE;
    }elseif ($approveprivilege && (($_REQUEST['op'] == _AMS_NW_FINDVERSION) ))
	{
		$op = _AMS_NW_FINDVERSION;
    }elseif ($approveprivilege && (($_REQUEST['op'] == 'override_ok') ))
	{
		$op = 'override_ok';
    }else
	{
        redirect_header(XOOPS_URL."/modules/AMS/index.php", 0, _NOPERM);
        exit();
    }
	if (isset($_REQUEST['storyid']))
	{
		$storyid = intval($_REQUEST['storyid']);
	}
}

switch ($op) {
    case "delete":

        if ( !empty( $_POST['ok'] ) )
        {
            if ( empty( $_POST['storyid'] ) )
            {
                redirect_header( XOOPS_URL.'/modules/AMS/index.php?op=newarticle', 2, _AMS_AM_EMPTYNODELETE );
                exit();
            }
            $storyid = intval($_POST['storyid']);
            $story = new AmsStory( $storyid );
            $story -> delete();
			$sfiles = new sFiles();	
			$filesarr=Array();
			$filesarr=$sfiles->getAllbyStory($storyid);
			if(count($filesarr)>0) 
			{
				foreach ($filesarr as $onefile) 
				{
					$onefile->delete();				
				}
			}            
            xoops_comment_delete( $xoopsModule -> getVar( 'mid' ), $storyid );
            xoops_notification_deletebyitem( $xoopsModule -> getVar( 'mid' ), 'story', $storyid );
            redirect_header( XOOPS_URL.'/modules/AMS/index.php?op=newarticle', 1, _AMS_AM_DBUPDATED );
            exit();
        }
        else
        {

			//include_once '../../include/cp_header.php';
            //xoops_cp_header();
            echo "<h4>" . _AMS_AM_CONFIG . "</h4>";
            xoops_confirm( array( 'op' => 'delete', 'storyid' => $_REQUEST['storyid'], 'ok' => 1 ), 'submit.php', _AMS_AM_RUSUREDEL );
        }
        break;
        
    case 'edit':
        if (!$approveprivilege) {
            redirect_header(XOOPS_URL.'/modules/AMS/index.php', 0, _NOPERM);
            break;
        }
        $storyid = $_REQUEST['storyid'];
        $story = new AmsStory( $storyid );
        
        echo $story->getPath(true)." > "._EDIT." ".$story->title();
        
        echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";
        echo "<h4>" . _AMS_AM_EDITARTICLE . "</h4>";
        
        if ($story->published() > 0) {
            $story->setApproved(1);
        }
        else {
            $story->setApproved(0);
        }
        $edit = true;
		$type = $story -> type();
        $story->uname();
        $author = $story->uname;
        include "include/storyform.inc.php";
        echo"</td></tr></table>";
        break;

case "preview":
	$xt = new AmsTopic($xoopsDB->prefix("ams_topics"), $_POST['topic_id']);
	//$hometext = $_POST['hometext'];
	//$bodytext = $_POST['bodytext'];

	if ( isset( $_POST['storyid'] ) ) {
	    $story = new AmsStory( $storyid );
	    $edit = true;
	}
	else {
	    $story = new AmsStory();
	    $story->setPublished(0);
	    $story->setExpired(0);
	    $edit = false;
	}
	$story->setTopicId($_POST['topic_id']);
	$story->setTitle($_POST['title']);
	$story->setHometext($hometext);
	$story->setBodytext($bodytext);
	$story->banner = isset($_POST['banner']) ? $_POST['banner'] : 0;
	if ($approveprivilege) {
	    $story->setTopicdisplay($_POST['topicdisplay']);
	    $story->setTopicalign($_POST['topicalign']);
	    $story->audienceid = $_POST['audience'];
	}
	else {
	    $noname = isset($_POST['noname']) ? intval($_POST['noname']) : 0;
	}
	$notifypub = isset($_POST['notifypub']) ? intval($_POST['notifypub']) : 0;
	$story->setNotifyPub($notifypub);

	if ( isset( $_POST['nosmiley'] ) && ( $_POST['nosmiley'] == 0 || $_POST['nosmiley'] == 1 ) ) {
	    $story -> setNosmiley( $_POST['nosmiley'] );
	}
	else {
	    $story->setNosmiley(0);
	}
	if ($approveprivilege) {
		$change = isset($_POST['change']) ? $_POST['change'] : 0;
	    $story->setChange($change);
	    $nohtml = isset($_POST['nohtml']) ? intval($_POST['nohtml']) : 0;
		$story->setNohtml($nohtml);
		if (!isset($_POST['approve'])) {
		    $story->setApproved(0);
		}
		else {
		    $story->setApproved($_POST['approve']);
		}
	} else {
		$story->setNohtml = 1;
	}
	//Display breadcrumbs
	if ($edit) {
	    echo $story->getPath(true)." > "._EDIT." ".$story->title();
	}
	
	//Display post preview
	$p_title = $story->title("Preview");
	$p_hometext = $story->hometext("Preview");
	$p_hometext .= "<br />".$story->bodytext("Preview");
	$topversion = ($story->revision == 0 && $story->revisionminor == 0) ? 1 : 0;
	$topicalign = isset($story->topicalign) ? 'align="'.$story->topicalign().'"' : "";
	$p_hometext = (($xt->topic_imgurl() != '') && $story->topicdisplay()) ? '<img src="images/topics/'.$xt->topic_imgurl().'" '.$story->topicalign().' alt="" />'.$p_hometext : $p_hometext;
	
	//Added  in AMS 2.50 Final. replace deprecated themecenterposts function
	if(file_exists(XOOPS_ROOT_PATH."/Frameworks/xoops22/class/xoopsformloader.php"))
	{
		if(!@include_once XOOPS_ROOT_PATH."/Frameworks/xoops22/class/xoopsformloader.php"){
			include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
		}
	}else
	{
		include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
	}	
	$pform = new XoopsThemeForm($p_title, "previewform", XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname').'/submit.php');
	$pform->display();
	print "$p_hometext";
	
	$story->uname();
	$author = $story->uname;
	
	//Display post edit form
	include 'include/storyform.inc.php';
	break;

case "post":
	//$hometext = $_POST['hometext'];
	//$bodytext = $_POST['bodytext'];
	$nohtml_db = 1;
	if ( is_object($xoopsUser) ) {
		$uid = $xoopsUser->getVar('uid');
		if ( $approveprivilege ) {
		    $nohtml_db = empty($_POST['nohtml']) ? 0 : 1;
		}
	} else {
	    $uid = 0;
	}
	if ( empty( $_POST['storyid'] ) ) {
	    $story = new AmsStory();
	    $oldapprove = 0;
	    $story -> setUid( $uid );
	}
	else {
	
	    $story = new AmsStory( $_POST['storyid'] );
	    $oldapprove = $story->published() > 0 ? 1 : 0;

	    $change = isset($_POST['change']) ? $_POST['change'] : 0;
		//If change = auto
		if ($change == 4)
		{

			if ( ($hometext!= $story->hometext) ||
			($bodytext!=$story->bodytext) ||
			($_POST['newauthor'] && $approveprivilege))
			{
				$change=3;
			}else
			{
				$change=0;
			}
			
		}	
        $story->setChange($change);
        if ($_POST['newauthor'] && $approveprivilege) {
            $story->setUid($uid);
        }
	}
	$story->banner = isset($_POST['banner']) ? $_POST['banner'] : 0;
	$story->setTitle($_POST['title']);

	$story->setHometext($hometext);
	if ($bodytext) {
	    $story->setBodytext($bodytext);
	}
	else {
	    $story->setBodytext(' ');
	}
	$story->setTopicId($_POST['topic_id']);
	$story->setHostname(xoops_getenv('REMOTE_ADDR'));
	$story->setNohtml($nohtml_db);
	$nosmiley = isset($_POST['nosmiley']) ? intval($_POST['nosmiley']) : 0;
	$notifypub = isset($_POST['notifypub']) ? intval($_POST['notifypub']) : 0;
	$story->setNosmiley($nosmiley);
	$story->setNotifyPub($notifypub);
	$story->setType($_POST['type']);
	// Set audience id to default
	$story->audienceid = intval(1);
	if ($approveprivilege) {
	    $approve = isset($_POST['approve']) ? $_POST['approve'] : 0;
	    if ( !empty( $_POST['autodate'] )) {
	        $pubdate = strtotime($_POST['publish_date']['date']) + $_POST['publish_date']['time'];
	        $offset = $xoopsUser -> timezone() - $xoopsConfig['server_TZ'];
	        $pubdate = $pubdate - ( $offset * 3600 );
            if ($pubdate-time() > 0 && $pubdate-time() < 600) //fix bug article missing for 10 minute after republish
            {
               $pubdate=$pubdate-601; //set publish date backward 10 minute 
            }

	        $story -> setPublished( $pubdate );
	    }else
		{
	        $story->setPublished(time());					
		}
	    if ( !empty( $_POST['autoexpdate'] )) {
	        $expiry_date = strtotime($_POST['expiry_date']['date']) + $_POST['expiry_date']['time'];
	        $offset = $xoopsUser -> timezone() - $xoopsConfig['server_TZ'];
	        $expiry_date = $expiry_date - ( $offset * 3600 );
	        $story -> setExpired( $expiry_date );
	    }else
		{
	        $story->setExpired(0);
		}
		
	    $story->setTopicdisplay($_POST['topicdisplay']);
	    $story->setTopicalign($_POST['topicalign']);
	    $story->setIhome($_POST['ihome']);
		
	    if(!$approve) {
	    	$story->setPublished(0);
	    }
		
		if($story->published() >= $story->expired())
		{
			$story->setExpired(0);
		}
		
	    $story->audienceid = intval($_POST['audience']);
	}
    elseif ( $xoopsModuleConfig['autoapprove'] == 1 && !$approveprivilege) {
		$approve = 1;
    	$story->setPublished(time());
    	$story->setExpired(0);
		$story->setTopicalign('R');
	}
	else {
	    $story->setPublished(0);
	    $approve = 0;
	    $story -> setExpired( 0 );
	}
	$story->setApproved($approve);
	$result = $story->store();

	if ($result) {
	    // Notification
	    $notification_handler =& xoops_gethandler('notification');
	    $tags = array();
	    $tags['STORY_NAME'] = $story->title();
	    $tags['STORY_URL'] = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/article.php?storyid=' . $story->storyid();
	    if ( $approve == 1 && $oldapprove == 0 && $story->published <= time()) {
	        $notification_handler->triggerEvent('global', 0, 'new_story', $tags);
	    } elseif ($approve != 1) {
	        $tags['WAITINGSTORIES_URL'] = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/submit.php?op=edit&amp;storyid='.$story->storyid();
	        $notification_handler->triggerEvent('global', 0, 'story_submit', $tags);

	        // If notify checkbox is set, add subscription for approve
	        if ($notifypub) {
	            include_once XOOPS_ROOT_PATH . '/include/notification_constants.php';
	            $notification_handler->subscribe('story', $story->storyid(), 'approve', XOOPS_NOTIFICATION_MODE_SENDONCETHENDELETE);
	        }
	    }
	    
	    // Manage upload(s)
	    if(isset($_POST['delupload']) && count($_POST['delupload'])>0 )
	    {
	        foreach ($_POST['delupload'] as $onefile)
	        {
	            $sfiles = new sFiles($onefile);
	            $sfiles->delete();
	        }
	    }
	    
	    if(isset($_POST['xoops_upload_file'])&& isset($_FILES[$_POST['xoops_upload_file'][0]]))
	    {
	        $fldname = $_FILES[$_POST['xoops_upload_file'][0]];
	        $fldname = (get_magic_quotes_gpc()) ? stripslashes($fldname['name']) : $fldname['name'];
	        if(trim($fldname!=''))
	        {
	            $sfiles = new sFiles();
	            $destname=$sfiles->createUploadName(XOOPS_UPLOAD_PATH,$fldname);
	            // Actually : Web pictures (png, gif, jpeg), zip, doc, xls, pdf, gtar, tar, txt, tiff, htm, xml, ico,swf flv, mp3, bmp, ra, mov, swc. swf not allow by xoops, not AMS
	            $permittedtypes=explode(";",ams_getmoduleoption('mimetypes'));
	            $uploader = new XoopsMediaUploader( XOOPS_UPLOAD_PATH, $permittedtypes, $xoopsModuleConfig['maxuploadsize']);
	            $uploader->setTargetFileName($destname);
	            if ($uploader->fetchMedia($_POST['xoops_upload_file'][0]))
	            {
	                if ($uploader->upload())
	                {
	                    $sfiles->setFileRealName($uploader->getMediaName());
	                    $sfiles->setStoryid($story->storyid());
	                    $sfiles->setMimetype($sfiles->giveMimetype(XOOPS_UPLOAD_PATH.'/'.$uploader->getMediaName()));
	                    $sfiles->setDownloadname($destname);
	                    if(!$sfiles->store())
	                    {
	                        //echo _AMS_AM_UPLOAD_DBERROR_SAVE;
							echo $uploader->getErrors(); //Better error message
	                    }
	                }
	                else
	                {
	                    //echo _AMS_AM_UPLOAD_ERROR;
						echo $uploader->getErrors(); //Better error message
	                }
	            } else {
				
					if (!$_FILES[$fldname]['tmp_name'])
					{
						
						echo $uploader->getErrors();
						echo "Or file size too big"; //Add additional comment since the original error message not so accurate. TODO : add this into language
					}else
					{
						echo $uploader->getErrors();
					}
	            }
	        }
	    }
	}
	else {
	    if ($story->versionConflict == true) {
	        include ('include/versionconflict.inc.php');
	        break;
	    }
	    else {
	        $message = $story->renderErrors();
	    }
	}
	if (!isset($message)) {
	    $message = _AMS_NW_THANKS;
	}
	redirect_header(XOOPS_URL."/modules/AMS/index.php",2, $message);
	break;
	
	case _AMS_NW_OVERRIDE:
	   if (!$approveprivilege || !$xoopsUser) {
	       redirect_header(XOOPS_URL.'/modules/AMS/index.php', 3, _NOPERM);
	   }
		$change = isset($_POST['change']) ? $_POST['change'] : 0;
	   $hiddens = array('bodytext' => $bodytext, 
	                    'hometext' => $hometext,
	                    'storyid' => $storyid,
	                    'change' => $change,
	                    'op' => 'override_ok');
	   $story = new AmsStory($storyid);
		$story->setChange($change);
	   
	   $message = "";
	   $story->calculateVersion();
	   $message .= _AMS_NW_TRYINGTOSAVE." ".$story->version.".".$story->revision.".".$story->revisionminor." <br />";
	   $higher_versions = $story->getVersions(true);
	   if (count($higher_versions) > 0) {
	       $message .= sprintf(_AMS_NW_VERSIONSEXIST, count($higher_versions));
	       $message .= "<br />";
	       foreach ($higher_versions as $key => $version) {
	           $message .= $version['version'].".".$version['revision'].".".$version['revisionminor']."<br />";
	       }
	   }
	   $message .= _AMS_NW_AREYOUSUREOVERRIDE;
	   xoops_confirm($hiddens, 'submit.php', $message, _YES);
	   break;
	
	case 'override_ok':
	   if (!$approveprivilege || !$xoopsUser) {
	       redirect_header(XOOPS_URL.'/modules/AMS/index.php', 3, _NOPERM);
	   }
	   $story = new AmsStory($_POST['storyid']);
		$change = isset($_POST['change']) ? $_POST['change'] : 0;
	    $story->setChange($change);   
	   $story->setUid($xoopsUser->getVar('uid'));
	   $story->setHometext($hometext);
	   $story->setBodytext($bodytext);
	   $story->calculateVersion();
	   if ($story->overrideVersion()) {
	       $message = sprintf(_AMS_NW_VERSIONUPDATED, $story->version.".".$story->revision.".".$story->revisionminor);
	   }
	   else {
	       $message = $story->renderErrors();
	   }
	   redirect_header(XOOPS_URL.'/modules/AMS/article.php?storyid='.$story->storyid, 3, $message);
	   break;
	   
	   
	case _AMS_NW_FINDVERSION:
	   if (!$approveprivilege || !$xoopsUser) {
	       redirect_header(XOOPS_URL.'/modules/AMS/index.php', 3, _NOPERM);
	       exit();
	   }
	   $story = new AmsStory($_POST['storyid']);
	   $story->setUid($xoopsUser->getVar('uid'));
	   $story->setHometext($hometext);
	   $story->setBodytext($bodytext);
	   
		$change = isset($_POST['change']) ? $_POST['change'] : 0;
	    $story->setChange($change);
	   if ($story->calculateVersion(true)) {
	       if ($story->updateVersion()) {
	           $message = sprintf(_AMS_NW_VERSIONUPDATED, $story->version.".".$story->revision.".".$story->revisionminor);
	           //redirect_header('article.php?storyid='.$story->storyid(), 3, $message);
	           //exit();
	       }
	       else {
	           $message = $story->renderErrors();
	       }
	   }
	   else {
	       $message = $story->renderErrors();
	   }
	   redirect_header(XOOPS_URL.'/modules/AMS/article.php?storyid='.$story->storyid(), 3, $message);
	   break;

    case 'form':
    default:
        $story = new AmsStory();
    	$story->setTitle('');
    	$story->setHometext('');
    	$noname = 0;
    	$story->setNohtml(0);
    	$story->setNosmiley(0);
    	$story->setNotifypub(1);
    	$story->setTopicId(0);
    	if ($approveprivilege) {
    	    $story->setTopicdisplay(0);
    	    $story->setTopicalign('R');
    	    $story->setIhome(0);
    	    $story->setBodytext('');
    	    $story->setApproved(1);
    	    $story->set = '';
    	    $expired = 0;
    	    $published = 0;
    	    $audience = 0;
    	}
    	$banner = "";
    	$edit = false;
    	include 'include/storyform.inc.php';
    	break;
}
include XOOPS_ROOT_PATH.'/footer.php';
?>
