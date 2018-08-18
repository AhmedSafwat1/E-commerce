<?php
class upload
{
    private $allowedext ;
    private $maxsize ;
    private $file;
    private $uploaddirectory;
    private $fileurl=[];
    private $filename=[];
    function __construct($file,$allowedext,$maxsize,$uploaddirectory)
    {
        if(is_int($maxsize) && is_array($allowedext))
        {
            $this->file=$file;
            $this->allowedext = $allowedext;
            $this->maxsize = $maxsize;
            $this->uploaddirectory = $uploaddirectory;
        }
        else
        {
            throw new Exception("Error Processing Request file extenstion or max size");
            
        }

    }
    function upload($mode=1)
    { 
        $files = $this->file;
        $allowedext = $this->allowedext;
        $destion = $this->uploaddirectory;
        if($mode == 1)
        {
            for($i=0;$i<count($files['name']);$i++)
            {
            $filenaem = $files['name'][$i];
            $fileext = strtolower( end(explode('.',$filenaem)));
            $filesize = $files['size'][$i];
            $ereor = array();
            $filetemp = $files['tmp_name'][$i];
            print_r(explode('.',$filenaem));
            echo $fileext."  ".in_array($fileext,$allowedext);
            die();
            if(in_array($fileext,$allowedext) === FALSE)
            {
                $ereor['fileextenstion'] = " extenstion not allowed";
            }
            if(empty( $filenaem))
            {
                $ereor ['emptyName'] = 'sChose The File'; 
            }
            if ($filesize > $this->maxsize) {
                $ereor ['filesize'] = 'size must 2kb only'; 
                # code...
            }
            if(empty($ereor))
                {
                $random = rand(0,99);
              
                
                    $this->filename[$i] = $random.date('d-m-y')."_".$filenaem;
                    $dest =$destion.$random.date('d-m-y')."_".$filenaem;;
                    $this->fileurl[] = $dest;
                
                
               
                move_uploaded_file($filetemp,$dest);
               
                } 
                else{
                foreach ($ereor  as $value) {
                    # code...
                    throw new Exception("Error Processing Request ".$value);
                    
                }
                }
            }
            
        }
        else
        {
            
            $filenaem = $files['name'];
            $fileext = strtolower( end(explode('.',$filenaem)));
            $filesize = $files['size'];
            $ereor = array();
            $filetemp = $files['tmp_name'];
            if(in_array($fileext,$allowedext) === FALSE)
            {
                $ereor['fileextenstion'] = " extenstion not allowed";
            }
            if(empty( $filenaem))
            {
                $ereor ['emptyName'] = 'sChose The File'; 
            }
            if ($filesize > $this->maxsize) {
                $ereor ['filesize'] = 'size must 2kb only'; 
                # code...
            }
            if(empty($ereor))
                {
                $random = rand(0,99);
              
                
                    $this->filename = $random.date('d-m-y')."_".$filenaem;
                    $dest =$destion.$random.date('d-m-y')."_".$filenaem;;
                    $this->fileurl = $dest;
                
                
               
                move_uploaded_file($filetemp,$dest);
               
                } 
                else{
                foreach ($ereor  as $value) {
                    # code...
                    throw new Exception("Error Processing Request ".$value);
                    
                }
                }
            
        }
            return TRUE;
    }
    function geturl()
    {
        return $this->fileurl;
    }
    function getname()
    {
        return $this->filename;
    }
   
}     
      
      
?>