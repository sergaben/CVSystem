<?php
    
    function existsStudent($username){
        require 'connect.php';
        
        $stmt = $pdo->prepare("SELECT USERNAME FROM STUDENT WHERE USERNAME = :USERNAME");
        $stmt->bindParam(":USERNAME",$username);
        $stmt->execute();
        
        if($stmt->rowCount()>0)
        {
            
            return true;
        }
        else
        {
            return false;
        }
        
    }
    function existsStaff($username){
        require 'connect.php';
        
        $stmt = $pdo->prepare("SELECT USERNAME FROM KU_STAFF WHERE USERNAME = :USERNAME");
        $stmt->bindParam(":USERNAME",$username);
        $stmt->execute();
        
        if($stmt->rowCount()>0)
        {
            
            return true;
        }
        else
        {
            return false;
        }
        
    }
    function existsEmployer($username){
            require 'connect.php';

            $stmt = $pdo->prepare("SELECT USERNAME FROM EMPLOYER WHERE USERNAME = :USERNAME");
            $stmt->bindParam(":USERNAME",$username);
            $stmt->execute();

            if($stmt->rowCount()>0)
            {

                return true;
            }
            else
            {
                return false;
            }

        }
    
    
    
?>