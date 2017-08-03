<?php
 function loginStudent($u,$p){
        require_once 'connect.php';
                $sql= "SELECT  PASSWORD FROM STUDENT
                        WHERE USERNAME = :USERNAME";

                $stmt= $pdo->prepare($sql);
                $stmt ->bindParam(":USERNAME",$u);
                $stmt->execute();
                if($stmt -> rowCount() >0)
                {
                    $result = $stmt->fetch(PDO::FETCH_OBJ);

                        if(password_verify($p,$result->PASSWORD))
                        {
                           
                            $_SESSION['userType'] = "S";
                            $_SESSION['username'] = $u;
                            return header("Location: Student/studentCVpage.php");
                            exit();
                        }
                        else
                        {
                            
                            return $error = "Some of the details entered are incorrect";

                        }
                    
                }
                else
                {
                    return $error = "Some of the details entered are incorrect";
                }
        
    }
 function loginStaff($u,$p){
                require_once 'connect.php';
                $sql= "SELECT  PASSWORD FROM KU_STAFF
                        WHERE USERNAME = :USERNAME";

                $stmt= $pdo->prepare($sql);
                $stmt ->bindParam(":USERNAME",$u);
                $stmt->execute();
                if($stmt -> rowCount() >0)
                {
                    $result = $stmt->fetch(PDO::FETCH_OBJ);
                    
                        if(password_verify($p,$result->PASSWORD))
                        {
                           
                            $_SESSION['userType'] = "T";
                            $_SESSION['username'] = $u;
                            return header("Location: ../Staff/StaffCVpage.php");
                            exit();
                        }
                        else
                        {
                           
                            return $error = "Some of the details entered are incorrect";

                        }
                    
                }
                else
                {
                    return $error = "Some of the details entered are incorrect";
                }
      
    }
 function loginEmployer($u,$p){
                require_once 'connect.php';
                $sql= "SELECT  PASSWORD FROM EMPLOYER
                        WHERE USERNAME = :USERNAME";

                $stmt= $pdo->prepare($sql);
                $stmt ->bindParam(":USERNAME",$u);
                $stmt->execute();
                if($stmt -> rowCount() >0)
                {
                    $result = $stmt->fetch(PDO::FETCH_OBJ);
                    
                        if($result->PASSWORD === $p)
                        {
                           
                            $_SESSION['userType'] = "E";
                            $_SESSION['username'] = $u;
                            return header("Location: ../Employer/EmployerCVpage.php");
                            exit();
                        }
                        else
                        {
                           
                            return $error = "Some of the details entered are incorrect";

                        }
                    
                }
                else
                {
                    return $error = "Some of the details entered are incorrect";
                }
 }

?>