<?php
include_once "../include/function/autoloader.php" ;
include_once "../include/function/redirect.php";
ob_start();
$PageTitle = 'Categories';
if($_SERVER['REQUEST_METHOD']=="POST" || @$_GET['action'] || @$_GET['sorting'])
{
     if(isset($_GET['action']) && $_GET['action']="viewtage"&&isset($_GET['tag']))
     {
        $namecat = str_replace('-'," ",$_GET['tag']);
        try
        {
            $cat = new operateDB('items');
            $cond = "where Tags like '%$namecat%' and Status = 1";
            $data = $cat->Get_all_ordering('Item_ID',"ASC",$cond,0);
            // die();
            $namecat .= " Tages" ; 
            $check = TRUE;
        }
    catch(Exception $ex)
        {
            $error = $ex->getMessage();
            $check = FALSE;
        }

        include_once "views/categories.php";
     }
}
else
{
        $namecat = str_replace('-'," ",$_GET['catn']);
    if(isset($_GET['id']) && is_numeric($_GET['id'])&&isset($_GET['catn']))
    {
        $id = intval($_GET['id']);
        $namecat = str_replace('-'," ",$_GET['catn']);
        
        try
            {
                $cat = new operateDB('items');
                $cond = "where Cat_ID = $id and Approve = 1";
                $data = $cat->Get_all_ordering('Item_ID',"ASC",$cond);
               
                $check = TRUE;
            }
        catch(Exception $ex)
            {
                $error = $ex->getMessage();
                $check = FALSE;
            }
            include_once "views/categories.php";
    }

}
ob_end_flush();
?>
