<?php

class hash{
    
    public static function make($string){
        
        return password_hash($string,PASSWORD_DEFAULT);
    }
    
    public static function unique(){
        
        
    }
    
}