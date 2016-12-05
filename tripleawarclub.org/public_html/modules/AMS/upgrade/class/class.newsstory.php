<?php
// $Id: class.newsstory.php,v 1.24 2004/07/26 17:51:25 hthouzard Exp $
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
// ------------------------------------------------------------------------- //

include_once XOOPS_ROOT_PATH."/class/xoopsstory.php";
include_once XOOPS_ROOT_PATH.'/include/comment_constants.php';

class OldNewsStory extends XoopsStory
{
	function OldNewsStory($storyid=-1)
	{
		$this->db =& Database::getInstance();
		if (is_array($storyid)) {
			$this->makeStory($storyid);
		}
	}
	
	function getAll() {
	    $ret = array();
	    $db =& Database::getInstance();
	    $sql = "SELECT * FROM ".$db->prefix("stories");
	    $result = $db->query($sql);
	    while ( $myrow = $db->fetchArray($result) ) {
	        $ret[] = new OldNewsStory($myrow);
	    }
	    return $ret;
	}

	function upgrade()
	{
	    $myts =& MyTextSanitizer::getInstance();
        $error = false;
		$sql = "INSERT INTO ".$this->db->prefix('ams_article')."
	            VALUES (".$this->storyid.", '".$this->title."', ".$this->created.", ".$this->published.",
		                ".$this->expired.", '".$this->hostname."', ".$this->nohtml.", ".$this->nosmiley.", ".$this->counter.",
		                ".$this->topicid.", ".$this->ihome.", ".$this->notifypub.", '".$this->story_type."', ".$this->topicdisplay.",
		                '".$this->topicalign."', ".$this->comments.", 0, '', 1)";
	    if (!$this->db->query($sql)) {
	        $error = true;
	    }
	    $sql2 = "INSERT INTO ".$this->db->prefix('ams_text')."
	             VALUES (".$this->storyid.", 1, 0, 0, ".$this->uid.", '".$this->hometext."', '".$this->bodytext."', 1, ".$this->created.")";
	    if (!$this->db->query($sql2)) {
	        $error = true;
	    }
	    return $error;
	}
	
	function importFiles() {
	    $db =& XoopsDatabaseFactory::getDatabaseConnection();
	    $sql = "INSERT INTO ".$db->prefix('ams_files')."
	            SELECT * FROM ".$db->prefix('stories_files')."";
	    return $db->query($sql);
	}
	
	function moveComments() {
	    $mod_handler =& xoops_gethandler('module');
	    $newsModule =& $mod_handler->getByDirname('news');
	    $amsModule =& $mod_handler->getByDirname('AMS');
	    $mid = $amsModule->getVar('mid');
	    $old_mid = $newsModule->getVar('mid');
	    $db =& XoopsDatabaseFactory::getDatabaseConnection();
        $sql = 'UPDATE '.$db->prefix('xoopscomments').' SET com_modid='.intval($mid).' WHERE com_modid='.intval($old_mid);
        return $db->query($sql);
	}
	
	function cleanUp() {
	    return true;
	}

}
?>
