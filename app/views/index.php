<?php
//  the iomportant include
$PageTitle = 'Login';
$noNavbar = "";
include_once "../include/function/autoloader.php" ;
include_once '../include/function/init.php';
// include_once "include/languages/english.php" ;
// include_once LANG."arabic.php" ;


// header of the page

 include_once TEMP."header.php";
 session_start();
 if(isset($_SESSION['name']))
 {
  if(isset($_SESSION['username']))
  {
    if($_SESSION['name'] ==  $_SESSION['username'] )
    {
      header('location:../views/dasborad.php');
     
    }
  }
  else
  {
    include_once "loginView.php";
  }
   
 }
 else
 { 
    include_once "loginView.php";

 }


//  ****************** footer ******************************
include_once TEMP."footer.php";
?>