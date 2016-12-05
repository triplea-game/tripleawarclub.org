CREATE TABLE `comp_admins` (
  `comp_id` int(5) NOT NULL default '0',
  `xoops_user_id` mediumint(8) NOT NULL default '0',
  KEY `comp_id` (`comp_id`,`xoops_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `comp_challenges` (
  `challenge_id` int(15) NOT NULL auto_increment,
  `chall_status` int(1) NOT NULL default '0',
  `challenger_id` mediumint(8) NOT NULL default '0',
  `challenged_id` mediumint(8) NOT NULL default '0',
  `comp_id` int(5) NOT NULL default '0',
  `points_challenger` int(5) NOT NULL default '0',
  `points_challenged` int(5) NOT NULL default '0',
  `chall_date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`challenge_id`),
  KEY `chall_status` (`chall_status`,`challenger_id`,`challenged_id`,`comp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `comp_competitions` (
  `comp_id` int(5) NOT NULL auto_increment,
  `comp_name` varchar(30) NOT NULL default '',
  `comp_rules` text NOT NULL,
  `comp_rules_date` date NOT NULL,
  `comp_desc` varchar(30) NOT NULL default '',
  `comp_type` smallint(1) NOT NULL,
  `comp_image` text NOT NULL,
  PRIMARY KEY  (`comp_id`),
  KEY `comp_type` (`comp_type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `comp_invitations` (
  `invitation_id` int(10) NOT NULL auto_increment,
  `inviter_id` mediumint(8) NOT NULL default '0',
  `invited_id` mediumint(8) NOT NULL default '0',
  `comp_id` int(5) NOT NULL default '0',
  `invitation_date` date NOT NULL default '0000-00-00',
  `invitation_message` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`invitation_id`),
  KEY `inviter_id` (`inviter_id`,`invited_id`,`comp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `comp_matches` (
  `match_id` int(15) NOT NULL auto_increment,
  `comp_id` int(5) NOT NULL default '0',
  `winner_id` mediumint(8) NOT NULL default '0',
  `loser_id` mediumint(8) NOT NULL default '0',
  `side` int(1) NOT NULL default '0',
  `match_date` date NOT NULL default '0000-00-00',
  `challenge_id` int(15) NOT NULL default '0',
  `ratingchange` int(3) NOT NULL default '0',
  PRIMARY KEY  (`match_id`),
  KEY `comp_id` (`comp_id`,`winner_id`,`loser_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `comp_rating` (
  `rating_id` int(15) NOT NULL auto_increment,
  `challenge_id` int(15) NOT NULL default '0',
  `rater_id` mediumint(8) NOT NULL default '0',
  `rated_id` mediumint(8) NOT NULL default '0',
  `rating` int(1) NOT NULL default '0',
  `rating_comment` varchar(30) NOT NULL default '',
  `rating_date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`rating_id`),
  KEY `challenge_id` (`challenge_id`,`rated_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `comp_user_global` (
  `xoops_user_id` mediumint(8) NOT NULL default '0',
  `country` varchar(30) NOT NULL default '',
  `status` int(1) NOT NULL default '0',
  `return_date` date NOT NULL default '0000-00-00',
  `karma` int(5) NOT NULL default '0',
  `user_ip` varchar(15) NOT NULL default '',
  KEY `xoops_user_id` (`xoops_user_id`,`status`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `comp_user_local` (
  `xoops_user_id` mediumint(8) NOT NULL default '0',
  `comp_id` int(5) NOT NULL default '0',
  `challengeslot` int(1) NOT NULL default '0',
  `rating` int(5) NOT NULL default '0',
  `status` int(1) NOT NULL default '0',
  `option_luck` int(1) NOT NULL default '0',
  `option_mode` int(1) NOT NULL default '0',
  `option_rules` int(1) NOT NULL default '0',
  `matches` int(5) NOT NULL default '0',
  `wins` int(5) NOT NULL default '0',
  `losses` int(5) NOT NULL default '0',
  `axiswins` int(5) NOT NULL default '0',
  `allieswins` int(5) NOT NULL default '0',
  `axislosses` int(5) NOT NULL default '0',
  `allieslosses` int(5) NOT NULL default '0',
  `streakwins` int(3) NOT NULL default '0',
  `streaklosses` int(3) NOT NULL default '0',
  `challenges_sent` int(5) NOT NULL default '0',
  `challenges_received` int(5) NOT NULL default '0',
  `highest_rating` int(5) NOT NULL default '0',
  `lowest_rating` int(5) NOT NULL default '0',
  `longest_winstreak` int(3) NOT NULL default '0',
  `longest_lossstreak` int(3) NOT NULL default '0',
  KEY `xoops_user_id` (`xoops_user_id`,`comp_id`,`challengeslot`,`option_luck`,`option_mode`,`option_rules`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;








