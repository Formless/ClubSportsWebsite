<?php

ini_set("display_errors", "on");
ini_set("short_open_tag", "off");

ini_set("output_buffering", "off");

ini_set("error_reporting", -1);


$__mysql_username__ = "cs4750em2ae";
$__mysql_password__ = "cheese";
$__mysql_server__ = "stardock.cs.virginia.edu";
$__mysql_database__ = "cs4750em2ae";

// NOTE: uncomment only AFTER setting up your MySQL account!
// connect to server
$database = mysql_connect($__mysql_server__, $__mysql_username__, $__mysql_password__)
    or die("Could not connect to MySQL Server ({$__mysql_server__})");
// select database
mysql_select_db($__mysql_database__, $database)
    or die("Could not select database ({$__mysql_database__})");
