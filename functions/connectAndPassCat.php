<?php
    require "once connec.php";
   if ( isset($_POST['newCategoryName'])) {

    // Data validation
//    if ( strlen($_POST['name']) < 1 || strlen($_POST['password']) < 1) {
//        $_SESSION['error'] = 'Missing data';
//        header("Location: add.php");
//        return;
//    }
//
//    if ( strpos($_POST['email'],'@') === false ) {
//        $_SESSION['error'] = 'Bad data';
//        header("Location: add.php");
//        return;
//    }

    $sql = "INSERT INTO CATEGORY (CATEGORY_NAME) 
              VALUES (:categoryName)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':categoryName' => $_POST['newCategoryName'],
        );
   //$_SESSION['success'] = 'Record Added';
   header( 'Location: index.php' ) ;
   return;
}

    
    


?>