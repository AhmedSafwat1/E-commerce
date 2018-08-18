<?php
include_once "../include/function/autoloader.php" ;
include_once "../include/function/redirect.php";
ob_start();
$PageTitle = 'Categories';
if($_SERVER['REQUEST_METHOD']=="POST" || @$_GET['action'])
{
    if(isset($_GET['action']) && $_GET['action'] == 'Add')
    {
        try
        {
            $valid = new  validtor();
            $valid->check_Empty($_POST['Name']," Name");
            $valid->check_Empty($_POST['price']," price");
            $valid->check_Empty($_POST['country']," country");
            $valid->sentize($_POST['Name'],'str');
            $valid->sentize($_POST['tags'],'str');
            $valid->sentize($_POST['price'],'int');
            $valid->check_int($_POST['price']);
            $file = $_FILES['avater'];
            $extension = array("jpeg","png","jpg",'gif');
            $avtersize = 419304;
            $dirct = "../app/uploads/";
            $ufile = new upload($file,$extension,$avtersize,$dirct);
            $ufile->upload(0);
  
            $imgpath =  $ufile->geturl();
           
            $imgpath = str_replace("../app/","../",$imgpath);
            if($_POST['status'] == 0 )
            {
                throw new Exception("Error Processing : must add the status") ;
                
            }
            if($_POST['cat'] == 0 )
            {
                throw new Exception("Error Processing : must add the status") ;
                
            }
            if($_POST['cat'] == 0 )
            {
                throw new Exception("Error Processing : must add the Categories") ;
                
            }
            $getuser = new operateDB('users');
            $user = $getuser->Get_data_by_colum('UserName',$_SESSION['name']);
            $dataadv['Name'] = $_POST['Name'];
            $dataadv['Description'] = $_POST['description'];
            $dataadv['Price'] = $_POST['price'];
            $dataadv['Country_Made'] = $_POST['country'];
            $dataadv['Status'] = $_POST['status'];
            $dataadv['Add_Date'] = date("Y-m-d");
            $dataadv['Member_ID']=  $user['UserID'];
            $dataadv['Cat_ID']= $_POST['cat'];
            $dataadv['Tags']= $_POST['tags'];
            $dataadv['Image']= $imgpath;
            $additem = new operateDB('items');
            $additem ->adddata($dataadv);
            // $additem->adddata($data);
        //   $additem ->adddata();
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
        }
    redirect($message,'back');
    }
}
else
{
    $getCategories = new operateDB('categories');
    $datacategories = $getCategories->Get_all();
    include_once "views/addads.php";
}