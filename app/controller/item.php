<?php
/*
** Items page controller
** containt Edit update delete insert
** if not have action routing to the dispalay page
**
**/
include_once "../include/function/autoloader.php" ;
include_once "../include/function/redirect.php";
ob_start();
$PageTitle = 'Items';
if($_SERVER['REQUEST_METHOD']=="POST" || @$_GET['action'] || @$_GET['sorting'])
{
  
    if( isset($_GET['action']) && $_GET['action'] == 'add')
     {
       $dataemember = new operateDB('users');
       $getCategories = new operateDB('categories');
       try
       {
           $datamember = $dataemember->getdatabygroupid();
           $datacategories = $getCategories->Get_all();
           $check = True;
           include_once "../views/Addtem.php" ;
       }
       catch(Exception $ex)
       {
           $error = $ex->getMessage();
           $check = FALSE;
           $message = "<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                           Error Cant add item Beacuse no have Member or Categories $error!
                            </div>";
           redirect($message);
       }
      
     }
     if( isset($_GET['sorting']) && in_array($_GET['sorting'], $soorting))
     {
       
     }
     if( isset($_GET['action']) && $_GET['action'] == 'Add'  )
     {
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            
            try
                {
                 
                    $valid = new  validtor();
                    $valid->check_Empty($_POST['Name']," Name");
                    $valid->check_Empty($_POST['price']," price");
                    $valid->check_Empty($_POST['country']," country");
                    $valid->check_int($_POST['price']);
                    $file = $_FILES['avater'];
                    $extension = array("jpeg","png","jpg",'gif');
                    $avtersize = 419304;
                    $dirct = "../uploads/";
                    $ufile = new upload($file,$extension,$avtersize,$dirct);
                    $ufile->upload(0);
          
                    $imgpath =  $ufile->geturl();
                    if($_POST['status'] == 0 )
                    {
                        throw new Exception("Error Processing : must add the status") ;
                        
                    }
                    if($_POST['Members'] == 0 )
                    {
                        throw new Exception("Error Processing : must add the status") ;
                        
                    }
                    if($_POST['cat'] == 0 )
                    {
                        throw new Exception("Error Processing : must add the status") ;
                        
                    }
                    $data['Name'] = $_POST['Name'];
                    $data['Image'] = $imgpath;
                    $data['Description'] = $_POST['description'];
                    $data['Price'] = $_POST['price'];
                    $data['Country_Made'] = $_POST['country'];
                    $data['Status'] = $_POST['status'];
                    $data['Add_Date'] = date("Y-m-d");
                    $data['Member_ID']=  $_POST['Members'];
                    $data['Cat_ID']= $_POST['cat'];
                    $data['Tags']= $_POST['tags'];
                    $additem = new operateDB('items');
                    $additem->adddata($data);
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
        else
            {
                $error = "<div class=\"alert alert-primary text-muted text-center\" role=\"alert\">
                            Cant Access To This Page Directory !
                            </div>";
                            redirect($error);
                
            }
    }

    if( isset($_GET['action']) && $_GET['action'] == 'edit' && is_numeric($_GET['id']) )
     {
         
         $id = intval($_GET['id']);
         try
         {
            $dataemember = new operateDB('users');
            $getCategories = new operateDB('categories');
            $datamember = $dataemember->getdatabygroupid();
            $datacategories = $getCategories->Get_all();
            $Getitem = new operateDB('items');
            $check =  $Getitem->Get_data_by_colum('Item_ID',$id);
            $memberdata = $Getitem->data;
            include_once "../views/edititem.php";
            
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
     if( isset($_GET['action']) && $_GET['action'] == 'update'  )
     {
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
           
            try
                {

                    
                     
                    $valid = new  validtor();
                    $valid->check_Empty($_POST['Name']," Name");
                    $valid->check_Empty($_POST['price']," price");
                    $valid->check_Empty($_POST['country']," country");
                    $valid->check_int($_POST['price']);
                    if($_POST['status'] == 0 )
                    {
                        throw new Exception("Error Processing : must add the status") ;
                        
                    }
                    if($_POST['Members'] == 0 )
                    {
                        throw new Exception("Error Processing : must add the status") ;
                        
                    }
                    if($_POST['cat'] == 0 )
                    {
                        throw new Exception("Error Processing : must add the status") ;
                        
                    }
                    $data['Name'] = $_POST['Name'];
                    $data['Description'] = $_POST['description'];
                    $data['Price'] = $_POST['price'];
                    $data['Country_Made'] = $_POST['country'];
                    $data['Status'] = $_POST['status'];
                    $data['Add_Date'] = date("Y-m-d");
                    $data['Member_ID']=  $_POST['Members'];
                    $data['Cat_ID']= $_POST['cat'];
                    $data['Tags']= $_POST['tags'];
                    $additem = new operateDB('items');
                    $id= $_POST['id'];
                    $d = $additem->Get_data_by_colum('Item_ID',$id);
                    if(empty($d['Image']) == FALSE && empty($_FILES['avater']['name']) == FALSE)
                    {
                        $d_image  =  new deltefile($d['Image']);
                    }
                    $imgpath =$d['Image'];
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
                  
                 
                    $data['Image']= $imgpath;
                    $additem->update_data_byColum($data,'Item_ID', $id);
            //   $additem ->adddata();
                $message  = "<div class=\"alert alert-primary text-muted text-center\" role=\"alert\">
                                This Update Sucessful !
                            </div>";
                    
                }
                catch(Exception $ex)
                {
                    $error =  $ex->getMessage();
                    $message = "<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                                    This Update not succeeses .<br> $error!
                                </div>";
                }
         redirect($message,'back');
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
        $deletitems = new operateDB('items');
        $d =$deletitems->Get_data_by_colum('Item_ID',$id);
        if(empty($d['Image'] == FALSE))
        {
            $d_image  =  new deltefile($d['Image']);
        }
        $check =  $deletitems ->deldatabyidandcolum('Item_ID',$id);
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
           
            $check = FALSE;
        }
        redirect($message,'back');
    }

    if( isset($_GET['action']) && $_GET['action'] == 'approve' && is_numeric($_GET['id']) )
    {
        
        $id = intval($_GET['id']);
        try
        {
           $approveitem = new operateDB('items');
           $data['Approve'] = 1;      
           $approveitem->update_data_byColum($data,'Item_ID', $id);  
           $message = "<h2 class='h1 text-center text-muted mt-3 mb-3'>Approve Items Operate</h2>
           <div class=\"alert alert-primary text-muted text-center\" role=\"alert\">
                           This Approve Sucessful !
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


}
else
{
    $getitem = new operateDB('items');
    try
    {
        if(isset($_GET) && isset($_GET['approve']))
        {
            $dataitems =  $getitem->getData_inner('categories','users',"Cat_ID",'Member_ID','ID','UserID',',categories.Name,users.UserName','WHERE Approve = 0');
        }
        else
        {
            $dataitems =  $getitem->getData_inner('categories','users',"Cat_ID",'Member_ID','ID','UserID',',items.Name AS item_n,categories.Name,users.UserName');
        }
        $check = True;
    }
    catch(Exception $ex)
    {
        $error = $ex->getMessage();
        $check = FALSE;
    }
    include_once "../views/item.php";
}
ob_end_flush();
?>