<?php 
define('TEMP','../include/templates/');
define('CSS','../app/resource/css/');
define('JS','../app/resource/js/');
define('LANG','../include/languages/');
include_once LANG."english.php" ;


// header of the page

 include_once TEMP."header.php";
 if(!isset($noNavbar)){include_once TEMP."navbar.php";}
