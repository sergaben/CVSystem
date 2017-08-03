<?php
    
class redirect{
    
    public static function redirectTo($location=null){
       
       
        if($location)
        {
            //echo "success";
            header("Location:$location");
        }
        
            
        
    }

    
    
}
    
    
?>