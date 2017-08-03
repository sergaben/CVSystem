<?php
session_start();
if($_SESSION['userType']!="E")
{

    header("Location:../index.php");
}
else
{   

    $username = $_SESSION['username'];


}

session_write_close();

?>



<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link type="text/css" rel="stylesheet" href="../Cssstyles/optimisedMainPage.css">
        <link rel="icon" type="image/png" href="../favicon.ico">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
        <script src="../Jsscripts/JQueryScripts.js?v=5" type="text/javascript"></script> 
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
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact US</a></li>
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
            <div class="row" id="categoryColumn">
                    <div class="col-xs-12 col-md-2" >
                        <div class ="container-fluid">
                            <h2 id="categoriesTitle"> Categories 
                            </h2>
                            <div class = "panel-group blackBorder">
                                <div class ="panel panel default" id="categoryPanel">
                                   <div class='panel-body' >
                                        <div >
                                            <button id='AllCvs'type='button' class='buttonClicked btn btn-default btn-block' onClick='allCvsEmployer()' >All CVs</button>
                                        </div>
                                    </div>
                                    <?php 

                                    include '../phpscripts/getCategories.php';
                                    categoriesEmployer();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-10" id="viewColumn">

                        <div class ="container-fluid" >
                            <h2 id="viewTitle"> CVs</h2>
                            <div class = "panel-group" id="CVDisplay">
                                <div class ="panel default" id="viewCenterPanel">
                                    <?php include '../phpscripts/getCvs.php';
                                    getCVsEmployer();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row" id="extraStuff">
                <div class="col-xs-12 ">
                    
                </div>
            </div>
        </div>
        <?php include '../footer/foooter.php';?>   

    </body>
</html>