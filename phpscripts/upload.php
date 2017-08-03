<?php

function upFileCreateRecord($userPage,$category,$comment){

    require_once 'connect.php';

    // the variable below is the directory for each user
    $checkDir = '../Cvfiles/'.$userPage.'/';
    // the variable below is the name of the file that is being uploaded
    $nameFile = basename($_FILES['file']['name']);
    // the variable below is to create a random number
    $fileNameRandomN = rand(1,100);
    // the variable holds the path where the file is going to be created
    $newPath = $checkDir. basename($_FILES['file']['name']);
    //the variable below holds the actual path and add a random number to an existing file
    $newPathWithR = $checkDir.$fileNameRandomN.$nameFile;

    if(file_exists($checkDir))
    {
        $newFile = $checkDir.$nameFile;
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $_FILES['file']['tmp_name']);
        $ok = false;
        switch ($mime) {
            case 'application/msword':
                $ok =true;
                break;
            case 'application/pdf':
                $ok = true;
                break;
            case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                $ok = true;
                break;
            default:
                return  "Unknown/not permitted file or file is empty";
        }
        if($ok === true)
        {
            if(file_exists($newFile))
            {

                if (move_uploaded_file($_FILES['file']['tmp_name'], $newPathWithR))
                {
                    $formattedDate = date('Y-d-m H:i:s'); // today's date
                    $shared = 0; // shared is false by default
                    $cvCompleted = 0; // cv_completed is false by default
                    $stmt = $pdo->prepare("INSERT INTO CV (STUDENT_ID,CATEGORY_ID,SUBMISSION_DATE,SHARED,CV_COMPLETED,CV_PATH,COMMENT) VALUES ((SELECT STUDENT_ID FROM STUDENT WHERE STUDENT.USERNAME = :USERNAME ),(SELECT CATEGORY_ID FROM CATEGORY WHERE CATEGORY.CATEGORY_NAME = :CATEGORY_NAME),(:SUBMISSION_DATE),(:SHARED),(:CV_COMPLETED),(:CV_PATH),(:COMMENT))");
                    $stmt->bindParam(":USERNAME",$userPage);
                    $stmt->bindParam(":CATEGORY_NAME",$category);
                    $stmt->bindParam(":SUBMISSION_DATE",$formattedDate);
                    $stmt->bindParam(":SHARED",$shared);
                    $stmt->bindParam(":CV_COMPLETED",$cvCompleted);
                    $stmt->bindParam(":CV_PATH",$newPathWithR);
                    $stmt->bindParam(":COMMENT",$comment);
                    $stmt->execute();

                    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                    if($result > 0)
                    {
                        $newQuery = $pdo->prepare("SELECT STUDENT_ID,FIRST_NAME,LAST_NAME FROM STUDENT WHERE USERNAME = :USERNAME");
                        $newQuery ->bindParam(":USERNAME",$userPage);
                        $newQuery ->execute();

                        $getOutcome = $newQuery->fetchAll(PDO::FETCH_ASSOC);
                        if($getOutcome > 0)
                        {
                            foreach($getOutcome as $item)
                            {
                                $description = $item['FIRST_NAME']." ".$item['LAST_NAME']." has uploaded a new CV.";
                                $typeOfNotification = "NEW_UPLOAD";
                                $statement = $pdo->prepare("INSERT INTO NOTIF_STUDENT (STUDENT_ID, NOTIFICATION_DESCRIPTION_STU, TYPE) VALUES (:STUDENT_ID,:NOTIFICATION_DESCRIPTION_STU,:TYPE)");
                                $statement -> bindParam(":STUDENT_ID",$item['STUDENT_ID']);
                                $statement -> bindParam(":NOTIFICATION_DESCRIPTION_STU",$description);
                                $statement -> bindParam(":TYPE",$typeOfNotification);
                                $statement ->execute();

                                $outcome = $statement->fetchAll(PDO::FETCH_OBJ);

                                if($outcome >0)
                                {
                                   header('Location:../Student/studentCVpage.php');
                                    
                                    return "The file upload has been succesful";    
                                    
                                }

                            }



                        }


                    }

                }
                else
                {
                    return "Couldn't move file to $newPath";
                }  

            }
            else
            {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $newPath))
                {
                    $formattedDate = date('Y-d-m H:i:s'); // today's date
                    $shared = 0; // shared is false by default
                    $cvCompleted = 0; // cv_completed is false by default
                    $stmt = $pdo->prepare("INSERT INTO CV (STUDENT_ID,CATEGORY_ID,SUBMISSION_DATE,SHARED,CV_COMPLETED,CV_PATH,COMMENT) VALUES ((SELECT STUDENT_ID FROM STUDENT WHERE STUDENT.USERNAME = :USERNAME ),(SELECT CATEGORY_ID FROM CATEGORY WHERE CATEGORY.CATEGORY_NAME = :CATEGORY_NAME),(:SUBMISSION_DATE),(:SHARED),(:CV_COMPLETED),(:CV_PATH),(:COMMENT))");
                    $stmt->bindParam(":USERNAME",$userPage);
                    $stmt->bindParam(":CATEGORY_NAME",$category);
                    $stmt->bindParam(":SUBMISSION_DATE",$formattedDate);
                    $stmt->bindParam(":SHARED",$shared);
                    $stmt->bindParam(":CV_COMPLETED",$cvCompleted);
                    $stmt->bindParam(":CV_PATH",$newPath);
                    $stmt->bindParam(":COMMENT",$comment);
                    $stmt->execute();

                    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                    if($result > 0)
                    {
                        $newQuery = $pdo->prepare("SELECT STUDENT_ID,FIRST_NAME,LAST_NAME FROM STUDENT WHERE USERNAME = :USERNAME");
                        $newQuery ->bindParam(":USERNAME",$userPage);
                        $newQuery ->execute();

                        $getOutcome = $newQuery->fetchAll(PDO::FETCH_ASSOC);
                        if($getOutcome > 0)
                        {
                            foreach($getOutcome as $item)
                            {
                                $description = $item['FIRST_NAME']." ".$item['LAST_NAME']." has uploaded a new CV.";
                                $typeOfNotification = "NEW_UPLOAD";
                                $statement = $pdo->prepare("INSERT INTO NOTIF_STUDENT (STUDENT_ID, NOTIFICATION_DESCRIPTION_STU, TYPE) VALUES (:STUDENT_ID,:NOTIFICATION_DESCRIPTION_STU,:TYPE)");
                                $statement -> bindParam(":STUDENT_ID",$item['STUDENT_ID']);
                                $statement -> bindParam(":NOTIFICATION_DESCRIPTION_STU",$description);
                                $statement -> bindParam(":TYPE",$typeOfNotification);
                                $statement ->execute();

                                $outcome = $statement->fetchAll(PDO::FETCH_OBJ);

                                if($outcome >0)
                                {
                                    header('Location:../Student/studentCVpage.php');
                                     
                                    return "The file upload has been succesful";    

                                }

                            }



                        }

                    }

                }
                else
                {
                    return "Couldn't move file to $newPath";
                }  
            }
        }
    }
    else
    {
        // create directory if it does not exists
        if(!mkdir($checkDir,0777,true))
        {
            //creates the directory
        }
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $_FILES['file']['tmp_name']);
        $ok = false;
        switch ($mime) {
            case 'application/msword':
                $ok =true;
                break;
            case 'application/pdf':
                $ok = true;
                break;
            case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                $ok = true;
                break;
            default:
                 return  "Unknown/not permitted file or file is empty";
        }
        if($ok === true)
        {
            // move file to directory
            if (move_uploaded_file($_FILES['file']['tmp_name'], $newPath))
            {
                $formattedDate = date('Y-d-m H:i:s'); // today's date
                $shared = 0; // shared is false by default
                $cvCompleted = 0; // cv_completed is false by default
                 $stmt = $pdo->prepare("INSERT INTO CV (STUDENT_ID,CATEGORY_ID,SUBMISSION_DATE,SHARED,CV_COMPLETED,CV_PATH,COMMENT) VALUES ((SELECT STUDENT_ID FROM STUDENT WHERE STUDENT.USERNAME = :USERNAME ),(SELECT CATEGORY_ID FROM CATEGORY WHERE CATEGORY.CATEGORY_NAME = :CATEGORY_NAME),(:SUBMISSION_DATE),(:SHARED),(:CV_COMPLETED),(:CV_PATH),(:COMMENT))");
                    $stmt->bindParam(":USERNAME",$userPage);
                    $stmt->bindParam(":CATEGORY_NAME",$category);
                    $stmt->bindParam(":SUBMISSION_DATE",$formattedDate);
                    $stmt->bindParam(":SHARED",$shared);
                    $stmt->bindParam(":CV_COMPLETED",$cvCompleted);
                    $stmt->bindParam(":CV_PATH",$newPath);
                    $stmt->bindParam(":COMMENT",$comment);
                    $stmt->execute();

                

                $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                if($result > 0)
                {
                    $newQuery = $pdo->prepare("SELECT STUDENT_ID,FIRST_NAME,LAST_NAME FROM STUDENT WHERE USERNAME = :USERNAME");
                        $newQuery ->bindParam(":USERNAME",$userPage);
                        $newQuery ->execute();

                        $getOutcome = $newQuery->fetchAll(PDO::FETCH_ASSOC);
                        if($getOutcome > 0)
                        {
                            foreach($getOutcome as $item)
                            {
                                $description = $item['FIRST_NAME']." ".$item['LAST_NAME']." has uploaded a new CV.";
                                $typeOfNotification = "NEW_UPLOAD";
                                $statement = $pdo->prepare("INSERT INTO NOTIF_STUDENT (STUDENT_ID, NOTIFICATION_DESCRIPTION_STU, TYPE) VALUES (:STUDENT_ID,:NOTIFICATION_DESCRIPTION_STU,:TYPE)");
                                $statement -> bindParam(":STUDENT_ID",$item['STUDENT_ID']);
                                $statement -> bindParam(":NOTIFICATION_DESCRIPTION_STU",$description);
                                $statement -> bindParam(":TYPE",$typeOfNotification);
                                $statement ->execute();

                                $outcome = $statement->fetchAll(PDO::FETCH_OBJ);

                                if($outcome >0)
                                {
                                   header('Location:../Student/studentCVpage.php');
                                     
                                    return "The file upload has been succesful";    

                                }

                            }



                        }

                }

            }
            else
            {
                return "Couldn't move file to $newPath";
            }
        }

    }





}





?>