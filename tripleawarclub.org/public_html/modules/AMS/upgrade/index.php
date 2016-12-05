<?php 
include '../../../include/cp_header.php';
include_once 'class/class.newsstory.php';
include_once "class/class.newstopic.php";
include_once "class/newsupgrade.php";
xoops_cp_header();
set_magic_quotes_runtime(1);
if (isset($_POST['submit'])) {
    switch($_POST['submit']) {
        case "Import":
        //echo NewsUpgrade::prepare2upgrade();
        $topics = OldNewsTopic::getAllTopics();
        $error = 0;
        foreach ($topics as $topic) {
            if ($topic->upgrade()) {
                echo $topic->topic_title." Inserted successfully<br />";
            }
            else {
                echo $topic->topic_title." NOT Inserted <br />";
                $error = 1;
            }
        }
        if ($error==0) {
            $stories = OldNewsStory::getAll();
            foreach ($stories as $story) {
                if (!$story->upgrade()) {
                    echo $story->title." Inserted successfully<br />";
                }
                else {
                    echo $story->title." NOT inserted <br />";
                    $error = 1;
                }
            }
        }
        if ($error == 0) {
            // Import attachments if News version 1.2
            $mod_handler =& xoops_gethandler('module');
            $newsModule =& $mod_handler->getByDirname('news');
            if (is_object($newsModule) && $newsModule->getVar('version') > 110) {
                if (!OldNewsStory::importFiles()) {
                    echo "Error: Attachments NOT imported <br />";
                    $error = 1;
                }
                else {
                    echo "Attachments Imported <br />";
                }
            }
        }
        break;

        case "Comments":
        if (OldNewsStory::moveComments()) {
            echo "Comments Moved From News to AMS <br />";
        }
        else {
            echo "Error: Comments NOT moved <br />";
        }
        break;

        case "Permissions":
        $mod_handler =& xoops_gethandler('module');
        $newsModule =& $mod_handler->getByDirname('news');
        if ($newsModule->getVar('version') > 110) {
            if (OldNewsTopic::copyPermissions($newsModule->getVar('mid'))) {
                echo "Permissions Copied <br />";
            }
            else {
                echo "Error: Permissions NOT copied <br />";
            }
        }
        break;

        case "Update":
        /*
        include_once XOOPS_ROOT_PATH."/modules/AMS/include/update.php";
        xoops_module_update_AMS($xoopsModule, 220); //invoke update procedure - the SQL will fail if already upgraded, but no harm should come to it.
        header('location: '.XOOPS_URL.'/modules/system/admin.php?fct=modulesadmin&op=update&module=AMS');
        exit();*/
        include_once XOOPS_ROOT_PATH.'/modules/AMS/upgrade/class/dbmanager.php';
	    include_once XOOPS_ROOT_PATH.'/modules/AMS/upgrade/language/install.php';
	    $dbm = new db_manager;
	    $dbm->queryFromFile(XOOPS_ROOT_PATH.'/modules/AMS/sql/upgrade.sql');
	    $feedback = $dbm->report();
	    echo $feedback;
	    echo "<br /><br /><a href='".XOOPS_URL."/modules/system/admin.php?fct=modulesadmin&op=update&module=AMS'>Proceed</a>";
	    xoops_cp_footer();
	    exit();
    }
}
include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
$upgrade_form = new XoopsThemeForm('Upgrade', 'upgradeform', 'index.php');
if (!isset($_POST['submit'])) {
    $upgrade_form->addElement(new XoopsFormButton('Import Articles and Topics from News module', 'submit', 'Import', 'submit'));
    $upgrade_form->addElement(new XoopsFormButton('Articles and Topics ARE Imported Earlier, Proceed to Next Step', 'submit', 'Proceed', 'submit'));
}
else {
    $upgrade_form->addElement(new XoopsFormButton('MOVE Comments From News Articles to AMS Articles', 'submit', 'Comments', 'submit'));
    $mod_handler =& xoops_gethandler('module');
    $newsModule =& $mod_handler->getByDirname('news');
    if (is_object($newsModule) && $newsModule->getVar('version') > 110) {
        $upgrade_form->addElement(new XoopsFormButton('Copy Permissions From News to AMS', 'submit', 'Permissions', 'submit'));
    }
}
$upgrade_form->addElement(new XoopsFormButton('Update Article Management System Module', 'submit', 'Update', 'submit'));
$upgrade_form->display();


xoops_cp_footer();
?>