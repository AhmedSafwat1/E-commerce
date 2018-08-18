<?php
   include_once "../include/function/autoloader.php" ;
   autoloader('DB_Connect.php');
   class operateDB extends DB_Connect
   {
    private $tablename ;
    private $db;
    private $id;
    public $data;
    function __construct($table)
    {
        $this->tablename = $table;
    }
    function login_u_p($user,$haspass,$groupId=0)
    {
        $this->db = $this->conectDb();
        $stmt = $this->db->conn->prepare("select * from $this->tablename where UserName = ? and Password = ? and GroupID = ?");
        $stmt->execute(array($user,$haspass,$groupId));
        $count = $stmt->rowCount();
        if($count > 0)
        {
             $this->close($this->db);
             return TRUE;
        }
        else
        {
            throw new Exception("Error Processing Not Found The userName or password error");
            $this->close($this->db);
            return FALSE;
            
        }
    }
    function login_all($user,$haspass)
    {
        $this->db = $this->conectDb();
        $stmt = $this->db->conn->prepare("select * from $this->tablename where UserName = ? and Password = ? ");
        $stmt->execute(array($user,$haspass));
        $count = $stmt->rowCount();
        if($count > 0)
        {
             $this->close($this->db);
             return TRUE;
        }
        else
        {
            throw new Exception("Error Processing Not Found The userName or password error");
            $this->close($this->db);
            return FALSE;
            
        }
    }
   

    /*
    ** check status of user for active or no 
    **
    **
    */
    function check_status($user)
    {
        $this->db = $this->conectDb();
        $stmt = $this->db->conn->prepare("select * from $this->tablename where UserName = ? and RegStatus = 0 ");
        $stmt->execute(array($user));
        $status = $stmt->rowCount();
        $this->close($this->db);
        return $status ;

        
    }
   
    function Get_id_login($user,$haspass,$groupId=0)
    {
        $this->db = $this->conectDb();
        $stmt = $this->db->conn->prepare("select * from $this->tablename where UserName = ? and Password = ? and GroupID = ? LIMIT 1");
        $stmt->execute(array($user,$haspass,$groupId));
        $count = $stmt->rowCount();
        $this->data = $stmt->fetch();
        if($count > 0)
        {
            $this->close($this->db);
             return TRUE;
        }
        else
        {
            throw new Exception("Error Processing Not Found The userName or password error");
            $this->close($this->db);
            return FALSE;
            
        }
    }
    function Get_data_by_colum($colum,$cond)
    {
        $this->db = $this->conectDb();
        $stmt = $this->db->conn->prepare("select * from $this->tablename where $colum = ? LIMIT 1");
        $stmt->execute(array($cond));
        $count = $stmt->rowCount();
        $this->data = $stmt->fetch();
        if($count > 0)
        {
            return $this->data ;
            $this->close($this->db);
             return TRUE;
            
            
        }
        else
        {
            throw new Exception("Error Processing Not Found The userName or password error");
            $this->close($this->db);
            return FALSE;
            
        }
    }
    function update_data_byColum($data ,$colum,$cond)
    {
        $this->db = $this->conectDb();
        $query  = "update $this->tablename set ";
        foreach ($data as $key => $value) {
            # code...
            $query .= $key." ='".$value."' , ";
        }
        $apt ="*/*-";
        $query .= $apt;
        $query = str_replace(', '.$apt," ",$query);
        $query .= " where $colum = '$cond'"; 
        try{
            $this->db = $this->conectDb();
            $stmt = $this->db->conn->prepare($query);
            $stmt->execute();
            echo "<br>".$stmt->rowCount();
            $this->close($this->db);
            return TRUE;

        }catch(PDOException $e)
        {
        throw new Exception("Error:not update ".$e->getMessage());
        $this->close($this->db);
        return FALSE;
        
        }
    }
/*
** get all data using to return all data in table
** not have any peramter
** using the name of the table whic using to declare of the object
*/
function Get_all()
    {
        $this->db = $this->conectDb();
        $stmt = $this->db->conn->prepare("select * from $this->tablename");
        $stmt->execute();
        
        $this->data = $stmt->fetchAll();
        $count = $stmt->rowCount();
        if($count > 0)
        {
            $this->close($this->db);
            return $this->data;
            
            
        }
        else
        {
            throw new Exception("Error Processing Not Found Data in Table  ");
            $this->close($this->db);
            return FALSE;
            
        }
    }


    function adddata($data)
    {
        $this->db = $this->conectDb();

        foreach ($data as $key => $value) {
            $keys[] = $key;
            $values[] =$value;
        }
        $tablkey = implode(",",$keys);
        $tablevalue  = "'".implode("','",$values)."'";
        $query = "insert into $this->tablename($tablkey) values($tablevalue)";
        try{
            $this->db->conn->exec($query);
            $this->close($this->db);
            return TRUE;
        
        }catch(PDOException $e)
        {
        throw new Exception("Error:not add  beacuse"."<br>" . $e->getMessage());
        return FALSE;
        
        }

    }

function getdatabygroupid($groupId=1,$query2="",$orderby="UserID",$type="DESC")
{
    
  try  
  {
        $this->db = $this->conectDb();
        $query = " select * FROM $this->tablename where GroupID != ? $query2 ORDER BY $orderby $type";
        $stmt = $this->db->conn->prepare($query);
        $stmt->execute(array($groupId));
    // set the resulting array to associative
    
        $this->data = $stmt->fetchAll() ;
        if(count($this->data) >= 1)
        {    
            $this->close($this->db);
            return $this->data;
            

        }
        else
        {        
            throw new Exception("Error: empty table");
            return FALSE;
        }
    }
    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}

function deldatabyidandcolum($colum,$id,$cond="")
    {
        $query = " delete FROM $this->tablename WHERE $colum = '$id' $cond";
        try{
            $this->db = $this->conectDb();
            $this->db->conn->exec($query);
            $this->close($this->db);
            return TRUE;

        }catch(PDOException $e)
        {
        echo "<br>" . $e->getMessage();
        throw new Exception("Error:not delete ");
        $this->close($this->db);
        return FALSE;
        
        }

    }
    function count_row($col ,$query="")
    {
        try
        {
        $this->db = $this->conectDb();
        $stmt = $this->db->conn->prepare("SELECT COUNT($col) from $this->tablename ".$query);
        $stmt->execute();
        return  $stmt->fetchColumn();
        }catch(PDOException $e)
        {
        echo "<br>" . $e->getMessage();
        throw new Exception("Error:not Complate ");
        $this->close($this->db);
        return FALSE;
        
        }
    }

    /*
    **  Get the last record function
    **  function to get latest item from database (user,comments,items)
    ** Table get from the class properates
    ** Limit will get when call function
    ** Selct which want to get user all *
    */
    function getlatest($select,$order,$limit)
    {
        try
        {
            $this->db = $this->conectDb();
            $stmt = $this->db->conn->prepare("select $select from $this->tablename ORDER by $order DESC LIMIT $limit");
            $stmt->execute();
            $this->data = $stmt->fetchAll() ;
            return   $this->data ;
           
        }catch(PDOException $e)
        {
            echo "<br>" . $e->getMessage();
            throw new Exception("Error:not Complate ");
            $this->close($this->db);
            return FALSE;
            
        }
    }

    /*
** get all data  and sorting Aes or Des using to return all data in table
** not have any peramter
** using the name of the table whic using to declare of the object
*/
function Get_all_sorting($order,$sorting='ASC',$cond ="",$flag=1)
{
    $this->db = $this->conectDb();
    $sql = "select * from $this->tablename  $cond ORDER by $order $sorting";
    $stmt = $this->db->conn->prepare("select * from $this->tablename  $cond ORDER by $order $sorting");
    $stmt->execute();
    $count = $stmt->rowCount();
    $this->data = $stmt->fetchAll();
    if($flag == 1)
    {
        if($count > 0)
        {
            $this->close($this->db);
            return $this->data;
            
            
        }
        else
        {
            throw new Exception("Error Processing Not Found The userName or password error");
            $this->close($this->db);
            return FALSE;
            
        }
    }
    else
    {
        return  $this->data ;
    }
}

function Check_exist($colm1,$val1,$id,$val2)
{
    $this->db = $this->conectDb();
    $stmt = $this->db->conn->prepare("select * from $this->tablename where $colm1 = ? and $id = ? ");
    $stmt->execute(array($val1,$val2));
    $count = $stmt->rowCount();
    $this->close($this->db);
    if($count > 0)
    { 
        throw new Exception("Error Processing This conflict with the colum in Database");
        $this->close($this->db);
        return FALSE;
    }

}

/*
** functiion getdatainner 
** this function get data by join the two table using join 
** return all data from this tables
**
*/
function getData_inner($table_inner1,$table_inner2,$colum1,$colum2,$colum_in,$colum_in2,$select_inner ="",$condition="",$flag = 1)
{
    $this->db = $this->conectDb();
    $sql = "select $this->tablename.* $select_inner from $this->tablename 
    INNER JOIN $table_inner1 ON $table_inner1.$colum_in = $this->tablename.$colum1
    INNER JOIN $table_inner2 ON $table_inner2.$colum_in2 = $this->tablename.$colum2
    $condition
    ";
    $stmt = $this->db->conn->prepare($sql);
    $stmt->execute();
    $count = $stmt->rowCount();
    $this->data = $stmt->fetchAll();
    if($flag == 1)
    {
        if($count > 0 )
        {
            $this->close($this->db);
            return $this->data;
            
            
        }
        else
        {
            throw new Exception("Error Processing Not Found The userName or password error");
            $this->close($this->db);
            return FALSE;
            
        }
    }
    else
    {
        return $this->data;
    }
}
/*
** Get all data function this return data but make ordring as we want 
** ordering can ASC Or DESC
** Take the ordering colum and Type 
**
*/
function Get_all_ordering($orederby,$type ,$cond="")
    {
        $this->db = $this->conectDb();
        $stmt = $this->db->conn->prepare("select * from $this->tablename $cond ORDER by $orederby $type");
        $stmt->execute();
        
        $this->data = $stmt->fetchAll();
        $count = $stmt->rowCount();
        if($count > 0)
        {
            $this->close($this->db);
            return $this->data;
            
            
        }
        else
        {
            throw new Exception("Error Processing Not Found Data in Table  ");
            $this->close($this->db);
            return FALSE;
            
        }
    }

}
?>