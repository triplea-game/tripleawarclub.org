ALTER TABLE `ams_topics` ADD `weight` int(5) default 1;

CREATE TABLE `ams_spotlight` (
  `spotlightid` int(11) unsigned NOT NULL auto_increment,
  `showimage` tinyint(1) default 1,
  `image` varchar (255),
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