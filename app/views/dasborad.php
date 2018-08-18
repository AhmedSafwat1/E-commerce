<?php

if(isset($_GET['page']))
{
    $PageTitle = $_GET['page'];
}
else
{
    $PageTitle = 'Dasborad';

}
session_start();
 if(!isset($_SESSION['username']))
 {
     header('location:index.php');
    //  include 'logincontroler.php';
     die();
 }
 include_once "../include/function/autoloader.php" ;
include_once '../include/function/init.php';

if(isset($_GET['page']))
           {
               $url = "../controller/".$_GET['page'].".php";
               if(is_file($url))
               {
                include_once $url;
               }
               else
               {
                   echo 'error  this is not fille';
               }
           }
          else
          {
            include_once '../controller/home.php';
          }

 //  ****************** footer ******************************
include_once TEMP."footer.php";