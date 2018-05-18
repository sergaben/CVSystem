<?php  

//session_start();
//if(isset($_SESSION['username'])){
//
//    if($_SESSION['userType']!="S")
//    {
//        header("Location:Student/studentCVpage.php");
//    }
//    else if($_SESSION['userType']!="E")
//    {
//        header("Location:Employer/EmployerCVpage.php");
//    }
//    else if($_SESSION['userType']!="T")
//    {
//        header("Location:Staff/StaffCVpage.php");
//    }
//}
if($_POST)
{

    $errors = array();
    $invalidDetails;

    // validation of input
    if(empty($_POST['username']))
    {
        $errors['user'] = "Username cannot be empty";

    }
    if(empty($_POST['password']))
    {
        $errors['pass'] = "Password cannot be empty";

    }
    // check errors
    if(count($errors) == 0)
    {
//        require_once '../phpscripts/login.php';
//        $invalidDetails = loginEmployer($_POST['username'],$_POST['password']);
//        if(is_string($invalidDetails))
//        {
//            $invalidDetails;
//        }
        if(strcasecmp($_POST['username'],"sergio") and strcasecmp($_POST['password'],"sergio24")){
            header("Location: ../Employer/EmployerCVpage.php");
        }
    } 

}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>KU CV website</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link rel="icon" type="image/png" href="../favicon.ico">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet"  href="../Cssstyles/loginRedone.css">

    </head>
    <body>
        <script >
            $(document).ready( function() {
                $(window).resize(resize);
                resize();
            });
            function resize() {
                var $input = $(this);
                //name = $(document.getElementById('#buttonCreate').text());
                if ($(window).width() < 795) {
                    $('#changeLogin').addClass('btn-group-vertical');
                    $('#changeLogin').removeClass('btn-toolbar');
                    $('Button').each(function(){
                        if($('Button').attr('type') == 'button'){
                            $('.button').addClass('btn');
                            $('.button').removeClass('button');
                        }
                    });
                }
                else {
                    $('#changeLogin').addClass('btn-toolbar');
                    $('#changeLogin').removeClass('btn-group-vertical'); 
                    //                    $('Button').each(function(){
                    //                        if(($('Button').attr('type') == 'submit') && ($('#buttonCreate').attr('id')=='buttonCreate'))
                    //                        {
                    //                           $('#buttonCreate').addClass('btn');
                    //                           $('#buttonCreate').removeClass('button');
                    //                        }
                    //                        else{
                    $('.btn').addClass('button');
                    $('.btn').removeClass('btn');
                    $('#buttonCreate').addClass('btn');
                    $('#buttonCreate').removeClass('button');

                    //                        }
                    //                   });
                }
            }

        </script>
        <div class="container-fluid">

            <div class="row" id="mainTitle">
                <div class="col-xs-12" >
                    <div class="kLogo">
                        <img src="../images/KingstonLogo.png"/>
                    </div>
                    <div id="Title" class="">
                        <h1 class="titleCss ">Kingston CV System</h1>
                    </div>
                </div>
            </div>
            <div class="row" id="loginButtons">
                <div class="col-xs-12">
                    <div  class="container-fluid centerText"id="ButtonsContainers">


                        <h1 class="loginCss">Login as</h1>
                        <div class="centerText btn-toolbar" id="changeLogin" role="group" aria-label="...">

                            <button type="button"  class="button btn-primary btn-lg" class="loginButton" onclick="window.location='../Login/StaffLogin.php'">KU Staff Login</button>
                            <button type="button"  class="button btn-primary btn-lg" class="loginButton" onclick="window.location='../index.php'">Student Login</button>
                            <button type="button"  class="button btn-primary btn-lg" class="loginButton" >Employer Login</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="loginForm">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                    <div  class="centerText container-fluid" id="loginContainer">
                        <h1 id="changeTitle">Employer Login </h1>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="containerFluid" id="loginFormContainer">
                                <label class="errors"><?php 
                                    if(isset($errors['user']))
                                    { 
                                        echo $errors['user']; 
                                    }
                                    else
                                    {
                                        if(isset($invalidDetails))
                                        {
                                            echo $invalidDetails;
                                        }
                                    }

                                    ?></label>
                                <div class="form-group" id="loginUsername">
                                    <label for="email" >Username:</label> <input type="text" class="form-control" id="email" aria-describedby="emailEmployer" placeholder="Username" name="username">
                                </div>
                                <label class="errors"><?php if(isset($errors['pass'])) echo $errors['pass']; ?></label>
                                <div class="form-group" id="loginPassword">

                                    <label for="password">Password:</label> <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                </div>

                                <button type="submit" name="logIn" value="submitted" class="button btn btn-success" id="buttonCreate"> Log In </button>

                            </div>
                        </form>
                        <div class="links">
                            <div><h4><a href="../Employer/signUpPageEmployer.php">Sign Up</a></h4></div>
                            <div><h4><a href="../resetPassword.php">Reset Password?</a></h4></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="footer">
                <?php include '../footer/foooter.php'; ?> 
            </div>

        </div>


    </body>



</html>