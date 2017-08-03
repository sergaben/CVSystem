<?php

class user{

    private $_db,$_data;

    public function __construct($user = null){

        $this ->_db=db::getInstance();

    }

    public function create($table,$fields= array()){
        
            //var_dump(!$this->_db->insert($table,$fields));
            if($this->_db->insert($table,$fields)){
             //      echo "<h3 style='color:red'>You have registered successfully!</h3>"; 
                return true;
            }
            else
            {
                //throw new Exception("<h3 style='color:red'>There was a problem creating the account.</h3>");//.var_dump($fields));
                return false;
                //echo "print this message";
            }
       
    }
    
    public function login($username = null, $password = null){
        $user = $this->find($username);
        if($user){
            var_dump($this->data());
//            if($this->data()->password === ){
//                
//                
//            }
            
        }
        
        return false;        
    }
    
    private function data(){
        
        
        return $this->_data;
    }
    
    public function find($user = null){
        if($user)
        {
            
            if(is_numeric($user))
            {
                //print_r(is_numeric($user));
                $mainField = 'STUDENT_ID';
            }
            else/* if(ctype_alnum($user)){*/
            {
                $mainField = 'STUDENT_ID';
            }
            
            $data = $this->_db->get('student',array($mainField,'=',$user));
            print_r($data->Count());
            if($data->Count()){
               $this->_data=$data->first();
                //print_r($this->_data);
                return true;   
            }
        }
        return false;
        
        
    }

}