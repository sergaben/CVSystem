<?php
//session_start();
//if($_SESSION['userType']!="T")
//{
//
//    header("Location:../index.php");
//}
//else
//{
//
//    $username = $_SESSION['username'];
//
//
//}
//if($_POST)
//{
//    $errors = array();
//    if(empty($_POST['newCategoryName']))
//    {
//        echo $errors['empty'] ="please insert a category name";
//        
//    }
//    else
//    {
//        include '../phpscripts/insertCategories.php';
//        $categories = categoriesUpload($_POST['newCategoryName']);
//        if(is_string($categories))
//        {
//            
//           echo  $errors['outcome'] = $categories;
//            
//        }
//    }
//    
//    
//}
session_write_close();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link rel="icon" type="image/png" href="../favicon.ico">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
        <script src="../Jsscripts/JQueryScripts.js?v=1" type="text/javascript"></script> 
        <link type="text/css" rel="stylesheet" href="../Cssstyles/optimisedMainPage.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <title>KU CV website</title>

        <script type="text/javascript">

            window.onload = function(){
                $(".clickable-row").on( "mouseenter", function() {
                    $( this ).css({
                        "background-color": "#78ae4e",   
                    });
                }).on( "mouseleave", function() {
                    var styles = {
                        backgroundColor : "#ffffff",
                    };
                    $( this ).css( styles );
                });
            }
        </script>
    </head>
    <body>

        <nav class=" navColor navbar navbar-default" >

            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="containerImg"><a class="navbar-brand" href="#"><img id="logoImage" src="../images/KingstonLogo.png" ></a></div>

                </div>
                <div class="mainTitle" ><h1 id="mainHeading">Kingston CV System</h1></div>
                <div id="myNavbar" class="navColor collapse navbar-collapse ">
                    <ul class="navColor nav navbar-nav navbar-right">
                        <li><a href="../phpscripts/logout.php">Logout</a></li>
                        <li><a href="../landingpage.html">About</a></li>
                        <li><a href="../contactUS.php">Contact US</a></li>
                    </ul>
                </div>

            </div>

        </nav>
        <div class ="container-fluid" id="mainContent">
            <div class="row" id="breadCrumb">
                <div class="col-xs-12">
                    <ol class="breadcrumb" style="background-color: white; margin-top: 2%; margin-bottom: 0;">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class="row" id="welcome">
                <div class="col-xs-12" >
                    <div id="Title">
                        <h1 class="title">Welcome <?php echo htmlentities(ucfirst($username));?></h1>  
                    </div>
                </div>
            </div>
            <div class="row" id="notificationTable">

                <h2 class="SubTitle">Notifications</h2>
                <div class="col-xs-12 col-md-4">
                    <div class="table-responsive ">
                        <table id="Student" class='marginTop table'>
                            <thead>
                                <tr>
                                    <th>Student Notifications</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                include '../phpscripts/getNotifications.php';
                                getStudentNotifications();
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="table-responsive ">
                        <table id="Employer" class='marginTop table'>
                            <thead>
                                <tr>
                                    <th>Employer Notifications</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 

                                getEmployerNotifications();
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="table-responsive ">
                        <table id="Staff" class='marginTop table'>
                            <thead>
                                <tr>
                                    <th>Staff Notifications</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 

                                getStaffNotifications();
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="row" id="categoryColumn">
                <div class="col-xs-12 col-md-2" >
                    <div class ="container-fluid">
                        <h2 id="categoriesTitle"> Categories 
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id="buttonCss">+</button>
                        </h2>
                        <div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="mModalLabel" aria-hidden="true">

                            <div class="modal-dialog">

                                <div class="modal-content">

                                    <!-- modal header -->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">
                                            New Category
                                        </h4> 
                                    </div>  
                                    <!-- modal body -->
                                    <div class="modal-body">
                                        <?php include '../phpscripts/insertCategories.php'; ?>
                                        <form id ="insertCategory" class="form-group" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                                            <label for="inputCategoryName"> Enter the name of the category</label>
                                            <div class="errors"><?php if(isset($errors['empty'])){echo $errors['empty'];} else{ if(isset($errors['sucess'])){echo $errors['success'];} else{if(isset($errors['fail'])){echo $errors['fail'];}}} ?></div>
                                            <input type="text" class="form-control" id="inputCategoryName" placeholder="New category" name="newCategoryName"/>
                                            <input type="submit" class="btn btn-default"  value="Create category" id="createCategory"/>    

                                        </form> 

                                    </div>
                                </div>    
                            </div>

                        </div>
                        <div class = "panel-group blackBorder">
                            <div class ="panel panel default" id="categoryPanel">
                                <div class='panel-body' >
                                    <div >
                                        <button id='AllCvs'type='button' class='buttonClicked btn btn-default btn-block' onClick='allCvsStaff()' >All CVs</button>
                                    </div>
                                </div>
                                <?php 
                                include '../phpscripts/getCategories.php';
                                categoriesStaff();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-10" id="viewColumn">

                    <div class ="container-fluid" >
                        <h2 id="viewTitle"> CVs</h2>
                        <div class = "panel-group" id="CVDisplay">
                            
                                <?php include '../phpscripts/getCvs.php';
                                getCVsStaff();
                                ?>
                            
                        </div>
                    </div>
                </div>

            </div>

            <div class="row" id="sendPass">
                <div class="col-xs-12 col-md-6 col-md-offset-3">

                    <h2 id="PasswordTitle">Generated Password</h2>
                    <button type="button" class="btn btn-default btn-block" id="generateBtn">Generate</button>
                    <button onclick="myFunction()">Generate 2</button>

<p id="demo"></p>

<script>
function myFunction() {
    var txt;
    var person = prompt("Which account would you like to generate a password for:", "Employer Account");
    if (person == null || person == "") {
        txt = "User cancelled the prompt.";
    } else {
        txt = "Password sent to " + person;
    }
    document.getElementById("demo").innerHTML = txt;
}
</script>
                    
                    
                    <div id="displayPass"></div>

                </div>

            </div>
        </div> 






        <?php include '../footer/foooter.php';?>   


    </body>
</html>