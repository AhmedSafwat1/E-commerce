<?php
include_once "../include/function/autoloader.php" ;
include_once "../include/function/redirect.php";
ob_start();
$PageTitle = 'Categories';
if(isset($_SESSION['name']))
{
    header('location:index.php');
}
if($_SERVER['REQUEST_METHOD']=="POST" && isset( $_GET['action']))
{
    if($_GET['action'] == 'login'  && $_POST['submit'] == 'Login' )
    {
        $user =$_POST['username'];
        $pass = $_POST['password']; 
        try
        {
            $valid = new  validtor();
            $valid->check_Empty( $user,"user");
            $valid->check_Empty( $pass,"user");
            $valid->check_str2($user);
            $log = new operateDB('users');
            $pass = sha1($pass);
            $log->login_all($user,$pass);
            $_SESSION['name'] = $user;
            echo  $_SESSION['name'] ;
            header("location:index.php");
        }
        catch(Exception $ex)
            {
                $error = $ex->getMessage();
                $check = FALSE;
                $message="<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                                    This Update not succeeses .<br> $error!
                                </div>";
                redirect($message,'back');
            }
    }

    if($_GET['action'] == 'signup'  && $_POST['submit'] == 'Sign Up' )
    {
        
        
        try
        {
            $valid = new  validtor();
            $valid->check_Empty( $_POST['username'],"user");
            $valid->check_Empty(  $_POST['password'],"passord");
            $valid->check_Empty($_POST['password2'],"password 2");
            $valid->check_Empty($_POST['email'],"email");

            $valid->sentize($_POST['username'],'str');
            $valid->sentize($_POST['email'],'email');

            $valid->check_Email($_POST['email']);

            if(strlen($_POST['username']) <4 )
            {
                throw new Exception("Error : User Nmae Must Larger Than 4");
                
            }
            if($_POST['password'] != $_POST['password2'])
            {
                throw new Exception("Error : User Nmae Must Enter The passord2 Same The passord1 ");
            }
    
            $datasignup['UserName'] =$_POST['username'];
            $datasignup['Password'] = sha1($_POST['password']); 
            $datasignup['Email']= $_POST['email'];
            $datasignup['Date'] = date('Y-m-d');
            $signup = new operateDB('users');
            $signup->adddata($datasignup);
            $_SESSION['name'] = $_POST['username'];
            $message  = "<div class=\"alert alert-primary text-muted text-center\" role=\"alert\">
                            This Sign Up Sucessful !
                        </div>";
            // header("location:index.php");
        }
        catch(Exception $ex)
            {
                $error = $ex->getMessage();
                $check = FALSE;
                $message="<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                                    This Sign Up 
                                    Not succeeses .<br> $error!
                                </div>";
              
            }
            redirect($message,'back');
    }
}
else
{
    include_once "views/login.php";
}
ob_end_flush();
?>