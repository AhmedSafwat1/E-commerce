<?php
class DB_Connect
{
  function conectDb()
  {
    try
    {
        include_once "../include/function/autoloader.php" ;
        $vars = "../include/function/vars.php";
        $db = new database($vars);
    }
    catch(Exception $ex)
            {
                echo $ex->getMessage();
            }
      return $db;
    }
    function close($db)
    {
        $db->conn = null;

    }
}
?>