<?php
    function getFeedback($staffId,$cv_id){
        if($_GET){
            include 'connect.php';
            $stmt= $pdo->prepare("SELECT CV_FEEDBACK.CV_FEEDBACK FROM CV_FEEDBACK WHERE  CV_FEEDBACK.KU_STAFF_ID = :KU_STAFF_ID AND CV_FEEDBACK.CV_ID = :CV_ID");
            $stmt -> bindParam(":KU_STAFF_ID",$staffId);
            $stmt -> bindParam(":CV_ID",$cv_id);
            $stmt->execute();
            $count= $stmt->rowCount();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($count > 0)
            {
                
                foreach ($result as $item){
                    $feedback = $item['CV_FEEDBACK'];
                    
                     echo '<div id="feedbackDisplay" style="height:100%;width:100%;">
                           
                            <div style ="display: block;width: 65%;height:100%;margin: 0 auto; margin-bottom: 2%;border-style:solid;padding:10px;" align="middle" name="feedback" readonly><h3 style="margin-top:10px;margin-bottom:10px;">'.$feedback.'</h3></div>
                        </div>';
                    
                }
               
            }
            else
            {
                echo "The retrieving of your feedback failed";
            }
            
        }      
        
    }
   
    


?>