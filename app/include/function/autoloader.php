<?php
   function autoloader($classname)
   {
      $dirs = ['','./app/models/','./app/','./Site/','views/','models/','./','../app/models/','include/templates','include/function/','include/languages/','controller/','../models/'];
      $formats = ['%s.php.inc','%s.php','%s.class.php','class.%s.php','%sclass.php','%scontroller.php'];
      foreach ($dirs as $dir) {
          # code..
          foreach ($formats as $format) {
              # code...
              $path = $dir.sprintf($format,$classname);
              if(file_exists($path))
              {
                  include_once $path;
                 // echo 'hello';
                  return TRUE;
              }
          }
      }
      return FALSE;
   }
   spl_autoload_register('autoloader');
?>