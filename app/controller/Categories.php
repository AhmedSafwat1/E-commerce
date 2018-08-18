<?php
/*
** Categories page controller
** containt Edit update delete insert
** if not have action routing to the dispalay page
**
**/
include_once "../include/function/autoloader.php" ;
include_once "../include/function/redirect.php";
ob_start();
$PageTitle = 'Categories';
if($_SERVER['REQUEST_METHOD']=="POST" || @$_GET['action'] || @$_GET['sorting'])
{
    $soorting = array('ASC','DESC');
    if( isset($_GET['action']) && $_GET['action'] == 'add')
     {
          $getCategories = new operateDB('categories');
          $datacategories = $getCategories->Get_all_sorting("ID",$sorting='ASC',$cond ="where Parent = 0" );
          include_once '../views/addcategories.php';
     }
     if( isset($_GET['sorting']) && in_array($_GET['sorting'], $soorting))
     {
        $getCategories = new operateDB('categories');
       
        try
        {
            $datacategories = $getCategories->Get_all_sorting('Ordering',$_GET['sorting']);
            $check = True;
        }
        catch(Exception $ex)
        {
            $error = $ex->getMessage();
            $check = FALSE;
        }
        include_once "../views/Categories.php";
     }
     if( isset($_GET['action']) && $_GET['action'] == 'Add'  )
     {
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            // `ID`, `Name`, `Description`, `Ordering`, `Visiblity`, `Allow_Comments`, `Allow_Ads`
            try
                {
              $valid = new  validtor();
              $valid->check_Empty($_POST['name'],"Name  Page");
              if(!empty($_POST['ordering']))
              {
                $valid->sentize($_POST['ordering'],'int');
              }
              $data['Name'] = $_POST['name'];
              $data['Parent'] = $_POST['parent'];
              $data['Description'] = $_POST['description'];
              $data['Ordering'] = $_POST['ordering'];
              $data['Visiblity'] = $_POST['visible'];
              $data['Allow_Comments'] = $_POST['commenting'];
              $data['Allow_Ads'] = $_POST['ads'];
              $addcategories = new operateDB('categories');
              $addcategories->adddata($data);
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
            $getCategories = new operateDB('categories');
            $datacategories = $getCategories->Get_all_sorting("ID",$sorting='ASC',$cond ="where Parent = 0" );
            $Getmember = new operateDB('categories');
            $check = $Getmember->Get_data_by_colum('ID',$id);
            $catdata = $Getmember->data;

            include_once "../views/editcategories.php";
            
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
     if( isset($_GET['action']) && $_GET['action'] == 'update'  )
     {
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            // `ID`, `Name`, `Description`, `Ordering`, `Visiblity`, `Allow_Comments`, `Allow_Ads`
            try
                {
              $valid = new  validtor();
              $valid->check_Empty($_POST['name'],"Name  Page");
              if(!empty($_POST['ordering']))
              {
                $valid->sentize($_POST['ordering'],'int');
              }
              $id = $_POST['id'];
              $data['Name'] = $_POST['name'];
              $data['Parent'] = $_POST['parent'];
              $data['Description'] = $_POST['description'];
              $data['Ordering'] = $_POST['ordering'];
              $data['Visiblity'] = $_POST['visible'];
              $data['Allow_Comments'] = $_POST['commenting'];
              $data['Allow_Ads'] = $_POST['ads'];
              $addcategories = new operateDB('categories');
              $addcategories->update_data_byColum($data,'ID', $id);
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
       $deletecatag = new operateDB('categories');
       $check = $deletecatag->deldatabyidandcolum('ID',$id);
     
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




}
else
{
    $getCategories = new operateDB('categories');
    try
    {
        $datacategories = $getCategories->Get_all_sorting("ID",$sorting='ASC',$cond ="where Parent = 0" );
        $check = True;
    }
    catch(Exception $ex)
    {
        $error = $ex->getMessage();
        $check = FALSE;
    }
    include_once "../views/Categories.php";
}
ob_end_flush();
?>