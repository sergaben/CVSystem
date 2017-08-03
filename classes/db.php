<?php
const HOST = "kunet.kingston.ac.uk";
const USERNAME = "k1516561";
const PASSWORD = "dSaEtRaGbAaBsEeNccvsystem2017!";
const DB ="db_k1516561";
class db {

    private static $_instance= null;
    private $_pdo, $_query, $_error=false,$_results,$_count = 0;


    // this constructor will make a connection with the database
    private function __construct(){

        try{
            $this -> _pdo = new PDO('mysql:hots='.HOST.';dbname='.DB,USERNAME,PASSWORD);
            //echo "connection established\n";
            //echo getcwd().'\n';
        }catch(PDOException $e){
            die($e->getMessage());
        }  
    }
    // implementing a singleton 
    public static function getInstance(){

        if(!isset(self::$_instance)){
            self::$_instance = new db();
        }
        return self::$_instance;
    }
//    // this function will get the query and execute it.
//    public function query($sql,$params = array()){
//        $this->_error = false;
//        //$this->_query = $this->_pdo->prepare($sql);
//        //echo $this->_query;
//        //echo $sql;
//        if($this->_query = $this->_pdo->prepare($sql)){
//            $x = 1;
//           // echo "executed".'<br>';
//            //echo count($params).'<br>';
//            if(count($params))
//            {
//                //echo var_dump($params).'\n';
//                foreach($params as $param){
//                    //if(gettype($param) = 'integer')
//                    // echo $param.'<br>';
//                    
//                    $this->_query->bindValue($x,$param);
//                    //echo $param.'<br>';
//                    //echo $param.'<br>';
//                   
//                    $x++;
//                }
//            }
//             //print_r($this->_query);
//            //$this->_query->errorCode();
//            var_dump($this->_query->execute());
//            if($this->_query->execute()){
//                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
//                
//                $this->_count = $this->_query->rowCount();
////                print_r($this->_count);
//               
//            }
//            else
//            {
//                $this->_error = true;
//            }
//
//        }
//        //print_r($this);
//        return $this;
//
//    }
//
//    public function error(){
//
//        return $this->_error;
//
//
//    }
//
//    private function action($action,$table,$where = array()){
//
//        if(count($where) ===3)
//        {
//            $operators = array('=','<','>','>=','<=');
//            $field = $where[0];
//            $operator = $where[1];
//            $value = $where[2];
//
//            if(in_array($operator,$operators)){
//                $sql= "{$action} FROM {$table} WHERE {$operator} {$value} ";
//                if(!$this->query($sql,array($value))->error()){
//                    return $this;
//                }
//            }
//
//        }
//
//        return $this;
//    }
//
//    public function get($table,$where){
//        return $this->action('SELECT *',$table,$where);
//
//    }
//
//    public function Count(){
//        return $this->_count;
//    }
//
//    public function getResults(){
//
//        return $this->_results;
//    }
//    
//    public function first(){
//        
//        return $this->getResults()[0];
//        
//    }
//     //inserting data into database through a customised query
//    public  function insert($table,$fields = array()){
//            
//            if(count($fields))
//            {
//                $keys = array_keys($fields);
//                $values = '';
//                $x = 1;
////                foreach($fields as $field)
////               {
////                   $values .='?';
////                   if($x<count($fields))
////                  {
////                      $values .=', ';
////                  }
////               $x++;
////    //            }
//                //die($values);
//                //echo count($fields);
//                $sql = "INSERT INTO {$table} (".implode(',',$keys).") VALUES (".str_repeat ( "?, " , count($keys)-1 )."?)";
//                //echo $sql;
//                if(!$this->query($sql,$fields))
//                {
//                    return false;
//                }
//                //.str_repeat ( "?, " , count($keys)-1 ).
//                return true;
//            }
//            
//        }
//    
//        
////    public  function insert($table,$fields){
////
////        if(count($fields))
////        {
////            //$keys = array_keys($fields);
////            $values = '';
////            $x = 1;
////            foreach($fields as $fields)
////            {
////                $values .='?';
////                if($x<count($fields))
////                {
////                    $values .=', ';
////                }
////                $x++;
////            }
////            //die($values);
////            //echo count($fields);
////            $sql = "INSERT INTO '{$table}'(".implode(',',$keys).") VALUES (".str_repeat ( "?, " , count($keys)-1 )."?)";
////
////            if(!$this->query($sql,$fields))
////            {
////                return true;
////            }
////            //.str_repeat ( "?, " , count($keys)-1 ).
////            return false;
////        }
////
////    }
//    // to be implemented later
//    //    public function update($table, $id, $fields){
//    // 		$set='';
//    // 		$x=1;
//    //
//    // 		foreach($fields as $name => $value){
//    // 			$set .= "{$name} =?";
//    // 			if($x<count($fields)){
//    // 				$set .= ', ';
//    // 			}
//    // 			$x++;
//    // 		}
//    // 		//die($set);
//    //
//    // 		$sql="UPDATE {$table} SET {$set} WHERE id = {$id}";
//    // 		//echo $sql;
//    //
//    // 		if(!$this->query($sql,$fields)->error()){
//    // 			return true;
//    // 		}
//    // 		return false;
//    // 	}
}    

