<?php
    
   
    function sendFeedback($username,$CV,$cvFeedback){
        
        include 'connect.php';
        //TODO SELECT ALL THE STUDENTS FROM STUDENT TABLE
        //TODO SELECT ALL THE CVS FROM CV TABLE
        $formattedDate = date('Y-m-d H:i:s');
        $stmt = $pdo->prepare("SELECT CV_ID FROM CV WHERE STUDENT_ID = (SELECT STUDENT_ID FROM STUDENT WHERE STUDENT.USERNAME = :USER)");
        $stmt -> bindParam(":USER",$usersPage);
        $stmt ->execute();
        $firstResult = $stmt ->fetch();
        
        
        $statement = $pdo->prepare("INSERT INTO CV_FEEDBACK (KU_STAFF_ID,CV_ID,CV_FEEDBACK,FEEDBACK_DATE) VALUES ((SELECT KU_STAFF_ID FROM KU_STAFF WHERE KU_STAFF.USERNAME = :USERNAME),(:CV),(:CV_FEEDBACK),(:FEEDBACK_DATE))");
        $statement -> bindParam(":USERNAME",$username);
        $statement -> bindParam(":CV",$CV);
        $statement -> bindParam(":CV_FEEDBACK",$cvFeedback);
        $statement -> bindParam(":FEEDBACK_DATE",$formattedDate);
        $statement->execute();
        
        $result = $statement->fetchAll(PDO::FETCH_OBJ);
        //var_dump($result);
        if($result > 0)
        {
            return $message = "Your feedback has been submitted";
        }
        else
        {
            return $error = "Your feedback was not submitted due to an error in the system";
        }
        
        
    }


?>