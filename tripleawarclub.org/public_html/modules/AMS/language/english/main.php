<?php
// $Id: main.php,v 1.3 2004/04/10 16:04:12 hthouzard Exp $
//%%%%%%		File Name index.php 		%%%%%
define("_AMS_NW_PRINTER","Printer Friendly Page");
define("_AMS_NW_SENDSTORY","Send this Article to a Friend");
define("_AMS_NW_READMORE","Read More...");
define("_AMS_NW_COMMENTS","Comments?");
define("_AMS_NW_ONECOMMENT","1 comment");
define("_AMS_NW_BYTESMORE","%s words more");
define("_AMS_NW_NUMCOMMENTS","%s comments");
define("_AMS_NW_MORERELEASES", "More releases in ");

//%%%%%%		File Name submit.php		%%%%%
define("_AMS_NW_SUBMITNEWS","Submit Article");
define("_AMS_NW_TITLE","Title");
define("_AMS_NW_TOPIC","Topic");
define("_AMS_NW_THESCOOP","Article Text");
define("_AMS_NW_NOTIFYPUBLISH","Notify by mail when published");
define("_AMS_NW_POST","Post");
define("_AMS_NW_GO","Go!");
define("_AMS_NW_THANKS","Thanks for your submission."); //submission of news article

define("_AMS_NW_NOTIFYSBJCT","Article for my site"); // Notification mail subject
define("_AMS_NW_NOTIFYMSG","You have a new submission for your site."); // Notification mail message

//%%%%%%		File Name archive.php		%%%%%
define("_AMS_NW_NEWSARCHIVES","Article Archives");
define("_AMS_NW_ARTICLES","Articles");
define("_AMS_NW_VIEWS","Views");
define("_AMS_NW_DATE","Date");
define("_AMS_NW_ACTIONS","Actions");
define("_AMS_NW_PRINTERFRIENDLY","Printer Friendly Page");

define("_AMS_NW_THEREAREINTOTAL","There are %s article(s) in total");

// %s is your site name
define("_AMS_NW_INTARTICLE","Interesting Article at %s");
define("_AMS_NW_INTARTFOUND","Here is an interesting article I have found at %s");

define("_AMS_NW_TOPICC","Topic:");
define("_AMS_NW_URL","URL:");
define("_AMS_NW_NOSTORY","Sorry, the selected article does not exist.");

//%%%%%%	File Name print.php 	%%%%%

define("_AMS_NW_URLFORSTORY","The URL for this article is:");

// %s represents your site name
define("_AMS_NW_THISCOMESFROM","This article comes from %s");

// Added by Hervé
define("_AMS_NW_ATTACHEDFILES","Attached Files:");

define("_AMS_NW_MAJOR", "Major Change?");
define("_AMS_NW_STORYID", "Article ID");
define("_AMS_NW_VERSION", "Version");
define("_AMS_NW_SETVERSION", "Set Current Version");
define("_AMS_NW_VERSIONUPDATED", "Current Version Set To %s");
define("_AMS_NW_OVERRIDE", "Override");
define("_AMS_NW_FINDVERSION", "Find Version");
define("_AMS_NW_REVISION", "Revision");
define("_AMS_NW_MINOR", "Minor Revision");
define("_AMS_NW_VERSIONDESC", "Choose level of change - If you do NOT specify this, the text will NOT UPDATE!");
define("_AMS_NW_NOVERSIONCHANGE", "No Version Change");
define("_AMS_NW_AUTO", "Auto");

define("_AMS_NW_RATEARTICLE", "Rate Article");
define("_AMS_NW_RATE", "Rate Article");
define("_AMS_NW_SUBMITRATING", "Submit Rating");
define("_AMS_NW_RATING_SUCCESSFUL", "Article Rated Successfully");
define("_AMS_NW_PUBLISHED_DATE", "Published Date: ");
define("_AMS_NW_POSTEDBY", "Author");
define("_AMS_NW_READS", "Reads");
define("_AMS_NW_AUDIENCE", "Audience");
define("_AMS_NW_SWITCHAUTHOR", "Update Author?");

//Warnings
define("_AMS_NW_VERSIONSEXIST", "%s Version(s) with higher versions exist and <strong>will</strong> be OVERWRITTEN with NO restoration ability:");
define("_AMS_NW_AREYOUSUREOVERRIDE", "Are you sure you want to replace these versions");
define("_AMS_NW_CONFLICTWHAT2DO", "An article with the calculated version number exists<br />What do You want to do?<br />Override: This version is saved with the calculated version number and all higher versions in the same version group (xx.xx.xx) will be deleted<br />Find Version: Let the system find the next available version in the same version group");
define("_AMS_NW_VERSIONCONFLICT", "Version Conflict");
define("_AMS_NW_TRYINGTOSAVE", "Attempting to save ");

//Error messages
define("_AMS_NW_ERROR", "Error Occurred");
define("_AMS_NW_RATING_FAILED", "Rating Failed");
define("_AMS_NW_SAVEFAILED", "Article Saving Failed");
define("_AMS_NW_TEXTSAVEFAILED", "Could not save article text");
define("_AMS_NW_VERSIONUPDATEFAILED", "Could not update version");
define("_AMS_NW_COULDNOTRESET", "Could not reset versions");
define("_AMS_NW_COULDNOTUPDATEVERSION", "Could not update to current version");

define("_AMS_NW_COULDNOTSAVERATING", "Could not save rating");
define("_AMS_NW_COULDNOTUPDATERATING", "Could not update article rating");

define("_AMS_NW_COULDNOTADDLINK", "Link could not be related to article");
define("_AMS_NW_COULDNOTDELLINK", "Error - Link not deleted");

define("_AMS_NW_CANNOTVOTESELF", "Author cannot rate articles");
define("_AMS_NW_ANONYMOUSVOTEDISABLED", "Anonymous rating disabled");
define("_AMS_NW_ANONYMOUSHASVOTED", "This IP has already rated this article");
define("_AMS_NW_USERHASVOTED", "You have already rated this article");

define("_AMS_NW_NOTALLOWEDAUDIENCE", "You are not allowed to read %s level articles");
define("_AMS_NW_NOERRORSENCOUNTERED", "No errors encountered");

//Additional constants
define("_AMS_NW_USERNAME", "Username");
define("_AMS_NW_ADDLINK", "Add Link(s)");
define("_AMS_NW_DELLINK", "Remove Link(s)");
define("_AMS_NW_RELATEDARTICLES", "Recommended Reading");
define("_AMS_NW_SEARCHRESULTS", "Search Results:");
define("_AMS_NW_MANAGELINK", "Links");
define("_AMS_NW_DELVERSIONS", "Delete versions below this version");
define("_AMS_NW_DELALLVERSIONS", "Delete ALL versions apart from this version");
define("_AMS_NW_SUBMIT", "Submit");
define("_AMS_NW_RUSUREDELVERSIONS", "Are you sure you want to delete ALL versions BEYOND RESTORATION!!! below this version?");
define("_AMS_NW_RUSUREDELALLVERSIONS", "Are you sure you want to delete ALL versions BEYOND RESTORATION!!! apart from this version?");
define("_AMS_NW_EXTERNALLINK", "External Link");
define("_AMS_NW_ADDEXTERNALLINK", "Add External Link");
define("_AMS_NW_PREREQUISITEARTICLES", "Prerequisite Reading");
define("_AMS_NW_LINKTYPE", "Link Type");
define("_AMS_NW_SETTITLE", "Set Title of Link");
define("_AMS_NW_BANNER", "Banner/Sponsor");

define("_AMS_NW_NOTOPICS", "No Topics Exist - please create a topic and set appropriate permissions before submitting an article");

define("_AMS_NW_TOTALARTICLES", "Total Articles");

define("_AMS_MA_INDEX", "Index");
define("_AMS_MA_SUBTOPICS", "Sub-Topics for ");
define("_AMS_MA_PAGEBREAK", "PAGEBREAK");
define("_AMS_NW_POSTNEWARTICLE", "Post New Article");

?>