<?php


include 'connect.php';

if($_GET){




    $rows = array();
    $displayArray = array();
    $value = array();
    $userNamePage;
    $cat= $_GET['categoryName'];
    $stmt = $pdo->prepare("SELECT CATEGORY_ID FROM CATEGORY WHERE CATEGORY_NAME=:CATEGORY_NAME");
    $stmt ->bindParam(":CATEGORY_NAME",$cat);
    $stmt ->execute();
    $resultFirst = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($_GET['currentUserPage'] === 'Staff'){
        $userNamePage = $_GET['currentUserPage'];

        foreach($resultFirst as $item){

            foreach($item as $key=>$value)
            {

                $rows[$key] = $value;


                $statment = $pdo->prepare("SELECT CV_ID,COMMENT, CV_PATH, FIRST_NAME,LAST_NAME, USERNAME, CATEGORY_NAME FROM CV JOIN STUDENT ON STUDENT.STUDENT_ID = CV.STUDENT_ID JOIN CATEGORY ON CATEGORY.CATEGORY_ID = CV.CATEGORY_ID WHERE CV.CATEGORY_ID = :CATEGORY_ID  AND  CV_COMPLETED = 0");
                $statment ->bindParam(":CATEGORY_ID",$rows[$key]);
                $statment ->execute();
                $count = $statment ->rowCount();
                $result = $statment->fetchAll(PDO::FETCH_ASSOC);

                if($count > 0){
                    foreach($result as $key=>$data)
                    {
                        $displayArray[$key] = $data;


                        echo '<div class="col-xs-12 col-md-4">
         <div class="panel-body alignButton">
                                    <p>Student\'s full name : '.htmlentities($displayArray[$key]['FIRST_NAME']).' '.htmlentities($displayArray[$key]['LAST_NAME']).'</p>
                                    <p>Category\'s name: '.htmlentities($displayArray[$key]['CATEGORY_NAME']).' </p>
                                    <P>Student\'s comment:
                                    '.htmlentities($displayArray[$key]['COMMENT']).'
                                    </P>
                                    <span>Completed:<input id="completedCV" name="completed" type="checkbox" value="1" style = "margin-left:5px"/></span>
                                    <div >
                                        <button type="button" class="goToCV btn btn-default btn-block" onClick="goToCV'.$userNamePage.'()" id="'.htmlentities($displayArray[$key]['CV_PATH']).'&cv='.htmlentities($displayArray[$key]['CV_ID']).'">View CV</button>
                                    </div>
                                </div></div>';


                    }
                }
                else
                {
                    echo '<div class="col-xs-12"> <div class="paddingError alignButton" style="color:red"><h3> There are not CVs for this category </h3></div></div>';

                }

            }

        }




    }
    else{
        $userNamePage = $_GET['currentUserPage'];

        foreach($resultFirst as $item){

            foreach($item as $key=>$value)
            {
                //AND SHARED = 1 AND CV_COMPLETED = 1
                $rows[$key] = $value;


                $statment = $pdo->prepare("SELECT CV_ID,COMMENT, CV_PATH, FIRST_NAME,LAST_NAME, USERNAME, CATEGORY_NAME FROM CV JOIN STUDENT ON STUDENT.STUDENT_ID = CV.STUDENT_ID JOIN CATEGORY ON CATEGORY.CATEGORY_ID = CV.CATEGORY_ID WHERE CV.CATEGORY_ID = :CATEGORY_ID");
                $statment ->bindParam(":CATEGORY_ID",$rows[$key]);
                $statment ->execute();
                $count = $statment ->rowCount();
                $result = $statment->fetchAll(PDO::FETCH_ASSOC);

                if($count > 0){
                    foreach($result as $key=>$data)
                    {
                        $displayArray[$key] = $data;


                        echo '<div class="col-xs-12 col-md-4">
         <div class="panel-body alignButton">
                                    <p>Student\'s full name : '.htmlentities($displayArray[$key]['FIRST_NAME']).' '.htmlentities($displayArray[$key]['LAST_NAME']).'</p>
                                    <p>Category\'s name: '.htmlentities($displayArray[$key]['CATEGORY_NAME']).' </p>
                                    <P>Student\'s comment:
                                    '.htmlentities($displayArray[$key]['COMMENT']).'
                                    </P>
                                    <div >
                                        <button type="button" class="goToCV btn btn-default btn-block" onClick="goToCV'.$userNamePage.'()" id="'.htmlentities($displayArray[$key]['CV_PATH']).'&cv='.htmlentities($displayArray[$key]['CV_ID']).'">View CV</button>
                                    </div>
                                </div></div>';


                    }
                }
                else
                {
                    echo '<div class="col-xs-12"> <div class="paddingError alignButton" style="color:red"><h3> There are not CVs for this category </h3></div></div>';

                }

            }

        }





    }


}







?>