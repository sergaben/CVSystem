<?php 
function getCVsStaff(){
    require 'connect.php';
    $rows = array();
    $value = array();
    $statment = $pdo->prepare("SELECT CV_ID, COMMENT,CV_PATH, FIRST_NAME,LAST_NAME,CATEGORY_NAME FROM CV JOIN CATEGORY ON CATEGORY.CATEGORY_ID = CV.CATEGORY_ID JOIN STUDENT ON STUDENT.STUDENT_ID = CV.STUDENT_ID WHERE CV_COMPLETED = 0");
    $statment ->execute();
    $result = $statment->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($result))
    {
        foreach($result as $item){


            echo '<div class="col-xs-12 col-md-4">
         <div class="panel-body alignButton">
                                    <p>Student\'s full name : '.htmlentities($item['FIRST_NAME']).' '.htmlentities($item['LAST_NAME']).'</p>
                                    <p>Category\'s name: '.htmlentities($item['CATEGORY_NAME']).' </p>
                                    <P>Student\'s comment:
                                    '.htmlentities($item['COMMENT']).'
                                    </P>
                                    <span>Completed:<input id="completedCV" name="completed" type="checkbox" value="1" style = "margin-left:5px"/></span>
                                    <div >
                                        <button type="button" class="goToCV btn btn-default btn-block" onClick="goToCVStaff()" id="'.htmlentities($item['CV_PATH']).'&cv='.htmlentities($item['CV_ID']).'">View CV</button>
                                    </div>
                                </div></div>';

        }


    }
    else
    {
        
        echo '<div class="col-xs-12"> <div class="paddingError alignButton" style="color:red"><h3> There are not CVs in the system </h3></div></div>';
        
    }

}

function getCVsEmployer(){
    //WHERE SHARED = 1 AND CV_COMPLETED = 1
    require 'connect.php';
    $rows = array();
    $value = array();
    $statment = $pdo->prepare("SELECT CV_ID, COMMENT, CV_PATH, FIRST_NAME,LAST_NAME,CATEGORY_NAME FROM CV JOIN CATEGORY ON CATEGORY.CATEGORY_ID = CV.CATEGORY_ID JOIN STUDENT ON STUDENT.STUDENT_ID = CV.STUDENT_ID ");
    $statment ->execute();
    $result = $statment->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($result)){
        foreach($result as $item){


            echo '<div class="col-xs-12 col-md-4">
         <div class="panel-body alignButton">
                                    <p>Student\'s full name : '.htmlentities($item['FIRST_NAME']).' '.htmlentities($item['LAST_NAME']).'</p>
                                    <p>Category\'s name: '.htmlentities($item['CATEGORY_NAME']).' </p>
                                    <P>Student\'s comment:
                                    '.htmlentities($item['COMMENT']).'
                                    </P>
                                    <div >
                                        <button type="button" class="goToCV btn btn-default btn-block" onClick="goToCVEmployer()" id="'.htmlentities($item['CV_PATH']).'&cv='.htmlentities($item['CV_ID']).'">View CV</button>
                                    </div>
                                </div></div>';

        }
    }
    else
    {
        echo '<div class="col-xs-12"> <div class="paddingError alignButton" style="color:red"><h3> There are not CVs for this category </h3></div></div>';
    }

}

if(isset($_GET['function']))
{
    if($_GET['function'] == 'getcvsemployer'){
        //function getAllCVs{
        //WHERE SHARED = 1 AND CV_COMPLETED = 1
        require 'connect.php';
        $rows = array();
        $value = array();
        $statment = $pdo->prepare("SELECT CV_ID, COMMENT,CV_PATH, FIRST_NAME,LAST_NAME,CATEGORY_NAME FROM CV JOIN CATEGORY ON CATEGORY.CATEGORY_ID = CV.CATEGORY_ID JOIN STUDENT ON STUDENT.STUDENT_ID = CV.STUDENT_ID ");
        $statment ->execute();
        $result = $statment->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($result)){        

            foreach($result as $item){


                echo '<div class="col-xs-12 col-md-4">
                 <div class="panel-body alignButton">
                                            <p>Student\'s full name : '.htmlentities($item['FIRST_NAME']).' '.htmlentities($item['LAST_NAME']).'</p>
                                            <p>Category\'s name: '.htmlentities($item['CATEGORY_NAME']).' </p>
                                            <P>Student\'s comment:
                                            '.htmlentities($item['COMMENT']).'
                                            </P>
                                            <div >
                                                <button type="button" class="goToCV btn btn-default btn-block" onClick="goToCVEmployer()" id="'.htmlentities($item['CV_PATH']).'&cv='.htmlentities($item['CV_ID']).'">View CV</button>
                                            </div>
                                        </div></div>';
            }
        }
        else
        {
            echo '<div class="col-xs-12"> <div class="paddingError alignButton" style="color:red"><h3> There are not CVs in the system </h3></div></div>';
        }

        //}

    }
    else if($_GET['function'] == 'getcvsstaff'){
        require 'connect.php';
        $rows = array();
        $value = array();
        $statment = $pdo->prepare("SELECT CV_ID, COMMENT, CV_PATH, FIRST_NAME,LAST_NAME,CATEGORY_NAME FROM CV JOIN CATEGORY ON CATEGORY.CATEGORY_ID = CV.CATEGORY_ID JOIN STUDENT ON STUDENT.STUDENT_ID = CV.STUDENT_ID WHERE CV_COMPLETED = 0");
        $statment ->execute();
        $result = $statment->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($result)){

            foreach($result as $item){


                echo '<div class="col-xs-12 col-md-4">
         <div class="panel-body alignButton">
                                    <p>Student\'s full name : '.htmlentities($item['FIRST_NAME']).' '.htmlentities($item['LAST_NAME']).'</p>
                                    <p>Category\'s name: '.htmlentities($item['CATEGORY_NAME']).' </p>
                                    <P>Student\'s comment:
                                    '.htmlentities($item['COMMENT']).'
                                    </P>
                                    <span>Completed:<input id="completedCV" name="completed" type="checkbox" value="1" style = "margin-left:5px"/></span>
                                    <div >
                                        <button type="button" class="goToCV btn btn-default btn-block" onClick="goToCVStaff()" id="'.htmlentities($item['CV_PATH']).'&cv='.htmlentities($item['CV_ID']).'">View CV</button>
                                    </div>
                                </div></div>';

            }
        }
        else
        {
            echo '<div class="col-xs-12"> <div class="paddingError alignButton" style="color:red"><h3> There are not CVs in the system </h3></div></div>';

        }


    }
}




?>