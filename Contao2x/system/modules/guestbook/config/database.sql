-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************


-- --------------------------------------------------------

-- 
-- Table `btable`
-- 

CREATE TABLE `tl_guestbook` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tstamp` int(10) unsigned NOT NULL default '0',
  `name` varchar(128) NOT NULL default '',
  `email` varchar(128) NOT NULL default '',
  `website` varchar(128) NOT NULL default '',
  `icq` varchar(64) NOT NULL default '',
  `msn` varchar(64) NOT NULL default '',
  `skype` varchar(64) NOT NULL default '',
  `message` text NULL,
  `comment` text NULL,
  `published` char(1) NOT NULL default '',
  `date` int(10) unsigned NOT NULL default '0',
  `ip` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `tl_module` (
  `gb_order` varchar(32) NOT NULL default '',
  `gb_avatar` varchar(32) NOT NULL default '',
  `gb_avatarsize` smallint(5) unsigned NOT NULL default '0',
  `gb_perPage` smallint(5) unsigned NOT NULL default '0',
  `gb_moderate` char(1) NOT NULL default '',
  `gb_bbcode` char(1) NOT NULL default '',
    `gb_disableURL` char(1) NOT NULL default '',
  `gb_disableMSN` char(1) NOT NULL default '',
  `gb_disableICQ` char(1) NOT NULL default '',
  `gb_disableSkype` char(1) NOT NULL default '',
  `gb_disableNotice` char(1) NOT NULL default '',
  `gb_disableCaptcha` char(1) NOT NULL default '',
  `gb_template` varchar(32) NOT NULL default '',
  `gb_jumpTo` varchar(32) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
