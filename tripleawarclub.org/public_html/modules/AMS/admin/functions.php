<?php
function adminmenu($currentoption=0, $breadcrumb = "")
{
    global $xoopsModule, $xoopsConfig;
    $tblColors=Array();
    $tblColors[0]=$tblColors[1]=$tblColors[2]=$tblColors[3]=$tblColors[4]=$tblColors[5]=$tblColors[6]=$tblColors[7]=$tblColors[8]='';
    if($currentoption>=0) {
    $tblColors[$currentoption]='id=\'current\'';;
	}
    if (file_exists(XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->getVar('dirname').'/language/'.$xoopsConfig['language'].'/modinfo.php')) {
        include_once '../language/'.$xoopsConfig['language'].'/modinfo.php';
    }
    else {
        include_once '../language/english/modinfo.php';
    }
    
    /* Nice buttons styles */
    $return = "
    	<style type='text/css'>
    	
    	#buttontop { float:left; width:100%; background: #dae0d2; font-size:93%; line-height:normal; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; margin: 0; }
    			
		#admintabs {
        	FONT-SIZE: 93%; BACKGROUND: url(../images/bg.gif) #dae0d2 repeat-x 50% bottom; FLOAT: left; WIDTH: 100%; LINE-HEIGHT: normal; border-left: 1px solid black; border-right: 1px solid black;
        }
        #admintabs ul {
        	PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 10px; LIST-STYLE-TYPE: none;
        }
        #admintabs li {
        	PADDING-RIGHT: 0px; PADDING-LEFT: 9px; BACKGROUND: url(../images/left.gif) no-repeat left top; FLOAT: left; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px; list-style: none;
        }
        #admintabs A {
        	PADDING-RIGHT: 15px; DISPLAY: block; PADDING-LEFT: 6px; FONT-WEIGHT: bold; BACKGROUND: url(../images/right.gif) no-repeat right top; FLOAT: left; PADDING-BOTTOM: 4px; COLOR: #765; PADDING-TOP: 5px; TEXT-DECORATION: none
        }
        #admintabs A {
        	FLOAT: left;
        }
        #admintabs A:hover {
        	COLOR: #333
        }
        #admintabs #current {
        	BACKGROUND-IMAGE: url(../images/left_on.gif)
        }
        #admintabs #current A {
        	BACKGROUND-IMAGE: url(../images/right_on.gif); COLOR: #333; float:left;
        }
		</style>
    ";
    
    include XOOPS_ROOT_PATH."/modules/".$xoopsModule->getVar('dirname')."/admin/menu.php";

    $return .= "<div id='buttontop'>";
    $return .= "<table style=\"width: 100%; padding: 0; \" cellspacing=\"0\"><tr>";
    $return .= "<td style='width: 60%; font-size: 10px; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px;'><a class='nobutton' href='" . XOOPS_URL . "/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=" . $xoopsModule->getVar('mid') . "'>" . _AMS_AM_PREFERENCES . "</a> | <a href='" . XOOPS_URL . "/modules/" . $xoopsModule->getVar('dirname') . "/index.php'>" . _AMS_AM_GOMOD . "</a> | <a href='" . XOOPS_URL . "/modules/" . $xoopsModule->getVar('dirname') . "/admin/about.php'>" . _AMS_AM_ABOUT . "</a></td>";
    $return .= "<td style='width: 40%; font-size: 10px; text-align: right; color: #2F5376; padding: 0 6px; line-height: 18px;'><b>" . $xoopsModule->name() . " " . _AMS_AM_MODADMIN . "</b> " . $breadcrumb . "</td>";
    $return .= "</tr></table>";
    $return .= "</div>";

    $return .= "<div id='admintabs'>";
    $return .= "<ul>";
    foreach ($adminmenu as $key => $menu) {
        $return .= "<li ". $tblColors[$key] . "><a href=\"" . XOOPS_URL . "/modules/" . $xoopsModule->getVar('dirname') . "/".$menu['link']."\">" . $menu['title'] . "</a></li>";
    }
    $return .= "</ul></div><div style=\"clear:both;\"></div>";
    
    echo $return;
    /*
    
    
    
	echo "<div id=\"navcontainer\"><ul style=\"padding: 3px 0; margin-left: 0; font: bold 12px Verdana, sans-serif; \">";
	echo "<li style=\"list-style: none; margin: 0; display: inline; \"><a href=\"index.php?op=topicsmanager\" style=\"padding: 3px 0.5em; margin-left: 3px; border: 1px solid #778; background: ".$tblColors[0]."; text-decoration: none; \">"._AMS_MI_NEWS_ADMENU2."</a></li>";
	echo "<li style=\"list-style: none; margin: 0; display: inline; \"><a href=\"index.php?op=newarticle\" style=\"padding: 3px 0.5em; margin-left: 3px; border: 1px solid #778; background: ".$tblColors[1]."; text-decoration: none; \">"._AMS_MI_NEWS_ADMENU3."</a></li>";
	echo "<li style=\"list-style: none; margin: 0; display: inline; \"><a href=\"groupperms.php\" style=\"padding: 3px 0.5em; margin-left: 3px; border: 1px solid #778; background: ".$tblColors[2]."; text-decoration: none; \">"._AMS_MI_NEWS_GROUPPERMS."</a></li>";
	echo "<li style=\"list-style: none; margin: 0; display: inline; \"><a href=\"spotlight.php\" style=\"padding: 3px 0.5em; margin-left: 3px; border: 1px solid #778; background: ".$tblColors[3]."; text-decoration: none; \">"._AMS_AM_SPOTLIGHT."</a></li>";
	if (!table_exists('ams_article')) {
	    echo "<li style=\"list-style: none; margin: 0; display: inline; \"><a href=\"".XOOPS_URL."/modules/AMS/upgrade/index.php\" style=\"padding: 3px 0.5em; margin-left: 3px; border: 1px solid #778; background: ".$tblColors[4]."; text-decoration: none; \">"._AMS_AM_NEWS_UPGRADE."</a></li>";
	}
	echo "<li style=\"list-style: none; margin: 0; display: inline; \"><a href=\"index.php?op=audience\" style=\"padding: 3px 0.5em; margin-left: 3px; border: 1px solid #778; background: ".$tblColors[5]."; text-decoration: none; \">"._AMS_AM_MANAGEAUDIENCES."</a></li>";
	echo "<li style=\"list-style: none; margin: 0; display: inline; \"><a href=\"../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=".$xoopsModule -> getVar( 'mid' )."\" style=\"padding: 3px 0.5em; margin-left: 3px; border: 1px solid #778; background: ".$tblColors[6]."; text-decoration: none; \">"._PREFERENCES."</a></li>";
	echo "</ul></div>";
	*/
}

function table_exists($tablename) {
    global $xoopsDB;
    $sql = "SELECT COUNT(*) FROM ".$xoopsDB->prefix($tablename);
    return $xoopsDB->query($sql);
}
                      
?>