<?php
include_once "../include/function/autoloader.php" ;
include_once "../include/function/redirect.php";
ob_start();
$PageTitle = 'Categories';
if($_SERVER['REQUEST_METHOD']=="POST" || @$_GET['action'] || @$_GET['sorting'])
{

}
else
{
  
        
        try
            {
                $cat2 = new operateDB('items');
                $cond = "where Approve = 1";
                $dataall = $cat2->Get_all_ordering('Item_ID',"ASC",$cond);
                $check = TRUE;
            }
        catch(Exception $ex)
            {
                $error = $ex->getMessage();
                $check = FALSE;
            }
            include_once "views/allacategories.php";
    

}
ob_end_flush();
?>
