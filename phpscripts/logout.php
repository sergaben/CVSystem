<?php
    session_start();
    if(session_destroy()) // Destroying All Sessions
    {
    header("Location: ../index.php"); // Redirecting To Home Page
    }

//function staffDestroy(){
//    if(session_destroy()) // Destroying All Sessions
//    {
//    header("Location: StaffLogin.php"); // Redirecting To Home Page
//    }
//}
//function EmployerDestroy(){
//    if(session_destroy()) // Destroying All Sessions
//    {
//    header("Location: EmployerLogin.php"); // Redirecting To Home Page
//    }
//}
?>