<?php
 
 $host = 'localhost';
 $db = 'shop';
 $dsn = "mysql:host=$host;dbname=$db";
 $user = "root";
 $pass = "";
 $option  =  array(PDO::MYSQL_ATTR_INIT_COMMAND => "set NAMES utf8" );
?>
