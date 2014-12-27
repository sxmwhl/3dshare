<?php
header("Content-Type: text/html;charset=utf-8"); 
$con= new mysqli("localhost","root","");
// Create database
if ($con->query("drop database if exists `3dshare`")){
	echo "database delete";
}else {
	echo "delete error";
}
if ($con->query("CREATE DATABASE if not exists `3dshare` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci"))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }
// Create table in 3dshare database
$con->select_db("3dshare");
$sqls = "
CREATE TABLE think_moxing 
(
id int unsigned NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
title varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci ,
description varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci ,
preview_ext varchar(4),
folder varchar(32),
category smallint unsigned,
creator varchar(30),
email varchar(30),
time_update datetime,
sign tinyint unsigned,
views mediumint unsigned,
hl_on boolean NOT NULL DEFAULT '0',
dl_on boolean NOT NULL DEFAULT '0',
vp_position varchar(30),
vp_orientation varchar(40)
);
CREATE TABLE think_category 
(
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `isbest` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `order` smallint(5) unsigned NOT NULL DEFAULT '0',
  `keywords` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `arrparentid` varchar(255) NOT NULL,
  `arrchildid` text NOT NULL,
  `childcount` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `postcount` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `cid` (`cid`)
);";
if ($con->multi_query($sqls))
{
	echo "数据库安装完毕！！！";
	}else{

echo "数据库安装出错！！！";
	}
$con->close();
?>