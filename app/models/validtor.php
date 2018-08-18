<?php
 class validtor
{
    function validate($post,$rul)
    {
       print_r($_POST);
       echo "<br>";
       print_r($rul);
       echo "<br>";
       
        $valid = TRUE;
        foreach ($rul as $k => $r) {
            # code...
           $callback = explode('|',$r);
           foreach ($callback as $func) {
               # code...
               $value = isset($post[$k])?$post[$k]:NULL;
               if(is_array($value))
               { 
                   foreach ($value as $v) {
                        if($this->$func($v) == FALSE)
                        {
                            $valid = FALSE;
                            throw new Exception("Error Processing Request not Valid");
                                
                        }
                   }

               }else
               {
                   $func;
                   if($this->$func($value) == FALSE)
                   {
                        $valid = FALSE;
                        throw new Exception("Error Processing Request not Valid$k");
                              
                   }
               }
           }
        }
        return $valid;

    }
    function check_str($val)
    {
        $patern = "'[A-Za-zى-ا0-9]'\",().:-$";
        $valid = preg_match($patern,$val);
        if($valid)
        {
            return $valid;
        }
        else{
            throw new Exception("Error Processing Not Valid name");
          }
   }
    function check_str2($val)
    {
        if (!preg_match("/^[a-zA-Z ]*$/",$val)) {
           throw new Exception("Error Processing  Not correct Name");
           
          }
          return TRUE;
    }
    function check_Email($val)
    {
    
        $valid = filter_var($val,FILTER_VALIDATE_EMAIL);
        if($valid == TRUE)
        {
            return $valid;
        }
        else{
            throw new Exception("Error Processing Not1 Valid Email $val");
             return FALSE;
        }
    }
    function check_Url($val)
    {
        $valid = filter_var($val,FILTER_VALIDATE_URL);
        if($valid)
        {
            return $valid;
        }
        else{
            throw new Exception("Error Processing Not Valid URL");
            
        }
    }
    function check_ip($val)
    {
        $valid = filter_var($val,FILTER_VALIDATE_IP);
        if($valid)
        {
            return $valid;
        }
        else{
            throw new Exception("Error Processing Not Valid IP");
            
        }
    }
    function check_int($val)
    {
        $valid = filter_var($val,FILTER_VALIDATE_INT);
        if($valid)
        {
            return $valid;
        }
        else{
            throw new Exception("Error Processing Not Valid INIT");
            
        }
    }
    function check_Empty($val,$flag)
    {
        $valid  = empty($val);
        if($valid == TRUE)
        {
        
            throw new Exception("Error Processing $flag Not Valid Empty$val");
            return FALSE;
            
        }
        else{
            return TRUE;
        }
    }
    function check_Url2($url)
    {
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
            throw new Exception("Error Processing Request not Correft url");
            
          }
          else{
              return TRUE;
          }
    }
    function sentize($val,$key)
    {
        $flag = NULL;
        switch ($key) {
            case 'email':
                $val = substr($val,0,250);
                $fiter = FILTER_SANITIZE_EMAIL;
                break;
            case 'url':
                $fiter = FILTER_SANITIZE_URL;
                break;
            case 'int':
                $fiter = FILTER_SANITIZE_NUMBER_INT;
                break;
            default:
                # code...
                $fiter = FILTER_SANITIZE_STRING;
                $flag =  FILTER_FLAG_NO_ENCODE_QUOTES;
                break;
        }
        $valid = filter_var($val,$fiter,$flag);
        if($valid)
        {
            return $valid;
        }
        else{
            throw new Exception("Error Processing Not Valid $key");
            
        }
        
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }



}


?>