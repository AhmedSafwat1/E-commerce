<?php 
  // this class using to connect to database take in the file of the variable
  class database
  {
    private $user;
    private $password;
    private $dsn;
    public $conn;
    private $option ;
    function __construct($filename)
    {
        // check the file
       if(is_file($filename))
       {
        include $filename;
       }
       else{
        throw new Exception("error:can't connect to database ");
       }
       $this->user = $user;
       $this->password = $pass ;
       $this->dsn = $dsn;
       $this->option = $option;
       $this->connect();

    }
//   this function to connect database and return conn
   private function connect()
   {
      try
      {
        $this->conn = new PDO($this->dsn,$this->user,$this->password, $this->option );
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return TRUE;
      }
      catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            return FALSE;
            }
   }


  }
?>