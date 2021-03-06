<?php
    echo "<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>";
if($_POST){
    //array for errors
    $errors = array();

    //validation
    if(empty($_POST['username']))
    {
        $errors['Uname'] = "Username cannot be empty";
    }
    if(empty($_POST['firstName']))
    {
        $errors['Fname'] = "First Name cannot be empty";
    }

    if(empty($_POST['lastName']))
    {
        $errors['Lname'] = "Last Name cannot be empty";
    }
    if(empty($_POST['companyName']))
    {
        $errors['Cname'] = "Company's name cannot be empty";
    }
    if(empty($_POST['telephoneNumber']))
    {
        $errors['Tnumber'] = "Telephone number cannot be empty";
    }
    else
    {

        if(strlen($_POST['telephoneNumber'])<9)
        {
            $errors['Lnumber'] = "Telephone number cannot be less than 9 numbers";
        }

    }
    if(empty($_POST['email']))
    {
        $errors['email'] = "Email cannot be empty";
    }



    //check if there are errors in the array
    if(count($errors) == 0)
    {
        require_once '../phpscripts/registration.php';
        $invalidDetails = regEmployer($_POST['username'],$_POST['companyName'],$_POST['firstName'],$_POST['lastName'],$_POST['telephoneNumber'],$_POST['email']);
        if(is_string($invalidDetails))
        {
            $invalidDetails;
            echo "<script> 
                                    $(document).ready( function() {
                            $('#notValidUser').removeClass('hiddenClass');
                        });
                             
                        </script>";
        }
    }
    else
    {
                    echo "<script>
                    $(document).ready( function() {
                            $('.errorColumn').removeClass('hiddenClass');
                        });
                    </script>";
    }





}


?>
<!DOCTYPE html>
<html style="position: relative; min-height: 100%;">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="../favicon.ico">
        
        <script type="text/javascript" src="../Jsscripts/JQueryScripts.js"></script> 
        <link type="text/css" rel="stylesheet" href="../Cssstyles/SignUpPage.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <title>KU CV website</title>
    </head>
    <body style="margin: 0 0 120px;">
        <!-- Extra small devices Phones (<768px) .col-xs -->
        <!-- Small devices Tablets (≥768px) .col-ms -->
        <!-- Medium devices Desktops (≥992px) .col-md -->
        <!-- Large devices Desktops (≥1200px) .col-lg -->


        <div class="container-fluid">
            <div class="row" id="mainTitle">
                <div class="col-xs-12">
                    <div class="kLogo">
                        <img src="../images/KingstonLogo.png">
                    </div>
                    <div id="Title" class="">
                        <h1 class="titleCss ">Welcome to CV Kingston</h1>
                    </div>
                </div>
            </div>
            <div class="row" id="signInput">

                <div class="col-xs-12 ">
                    <h1 id="titleForm">Employer Sign Up</h1> 
                </div>
                <div class="hiddenClass col-xs-12 " id="notValidUser">
                    <p class="errors centerText">
                    <?php 
                        if(isset($invalidDetails)) 
                        {
                            echo $invalidDetails;
                        }
                        ?>
                    </p>
                </div> 
            </div>
            <div class="row" id="inputValues">
                <form action="" name="signUp" method="POST" onsubmit="return checkForm(this)">
                    <div class="errorColumn hiddenClass col-xs-12 col-md-4 col-md-offset-4" >
                              <p class="errors centerText"><?php if(isset($errors['Uname'])) echo $errors['Uname']; ?></p>
                          </div>
                    <div class="col-xs-12 col-md-4 col-md-offset-4">
                        <div class="Content inputValue">
                            <div class="input-group">
                                <span class="input-group-addon">Username *</span>
                                <input class="form-control" id="username" placeholder="Username" name="username" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="errorColumn hiddenClass col-xs-12 col-md-4 col-md-offset-4" >
                              <p class="errors centerText"><?php if(isset($errors['Fname'])) echo $errors['Fname']; ?></p>
                          </div>
                    <div class="col-xs-12 col-md-4 col-md-offset-4">
                        <div class="Content inputValue">
                            <div class="input-group">
                                <span class="input-group-addon">First Name *</span>
                                <input class="form-control" id="fname" placeholder="First Name" name="firstName" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="errorColumn hiddenClass col-xs-12 col-md-4 col-md-offset-4" >
                              <p class="errors centerText"><?php if(isset($errors['Lname'])) echo $errors['Lname']; ?></p>
                          </div>
                    <div class="col-xs-12 col-md-4 col-md-offset-4">
                        <div class="Content inputValue">
                            <div class="input-group">
                                <span class="input-group-addon">Last Name *</span>
                                <input class="form-control" id="lname" placeholder="Last Name" name="lastName" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="errorColumn hiddenClass col-xs-12 col-md-4 col-md-offset-4" >
                              <p class="errors centerText"><?php if(isset($errors['Cname'])) echo $errors['Cname']; ?></p>
                          </div>
                    <div class="col-xs-12 col-md-4 col-md-offset-4">
                        <div class="Content inputValue">
                            <div class="input-group">
                                <span class="input-group-addon">Company's Name *</span>
                                <input class="form-control" id="companyName" placeholder="Company's Name" name="companyName" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-4 col-md-offset-4">
                        <div class="Content inputValue">
                            <div class="input-group">
                                <span class="input-group-addon">Company's Full Address</span>
                                <input class="form-control" id="companyAddress" placeholder="Company's Full Address" name="companyAddress" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-4 col-md-offset-4">
                        <div class="Content inputValue">
                            <div class="input-group">
                                <span class="input-group-addon">City</span>
                                <input class="form-control" id="city" placeholder="City" name="city" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-4 col-md-offset-4">
                        <div class="Content inputValue">
                            <div class="input-group">
                                <span class="input-group-addon">Postcode</span>
                                <input class="form-control" id="Postcode" placeholder="Postcode" name="postcode" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-4 col-md-offset-4">
                        <div class="Content inputValue">
                            <div class="input-group">
                                <span class="input-group-addon">County</span>
                                <input class="form-control" id="county" placeholder="County" name="county" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-4 col-md-offset-4">
                        <div class="Content inputValue">
                            <div class="input-group">
                                <span class="input-group-addon">Country</span>
                                <input class="form-control" id="country" placeholder="Country" name="country" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="errorColumn hiddenClass col-xs-12 col-md-4 col-md-offset-4" >
                              <p class="errors centerText">
                                <?php 
                                if(isset($errors['Tnumber'])){ 

                                    echo $errors['Tnumber'];

                                } 
                                else
                                {

                                    if(isset($errors['Lnumber']))
                                    {
                                        echo $errors['Lnumber'];
                                    }
                                }
                                ?>
                            </p>
                          </div>
                    <div class="col-xs-12 col-md-4 col-md-offset-4">
                        <div class="Content inputValue">
                            <div class="input-group">
                                <span class="input-group-addon">Telephone Number *</span>
                                <input class="form-control" id="telNumb" placeholder="Telephone Number" name="telephoneNumber" type="number" >
                            </div>
                        </div>
                    </div>
                    <div class="errorColumn hiddenClass col-xs-12 col-md-4 col-md-offset-4" >
                              <p class="errors centerText"><?php if(isset($errors['email'])) echo $errors['email']; ?></p>
                          </div>
                    <div class="col-xs-12 col-md-4 col-md-offset-4">
                        <div class="Content inputValue">
                            <div class="input-group">
                                <span class="input-group-addon">Email *</span>
                                <input class="form-control" id="email" placeholder="Email" name="email" type="email">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 col-md-offset-4">
                        <div class="centerText container-fluid" >
                            <label >Pressing the submit button will request a password to the KU Staff</label>
                        </div>
                        <div class="container-fluid" id="submitButton">

                            <button type="submit" class="btn btn-success" id="employerSubmit">Submit</button>
                            <button  type="button" class="btn btn-danger" id="Back-btn" onclick="window.location = '../Login/EmployerLogin.php'">Back</button>

                        </div>
                    </div>
                </form>
            </div>
            <div class="row" id="footer">
                <?php include '../footer/foooter.php'; ?> 
            </div>
        </div>

    </body>
</html>