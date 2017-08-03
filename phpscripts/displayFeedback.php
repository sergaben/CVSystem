<?php
function displayFeedback($userPage){
    require 'connect.php';
    $importantInfo;
    $rows = array();
    $value = array();
    $data = array();
    $rowstwo = array();
    $stmt = $pdo->prepare("SELECT CV_ID FROM CV WHERE STUDENT_ID = (SELECT STUDENT_ID FROM STUDENT WHERE USERNAME=:USERNAME)");
    $stmt -> bindParam(":USERNAME",$userPage);
    $stmt->execute();
    $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($result)){
        foreach($result as $item){

            foreach($item as $key=>$value)
            {
                $rows[$key] = $value;

                $statement = $pdo->prepare("SELECT a.FEEDBACK_DATE, b.CV_PATH,b.CV_ID, c.KU_STAFF_ID,c.FIRST_NAME, c.LAST_NAME FROM CV_FEEDBACK a INNER JOIN CV b ON a.CV_ID = b.CV_ID INNER JOIN KU_STAFF c ON a.KU_STAFF_ID = c.KU_STAFF_ID WHERE a.CV_ID = :CV_ID");

                $statement->bindParam("CV_ID",$rows[$key]);
                $statement->execute();
                $anotherResult = $statement->fetchAll(PDO::FETCH_ASSOC);


                foreach($anotherResult as $key=>$data)
                {
                    $rowstwo[$key] = $data;
                    $cutString = substr($rowstwo[$key]['CV_PATH'],11);
                    $findSlashPos = strpos($cutString,'/');
                    $cutStringAgain = substr($cutString,$findSlashPos+1);
                    $findDotPos = strpos($cutStringAgain,'.');
                    $cutStringTwice = substr($cutStringAgain,0,$findDotPos);
                    $url = "'studentDisplayCVFeedback.php?path=".$rowstwo[$key]['CV_PATH']."&cv=".$rowstwo[$key]['CV_ID']."&staff=".$rowstwo[$key]['KU_STAFF_ID']."'";
                    // TODO SOLVE THE LATEST FEEDBACK ALWAYS SHOWING UP 

                    echo "<tr>
                                                <td class='borderRightStyle'>".$rowstwo[$key]['FIRST_NAME']." ".$rowstwo[$key]['LAST_NAME']."</td>
                                               <td class='borderRightStyle'>".$rowstwo[$key]['FEEDBACK_DATE']."</td>
                                                <td class='goToFeedback' data-toggle='tooltip' data-placement='top' title='Go to feedback' id=".$url.">".$cutStringTwice."</td> </tr>";

                }

            }

        }
    }
    else{
        
        echo "<tr>
                                                <td class='borderRightStyle'></td>
                                               <td class='borderRightStyle'>Not Feedback has been given</td>
                                                <td></td> 
                                                
            </tr>";
        
        
    }
}
?>