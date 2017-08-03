<?php
            echo "<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>";
            // check if there is a post in the page
            if($_POST){
                //array for errors
                $errors = array();
                $string = substr($_POST['username'],-1,7);
                //validation
                if(empty($_POST['username']))
                {
                    $errors['Uname'] = "Username cannot be empty";
                }
                if (!preg_match('/^[kK]/', $_POST['username'])) {
                    
                   $errors['Uname'] ="Username must begin with a K ";
     
                }
                else{
                    if(preg_match('/^[0-9]/',$string) !== 1)
                    {
                         $errors['Uname'] ="Username must begin with a K and must contains numbers";
                    }
                    
                }
                if(empty($_POST['firstName']))
                {
                    $errors['Fname'] = "First Name cannot be empty";
                }
                
                if(empty($_POST['lastName']))
                {
                    $errors['Lname'] = "Last Name cannot be empty";
                }
                if(empty($_POST['email']))
                {
                     $errors['email'] = "Email cannot be empty";
                }
                
                if((empty($_POST['password'])) || (empty($_POST['matchedPass'])))
                {
                     $errors['pass'] = "Password cannot be empty";
                }
                else
                {
                    if(($_POST['password']) !== ($_POST['matchedPass']))
                    {
                        $errors['passL'] = "Password do not match";
                    }
                    else if((strlen($_POST['password'])) <10 || (strlen($_POST['matchedPass'])) <10 )
                    {
                        $errors['passMinLen'] = "Password has to be greater than 10 characters";
                        
                    }
                }
                
                //check if there are errors in the array
                if(count($errors) == 0)
                {
                    require_once '../phpscripts/registration.php';
                    $invalidDetails = regStudent($_POST['username'],$_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['password']);
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
                <h1 id="titleForm">Student Sign Up</h1> 
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
                <form action="" name="signUp" method="POST" onsubmit="">
                        <div class="errorColumn hiddenClass col-xs-12 col-md-4 col-md-offset-4" >
                              <p class="errors centerText"><?php if(isset($errors['Uname'])) echo $errors['Uname']; ?></p>
                          </div>
                        <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <div class="Content inputValue">
                                
                                <div class="input-group">
                                    <span class="input-group-addon">Username *</span>
                                    <input class="form-control" id="uname" placeholder="Username" name="username" type="text">
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
                        <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <div class="Content inputValue">
                               <p></p>
                                <div class="input-group">
                                    <span class="input-group-addon">Full Address</span>
                                    <input class="form-control" id="address" placeholder="Full Address" name="fullAddress" type="text">
                                </div>
                            </div>
                        </div>   
                        <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <div class="Content inputValue">
                               <p></p>
                                <div class="input-group">
                                    <span class="input-group-addon">City</span>
                                    <input class="form-control" id="city" placeholder="City" name="city" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <div class="Content inputValue">
                               <p></p>
                                <div class="input-group">
                                    <span class="input-group-addon">Postcode</span>
                                    <input class="form-control" id="postcode" placeholder="Postcode" name="postcode" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <div class="Content inputValue">
                               <p></p>
                                <div class="input-group">
                                    <span class="input-group-addon">County</span>
                                    <input class="form-control" id="county" placeholder="County" name="county" type="text">
                                </div>
                            </div>
                        </div>                      
                        <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <div class="Content inputValue">
                               <p></p>
                                <div class="input-group">
                                    <span class="input-group-addon">Country</span>
                                    <input class="form-control" id="country" placeholder="Country" name="country" type="text">
                                </div>
                            </div>
                        </div>                     
                        <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <div class="Content inputValue">
                               <p></p>
                                <div class="input-group">
                                    <span class="input-group-addon">Telephone Number</span>
                                    <input class="form-control" id="telNumb" placeholder="Telephone Number" name="telephoneNumber" type="number">
                                </div>
                            </div>
                        </div>
                        <div class="errorColumn hiddenClass col-xs-12 col-md-4 col-md-offset-4" >
                              <p class="errors centerText"><?php if(isset($errors['email'])) echo $errors['email']; ?></p>
                          </div>
                        <div class="col-xs-12 col-md-4 col-md-offset-4">
                          <p class="centerText">Please use the university's email</p>
                    </div>
                        <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <div class="Content inputValue">
                                <div class="input-group">
                                    <span class="input-group-addon">Email *</span>
                                    <input class="form-control" id="email" placeholder="Email" name="email" type="email">
                                </div>
                            </div>
                        </div>
                        <div class="errorColumn hiddenClass col-xs-12 col-md-4 col-md-offset-4" >
                              <p class="errors centerText">
                                   <?php 
                                   if(isset($errors['pass'])) 
                                   {
                                       echo $errors['pass'];
                                   }
                                   else
                                   {
                                       if(isset($errors['passL']))
                                       { 
                                           echo $errors['passL'] ;
                                       } 
                                       else 
                                       {
                                           if(isset($errors['passMinLen']))
                                           {
                                                echo $errors['passMinLen'];
                                           }
                                       } 
                                   } 
                                    ?>
                                    </p>
                          </div>
                        <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <div class="Content inputValue">
                                <div class="Content inputValue">
                                    <div class="input-group">
                                        <span class="input-group-addon">Password *</span>
                                        <input class="form-control" id="passw" placeholder="Password" name="password" type="password">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="errorColumn hiddenClass col-xs-12 col-md-4 col-md-offset-4" >
                              <p class="errors centerText">
                               <?php 
                                   if(isset($errors['pass'])) 
                                   {
                                       echo $errors['pass'];
                                   }
                                   else
                                   {
                                       if(isset($errors['passL']))
                                       { 
                                           echo $errors['passL'] ;
                                       } 
                                     
                                   } 
                                ?></p>  
                          </div>
                        <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <div class="Content inputValue">
                                <div class="input-group">
                                    <span class="input-group-addon">Repeat Password *</span>
                                    <input class="form-control" id="repPass" placeholder="Password" name="matchedPass" type="password">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <div class="container-fluid" id="submitButton">
                                    
                                    <button type="submit" class="btn btn-success" id="StudentSubmit">Submit</button>
                                    <button type="button" class="btn btn-danger" id="Back-btn" onclick="window.location = '../index.php'">Back</button>
                                    <!-- return goBack() -->
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