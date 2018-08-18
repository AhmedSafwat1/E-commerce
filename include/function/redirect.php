<?php
    function redirect($errror,$url=NULL,$send=4)
    {
        if($url == NULL)
        {
            $url = "index.php";
        }else
        {
            if(isset( $_SERVER['HTTP_REFERER']) &&  $_SERVER['HTTP_REFERER'] != "")
            {
                $url  = $_SERVER['HTTP_REFERER'];
            }
            else
            {
                $url = "index.php";
            }
            
        }
        echo $errror;
        echo "<div class='alert alert-info'>You will direct to home page after $send</div>";
        header("refresh:$send;url=$url");
        exit();
    }
?>