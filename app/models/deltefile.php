<?php
 class deltefile
 {
    private $file;
    function __construct($files)
    {
        if(is_array($files))
        {
           $this->files = $files;
           $this->delete_file();
        }
        elseif(is_string($files))
        {
            $this->files = $files;
            $this->delete_file(0);
        }
        else{
            throw new Exception("Error Processing Reques File not array");
            
        }
    }
    function delete_file($flag = 1 )
    {
        if($flag == 1)
        {
            foreach ($this->files as $file) {
                # code...
                if(file_exists($file))
                { 
                    unlink($file);
                    
                    
                }
                else{
                    throw new Exception("Error Processing file not xist");
                    return FALSE;
                }
            }
        }
        else
        {
            if(file_exists($this->files))
                { 
                    unlink($this->files);
                    
                    
                }
                else{
                    throw new Exception("Error Processing file not xist");
                    return FALSE;
                }
        }
        return TRUE;
       
    }
 } 
?>