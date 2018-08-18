<?php
   function gettitle()
   {
       global $PageTitle;
       if(isset($PageTitle))
       {
           echo $PageTitle;
       }
       else
       {
           echo "Default";
       }
   }
?>