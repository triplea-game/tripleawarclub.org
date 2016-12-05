<?php
// $Id: functions.inc.php,v 1.00 2008/08/09 15:10:18 NovaSmart Exp $
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
//  Author: NovaSmart (admin[at]novasmarttechnology.com)                                  //
//  URL: http://www.novasmarttechnology.com, http://xoops.novasmarttechnology.com                         //
//  Project: Article Management System (AMS)                                           //
//  ------------------------------------------------------------------------ //

if (!defined("XOOPS_ROOT_PATH")) {
 	die("XOOPS root path not defined");
}
//create in AMS 2.50 but for future CLONEABLE ability
function AMS_setcookie($name, $string = '', $expire = 0)
{
	global $AMSCookie;
	if(is_array($string)) {
		$value = array();
		foreach ($string as $key => $val){
			$value[]=$key."|".$val;
		}
		$string = implode(",", $value);
	}
	setcookie($AMSCookie['prefix'].$name, $string, intval($expire), $AMSCookie['path'], $AMSCookie['domain'], $AMSCookie['secure']);
}

//create in AMS 2.50 but for future CLONEABLE ability
function AMS_getcookie($name, $isArray = false)
{
	global $AMSCookie;
	$value = !empty($_COOKIE[$AMSCookie['prefix'].$name]) ? $_COOKIE[$AMSCookie['prefix'].$name] : null;
	if($isArray) {
		$_value = ($value)?explode(",", $value):array();
		$value = array();
		if(count($_value)>0) foreach($_value as $string){
			$sep = strpos($string,"|");
			if($sep===false){
				$value[]=$string;
			}else{
				$key = substr($string, 0, $sep);
				$val = substr($string, ($sep+1));
				$value[$key] = $val;
			}
		}
		unset($_value);
	}
	return $value;
}

/**
 * Remove module's cache
 *
 * @package AMS
 * @author Instant Zero (http://xoops.instant-zero.com)
 * @copyright (c) Instant Zero
*/
function AMS_updateCache() {
	global $xoopsModule;
    if (!isset($xoopsModule) || $xoopsModule->getVar('dirname') != "AMS") {
        $mod_handler =& xoops_gethandler('module');
        $amsModule =& $mod_handler->getByDirname('AMS');
    }
    else {
        $amsModule =& $xoopsModule;
    }
	$folder = $amsModule->getVar('dirname');
	$tpllist = array();
	include_once XOOPS_ROOT_PATH.'/class/xoopsblock.php';
	include_once XOOPS_ROOT_PATH.'/class/template.php';
	$tplfile_handler =& xoops_gethandler('tplfile');
	$tpllist = $tplfile_handler->find(null, null, null, $folder);
	$xoopsTpl = new XoopsTpl();
	xoops_template_clear_module_cache($amsModule->getVar('mid'));			// Clear module's blocks cache

    //remove RSS cache (XOOPS, ImpressCMS)
    $files_del = array();
    $files_del = glob(XOOPS_CACHE_PATH.'/*system_rss*');
    if(count($files_del) >0) {
        foreach($files_del as $one_file) {
            unlink($one_file);
        }
    }
    $files_del = array();
    $files_del = glob(XOOPS_COMPILE_PATH.'/*system_rss*');
    if(count($files_del) >0) {
        foreach($files_del as $one_file) {
            unlink($one_file);
        }
    }
    $files_del = array();
    $files_del = glob($xoopsTpl->cache_dir.'/*system_rss*');
    if(count($files_del) >0) {
        foreach($files_del as $one_file) {
            unlink($one_file);
        }
    }

    //remove RSS cache (XOOPS CUBE)
    $files_del = array();
    $files_del = glob(XOOPS_CACHE_PATH.'/*legacy_rss*');
    if(count($files_del) >0) {
        foreach($files_del as $one_file) {
            unlink($one_file);
        }
    }
    $files_del = array();
    $files_del = glob(XOOPS_COMPILE_PATH.'/*legacy_rss*');
    if(count($files_del) >0) {
        foreach($files_del as $one_file) {
            unlink($one_file);
        }
    }
    $files_del = array();
    $files_del = glob($xoopsTpl->cache_dir.'/*legacy_rss*');
    if(count($files_del) >0) {
        foreach($files_del as $one_file) {
            unlink($one_file);
        }
    }
     
	// Remove cache for each page.
	foreach ($tpllist as $onetemplate) {
		if( $onetemplate->getVar('tpl_type') == 'module' ) {
			// Note, I've been testing all the other methods (like the one of Smarty) and none of them run, that's why I have used this code
			$files_del = array();
			$files_del = glob(XOOPS_CACHE_PATH.'/*'.$onetemplate->getVar('tpl_file').'*');
			if(count($files_del) >0) {
				foreach($files_del as $one_file) {
					unlink($one_file);
				}
			}
            $files_del = array();
            $files_del = glob(XOOPS_COMPILE_PATH.'/*'.$onetemplate->getVar('tpl_file').'*');
            if(count($files_del) >0) {
                foreach($files_del as $one_file) {
                    unlink($one_file);
                }
            }
            $files_del = array();
            $files_del = glob($xoopsTpl->cache_dir.'/*'.$onetemplate->getVar('tpl_file').'*');
            if(count($files_del) >0) {
                foreach($files_del as $one_file) {
                    unlink($one_file);
                }
            }
            
		}
	}
}

//Added AMS 3.0. Source from smartsection code
function AMS_SEO_title($title='',$op=0,$id=0,$pg=0)
{
    /** 
     * if XOOPS ML is present, let's sanitize the title with the current language
     */
    
     $myts = MyTextSanitizer::getInstance();
     if (method_exists($myts, 'formatForML')) {
        $title = $myts->formatForML($title);
     }

    // Transformation de la chaine en minuscule
    // Codage de la chaine afin d'éviter les erreurs 500 en cas de caractères imprévus
    $title   = rawurlencode(strtolower($title));    
    
    // avoid problem caused by rawurlencode which convert % to %25
    //                 Tab     Space      !        "        #        %        &        '        (        )        ,        /        :        ;        <        =        >        ?        @        [        \        ]        ^        {        |        }        ~       .
    $pattern = array("/%2509/", "/%2520/", "/%2521/", "/%2522/", "/%2523/", "/%2525/", "/%2526/", "/%2527/", "/%2528/", "/%2529/", "/%252C/", "/%252F/", "/%253A/", "/%253B/", "/%253C/", "/%253D/", "/%253E/", "/%253F/", "/%2540/", "/%255B/", "/%255C/", "/%255D/", "/%255E/", "/%257B/", "/%257C/", "/%257D/", "/%257E/");
    $rep_pat = array(  "-"  ,   "-"  ,   ""   ,   ""   ,   ""   , "-" ,   ""   ,   "-"  ,   ""   ,   ""   ,   ""   ,   "-"  ,   ""   ,   ""   ,   ""   ,   "-"  ,   ""   ,   ""   , "-at-" ,   ""   ,   "-"   ,  ""   ,   "-"  ,   ""   ,   "-"  ,   ""   ,   "-"  );
    $title   = preg_replace($pattern, $rep_pat, $title);
    
    // Transformation des ponctuations
    //                 Tab     Space      !        "        #        %        &        '        (        )        ,        /        :        ;        <        =        >        ?        @        [        \        ]        ^        {        |        }        ~       .
    $pattern = array("/%09/", "/%20/", "/%21/", "/%22/", "/%23/", "/%25/", "/%26/", "/%27/", "/%28/", "/%29/", "/%2C/", "/%2F/", "/%3A/", "/%3B/", "/%3C/", "/%3D/", "/%3E/", "/%3F/", "/%40/", "/%5B/", "/%5C/", "/%5D/", "/%5E/", "/%7B/", "/%7C/", "/%7D/", "/%7E/", "/\./");
    $rep_pat = array(  "-"  ,   "-"  ,   ""   ,   ""   ,   ""   , "-" ,   ""   ,   "-"  ,   ""   ,   ""   ,   ""   ,   "-"  ,   ""   ,   ""   ,   ""   ,   "-"  ,   ""   ,   ""   , "-at-" ,   ""   ,   "-"   ,  ""   ,   "-"  ,   ""   ,   "-"  ,   ""   ,   "-"  ,  ""  );
    $title   = preg_replace($pattern, $rep_pat, $title);

    // Transformation des caractères accentués
    //                  è        é        ê        ë        ç        à        â        ä        î        ï        ù        ü        û        ô        ö
    $pattern = array("/%B0/", "/%E8/", "/%E9/", "/%EA/", "/%EB/", "/%E7/", "/%E0/", "/%E2/", "/%E4/", "/%EE/", "/%EF/", "/%F9/", "/%FC/", "/%FB/", "/%F4/", "/%F6/");
    $rep_pat = array(  "-", "e"  ,   "e"  ,   "e"  ,   "e"  ,   "c"  ,   "a"  ,   "a"  ,   "a"  ,   "i"  ,   "i"  ,   "u"  ,   "u"  ,   "u"  ,   "o"  ,   "o"  );
    $title   = preg_replace($pattern, $rep_pat, $title);



    $pattern = array("/--/");
    $rep_pat = array("-");
    $maxloop=0;      // avoid unlimited loop & possibility for DDOS attack
	while((preg_match("/--+/",$title) > 0) && ($maxloop < 100))
	{
		$title   = preg_replace($pattern, $rep_pat, $title); //remove multiple '-'
        $maxloop=$maxloop+1;
    }

    if (sizeof($title) > 0)
    {
         //remove trailing dash
        $pattern = "/\-$/";
        $rep_pat = "";
        $title = preg_replace($pattern, $rep_pat, $title);

        $title .= '-op' .$op. 'id' .$id. 'pg' .$pg. '.htm';
        return $title;
    }
    else
        return '';
}

function AMS_SEO_genURL($title,$audience='', $topic='',$op=0,$id=0,$pg=0)
{
    $urltemplate=AMS_SEO_friendlyURLIsEnable();
    
    if (!($urltemplate==false)) //if friendly url is enabled
    {
         //remove prefix slash
        $pattern = "/^\//";
        $rep_pat = "";
        $topic = preg_replace($pattern, $rep_pat, $topic);
        
         //remove trailing slash
        $pattern = "/\/$/";
        $rep_pat = "";
        $urltemplate = preg_replace($pattern, $rep_pat, $urltemplate);

        //Create link based on URL template
        $pattern = array("/\[XOOPS_URL\]/","/\[AMS_DIR\]/","/\[AUDIENCE\]/","/\[TOPIC\]/");
        $rep_pat = array(XOOPS_URL,'modules/AMS',$audience,$topic);
        $urltemplate   = preg_replace($pattern, $rep_pat, $urltemplate);
        
        
        return $urltemplate. "/" .AMS_SEO_title($title,$op,$id,$pg) ; //return url if friendlyurl is enabled
    }else
    {
        return false; //return false if friendlyurl is disabled
    }
     
}

function AMS_SEO_friendlyURLIsEnable()
{
    $SEO_handler =& xoops_getmodulehandler('seo', 'AMS');
    $thisSEO= $SEO_handler->read_setting();
    if (intval($thisSEO['friendlyurl_enable'])==1)
    {
        return $thisSEO['urltemplate'];   
    }else
    {
        return false;
    }
}

function ams_getmoduleoption($option, $repmodule='AMS')
{
	global $xoopsModuleConfig, $xoopsModule;
	static $tbloptions= Array();
	if(is_array($tbloptions) && array_key_exists($option,$tbloptions)) {
		return $tbloptions[$option];
	}

	$retval = false;
	if (isset($xoopsModuleConfig) && (is_object($xoopsModule) && $xoopsModule->getVar('dirname') == $repmodule && $xoopsModule->getVar('isactive'))) {
		if(isset($xoopsModuleConfig[$option])) {
			$retval= $xoopsModuleConfig[$option];
		}
	} else {
		$module_handler =& xoops_gethandler('module');
		$module =& $module_handler->getByDirname($repmodule);
		$config_handler =& xoops_gethandler('config');
		if ($module) {
		    $moduleConfig =& $config_handler->getConfigsByCat(0, $module->getVar('mid'));
	    	if(isset($moduleConfig[$option])) {
	    		$retval= $moduleConfig[$option];
	    	}
		}
	}
	$tbloptions[$option]=$retval;
	return $retval;
}

function ams_isaudiencesetup($mid)
{
    global $xoopsDB;
    $sql = "SELECT COUNT(*) FROM ".$xoopsDB->prefix('group_permission')." WHERE gperm_modid=".$mid." AND gperm_name='ams_audience'";
	$result=$xoopsDB->query($sql);
	$count=$xoopsDB->fetchRow($result);
	if ($count[0] > 0)
	{
		return true;
	} else
	{
		return false;
	}
	
	
}

?>