<h2 class="h1 text-muted text-center mt-4 mt-5"> Update Member </h2>

<?php 
global $flag;
global $check;
global $error;
   if($flag == 2)
   {
     
    if($check == FALSE)
    {
     echo"<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
     This Update not succeeses .<br> $error!
   </div>";
    }
    else
    {
     echo"<div class=\"alert alert-primary text-muted text-center\" role=\"alert\">
     This Update Sucessful !
   </div>";
    }
   }
   if($flag == 1)
   {
    if($check == FALSE)
    {
     echo"<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
     This Add not succeeses .<br> $error!
   </div>";
    }
    else
    {
     echo"<div class=\"alert alert-primary text-muted text-center\" role=\"alert\">
     This Add Sucessful !
   </div>";
    }
   }
   if($flag == 3)
   {
     
    if($check == FALSE)
    {
     echo"<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
     This Delete not succeeses .<br> $error!
   </div>";
    }
    else
    {
     echo"<div class=\"alert alert-primary text-muted text-center\" role=\"alert\">
     This Delete Sucessful !
   </div>";
    }
   }
?>