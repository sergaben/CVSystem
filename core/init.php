<?php
    
    session_start();
    


// the function below will call the require_once when the class is instanciated
    spl_autoload_register(function($class){
    
        if(file_exists('classes/'.$class.'.php'))
        {
            require_once 'classes/'.$class.'.php';
        }
        elseif(file_exists('../classes/'.$class.'.php'))
        {
            require_once '../classes/'.$class.'.php';   
        }
        elseif(file_exists('../../classes/'.$class.'.php'))
        {
            require_once '../../classes/'.$class.'.php';
        }
    
});

