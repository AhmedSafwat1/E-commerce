<?php
  include_once "../include/function/autoloader.php" ;
  include_once "../include/function/redirect.php";
  try
  {
     $member = new operateDB('users');
     $item = new operateDB('items');
     $coment = new operateDB('comments');
     $countnumbers =  $member->count_row('UserID');
     $countpending =  $member->count_row('UserID'," where RegStatus = 0 ");
     $countitem =  $item->count_row('Item_ID');
     $datamemer = $member->getlatest("*","UserID",5);
     $dataitem = $item->getlatest("*","Item_ID",5);
     $countcomments = $coment->count_row('C_ID');
    $getcomments = new operateDB('comments');
    $cond = "ORDER BY C_ID DESC LIMIT 5";
    $datacoments =  $getcomments->getData_inner('items','users',"Item_ID",'Member_ID','Item_ID','UserID',',items.Name,users.UserName',$cond,0);
   
  }
  catch(Exception $ex)
  {
      $error =  $ex->getMessage();
      $message = "<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                  $error!
                 </div>";
  }
  include_once "../views/hom.php"; 
?>
 