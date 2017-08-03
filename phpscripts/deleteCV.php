<?php 

if(isset($_POST['deleteCV']))
{
    //echo var_dump($_POST['deleteCV']);
    $data = $_POST['deleteCV'];
    //find the amperdsand and get the path and cv_id in two separate variables
     $findAmpersand= strpos($data,'&');
     $stringLength = strlen($data);
     $splitString = substr($data,$findAmpersand);
     $cv_id =substr($splitString,1);
     $cv_path = substr($data,0,$findAmpersand);
    //cut cv_path till the cvFiles directory
     $splitCVPATH = substr($cv_path,0,11);
    //get the username without the CVFILES directory
     $getUsernameWithPath = substr($cv_path,11);
     $findSlash = strpos($getUsernameWithPath,'/');
    // get just the username from the path above
     $getUsernameWithoutPath = substr($getUsernameWithPath,0,$findSlash);
     
    //var_dump($getUsernameWithoutPath);
    // change directory and delete files from cvfiles
        $old = getcwd();
        chdir("../Cvfiles/". $getUsernameWithoutPath."/");
        
            if(file_exists(basename($cv_path)))
            {
                unlink(basename($cv_path)); 
                
            }
           
        
        
        chdir($old);
    //******************************************
    
    deleteCV($cv_id,$cv_path);
}

function deleteCV($cv_id,$cv_path){

    require 'connect.php';
    $sql = $pdo->prepare("DELETE FROM CV WHERE CV_ID = :CV_ID");
    $sql->bindParam(":CV_ID",$cv_id);
    $sql->execute();
    //echo $splitTwiceString ;
    $result = $sql->fetchAll(PDO::FETCH_OBJ);
    //return json_encode($result);

    if($result>0)
    {
        
//        include 'getCVsUploaded.php';
//        return getCVsUploaded($getUsernameWithoutPath);
    }




}



?>