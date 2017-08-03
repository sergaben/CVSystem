<?php 



function regStudent($username,$firstName,$lastName,$email,$password){
    require 'connect.php';
    require 'exists.php';
    if(existsStudent($username))
    {
        return $error = "Username already in use, try another";
    }
    else
    {

        $stmt = $pdo->prepare("INSERT INTO STUDENT (USERNAME, FIRST_NAME, LAST_NAME,PASSWORD, EMAIL) VALUES (:USERNAME, :FIRST_NAME, :LAST_NAME,:PASSWORD, :EMAIL);");
        $stmt -> bindParam(":USERNAME",$username);
        $stmt -> bindParam(":FIRST_NAME",$firstName);
        $stmt -> bindParam(":LAST_NAME",$lastName);
        $stmt -> bindParam(":PASSWORD",password_hash($password,PASSWORD_DEFAULT));
        $stmt -> bindParam(":EMAIL", $email);

        $stmt ->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        if($result > 0)
        {
            header("Location: ../index.php");

        }
        else
        {
            return $error = "User could not be registered";
        }
    }
}

function regStaff($username,$firstName,$lastName,$email,$password){
    require 'connect.php';
    require 'exists.php';
    if(existsStaff($username))
    {
        return $error = "Username already in use, try another";
    }
    else
    {
        $stmt = $pdo->prepare("INSERT INTO KU_STAFF (USERNAME, FIRST_NAME, LAST_NAME, EMAIL,PASSWORD) VALUES (:USERNAME, :FIRST_NAME, :LAST_NAME,:EMAIL,:PASSWORD);");
        $stmt -> bindParam(":USERNAME",$username);
        $stmt -> bindParam(":FIRST_NAME",$firstName);
        $stmt -> bindParam(":LAST_NAME",$lastName);
        $stmt -> bindParam(":PASSWORD",password_hash($password,PASSWORD_DEFAULT));
        $stmt -> bindParam(":EMAIL", $email);

        $stmt ->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if($result > 0)
        {
            header("Location: ../Login/StaffLogin.php");

        }
        else
        {
            return $error = "User could not be registered";
        }


    }


}

function regEmployer($username,$compName,$firstName,$lastName,$telephoneN,$email){

    require 'connect.php';
    require 'exists.php';
    if(existsEmployer($username))
    {
        return $error = "Username already in use, try another";
    }
    else
    {
        $stmt = $pdo->prepare("INSERT INTO EMPLOYER (USERNAME,COMPANY_NAME, FIRST_NAME, LAST_NAME,PHONE, EMAIL) VALUES (:USERNAME,:COMPANY_NAME,:FIRST_NAME,:LAST_NAME,:PHONE,:EMAIL);");

        $stmt -> bindParam(":USERNAME",$username);
        $stmt -> bindParam(":COMPANY_NAME",$compName);
        $stmt -> bindParam(":FIRST_NAME",$firstName);
        $stmt -> bindParam(":LAST_NAME",$lastName);
        $stmt -> bindParam(":PHONE",$telephoneN);
        $stmt -> bindParam(":EMAIL", $email);

        $stmt ->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if($result > 0)
        {   
            $newQuery = $pdo->prepare("SELECT EMPLOYER_ID FROM EMPLOYER WHERE USERNAME = :USERNAME");
            $newQuery ->bindParam(":USERNAME",$username);
            $newQuery ->execute();

            $getOutcome = $newQuery->fetchAll(PDO::FETCH_ASSOC);
            if($getOutcome > 0)
            {
                foreach($getOutcome as $item)
                {
                    $description = $firstName." ".$lastName." from ".$compName." has requested access.";
                    $typeOfNotification = "REQUEST_ACCESS";
                    $statement = $pdo->prepare("INSERT INTO NOTIF_EMPLOYER (EMPLOYER_ID, NOTIFICATION_DESCRIPTION_EMP, TYPE) VALUES (:EMPLOYER_ID,:NOTIFICATION_DESCRIPTION_EMP,:TYPE)");
                    $statement -> bindParam(":EMPLOYER_ID",$item['EMPLOYER_ID']);
                    $statement -> bindParam(":NOTIFICATION_DESCRIPTION_EMP",$description);
                    $statement -> bindParam(":TYPE",$typeOfNotification);
                    $statement ->execute();

                    $outcome = $statement->fetchAll(PDO::FETCH_OBJ);

                    if($outcome >0)
                    {
                        
                        header("Location: ../Login/EmployerLogin.php");    

                    }

                }



            }

        }
        else
        {
            return $error = "User could not be registered";
        }
    }
}


?>