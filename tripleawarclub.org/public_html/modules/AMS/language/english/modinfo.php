<?php
// $Id: modinfo.php,v 1.16 2004/06/09 09:57:33 mithyt2 Exp $
// Module Info

// The name of this module
define("_AMS_MI_NEWS_NAME","Articles");

// A brief description of this module
define("_AMS_MI_NEWS_DESC","Creates a Slashdot-like article section, where users can post articles and comment.");

// Names of blocks for this module (Not all module has blocks)
define("_AMS_MI_NEWS_BNAME1","News Topics");
define("_AMS_MI_NEWS_BNAME3","Big Story");
define("_AMS_MI_NEWS_BNAME4","Top News");
define("_AMS_MI_NEWS_BNAME5","Recent News");
define("_AMS_MI_NEWS_BNAME6","Moderate News");
define("_AMS_MI_NEWS_BNAME7","Navigate thru topics");
define("_AMS_MI_NEWS_BNAME8","Most Active Authors");
define("_AMS_MI_NEWS_BNAME9","Most Read Authors");
define("_AMS_MI_NEWS_BNAME10","Highest Rated Authors");
define("_AMS_MI_NEWS_BNAME11","Highest Rated Articles");
define("_AMS_MI_NEWS_BNAME12","AMS Spotlight");

// Sub menus in main menu block
define("_AMS_MI_NEWS_SMNAME1","Submit Article");
define("_AMS_MI_NEWS_SMNAME2","Archive");

// Names of admin menu items
define("_AMS_MI_NEWS_ADMENU2", "Topics Manager");
define("_AMS_MI_NEWS_ADMENU3", "Manage Articles");
define("_AMS_MI_NEWS_GROUPPERMS", "Submit/Approve Permissions");

// Title of config items
define("_AMS_MI_STORYHOME", "Select the number of articles to display on top page");
define("_AMS_MI_STORYCOUNTTOPIC", "Select the number of articles to display on a topic\"s page");
define("_AMS_MI_NOTIFYSUBMIT", "Select yes to send notification message to webmaster upon new submission");
define("_AMS_MI_DISPLAYNAV", "Select yes to display navigation box at the top of each module page");
define("_AMS_MI_AUTOAPPROVE","Auto approve articles without admin intervention?");
define("_AMS_MI_ALLOWEDSUBMITGROUPS", "Groups who can Submit Articles");
define("_AMS_MI_ALLOWEDAPPROVEGROUPS", "Groups who can Approve Articles");
define("_AMS_MI_NEWSDISPLAY", "Article Display Layout");
define("_AMS_MI_NAMEDISPLAY","Author's name");
define("_AMS_MI_COLUMNMODE","Columns");
define("_AMS_MI_STORYCOUNTADMIN","Number of new articles to display in admin area: ");
define("_AMS_MI_UPLOADFILESIZE", "MAX Filesize Upload (KB) 1048576 = 1 Meg");
define("_AMS_MI_UPLOADGROUPS","Authorized groups to upload");
define("_AMS_MI_MAXITEMS", "Maximum allowed items");
define("_AMS_MI_MAXITEMDESC", "This sets the maximum number of items, a user can select in the navigation box on index or topic pages");


// Description of each config items
define("_AMS_MI_STORYHOMEDSC", "This controls how many items will be displayed on the top page (i.e. when no topic is selected)");
define("_AMS_MI_NOTIFYSUBMITDSC", "");
define("_AMS_MI_DISPLAYNAVDSC", "");
define("_AMS_MI_AUTOAPPROVEDSC", "");
define("_AMS_MI_ALLOWEDSUBMITGROUPSDESC", "The selected groups will be able to submit articles");
define("_AMS_MI_ALLOWEDAPPROVEGROUPSDESC", "The selected groups will be able to approve articles");
define("_AMS_MI_NEWSDISPLAYDESC", "Classic shows all articles ordered by date of publish. Articles by topic will group the articles by topic with the latest article in full and the others with just the title");
define("_AMS_MI_ADISPLAYNAMEDSC", "Select how to display the author\"s name");
define("_AMS_MI_COLUMNMODE_DESC","You can choose the number of columns to display articles list");
define("_AMS_MI_STORYCOUNTADMIN_DESC","");
define("_AMS_MI_STORYCOUNTTOPIC_DESC","This controls how many items will be displayed on a topic page (i.e. not front page)");
define("_AMS_MI_UPLOADFILESIZE_DESC","");
define("_AMS_MI_UPLOADGROUPS_DESC","Select the groups who can upload to the server");

// Name of config item values
define("_AMS_MI_NEWSCLASSIC", "Classic");
define("_AMS_MI_NEWSBYTOPIC", "By Topic");
define("_AMS_MI_DISPLAYNAME1", "Username");
define("_AMS_MI_DISPLAYNAME2", "Real Name");
define("_AMS_MI_DISPLAYNAME3", "Do not display author");
define("_AMS_MI_UPLOAD_GROUP1","Submitters and Approvers");
define("_AMS_MI_UPLOAD_GROUP2","Approvers Only");
define("_AMS_MI_UPLOAD_GROUP3","Upload Disabled");
define("_AMS_MI_INDEX_NAME", "Name of Index");
define("_AMS_MI_INDEX_DESC", "This will be displayed as the top-level link in the breadcrumbs in topic and article view");

// Text for notifications

define("_AMS_MI_NEWS_GLOBAL_NOTIFY", "Global");
define("_AMS_MI_NEWS_GLOBAL_NOTIFYDSC", "Global news notification options.");

define("_AMS_MI_NEWS_STORY_NOTIFY", "Story");
define("_AMS_MI_NEWS_STORY_NOTIFYDSC", "Notification options that apply to the current story.");

define("_AMS_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFY", "New Topic");
define("_AMS_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYCAP", "Notify me when a new topic is created.");
define("_AMS_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYDSC", "Receive notification when a new topic is created.");
define("_AMS_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYSBJ", "[{X_SITENAME}] {X_MODULE} auto-notify : New news topic");

define("_AMS_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFY", "New Story Submitted");
define("_AMS_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYCAP", "Notify me when any new article is submitted (awaiting approval).");
define("_AMS_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYDSC", "Receive notification when any new article is submitted (awaiting approval).");
define("_AMS_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYSBJ", "[{X_SITENAME}] {X_MODULE} auto-notify : New article submitted");

define("_AMS_MI_NEWS_GLOBAL_NEWSTORY_NOTIFY", "New Story");
define("_AMS_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYCAP", "Notify me when any new article is posted.");
define("_AMS_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYDSC", "Receive notification when any new article is posted.");
define("_AMS_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYSBJ", "[{X_SITENAME}] {X_MODULE} auto-notify : New Article");

define("_AMS_MI_NEWS_STORY_APPROVE_NOTIFY", "Story Approved");
define("_AMS_MI_NEWS_STORY_APPROVE_NOTIFYCAP", "Notify me when this story is approved.");
define("_AMS_MI_NEWS_STORY_APPROVE_NOTIFYDSC", "Receive notification when this article is approved.");
define("_AMS_MI_NEWS_STORY_APPROVE_NOTIFYSBJ", "[{X_SITENAME}] {X_MODULE} auto-notify : Article Approved");

define("_AMS_MI_RESTRICTINDEX", "Restrict Topics on Index Page?");
define("_AMS_MI_RESTRICTINDEXDSC", "If set to yes, users will only see articles listed in the index from the topics, they have access to as set in Article Permissions");

define("_AMS_MI_ANONYMOUS_VOTE", "Enable Anonymous Rating of Articles");
define("_AMS_MI_ANONYMOUS_VOTE_DESC", "If enabled, anonymous users can rate articles");

define("_AMS_MI_AUDIENCE", "Audience Levels");

define("_AMS_MI_SPOTLIGHT", "Spotlight");
define("_AMS_MI_SPOTLIGHT_ITEMS", "Spotlight Article Candidates");
define("_AMS_MI_SPOTLIGHT_ITEMS_DESC", "This is the number of articles that will be listed in the spotlight configuration page as selectable for spotlighted article");

define("_AMS_MI_EDITOR", "Editor");
define("_AMS_MI_EDITOR_DESC", "Choose the editor to use in the submit form - non-default editors MUST be separately installed");
define("_AMS_MI_EDITOR_DEFAULT", "Xoops Default");
define("_AMS_MI_EDITOR_DHTML","DHTML");
define("_AMS_MI_EDITOR_HTMLAREA","HtmlArea Editor");
define("_AMS_MI_EDITOR_FCK","FCK WYSIWYG Editor");
define("_AMS_MI_EDITOR_KOIVI","Koivi WYSIWYG Editor");
define("_AMS_MI_EDITOR_TINYMCE","TinyMCE WYSIWYG Editor");

define("_AMS_MI_EDITOR_USER_CHOICE", "Enable Editor Choice To User");
define("_AMS_MI_EDITOR_USER_CHOICE_DESC", "Enable user to choose which editor they want");

define("_AMS_MI_EDITOR_CHOICE", "Editor Choices");
define("_AMS_MI_EDITOR_CHOICE_DESC", "Choices of editors enabled to user");

define("_AMS_MI_SPOTLIGHT_TEMPLATE","Spotlight Templates");
define("_AMS_MI_SPOTLIGHT_TEMPLATE_DESC","Which template enabled to admin to be used in spotlight block");

define("_AMS_MI_ABOUT", "About");
define("_AMS_MI_MIME_TYPES","MIME Types");
?>