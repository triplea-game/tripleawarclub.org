CREATE TABLE `ams_setting` (
  settingid int(11) unsigned NOT NULL auto_increment,
  settingvalue varchar(100) NOT NULL,
  settingtype varchar(30) NOT NULL,
  PRIMARY KEY (`settingid`)
) TYPE=MyISAM;

INSERT INTO `ams_setting` (settingid, settingvalue,settingtype) VALUES (1, "0","friendlyurl_enable");
INSERT INTO `ams_setting` (settingid, settingvalue,settingtype) VALUES (2, "[XOOPS_URL]/[AMS_DIR]/[AUDIENCE]/[TOPIC]","friendlyurl_template");
