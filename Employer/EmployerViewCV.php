<?php
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>";
session_start();
if($_SESSION['userType']!="E")
{

    header("Location:../index.php");
}
else
{   

    $username = $_SESSION['username'];


}
//if($_POST)
//{
//        include '../phpscripts/download.php';
//        download($_GET['path']);    
//}

session_write_close();

?>
<!DOCTYPE html>
<html >
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="../favicon.ico">
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=luznxmqp3u58kyttjr6wy5o1htgqs9i494h9pm1lkw62uple"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../Jsscripts/bootstrap-filestyle.min.js"> </script>
        <link type="text/css" rel="stylesheet" href="../Cssstyles/optimisedMainPage.css"/>
        <script type="text/javascript">
            $(document).ready( function() {
                $(window).resize(resize);
                resize();
            });
            function resize() {
                var $input = $(this);

                if ($(window).width() < 795) {
                    $('#viewCV').addClass('viewCV');
                    tinymce.init({
                        selector: '#feedbackArea',
                        //plugins: "autoresize",
                        width: 373,
                        height:250
                    });
                }
                else {
                    $('#viewCV').addClass('viewCV');
                    tinymce.init({
                        selector: '#feedbackArea',
                        //plugins: "autoresize",
                        width: 800
                    });
                }
            }

        </script>
        <script> </script>

        <title>KU CV website</title>
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
        <div class="container-fluid">
            <div class="row" id="breadCrumb">
                <div class="col-xs-12">
                    <ol class="breadcrumb" style="background-color: white; margin-top: 2%; margin-bottom: 0;">
                        <li><a href="EmployerCVpage.php">Dashboard</a></li>
                        <li class="active">CV viewer</li>
                    </ol>
                </div>
            </div>
            <div class="row" id="welcome">
                <div class="col-xs-12" >
<!--                    <h2 class="SubTitle">Owner: {Student Name, kNumber}</h2>-->

                </div>
            </div>
            <div class="row" id="cvDisplay">
                <div class="col-xs-12">

<!--                    <h3 class="threeSubtitle"></h3>-->
                    <div class="displayCV">
                        
                        <?php 
                            $fullpath = $_GET['path'];
                            $choppedPath =substr($fullpath,2);
                            if(substr($fullpath,-3) === "pdf")
                            {
                                 echo '<iframe id="viewCV" src="'.$_GET['path'].'"  align="middle"></iframe>';
                            }
                            else if((substr($fullpath,-3) === "doc") || (substr($fullpath,-4) === "docx"))
                            {
                            echo '<iframe id="viewCV" src="https://view.officeapps.live.com/op/embed.aspx?src=http://kunet.kingston.ac.uk/~k1516561'.$fullpath.'"  align="middle"></iframe>';
                            }
                            
                            
                        ?>
                        
                        <div class="container-fluid hideOp"></div>

                    </div>

                </div>
            </div>
            <div class="row" id="dowloadCV">
                    <div class="col-xs-12">
                        <div id="centerForm">
                           
                            <form action="../phpscripts/download.php?path=<?php echo $_GET['path'] ?>" method="POST">
                                <button type="submit"  class="btn btn-success center-block" id="staffSubmit">
                                        Download CV
                                    </button>
                            </form>   
                        </div>
                    </div>
            </div> 

            <div class="row" id="extraStuff">
                <div class="col-xs-12">
                </div>
            </div>
        </div> 

        
        <?php include '../footer/foooter.php';?>   

    </body>
</html>