<?php 
include_once "../include/function/autoloader.php" ;
include_once "../include/function/redirect.php";
ob_start();
 if($_SERVER['REQUEST_METHOD']=="POST" || @$_GET['action'] || @$_GET['go'])
 {
     if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'edit' && is_numeric($_GET['id']))
     {
        $id = intval($_GET['id']);
        try
        {
            $getCategories = new operateDB('categories');
            $datacategories = $getCategories->Get_all();
           $Getitem = new operateDB('items');
           $check =  $Getitem->Get_data_by_colum('Item_ID',$id);
           $memberdata = $Getitem->data;
           include_once "views/items.php";
           
        }
        catch(Exception $ex)
        {
            $error =  $ex->getMessage();
            $message = "<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                        $error!
                       </div>";
            redirect($message,'back');
        }
     }
     if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'delete' && is_numeric($_GET['id']))
     {
        $id = intval($_GET['id']);
        try
        {
           $Getitem = new operateDB('items');
           $getuser = new operateDB('users');
           $user = $getuser->Get_data_by_colum('UserName',$_SESSION['name']);
           $g = $user['UserID'];
           $cond = "and Member_ID = $g";
           $Getitem->deldatabyidandcolum('Item_ID',$id,$cond);
           $message = "<div class=\"alert alert-primary text-muted text-center\" role=\"alert\">
                        Delete Sucesss !
                       </div>";
           
        }
        catch(Exception $ex)
        {
            $error =  $ex->getMessage();
            $message = "<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                        $error!
                       </div>";
            redirect($message,'back');
        }
        redirect($message,'back');
     }

     if(isset($_GET['action']) && $_GET['action'] == 'addcoment' && $_POST['submit'] == "Comments" )
     {
        try
        {
            $valid = new  validtor();
            if(!isset($_SESSION['name']))
            {
               throw new Exception("Error Processing :");
               
            }
            $getuser = new operateDB('users');
            $user = $getuser->Get_data_by_colum('UserName',$_SESSION['name']);
            $valid->check_Empty($_POST['coment']," comment");
            $valid->sentize($_POST['coment'],'str');
            $datacomment['Item_ID'] = $_POST['cid'];
            $datacomment['Comments'] = $_POST['coment'];
            $datacomment['Comment_Date'] = date('Y-m-d');
            $datacomment['Member_ID'] =  $user['UserID'];
            $comments = new operateDB('comments');
            $comments->adddata($datacomment);
            $message = "<div class=\"alert alert-info text-muted text-center\" role=\"alert\">
                            This Add Comment succeeses !
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

     if(isset($_GET['action']) && $_GET['action'] == 'update' && $_POST['submit'] == "Update" )
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
             $id = $_POST['id'];
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
             $dataadv['Tags'] = $_POST['tags'];
             $additem = new operateDB('items');
             $d =$additem->Get_data_by_colum('Item_ID',$id);
             if(empty($d['Image']) == FALSE && empty($_FILES['avater']['name']) == FALSE)
             {
                $ff= str_replace( "../uploads/" , "../app/uploads/",$d['Image']);
                 $d_image  =  new deltefile($ff);
             }
             $imgpath =$d['Image'];
           

             if(empty($_FILES['avater']['name']) == FALSE)
             {
                 $file = $_FILES['avater'];
                 $extension = array("jpeg","png","jpg",'gif');
                 $avtersize = 419304;
                 $dirct = "../app/uploads/";
                 $ufile = new upload($file,$extension,$avtersize,$dirct);
                 $ufile->upload(0);
                 $imgpath =  $ufile->geturl();
                 $imgpath = str_replace("../app/","../",$imgpath);
                
    
             }
           
          
             $dataadv['Image']= $imgpath;
             $additem->update_data_byColum($dataadv,'Item_ID', $id);;
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
     if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'showprof' && is_numeric($_GET['id']))
     {
        if(isset($_SESSION['name']))
        {
           try
           {
               $userid = $_GET['id'];
               $getuser = new operateDB('users');
               $getitems = new operateDB('items');
               $getcomments = new operateDB('comments');
               $user = $getuser->Get_data_by_colum('UserID',$userid);
               $conditems = "where Member_ID = ".$user['UserID'];
               $condcomments = "where Member_ID = ".$user['UserID'];
               $items = $getitems->Get_all_sorting('Item_ID',"DESC",$conditems,0);
               $comments = $getcomments->Get_all_sorting('C_ID',"DESC",$condcomments,0);
               // $cond = "ORDER BY C_ID DESC LIMIT 5";
               // $datacoments =$getcomments->getData_inner('items','users',"Item_ID",'Member_ID','Item_ID','UserID',',items.Name,users.UserName',$cond,0);
               $check = TRUE;
           }
           catch(Exception $ex)
           {
               $error = $ex->getMessage();
               $check = FALSE;
              
           }
           if($_SESSION['name'] == $user['UserName'])
           {
           include_once "views/profile.php" ;
           }
           else
           {
               include_once  "views/otherprofile.php" ;
           }
        }
        else
        {
            try
           {
               $userid = $_GET['id'];
               $getuser = new operateDB('users');
               $getitems = new operateDB('items');
               $getcomments = new operateDB('comments');
               $user = $getuser->Get_data_by_colum('UserID',$userid);
               $conditems = "where Member_ID = ".$user['UserID'];
               $condcomments = "where Member_ID = ".$user['UserID'];
               $items = $getitems->Get_all_sorting('Item_ID',"DESC",$conditems,0);
               $comments = $getcomments->Get_all_sorting('C_ID',"DESC",$condcomments,0);
               // $cond = "ORDER BY C_ID DESC LIMIT 5";
               // $datacoments =$getcomments->getData_inner('items','users',"Item_ID",'Member_ID','Item_ID','UserID',',items.Name,users.UserName',$cond,0);
               $check = TRUE;
           }
           catch(Exception $ex)
           {
               $error = $ex->getMessage();
               $check = FALSE;
              
           }
           include_once  "views/otherprofile.php" ;

        }
     }




     if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'view' && is_numeric($_GET['id']))
     {
        $id = intval($_GET['id']);
        try
        {
           $Getitem = new operateDB('items');
           $cond = "where Item_ID = $id LIMIT 1";
           $dataitems =  $Getitem->getData_inner('categories','users',"Cat_ID",'Member_ID','ID','UserID',',items.Name AS item_n,categories.Name,users.UserName',$cond,0);
         
           $getcomments = new operateDB('comments');
           $condcomment = "where items.Item_ID = $id and States != 0";
           
           
           $datacomments =  $getcomments->getData_inner('items','users',"Item_ID",'Member_ID','Item_ID','UserID',',users.UserName,users.Avater',$condcomment,0);
          
           if($dataitems[0]['Approve'] == 0 )
           {
            $message = "<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                            Wait Apprive Cant Acces Until it !
                        </div>";
                redirect($message,'back');
           }
           
           include_once "views/itemview.php";
           
        }
        catch(Exception $ex)
        {
            $error =  $ex->getMessage();
            $message = "<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                        $error!
                       </div>";
            redirect($message,'back');
        }
     }
     $message = "<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                        Will Redirect To home!
                       </div>";
  
 }
 else
 {
     if(isset($_SESSION['name']))
     {
        try
        {
            $getuser = new operateDB('users');
            $getitems = new operateDB('items');
            $getcomments = new operateDB('comments');
            $user = $getuser->Get_data_by_colum('UserName',$_SESSION['name']);
            $conditems = "where Member_ID = ".$user['UserID'];
            $condcomments = "where Member_ID = ".$user['UserID'];
            $items = $getitems->Get_all_sorting('Item_ID',"DESC",$conditems,0);
            $comments = $getcomments->Get_all_sorting('C_ID',"DESC",$condcomments,0);
            // $cond = "ORDER BY C_ID DESC LIMIT 5";
            // $datacoments =$getcomments->getData_inner('items','users',"Item_ID",'Member_ID','Item_ID','UserID',',items.Name,users.UserName',$cond,0);
            $check = TRUE;
        }
        catch(Exception $ex)
        {
            $error = $ex->getMessage();
            $check = FALSE;
           
        }
        
        include_once "views/profile.php" ;
     }
     else
     {
         include_once "views/login.php" ;
     }
   
 }
 ob_end_flush();
?>