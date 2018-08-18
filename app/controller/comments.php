<?php
/*
** comments page controller
** containt Edit update delete 
** if not have action routing to the dispalay page
**
**/
include_once "../include/function/autoloader.php" ;
include_once "../include/function/redirect.php";
ob_start();
$PageTitle = 'Comments';
if($_SERVER['REQUEST_METHOD']=="POST" || @$_GET['action'] || @$_GET['sorting'])
{
    if( isset($_GET['action']) && $_GET['action'] == 'edit' && is_numeric($_GET['id']) )
    {
        
        $id = intval($_GET['id']);
        try
        {
           $Getcomment = new operateDB('comments');
           $check =  $Getcomment->Get_data_by_colum('C_ID',$id);
           $commentdata = $Getcomment->data;
           include_once "../views/editcoment.php";
           
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
            // `ID`, `Name`, `Description`, `Ordering`, `Visiblity`, `Allow_Comments`, `Allow_Ads`
            try
            {
          $valid = new  validtor();
          $valid->check_Empty($_POST['Comment'],"Comment");
         
          $id = $_POST['id'];
          $data['Comments'] = $_POST['Comment'];
          $addcategories = new operateDB('Comments');
          $addcategories->update_data_byColum($data,'C_ID', $id);
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
        $deletitems = new operateDB('comments');
        $check =  $deletitems ->deldatabyidandcolum('C_ID',$id);
      
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

    if( isset($_GET['action']) && $_GET['action'] == 'active' && is_numeric($_GET['id']) )
    {
        
        $id3 = intval($_GET['id']);
        try
        {
           $approvcome = new operateDB('comments');
           $data9['States'] = 1;      

           $approvcome->update_data_byColum($data9,'C_ID', $id3);  
           $message = "<h2 class='h1 text-center text-muted mt-3 mb-3'>Approve Items Operate</h2>
           <div class=\"alert alert-primary text-muted text-center\" role=\"alert\">
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
}
else
{
    $getcomments = new operateDB('comments');
    try
    {
        if(isset($_GET) && isset($_GET['approve']))
        {
            $dataitems =  $getcomments->getData_inner('items','users',"Item_ID",'Member_ID','Item_ID','UserID',',items.Name,users.UserName','WHERE Approve = 0');
        }
        else
        {
            $dataitems =  $getcomments->getData_inner('items','users',"Item_ID",'Member_ID','Item_ID','UserID',',items.Name,users.UserName');
        }
        $check = True;
    
        
    }
    catch(Exception $ex)
    {
        $error = $ex->getMessage();
        $check = FALSE;
    }
    include_once "../views/comments.php";
}
ob_end_flush();
?>