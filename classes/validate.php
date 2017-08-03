<?php

class validate{
    
    private $_passed = false,$_errors = array(),$_db = null;

    public function __construct(){
        
        $this->_db = db::getInstance();
        
    }

    public function check($source, $items = array()){
        
        foreach($items as $item => $rules){
            foreach($rules as $rule => $rule_value){
                
                    $value = $source[$item];
                    
                    if($rule ==='required' && empty($value))
                    {
                        $this->addError("{$item} is required");
                    }
//                    else if(!empty($value))   this is to set rules to the fields 
//                    {
//                        switch($rule){
//                                
//                                
//                                
//                        }
//                        
//                        
//                    }
//                    
            }
            
        }
        
        if(empty($this->_errors))
        {
            $this->_passed = true;
        }
        return $this;
    }
    private function addError($error){
        
        $this->_errors[] = $error;
        
    }
    public function errors(){
        
        return $this->_errors;
    }
    public function printErrors(){
        
            foreach($this->_errors as $error)
            {
                echo "<p style='color:red;margin-top:2%'>{$error}</p>";
            }
            
    }
    public function passed(){
        
        return $this->_passed;
    }
    
}
    