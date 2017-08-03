<?php
    
    session_start();
    
    
//$GLOBALS['config']=array(
//    'mysql' => array(
//        'host' => 'kunet.kingston.ac.uk',
//        'username' => 'k1516561',
//        'password' => 'dSaEtRaGbAaBsEeNccvsystem2017!',
//        'db' => 'db_k1516561'
//    ),
//    'session' => array(
//        'session_name' => 'user'
//    )
//    
//);

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

//require_once 'functions/sanitize.php';
