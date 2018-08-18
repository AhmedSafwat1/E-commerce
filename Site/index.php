<?php
$PageTitle = "shop";
include_once "../include/function/autoloader.php" ;

try
    {
        $cat = new operateDB('categories');
        $data = $cat->Get_all_sorting("ID",$sorting='ASC',$cond ="where Parent = 0" );
        $check = TRUE;
    }
    catch(Exception $ex)
    {
        $error = $ex->getMessage();
        $check = FALSE;
    }
include_once "../include/function/init.php";



if(isset($_GET['page']))
           {
               $url = "controller/".$_GET['page'].".php";
               if(is_file($url))
               {
                include_once $url;
               }
               else
               {
                   echo 'error  this is not fille';
               }
           }
          else
          {
            include_once './controller/AllCategories.php';
          }


include_once "../include/templates/footer.php" ;
?>