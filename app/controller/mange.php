<?php 
include_once "../include/function/autoloader.php" ;
$PageTitle = 'Manger';
 if(isset($_POST ) && @$_GET['action'])
 {
    echo "hello";
 }
 else
 {
    $getmembers = new operateDB('users');
    try
    {
        if(isset($_GET) && isset($_GET['panding']))
        {
            $data = $getmembers->getdatabygroupid(1,"and RegStatus = 0 ");
        }
        else
        {
            $data = $getmembers->getdatabygroupid();
        }
       
        $check = True;
    }
    catch(Exception $ex)
    {
        $error = $ex->getMessage();
        $check = FALSE;
    }
     include_once "../views/mange.php";
 }
?>