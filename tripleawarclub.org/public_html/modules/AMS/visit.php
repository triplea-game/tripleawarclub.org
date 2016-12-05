<?php
include "../../mainfile.php";
include_once 'class/class.sfiles.php';
include_once 'class/class.newsstory.php';

$myts =& MyTextSanitizer::getInstance(); // MyTextSanitizer object
$fileid = (isset($_GET['fileid'])) ? intval($_GET['fileid']) : 0;
if (empty($fileid)) {
    redirect_header(XOOPS_URL."/modules/AMS/index.php",2,_ERRORS);
    exit();
}
$sfiles = new sFiles($fileid);

// Do we have the right to see the file ?
$article = new AmsStory($sfiles->getStoryid());
// and the news, can we see it ?
if ( $article->published() == 0 || $article->published() > time() ) {
    redirect_header(XOOPS_URL.'/modules/AMS/index.php', 2, _AMS_NW_NOSTORY);
    exit();
}
/*
*
* Remarks. Save for later if needed. Expired articles still allowed to be read in AMS. Remove this remark if you want to forbid it.
// Expired
if ( $article->expired() != 0 && $article->expired() < time() ) {
    redirect_header(XOOPS_URL.'/modules/AMS/index.php', 2, _AMS_NW_NOSTORY);
    exit();
}
*/
$gperm_handler =& xoops_gethandler('groupperm');
if (is_object($xoopsUser)) {
$groups = $xoopsUser->getGroups();
} else {
$groups = XOOPS_GROUP_ANONYMOUS;
}
if (!$gperm_handler->checkRight("ams_audience", $article->audienceid, $groups, $xoopsModule->getVar('mid'))) {
redirect_header(XOOPS_URL.'/modules/AMS/index.php', 3, _NOPERM);
exit();
}



$sfiles->updateCounter();
$url=XOOPS_UPLOAD_URL.'/'.$sfiles->getDownloadname();
if (!preg_match("/^ed2k*:\/\//i", $url)) {
	Header("Location: $url");
}
echo "<html><head><meta http-equiv=\"Refresh\" content=\"0; URL=".$myts->htmlSpecialChars($url)."\"></meta></head><body></body></html>";
exit();
?>






