<?php

function getCVsUploaded($username){
    require 'connect.php';
    $importantInfo;
    // var_dump($username);
    $rows = array();
    $value = array();
    $data = array();
    $rowstwo = array();
    $stmt = $pdo->prepare("SELECT CV_ID,CV_PATH,SUBMISSION_DATE FROM CV WHERE STUDENT_ID = (SELECT STUDENT_ID FROM STUDENT WHERE USERNAME=:USERNAME)");
    $stmt -> bindParam(":USERNAME",$username);
    $stmt->execute();
    $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //var_dump($result);
    if(!empty($result)){
        foreach($result as $item){

            //var_dump($data);
            //$rowstwo[$key] = $data;
            //var_dump($rowstwo[$key]);
            $cutString = substr($item['CV_PATH'],11);
            //substract the cv name from cv path
            $findSlashPos = strpos($cutString,'/');
            $cutStringAgain = substr($cutString,$findSlashPos+1);
            $findDotPos = strpos($cutStringAgain,'.');
            $cutStringTwice = substr($cutStringAgain,0,$findDotPos);
            //
            $url = "'studentDisplayCVFeedback.php?path=".$item['CV_PATH']."&cv=".$item['CV_ID']."&staff='";
            $deleteCV = "'".$item['CV_PATH']."&".$item['CV_ID']."'";
            echo "<tr>
                                               <td class='goToViewCv borderRightStyle' data-toggle='tooltip' data-placement='top' title='Go to CV' id=".$url.">".$cutStringTwice."
                                               </td>
                                               <td class='borderRightStyle'>".$item['SUBMISSION_DATE']."
                                                </td>

                                                <td class='shareable borderRightStyle'>
                                                    <form action='' method='post'>
                                                        <label>
                                                        <input name='shared' type='checkbox'' value='0' /></label>
                                                    </form>
                                                </td>
                                                <td class='deleteCV' id=".$deleteCV.">

                                                        <p>Delete</p>

                                                </td>
                    </tr>";


        }
    }
    else
    {
        echo "<tr>
                                                <td class='borderRightStyle' >
                                               </td>
                                               <td class='borderRightStyle' >Not CVs have been uploaded
                                               </td>
                                               <td class='borderRightStyle' >
                                               </td>
                                               <td>
                                               </td>
                                               
                    </tr>";
    }


}

?>