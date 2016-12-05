#
# Table structure for table `ams_article`
#

CREATE TABLE `ams_setting` (
  settingid int(11) unsigned NOT NULL auto_increment,
  settingvalue varchar(100) NOT NULL,
  settingtype varchar(30) NOT NULL,
  PRIMARY KEY (`settingid`)
) TYPE=MyISAM;

INSERT INTO `ams_setting` (settingid, settingvalue,settingtype) VALUES (1, "0","friendlyurl_enable");
INSERT INTO `ams_setting` (settingid, settingvalue,settingtype) VALUES (2, "[XOOPS_URL]/[AMS_DIR]/[AUDIENCE]/[TOPIC]","friendlyurl_template");


CREATE TABLE ams_article (
  storyid int(8) unsigned NOT NULL auto_increment,
  title varchar(255) NOT NULL default '',
  created int(10) unsigned NOT NULL default '0',
  published int(10) unsigned NOT NULL default '0',
  expired int(10) UNSIGNED NOT NULL default '0',
  hostname varchar(20) NOT NULL default '',
  nohtml tinyint(1) NOT NULL default '0',
  nosmiley tinyint(1) NOT NULL default '0',
  counter int(8) unsigned NOT NULL default '0',
  topicid smallint(4) unsigned NOT NULL default '1',
  ihome tinyint(1) NOT NULL default '0',
  notifypub tinyint(1) NOT NULL default '0',
  story_type varchar(5) NOT NULL default '',
  topicdisplay tinyint(1) NOT NULL default '0',
  topicalign char(1) NOT NULL default 'R',
  comments smallint(5) unsigned NOT NULL default '0',
  rating int(3) NOT NULL default '0',
  banner text,
  audienceid int(11) NOT NULL default 1,
  PRIMARY KEY  (storyid),
  KEY idxstoriestopic (topicid),
  KEY ihome (ihome),
  KEY published_ihome (published,ihome),
  KEY title (title(40)),
  KEY created (created),
  FULLTEXT KEY search (title)
) TYPE=MyISAM;

#
# Table structure for table `ams_text`
#

CREATE TABLE ams_text (
  storyid int(8) unsigned NOT NULL,
  version int(8) unsigned NOT NULL default '1',
  revision int(8) unsigned NOT NULL default '0',
  revisionminor int(8) unsigned NOT NULL default '0',
  uid int(5) unsigned NOT NULL default '0',
  hometext text NOT NULL,
  bodytext text NOT NULL,
  current tinyint(2) NOT NULL default '0',
  updated int(10) unsigned NOT NULL default '0',
  PRIMARY KEY (`storyid`, `version`, `revision`, `revisionminor`),
  KEY uid (uid),
  FULLTEXT KEY search (hometext,bodytext)
) TYPE=MyISAM;


#
# Table structure for table `ams_files`
#

CREATE TABLE ams_files (
  fileid int(8) unsigned NOT NULL auto_increment,
  filerealname varchar(255) NOT NULL default '',
  storyid int(8) unsigned NOT NULL default '0',
  date int(10) NOT NULL default '0',
  mimetype varchar(64) NOT NULL default '',
  downloadname varchar(255) NOT NULL default '',
  counter int(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (fileid),
  KEY storyid (storyid)
) TYPE=MyISAM;

#
# Table structure for table `ams_topics`
#

CREATE TABLE ams_topics (
  topic_id smallint(4) unsigned NOT NULL auto_increment,
  topic_pid smallint(4) unsigned NOT NULL default '0',
  topic_imgurl varchar(50) NOT NULL default '',
  topic_title varchar(50) NOT NULL default '',
  banner text,
  banner_inherit tinyint(2) NOT NULL default 0,
  forum_id int(12) NOT NULL default 0,
  weight int(5) NOT NULL default 1,
  PRIMARY KEY  (topic_id),
  KEY pid (topic_pid)
) TYPE=MyISAM;
 

#
# Table structure for table `ams_link`
#

CREATE TABLE `ams_link` (
    `linkid` int(12) unsigned NOT NULL auto_increment,
    `storyid` INT(12) NOT NULL,
    `link_module` INT(12) NOT NULL,
    `link_link` varchar(120) NOT NULL default '',
    `link_title` varchar(70) NOT NULL default '',
    `link_counter` int(12) unsigned NOT NULL default 0,
    `link_position` varchar(12) NOT NULL default 'bottom',
    PRIMARY KEY (`linkid`)
) TYPE=MyISAM;

#
# Table structure for table `ams_rating`
#

CREATE TABLE `ams_rating` (
  ratingid int(11) unsigned NOT NULL auto_increment,
  storyid int(11) unsigned NOT NULL default '0',
  ratinguser int(11) NOT NULL default '0',
  rating smallint(5) unsigned NOT NULL default '0',
  ratinghostname varchar(60) NOT NULL default '',
  ratingtimestamp int(10) NOT NULL default '0',
  PRIMARY KEY  (`ratingid`),
  KEY `ratinguser` (`ratinguser`),
  KEY `ratinghostname` (`ratinghostname`),
  KEY `storyid` (`storyid`)
) TYPE=MyISAM;

#
# Table structure for table `ams_audience`
#

CREATE TABLE `ams_audience` (
  audienceid int(11) unsigned NOT NULL auto_increment,
  audience varchar(30) NOT NULL,
  PRIMARY KEY (`audienceid`)
) TYPE=MyISAM;

INSERT INTO `ams_audience` (audienceid, audience) VALUES (1, "Default");

CREATE TABLE `ams_spotlight` (
  `spotlightid` int(11) unsigned NOT NULL auto_increment,
  `showimage` tinyint(1) default 1,
  `image` varchar (255) default '',
  `teaser` text,
  `autoteaser` tinyint(1) default 1,
  `maxlength` int(5) default 100,
  `display` tinyint(1) default 1,
  `mode` tinyint(1) default 1,
  `storyid` int(12) default 0,
  `topicid` int(12) default 0,
  `weight` int(5) default 1,
  PRIMARY KEY  (`spotlightid`)
) TYPE=MyISAM;