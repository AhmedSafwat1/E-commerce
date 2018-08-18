<?php
  include_once "../include/function/autoloader.php" ;
  include_once "../include/function/redirect.php";
  if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['submit']=='Login')
  {
      $user =$_POST['username'];
      $pass = $_POST['password'];
      $haspass= sha1($pass);
      $login = new operateDB('users');
      try
      {

        
        $login->Get_id_login($user,$haspass,1);
     
        
        session_start();
        $_SESSION['username'] = $user;
        $_SESSION['id'] = $login->data['UserID'];
        header('location:../views/dasborad.php');
      }
      catch(Exception $ex)
      {
          echo $ex->getMessage();
      }
     
  }
  else
  {
   
    // redirect('Cant Acees To This Page Directrly')
   
   header('location:../views/index.php');
  }
?>