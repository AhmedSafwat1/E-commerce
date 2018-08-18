<?php
include_once "../include/function/autoloader.php" ;
include_once "../include/function/redirect.php";
ob_start();
$PageTitle = 'Members';
 if(isset($_POST )|| @$_GET['action'])
 {
     if( isset($_GET['action']) && $_GET['action'] == 'edit' && is_numeric($_GET['id']) )
     {
         
         $id = intval($_GET['id']);
         try
         {
            $Getmember = new operateDB('users');
            $check = $Getmember->Get_data_by_colum('UserID',$id);
            $memberdata = $Getmember->data;
            include_once "../views/members.php";
            
         }
         catch(Exception $ex)
         {
             $error =  $ex->getMessage();
             $message = "<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                         $error!
                        </div>";
             redirect($message);
         }

     }

     if( isset($_GET['action']) && $_GET['action'] == 'active' && is_numeric($_GET['id']) )
     {
         
         $id = intval($_GET['id']);
         try
         {
            $activemember = new operateDB('users');
            $data['RegStatus'] = 1;      
            $activemember->update_data_byColum($data,'UserID', $id);  
            $message = "<div class=\"alert alert-primary text-muted text-center\" role=\"alert\">
                            This Active Sucessful !
                        </div>";    
         }
         catch(Exception $ex)
         {
             $error =  $ex->getMessage();
             $message = "<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                         $error!
                        </div>";
         }
         redirect($message,'back');

     }
    
     if( isset($_GET['action']) && $_GET['action'] == 'update' )
     {
         if($_SERVER['REQUEST_METHOD']=="POST")
         {
                try
        {
            
           
         
          $valid = new  validtor();
          $valid->check_Empty($_POST['username'],"User Name");
          $valid->check_Empty($_POST['FullName'],"Full Name");
          $valid->check_Empty($_POST['email'],"Email");
         $id =$_POST['userid'];
         $data['UserName']=$_POST['username'];
         $oldpas=$_POST['oldPassword'];
         $newpas = $_POST['newPassword'];
         $data['FullName']=$_POST['FullName'];
         $data['Email']=$_POST['email'];

        
         if(empty($newpas))
         {
             $data['Password'] = $oldpas;
         }
         else
         {
            $data['Password'] =  sha1($newpas);
         }
        $updatemember = new operateDB('users');
        
        $deletemember = new operateDB('users');
        $d = $deletemember->Get_data_by_colum('UserID',$id);
        if(empty($d['Avater'] == FALSE) && empty($_FILES['avater']['name']) == FALSE)
        {
            $d_image  =  new deltefile($d['Avater']);
        }
        $imgpath = $d['Avater'];
        if(empty($_FILES['avater']['name']) == FALSE)
         {
            $file = $_FILES['avater'];
            $extension = array("jpeg","png","jpg",'gif');
            $avtersize = 419304;
            $dirct = "../uploads/";
            $ufile = new upload($file,$extension,$avtersize,$dirct);
            $ufile->upload(0);
            $imgpath =  $ufile->geturl();
         }
       
       
        $data['Avater']= $imgpath;
        $check =  $updatemember->update_data_byColum($data,'UserID', $id);

        
        $error = '';
        $flag=2;
        $message = "<div class=\"alert alert-primary mt-4 text-muted text-center\" role=\"alert\">
                    This Update Sucessful !
                   </div>";
       
         }
         catch(Exception $ex)
         {
             
             $error =  $ex->getMessage();
             $message = "<div class=\"alert alert-danger mt-4 text-muted text-center\" role=\"alert\">
                        This Update not Sucessful $error!
                        </div>";
             $check = FALSE;
             $flag=2;
         }
         redirect($message,'LLL');
         include_once "../views/update.php";
         }
         else
        {
            $error = "<div class=\"alert alert-primary text-muted text-center\" role=\"alert\">
                        Cant Access To This Page Directory !
                        </div>";
                        redirect($error);
        }
        
     }
     


     if( isset($_GET['action']) && $_GET['action'] == 'add')
     {
          include_once '../views/addmembers.php';
     }
     if( isset($_GET['action']) && $_GET['action'] == 'Add'  )
     {
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            try
        {
          $file = $_FILES['avater'];
          $extension = array("jpeg","png","jpg",'gif');
          $avtersize = 419304;
          $dirct = "../uploads/";
          $ufile = new upload($file,$extension,$avtersize,$dirct);
          $ufile->upload(0);

          $imgpath =  $ufile->geturl();
          $valid = new  validtor();
          $valid->check_Empty($_POST['username'],"User Name");
          $valid->check_Empty($_POST['FullName'],"Full Name");
          $valid->check_Empty($_POST['email'],"Email");
         $data['UserName']=$_POST['username'];
         $data['Avater']= $imgpath;
         $newpas = $_POST['newPassword'];
         $data['FullName']=$_POST['FullName'];
         $data['Email']=$_POST['email'];
         $data['Date'] = date("Y-m-d");
         $data['RegStatus'] = 1;
         $data['Password'] =  sha1($newpas);
        $addmember = new operateDB('users');
        $addmember ->adddata($data);
        $flag = 1;
        $error = '';
        $check = TRUE;
        $message  = "<div class=\"alert alert-primary text-muted text-center\" role=\"alert\">
                        This Add Sucessful !
                    </div>";
            
         }
         catch(Exception $ex)
         {
            $error =  $ex->getMessage();
             $message = "<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                            This Add not succeeses .<br> $error!
                        </div>";
            $flag = 1;
            
             $check = FALSE;
         }
         redirect($message,'back');
         include_once "../views/update.php";
        }
        else
            {
                $error = "<div class=\"alert alert-primary text-muted text-center\" role=\"alert\">
                            Cant Access To This Page Directory !
                            </div>";
                            redirect($error);
                
            }
    }
     

     if( isset($_GET['action']) && $_GET['action'] == 'delete')
     {
        $id = intval($_GET['id']);
        try
        {
        $deletemember = new operateDB('users');
        $d = $deletemember->Get_data_by_colum('UserID',$id);
        if(empty($d['Avater'] == FALSE))
        {
            $d_image  =  new deltefile($d['Avater']);
        }
        $d = $deletemember->Get_data_by_colum('UserID',$id);
        $check = $deletemember ->deldatabyidandcolum('UserID',$id);
        $flag = 3;
        $message = "<div class=\"alert alert-primary text-muted text-center\" role=\"alert\">
                        This Delete Sucessful !
                    </div>";
        }
        catch(Exception $ex)
        {
            $error =  $ex->getMessage();
            $message = "<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                        This Delete not succeeses .<br> $error!
                    </div>";
           $flag = 3;
           
            $check = FALSE;
        }
        redirect($message,'back');
        include_once "../views/update.php";
        
     }

     if( isset($_GET['action']) && $_GET['action'] == 'pending')
     {
         
     }

    ob_end_flush();
 }
 else
 {
     include_once "..'/controller/mange.php";
 }
?>