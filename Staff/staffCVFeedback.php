
<?php
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>";
session_start();

if($_SESSION['userType']!="T")
{

    header("Location:../index.php");
}
else
{   

    $username= $_SESSION['username'];

}
if($_POST){
    $errors = array();
    if(empty($_POST['feedback']))
    {
        $errors['empty']= "Please write some feedback";
        echo "<script> 
                                    $(document).ready( function() {
                            $('#hiddenDiv').removeClass('hiddenClass');
                        });

                        </script>";
    }
    else
    {


        include '../phpscripts/sendFeedback.php';

        $reaction = sendFeedback($username,$_GET['cv'],$_POST['feedback']);
        if(is_string($reaction))
        {
            $reaction;
            $errors['reaction'] = $reaction;
            echo "<script> 
                                    $(document).ready( function() {
                            $('#hiddenDiv').removeClass('hiddenClass');
                        });

                        </script>";
        }
    }


}

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
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact US</a></li>
                    </ul>
                </div>

            </div>

        </nav>

        <div class="container-fluid">
           <div class="row" id="breadCrumb">
                <div class="col-xs-12">
                    <ol class="breadcrumb" style="background-color: white; margin-top: 2%; margin-bottom: 0;">
                        <li><a href="StaffCVpage.php">Dashboard</a></li>
                        <li class="active">CV Feedback</li>
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
                        <!-- TODO CHANGE END PATH AUTOMATICALLY DEPENDING OF THE CV NAME -->
                        <?php 
                            $fullpath = $_GET['path'];
                            $choppedPath =substr($fullpath,2);
                            if(substr($fullpath,-3) === "pdf")
                            {
                                 echo '<iframe id="viewCV" src="'.$_GET['path'].'"  align="centre" with="100%", height ="100%" frameborder ="yes"></iframe>';
//                                
                            }
                            else if((substr($fullpath,-3) === "doc") || (substr($fullpath,-4) === "docx") )
                            {
                            echo '<iframe id="viewCV" src="https://view.officeapps.live.com/op/embed.aspx?src=http://kunet.kingston.ac.uk/~k1516561'.$fullpath.'"  align="centre" with="100%", height ="100%" frameborder ="yes"></iframe>';
                            }
                            
                            
                        ?>
                        
                        <div class="container-fluid hideOp"></div>

                    </div>

                </div>
            </div>

            <div class="row" id="feedback">

                <div class="col-xs-12">

                    <h2 class="SubTitle">Feedback</h2>
                    <div class="hiddenClass errors col-xs-12" id="hiddenDiv" style="text-align:center;">
                        <p>
                            <?php 
                            if(isset($errors['empty'])) 
                            {
                                echo $errors['empty'];
                            }
                            else
                            {
                                if(isset($errors['reaction']))
                                {
                                    echo $errors['reaction'];
                                }
                            }
                            ?>
                        </p>
                    </div>
                    <div id="feedbackDisplay" >
                        <form method="POST" action="" style="text-align:center;">
                            <div class="feedbackArea"><textarea style ="" align="middle" name="feedback" id="feedbackArea"></textarea></div>

                            <button type="submit" class="btn btn-lg btn-success"> Send Feedback </button>
                        </form>
                    </div>
                    <!--display: block;width: 65%;height:100%;margin: 0 auto; margin-bottom: 2%;-->
                </div>
            </div>

        </div>  

        <?php include '../footer/foooter.php';?>   

    </body>
</html>