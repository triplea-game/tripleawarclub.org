<?php
// $Id: storyform.inc.php,v 1.10 2004/05/29 15:10:17 mithyt2 Exp $
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
if (file_exists(XOOPS_ROOT_PATH.'/language/'.$xoopsConfig['language'].'/calendar.php')) {
	include_once XOOPS_ROOT_PATH.'/language/'.$xoopsConfig['language'].'/calendar.php';
} else {
	include_once XOOPS_ROOT_PATH.'/language/english/calendar.php';
}

if (file_exists(XOOPS_ROOT_PATH.'/modules/AMS/language/'.$xoopsConfig['language'].'/main.php')) {
    include_once XOOPS_ROOT_PATH.'/modules/AMS/language/'.$xoopsConfig['language'].'/main.php';
} else {
    include_once XOOPS_ROOT_PATH.'/modules/AMS/language/english/main.php';
}
            
//Added AMS 2.50 for cookies manangement
include_once XOOPS_ROOT_PATH."/modules/".$xoopsModule->getVar("dirname")."/include/vars.inc.php";
include_once XOOPS_ROOT_PATH."/modules/".$xoopsModule->getVar("dirname")."/include/functions.inc.php";
include_once(XOOPS_ROOT_PATH."/class/tree.php");


//Added AMS 2.50. Enable user selection Editor. Modify at AMS 3.0 to correctly detect XOOPS 2.3.x scheme
if($xoopsModuleConfig['editor_userchoice']==TRUE && (file_exists(XOOPS_ROOT_PATH."/Frameworks/xoops22/class/xoopsformloader.php") || file_exists(XOOPS_ROOT_PATH."/class/xoopsform/formselecteditor.php")) )
{
    if(isset($_REQUEST['seditor']))
    {
        $editor= $_REQUEST['seditor'];
    }elseif(isset($_REQUEST['editor']))
    {
        $editor= $_REQUEST['editor'];  //ICMS 1.2 workaround. the way ICM handle formselecteditor is wrong. Remove it if fixed
    }
    if(!empty($editor)){
        AMS_setcookie("cookie_editor",$editor);  
    }elseif(!$editor = AMS_getcookie("cookie_editor")){
        if(empty($editor)){
            $editor =$xoopsModuleConfig['editor'];   
        }
    }
    $editor_select=@ $xoopsModuleConfig['editor_choice'];

}else
{                   
    $editor=$xoopsModuleConfig['editor'];
}
//print $xoopsModuleConfig['editor'].'-'.$editor.'-'.$xoopsModuleConfig['editor'];exit;

//Added AMS 2.52. Fix famous BLANK page at submit form
$wysiwyg_is_exist=0;
//Include xoopsformloader using CBB Way if framework installed
if(file_exists(XOOPS_ROOT_PATH."/Frameworks/xoops22/class/xoopsformloader.php") || file_exists(XOOPS_ROOT_PATH."/class/xoopsform/formselecteditor.php") || file_exists(XOOPS_ROOT_PATH."/class/xoopsform/formeditor.php"))
{
    //if phpp/xoopsforge/xoops2.3.x Framework installed. Support multipe wysiwyg editor (FCK, TinyMCE, Koivi etc)
	if(!@include_once XOOPS_ROOT_PATH."/Frameworks/xoops22/class/xoopsformloader.php"){
		include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
	}
    
    //ICMS 1.2 workaround. ICMS bugs not to include  formeditor.php in their xoopsformloader. Remove this when it fixed
    if(!(class_exists('XoopsFormEditor')))
    {
        if(file_exists(XOOPS_ROOT_PATH."/class/xoopsform/formeditor.php"))
        {
            include_once XOOPS_ROOT_PATH."/class/xoopsform/formeditor.php";
        }
    }
    
    $wysiwyg_is_exist=1;
} elseif (file_exists(XOOPS_ROOT_PATH."/class/wysiwyg/formwysiwygtextarea.php") && $editor=='koivi') {
    //if KOIVI installed manually in XOOPS 2.0.x 
    $wysiwyg_is_exist=2;
    include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
    include_once XOOPS_ROOT_PATH."/class/wysiwyg/formwysiwygtextarea.php";
	
	if(file_exists(XOOPS_ROOT_PATH."/class/wysiwyg/language/".$xoopsConfig['language'].".php")) {
		include_once XOOPS_ROOT_PATH."/class/wysiwyg/language/".$xoopsConfig['language'].".php";
	} else {
		include_once XOOPS_ROOT_PATH."/class/wysiwyg/language/english.php";
	}

} elseif (file_exists(XOOPS_ROOT_PATH."/class/xoopseditor/koivi/formwysiwygtextarea.php") && $editor=='koivi') {
    //if XOOPS 2.2.x editor installed. Only KOIVI is supported
    $wysiwyg_is_exist=3;
    include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
    include_once XOOPS_ROOT_PATH."/class/xoopseditor/koivi/formwysiwygtextarea.php";

	if(file_exists(XOOPS_ROOT_PATH."/class/xoopseditor/koivi/language/".$xoopsConfig['language'].".php")) {
		include_once XOOPS_ROOT_PATH."/class/xoopseditor/koivi/language/".$xoopsConfig['language'].".php";
	} else {
		include_once XOOPS_ROOT_PATH."/class/xoopseditor/koivi/language/english.php";
	}
} else {
    // if none of editor installed
    include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
}

$sform = new XoopsThemeForm(_AMS_NW_SUBMITNEWS, "storyform", XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname').'/submit.php');
$sform->setExtra('enctype="multipart/form-data"');
$sform->addElement(new XoopsFormText(_AMS_NW_TITLE, 'title', 50, 80, $story->title('Edit')), true);

//Todo: Change to only display topics, which a user has submit privileges for
if (!isset($xt)) {
    $xt = new AmsTopic($xoopsDB->prefix("ams_topics"));
}
$alltopics = $xt->getAllTopics(true, "ams_submit");
if (count($alltopics) == 0) {
    redirect_header(XOOPS_URL.'/modules/AMS/index.php', 3, _AMS_NW_NOTOPICS);
}
$topic_obj_tree = new XoopsObjectTree($alltopics, 'topic_id', 'topic_pid');
$sform->addElement(new XoopsFormLabel(_AMS_NW_TOPIC, $topic_obj_tree->makeSelBox('topic_id', 'topic_title', '--', $story->topicid())));

//If admin - show admin form
//TODO: Change to "If submit privilege"
if ($approveprivilege) {
    //Show topic image?
    $topic_img = new XoopsFormRadio(_AMS_AM_TOPICDISPLAY, 'topicdisplay', $story->topicdisplay());
    $topic_img->addOption(0, _AMS_AM_NONE);
    $topic_img->addOption(1, _AMS_AM_TOPIC);
    $topic_img->addOption(2, _AMS_AM_AUTHOR);
    $sform->addElement($topic_img);
    //Select image position
    $posselect = new XoopsFormSelect(_AMS_AM_TOPICALIGN, 'topicalign', $story->topicalign());
    $posselect->addOption('R', _AMS_AM_RIGHT);
    $posselect->addOption('L', _AMS_AM_LEFT);
    $sform->addElement($posselect);
    //Publish in home?
    //TODO: Check that pubinhome is 0 = no and 1 = yes (currently vice versa)
    $sform->addElement(new XoopsFormRadioYN(_AMS_AM_PUBINHOME, 'ihome', $story->ihome(), _NO, _YES));
    $audience_handler =& xoops_getmodulehandler('audience', 'AMS');
    $audiences = $audience_handler->getAllAudiences();
    $audience_select = new XoopsFormSelect(_AMS_NW_AUDIENCE, 'audience', $story->audienceid);
    if (is_array($audiences) && count($audiences) > 0) {
        foreach ($audiences as $aid => $audience) {
            $audience_select->addOption($aid, $audience->getVar('audience'));
        }
    }
    $sform->addElement($audience_select);
}

$myts =& MyTextSanitizer::getInstance();
/*
if(file_exists(XOOPS_ROOT_PATH."/modules/".$xoopsModule->getVar("dirname")."/language/".$xoopsConfig['language'].".php")) 
include_once ''.XOOPS_ROOT_PATH."/modules/".$xoopsModule->getVar("dirname")."/language/".$xoopsConfig['language'].".php";
else include_once ''.XOOPS_ROOT_PATH."/modules/".$xoopsModule->getVar("dirname")."/language/english.php"; 
*/

//Only enable editor selection if Framework is enabled
if($wysiwyg_is_exist==1 && $xoopsModuleConfig['editor_userchoice']==TRUE) $sform->addElement(new XoopsFormSelectEditor($sform, "seditor", $editor, $story->nohtml(),$editor_select));

//Change multiple WYSIWYG using CBB Way
$editor_configs = array();
//required configs
$editor_configs['caption'] = _AMS_NW_THESCOOP;
$editor_configs['name'] ='hometext';
$editor_configs['value'] = $myts->htmlSpecialChars($story->hometext);
//optional configs
$editor_configs['rows'] = 25; // default value = 5
$editor_configs['cols'] = 60; // default value = 50
$editor_configs['width'] = '100%'; // default value = 100%
$editor_configs['height'] = '400px'; // default value = 400px

if($wysiwyg_is_exist==1) {
    $sform->addElement(new XoopsFormEditor($editor_configs['caption'], $editor , $editor_configs, $story->nohtml(), null));
} elseif ($wysiwyg_is_exist==2) {
    $sform->addElement(new XoopsFormWysiwygTextArea( $editor_configs['caption'],$editor_configs['name'], $editor_configs['value'],$editor_configs['width'], $editor_configs['height'], 'hiddenHometext'));   
} elseif ($wysiwyg_is_exist==3) {
    $sform->addElement(new XoopsFormWysiwygTextArea( $editor_configs, 'hiddenHometext'));   
} else {
    $sform->addElement(new XoopsFormDhtmlTextArea($editor_configs['caption'], $editor_configs['name'], $editor_configs['value'], $editor_configs['rows'], $editor_configs['cols'], 'hiddenHometext'));    
}

$sform->addElement( (new XoopsFormLabel('','* '._MULTIPLE_PAGE_GUIDE)),false );

$editor_configs = array();
//required configs
$editor_configs['caption'] = _AMS_AM_EXTEXT;
$editor_configs['name'] ='bodytext';
$editor_configs['value'] = $myts->htmlSpecialChars($story->bodytext);
//optional configs
$editor_configs['rows'] = 25; // default value = 5
$editor_configs['cols'] = 60; // default value = 50
$editor_configs['width'] = '100%'; // default value = 100%
$editor_configs['height'] = '400px'; // default value = 400px

if($wysiwyg_is_exist==1) { 
    $sform->addElement(new XoopsFormEditor($editor_configs['caption'], $editor , $editor_configs, $story->nohtml(), null));
} elseif ($wysiwyg_is_exist==2) {
    $sform->addElement(new XoopsFormWysiwygTextArea( $editor_configs['caption'],$editor_configs['name'], $editor_configs['value'],$editor_configs['width'], $editor_configs['height'], 'hiddenHometext'));   
} elseif ($wysiwyg_is_exist==3) {
    $sform->addElement(new XoopsFormWysiwygTextArea( $editor_configs, 'hiddenBodytext'));   
} else {
    $sform->addElement(new XoopsFormDhtmlTextArea($editor_configs['caption'], $editor_configs['name'], $editor_configs['value'], $editor_configs['rows'], $editor_configs['cols'], 'hiddenBodytext'));        
}

$sform->addElement( (new XoopsFormLabel('','* '._MULTIPLE_PAGE_GUIDE)),false );

$sform->addElement(new XoopsFormTextArea(_AMS_NW_BANNER, 'banner', $myts->htmlSpecialChars($story->banner)));

if ($edit && (!isset($_GET['approve']))) {
    $change_radio = new XoopsFormRadio(_AMS_NW_MAJOR, 'change', $story->change);
    $change_radio->addOption(0, _AMS_NW_NOVERSIONCHANGE);
    $change_radio->addOption(1, _AMS_NW_VERSION);
    $change_radio->addOption(2, _AMS_NW_REVISION);
    $change_radio->addOption(3, _AMS_NW_MINOR);
    $change_radio->addOption(4, _AMS_NW_AUTO);
    $change_radio->setDescription(_AMS_NW_VERSIONDESC);
    $change_radio->setValue(4);
    $sform->addElement($change_radio);
    $sform->addElement(new XoopsFormRadioYN(_AMS_NW_SWITCHAUTHOR." (".$story->uname.")", 'newauthor', 0));
}

// Manage upload(s)
$allowupload = false;
switch ($xoopsModuleConfig['uploadgroups']) 
{ 
	case 1: //Submitters and Approvers        
		$allowupload = true;        
		break;    
	case 2: //Approvers only        
		$allowupload = $approveprivilege ? true : false;
		break;    
	case 3: //Upload Disabled
		$allowupload = false;        
		break;
}

if($allowupload) 
{
	if($edit) {
		$sfiles = new sFiles();	
		$filesarr=Array();
		$filesarr=$sfiles->getAllbyStory($story->storyid());
		if(count($filesarr)>0) {
			$upl_tray = new XoopsFormElementTray(_AMS_AM_UPLOAD_ATTACHFILE,'<br />');
			$upl_checkbox=new XoopsFormCheckBox('', 'delupload[]');
			
			foreach ($filesarr as $onefile) 
			{
				$link=sprintf("<a href='%s/%s' target='_blank'>%s</a>\n",XOOPS_UPLOAD_URL,$onefile->getDownloadname('S'),$onefile->getFileRealName('S'));
				$upl_checkbox->addOption($onefile->getFileid(),$link);
			}			
			$upl_tray->addElement($upl_checkbox,false);
			$dellabel=new XoopsFormLabel(_AMS_AM_DELETE_SELFILES,'');
			$upl_tray->addElement($dellabel,false);			
			$sform->addElement($upl_tray);
		}
	}
	$sform->addElement(new XoopsFormFile(_AMS_AM_SELFILE, 'attachedfile', $xoopsModuleConfig['maxuploadsize']), false);
}


$option_tray = new XoopsFormElementTray(_OPTIONS,'<br />');
//Set date of publish/expiration
if ($approveprivilege) {
    $approve_checkbox = new XoopsFormCheckBox('', 'approve', $story->approved);
    $approve_checkbox->addOption(1, _AMS_AM_APPROVE);
    $option_tray->addElement($approve_checkbox);

    $published_checkbox = new XoopsFormCheckBox('', 'autodate',$story->published()?1:0);
    $published_checkbox->addOption(1, _AMS_AM_SETDATETIME);
    $option_tray->addElement($published_checkbox);

    $option_tray->addElement(new XoopsFormDateTime(_AMS_AM_SETDATETIME, 'publish_date', 15, $story->published()));

    $expired_checkbox = new XoopsFormCheckBox('', 'autoexpdate',$story->expired()?1:0);
    $expired_checkbox->addOption(1, _AMS_AM_SETEXPDATETIME);
    $option_tray->addElement($expired_checkbox);

    $option_tray->addElement(new XoopsFormDateTime(_AMS_AM_SETEXPDATETIME, 'expiry_date', 15, $story->expired()));
}

if (is_object($xoopsUser)) {
	$notify_checkbox = new XoopsFormCheckBox('', 'notifypub', $story->notifypub());
	$notify_checkbox->addOption(1, _AMS_NW_NOTIFYPUBLISH);
	$option_tray->addElement($notify_checkbox);
	if ($xoopsUser->isAdmin($xoopsModule->getVar('mid'))) {
		$nohtml_checkbox = new XoopsFormCheckBox('', 'nohtml', $story->nohtml());
		$nohtml_checkbox->addOption(1, _DISABLEHTML);
		$option_tray->addElement($nohtml_checkbox);
	}
}
$smiley_checkbox = new XoopsFormCheckBox('', 'nosmiley', $story->nosmiley());
$smiley_checkbox->addOption(1, _DISABLESMILEY);
$option_tray->addElement($smiley_checkbox);


$sform->addElement($option_tray);

//TODO: Approve checkbox + "Move to top" if editing + Edit indicator

//Submit buttons
$button_tray = new XoopsFormElementTray('' ,'');
$preview_btn = new XoopsFormButton('', 'preview', _PREVIEW, 'submit');
$preview_btn->setExtra('accesskey="p"');
$button_tray->addElement($preview_btn);
$submit_btn = new XoopsFormButton('', 'post', _AMS_NW_POST, 'submit');
$submit_btn->setExtra('accesskey="s"');
$button_tray->addElement($submit_btn);
$sform->addElement($button_tray);

//Hidden variables
if(isset($_REQUEST['op']))
{
	$op_hidden = new XoopsFormHidden('op', $_REQUEST['op']);
	$sform->addElement($op_hidden);
}
if($story->storyid() > 0){
    $storyid_hidden = new XoopsFormHidden('storyid', $story->storyid());
    $sform->addElement($storyid_hidden);
}
if (!($story->type())) {
    if ($approveprivilege) {
        $type = "admin";
    }
    else {
        $type = "user";
    }
}
$type_hidden = new XoopsFormHidden('type', $type);
$sform->addElement($type_hidden);
$sform->display();
?>