<?php
// $Id: modinfo.php,v 1.16 2004/06/09 09:57:33 mithyt2 Exp $
// Module Info

// The name of this module
define("_AMS_MI_NEWS_NAME","Artikel");

// A brief description of this module
define("_AMS_MI_NEWS_DESC","Erzeugt eine Artikel-Abteilung in der Benutzer Artikel und Kommentare abgeben können.");

// Names of blocks for this module (Not all module has blocks)
define("_AMS_MI_NEWS_BNAME1","Artikel Themen");
define("_AMS_MI_NEWS_BNAME3","Wichtiger Artikel");
define("_AMS_MI_NEWS_BNAME4","Top Artikel");
define("_AMS_MI_NEWS_BNAME5","Aktuelle Neuigkeiten");
define("_AMS_MI_NEWS_BNAME6","Artikel moderieren");
define("_AMS_MI_NEWS_BNAME7","Navigiere durch die Themen");
define("_AMS_MI_NEWS_BNAME8","Die aktivsten Autoren");
define("_AMS_MI_NEWS_BNAME9","Meistgelesene Autoren");
define("_AMS_MI_NEWS_BNAME10","Best bewertete Autoren");
define("_AMS_MI_NEWS_BNAME11","Best bewertete Artikel");
define("_AMS_MI_NEWS_BNAME12","Rampenlicht");

// Sub menus in main menu block
define("_AMS_MI_NEWS_SMNAME1","Artikel abschicken");
define("_AMS_MI_NEWS_SMNAME2","Archiv");

// Names of admin menu items
define("_AMS_MI_NEWS_ADMENU2", "Themen Verwaltung");
define("_AMS_MI_NEWS_ADMENU3", "Artikel Verwaltung");
define("_AMS_MI_NEWS_GROUPPERMS", "Berechtigungen abschicken/freigeben");

// Titel of config items
define("_AMS_MI_STORYHOME", "Wähle die Anzahl von Artikeln zum anzeigen auf der Hautpseite");
define("_AMS_MI_STORYCOUNTTOPIC", "Wähle die Anzahl von Artikeln zum anzeigen auf der Themen Seite");
define("_AMS_MI_NOTIFYSUBMIT", "Wähle JA um dem Webmaster eine Benachrichtigung über eine neue Einreichung zu schicken");
define("_AMS_MI_DISPLAYNAV", "Wähle JA um eine Navigationsbox am Anfang jeder Modulseite zu zeigen");
define("_AMS_MI_AUTOAPPROVE","Automatische Freigabe von Artikeln ohne Administrator Eingriff?");
define("_AMS_MI_ALLOWEDSUBMITGROUPS", "Gruppen, die Artikel einschicken dürfen");
define("_AMS_MI_ALLOWEDAPPROVEGROUPS", "Gruppen, die Artikel freigeben dürfen");
define("_AMS_MI_NEWSDISPLAY", "Artikel Anzeige Layout");
define("_AMS_MI_NAMEDISPLAY","Autor Name");
define("_AMS_MI_COLUMNMODE","Spalten");
define("_AMS_MI_STORYCOUNTADMIN","Anzahl von neuen Artikeln, die im Admin Bereich angezeigt werden: ");
define("_AMS_MI_UPLOADFILESIZE", "Maximale Dateigröße zum hochladen (KB) 1048576 = 1 Meg");
define("_AMS_MI_UPLOADGROUPS","Authorisierte Gruppen zum hochladen");
define("_AMS_MI_MAXITEMS", "Maximal erlaubte Positionen");
define("_AMS_MI_MAXITEMDESC", "Setzt die Anzahl von Positionen, die ein Benutzer in der Navigationsbox auf der Übersichts- oder Themenseite wählen kann");


// Description of each config items
define("_AMS_MI_STORYHOMEDSC", "Legt fest, wie viele Positionen auf der Hauptseite angezeigt werden (zB wenn kein Thema gewählt ist)");
define("_AMS_MI_NOTIFYSUBMITDSC", "");
define("_AMS_MI_DISPLAYNAVDSC", "");
define("_AMS_MI_AUTOAPPROVEDSC", "");
define("_AMS_MI_ALLOWEDSUBMITGROUPSDESC", "Die gewählte Gruppe darf Artikel einschicken");
define("_AMS_MI_ALLOWEDAPPROVEGROUPSDESC", "Die gewählte Gruppe darf Artikel freigeben");
define("_AMS_MI_NEWSDISPLAYDESC", "Klassisch zeigt alle Artikel sortiert nach Veröffentlichungsdatum. Artikel nach Thema gruppiert die Artikel nach Themen und zeigt den letzten Artikel voll, von den anderen Artikeln nur den Titel");
define("_AMS_MI_ADISPLAYNAMEDSC", "Wähle, wie der Name des Autors angezeigt werden soll");
define("_AMS_MI_COLUMNMODE_DESC","Sie können die Anzahl der Spalten zur Anzeige in der Artikel Liste wählen");
define("_AMS_MI_STORYCOUNTADMIN_DESC","");
define("_AMS_MI_STORYCOUNTTOPIC_DESC","Legt fest, wieviele Positionen auf einer Themen Seite angezeigt werden (zB nicht Hauptseite)");
define("_AMS_MI_UPLOADFILESIZE_DESC","");
define("_AMS_MI_UPLOADGROUPS_DESC","Wähle die Gruppen, die zum Server hochladen dürfen");

// Name of config item values
define("_AMS_MI_NEWSCLASSIC", "Klassisch");
define("_AMS_MI_NEWSBYTOPIC", "Nach Thema");
define("_AMS_MI_DISPLAYNAME1", "Benutzername");
define("_AMS_MI_DISPLAYNAME2", "Wirklicher Name");
define("_AMS_MI_DISPLAYNAME3", "Autor nicht anzeigen");
define("_AMS_MI_UPLOAD_GROUP1","Einschicker und Freigeber");
define("_AMS_MI_UPLOAD_GROUP2","Nur Freigeber");
define("_AMS_MI_UPLOAD_GROUP3","Hochladen dektiviert");
define("_AMS_MI_INDEX_NAME", "Name der Übersicht");
define("_AMS_MI_INDEX_DESC", "Dies wird als oberster Link in Themen- und Artikelansicht angezeigt");

// Text for notifications

define("_AMS_MI_NEWS_GLOBAL_NOTIFY", "Global");
define("_AMS_MI_NEWS_GLOBAL_NOTIFYDSC", "Globale Artikel Benachrichtigungs Optionen.");

define("_AMS_MI_NEWS_STORY_NOTIFY", "Artikel");
define("_AMS_MI_NEWS_STORY_NOTIFYDSC", "Benachrichtigungsoptionen, die den aktuellen Artikel betreffen.");

define("_AMS_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFY", "Neues Thema");
define("_AMS_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYCAP", "Benachrichtige mich, wenn ein neues Thema erzeugt wird.");
define("_AMS_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYDSC", "Benachrichtigung, wenn ein neues Thema erzeugt wird.");
define("_AMS_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYSBJ", "[{X_SITENAME}] {X_MODULE} Automatische Benachrichtigung : Neues Artikel Thema");

define("_AMS_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFY", "Neuer Artikel eingeschickt");
define("_AMS_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYCAP", "Benachrichtige mich, wenn ein neuer Artikel eingeschickt wurde und auf Freigabe wartet.");
define("_AMS_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYDSC", "Benachrichtigung, wenn ein neuer Artikel eingeschickt wurde und auf Freigabe wartet.");
define("_AMS_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYSBJ", "[{X_SITENAME}] {X_MODULE} Automatische Benachrichtigung : Neuer Artikel wartet auf Freigabe");

define("_AMS_MI_NEWS_GLOBAL_NEWSTORY_NOTIFY", "Neuer Artikel");
define("_AMS_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYCAP", "Benachrichtige mich, wenn ein neuer Artikel eingeschickt wurde.");
define("_AMS_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYDSC", "Benachrichtigung, wenn ein neuer Artikel eingeschickt wurde.");
define("_AMS_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYSBJ", "[{X_SITENAME}] {X_MODULE} Automatische Benachrichtigung : Neuer Artikel");

define("_AMS_MI_NEWS_STORY_APPROVE_NOTIFY", "Artikel Freigegeben");
define("_AMS_MI_NEWS_STORY_APPROVE_NOTIFYCAP", "Benachrichtige mich, wenn dieser Artikel freigegeben wurde.");
define("_AMS_MI_NEWS_STORY_APPROVE_NOTIFYDSC", "Benachrichtigung, wenn dieser Artikel freigegeben wurde.");
define("_AMS_MI_NEWS_STORY_APPROVE_NOTIFYSBJ", "[{X_SITENAME}] {X_MODULE} Automatische Benachrichtigung : Artikel freigegeben");

define("_AMS_MI_RESTRICTINDEX", "Themen auf der Übersichts-Seite einschränken?");
define("_AMS_MI_RESTRICTINDEXDSC", "Bei Auswahl von JA werden nur Artikel angezeigt, auf die der Benutzer Zugriff hat wie in den Artikel Berechtigungen gesetzt ist");

define("_AMS_MI_ANONYMOUS_VOTE", "Erlaube anonymes bewerten von Artikeln");
define("_AMS_MI_ANONYMOUS_VOTE_DESC", "Wenn erlaubt, können anonyme Benutzer Artikel bewerten");

define("_AMS_MI_AUDIENCE", "Zielgruppen Ebenen");

define("_AMS_MI_SPOTLIGHT", "Rampenlicht");
define("_AMS_MI_SPOTLIGHT_ITEMS", "Rampenlicht Artikel Kandidaten");
define("_AMS_MI_SPOTLIGHT_ITEMS_DESC", "Anzahl der Artikel, die in der Rampenlicht Konfigurationsseite als Rampenlich Artikel wählbar angezeigt werden");

define("_AMS_MI_EDITOR", "Editor");
define("_AMS_MI_EDITOR_DESC", "Wähle den Editor, der im Bearbeitungsformular verwendet werden soll. Nicht-Standard Editoren müssen installiert werden");
define("_AMS_MI_EDITOR_DEFAULT", "Xoops Standard");
define("_AMS_MI_EDITOR_DHTML","DHTML");
define("_AMS_MI_EDITOR_HTMLAREA","HtmlArea Editor");
define("_AMS_MI_EDITOR_FCK","FCK WYSIWYG Editor");
define("_AMS_MI_EDITOR_KOIVI","Koivi WYSIWYG Editor");
define("_AMS_MI_EDITOR_TINYMCE","TinyMCE WYSIWYG Editor");

define("_AMS_MI_EDITOR_USER_CHOICE", "Aktivieren Sie Editor zur Wahl User");
define("_AMS_MI_EDITOR_USER_CHOICE_DESC", "Aktivieren Sie Benutzer zu wählen, welcher Editor sie wollen");

define("_AMS_MI_EDITOR_CHOICE", "Herausgeber Auswahlmöglichkeiten");
define("_AMS_MI_EDITOR_CHOICE_DESC", "Die Wahl der Redakteure aktivieren, damit Benutzer");

define("_AMS_MI_SPOTLIGHT_TEMPLATE","Rampenlicht Vorlage");
define("_AMS_MI_SPOTLIGHT_TEMPLATE_DESC","Welcher vorlage an admin aktiviert werden im rampenlicht block");

define("_AMS_MI_ABOUT", "Über");
define("_AMS_MI_MIME_TYPES","MIME Typen");

?>