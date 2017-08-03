<?php

class session{

    public static function exists($name)
    {
        return (isset($_SESSION[$name])) ? true : false;
        
    }
    
    // sets the key name and puts a value to it
    public static function put($name,$value)
    {
        return $_SESSION[$name] = $value;
        
    }
    // get the value in the speficied key for the session array
    public static function get($name){
        return $_SESSION[$name];
        
    }
    // deletes the actual session
    public static function delete($name){
        if(self::exists($name)){
            unset($_SESSION[$name]);
            
        }
        
    }
    
    public static function flash($name,$string = ''){
        if(self::exists($name)){
            $session = self::get($name);
            self::delete($name);
            return $session;
        }else{
            self::put($name,$string);
            
        }
        
    }
    
    
}