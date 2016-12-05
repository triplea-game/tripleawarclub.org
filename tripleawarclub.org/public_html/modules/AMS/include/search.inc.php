<?php
// $Id: search.inc.php,v 1.2 2004/01/29 17:15:54 mithyt2 Exp $
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

function ams_search($queryarray, $andor, $limit, $offset, $userid, $storyid = false){
	global $xoopsDB;
	$sql = "SELECT n.storyid,uid,title,updated FROM ".$xoopsDB->prefix("ams_article")." n, ".$xoopsDB->prefix("ams_text")." t WHERE t.storyid=n.storyid AND t.current=1 AND published>0 AND published<=".time()."";
	if ( $userid != 0 ) {
		$sql .= " AND uid=".$userid." ";
	}
	if (false != $storyid) {
	    $sql .= " AND n.storyid != ".intval($storyid);
	}
	// because count() returns 1 even if a supplied variable
	// is not an array, we must check if $querryarray is really an array
	if ( is_array($queryarray) && $count = count($queryarray) ) {
		$sql .= " AND ((hometext LIKE '%$queryarray[0]%' OR bodytext LIKE '%$queryarray[0]%' OR title LIKE '%$queryarray[0]%' OR n.storyid=".intval($queryarray[0]).")";
		for($i=1;$i<$count;$i++){
			$sql .= " $andor ";
			$sql .= "(hometext LIKE '%$queryarray[$i]%' OR bodytext LIKE '%$queryarray[$i]%' OR title LIKE '%$queryarray[$i]%' OR n.storyid=".intval($queryarray[0]).")";
		}
		$sql .= ") ";
	}
	$sql .= " ORDER BY created DESC";
	$result = $xoopsDB->query($sql,$limit,$offset);
	$ret = array();
	$i = 0;
 	while($myrow = $xoopsDB->fetchArray($result)){
		$ret[$i]['image'] = "images/articles.gif";
		$ret[$i]['link'] = "article.php?storyid=".$myrow['storyid']."";
		$ret[$i]['title'] = $myrow['title'];
		$ret[$i]['time'] = $myrow['updated'];
		$ret[$i]['uid'] = $myrow['uid'];
		$ret[$i]['id'] = $myrow['storyid'];
		$i++;
	}
	return $ret;
}
?>