<?php
include("../../mainfile.php");
include_once XOOPS_ROOT_PATH.'/modules/AMS/class/class.newsstory.php';
if (empty($_POST['submit'])) 
{
	$_POST['submit'] = '';
}
$storyid = isset($_POST['storyid']) ? intval($_POST['storyid']) : (isset($_GET['storyid']) ? intval($_GET['storyid']) : 0);
if ($storyid > 0) {
    $article = new AmsStory($storyid);
}
else {
    redirect_header(XOOPS_URL.'/modules/AMS/index.php', 3, _AMS_NW_NOSTORY);
    exit();
}
if($_POST['submit'] != '' && $storyid > 0)
{
    if ($article->rateStory($_POST['rating'])) {
        $ratemessage = _AMS_NW_RATING_SUCCESSFUL;
    }
    else {
        $ratemessage = $article->renderErrors();
    }
	redirect_header(XOOPS_URL."/modules/AMS/article.php?storyid=".$article->storyid(), 3 ,$ratemessage);
	exit();

} 
else 
{
    $xoopsOption['template_main'] = "ams_ratearticle.html";
	include XOOPS_ROOT_PATH."/header.php";
	include ('include/ratingform.inc.php');
}
$xoopsTpl->assign('breadcrumb', $article->getPath(true)." > "._AMS_NW_RATE);
include '../../footer.php';
?>