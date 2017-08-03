<?php

    $GLOBALS["errorString"] = null;

    class error{

        //private static $errorString;
        
            
        public static function  setError($string)
        {
            
            $GLOBALS["errorString"] = $string;
            
        }
        public static function getError()
        {
            
            return $GLOBALS["errorString"];
        }
        public static function printError()
        {
            echo "<p style='color:red'>".self::getError()."</p>";
            
        }
        
        
    }
    
?>