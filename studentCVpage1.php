<?php
session_start();

if($_SESSION['userType']!="S")
{

    header("Location:../index.php");
}
else
{
    $username = $_SESSION['username'];


}

include '../phpscripts/upload.php';
include '../phpscripts/submitcomment.php';
$errors=array();
if(isset($_FILES['file']) && ($_FILES['file']['error'] == UPLOAD_ERR_OK) && isset($_POST['selectCategories']))
{
    $errors = upFileCreateRecord($username,$_POST['selectCategories']);
    if(!empty($errors))
    {
        $message = $errors;
        //$errors['message'] = $message;

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../Jsscripts/bootstrap-filestyle.min.js"> </script>
        <link type="text/css" rel="stylesheet" href="../Cssstyles/optimisedMainPage.css"/>
        <title>KU CV website</title>

    </head>
    <script>
        $(function() {

            // contact form animations
            $('#contact').click(function() {
                $('#contactForm').fadeToggle();
            })
            $(document).mouseup(function (e) {
                var container = $("#contactForm");

                if (!container.is(e.target) // if the target of the click isn't the container...
                    && container.has(e.target).length === 0) // ... nor a descendant of the container
                {
                    container.fadeOut();
                }
            });

        });
    </script>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 0;
            background: none;
            font-family: none;
            font-size: 11px;
        }
        h1{ margin: 0; }
        #contact {
            -webkit-user-select: none; /* Chrome/Safari */
            -moz-user-select: none; /* Firefox */
            -ms-user-select: none; /* IE10+ */
            margin: 4em auto;
            width: 100px;
            height: 30px;
            line-height: 30px;
            background: teal;
            color: white;
            font-weight: none;
            text-align: center;
            cursor: pointer;
            border: 1px solid white;
        }

        #contact:hover { background: #666; }
        #contact:active { background: #444; }

        #contactForm {
            display: none;

            border: 6px solid salmon;
            padding: 2em;
            width: 400px;
            text-align: center;
            background: #fff;
            position: fixed;
            top:50%;
            left:50%;
            transform: translate(-50%,-50%);
            -webkit-transform: translate(-50%,-50%)

        }

        input, textarea {
            margin: .8em auto;
            font-family: none;
            text-transform: none;
            font-size: none;

            display: block;
            width: 280px;
            padding: .4em;
        }
        textarea { height: 80px; resize: none; }

        .formBtn {
            width: 140px;
            display: inline-block;

            background: teal;
            color: #fff;
            font-weight: 100;
            font-size: 1.2em;
            border: none;
            height: 30px;
        }</style>
    <body>

        <!-- Extra small devices Phones (<768px) .col-xs -->
        <!-- Small devices Tablets (≥768px) .col-ms -->
        <!-- Medium devices Desktops (≥992px) .col-md -->
        <!-- Large devices Desktops (≥1200px) .col-lg -->

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
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class="row" id="welcome">
                <div class="col-xs-12" >
                    <div id="Title">
                        <h1 class="title">Welcome to your cv space</h1>

                    </div>
                </div>
            </div>
            <div class="row" id="uploadCV">
                <div class="col-xs-12 col-md-6">
                    <div id="CVfeedback" >
                        <h3 class="threeSubtitle">CV Feedback</h3>
                        <div class="table-responsive table-hover">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Staff's Name</th>
                                        <th>Feedback's Date</th>
                                        <th>CV's Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include '../phpscripts/displayFeedback.php'; displayFeedback($username)


                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6">
                    <h3 class="threeSubtitle">CV Upload</h3>
                    <div id="fileUpload field" >

                        <div class="form-group">
                            <label style="margin-bottom:1%;">Choose the CV that you want to upload</label>
                            <form action="" method="POST" enctype="multipart/form-data" id="js-upload-form" class="addMargin">
                                <div class="" style="display: inline; padding: 10px;">
                                    <div class="errors"><?php if(isset($message)){ echo $message; } ?></div>
                                    <label class="roundedBtn btn btn-warning btn-file">Browse
                                        <input type="file" name="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val().substr(12));">
                                    </label>
                                    <span class='displayCVName' id="upload-file-info"></span>
                                    <div class="" style="margin-bottom: 2%;">

                                        <select class="form-control" name="selectCategories">
                                            <?php
                                            include '../phpscripts/getCategories.php';
                                            categoriesSelection();
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="roundedBtn btn btn-sm btn-success" id="js-upload-submit">Upload files</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row" id="uploadedCVs">
                <div class="col-xs-12">
                    <h3 class="threeSubtitle">CVs Uploaded</h3>
                    <div class="table-responsive table-hover">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>CV</th>
                                    <th>Date</th>
                                    <th>Completed</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="studentDisplayCVFeedback.php"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia reiciendis alias expedita illo corporis, animi possimus, libero nihil nesciunt doloremque quasi nemo culpa, deserunt temporibus mollitia unde molestias commodi distinctio Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam ipsum quod quasi fugit, tempore, dolor quam libero quae fuga vitae officia placeat hic. Aut eum eaque obcaecati ratione, voluptates tenetur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim distinctio inventore minima, nam cumque ipsum sunt qui perspiciatis voluptate consectetur, numquam fugiat aperiam velit culpa ipsa dolorem sit sequi! Earum! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam doloremque atque dolor quam ea quibusdam, non quis neque quos voluptates in quas sapiente! Ex perferendis rem quasi optio ipsa accusamus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore soluta accusamus quaerat veritatis facere nostrum aperiam reiciendis distinctio molestias repellendus odio cum ducimus nemo libero minus eos, nulla voluptas, ipsum.</p></a></td>
                                    <td>Content goes here</td>
                                    <td>
                                        <form action="." method="post">
                                            <label><input name="mycheckbox" type="checkbox" value="1" /></label>
                                        </form>
                                    </td>
                                </tr>
                                <tr>

                                    <td>Content goes here</td>
                                    <td>Content goes here</td>
                                    <td>
                                        <form action="." method="post">
                                            <label><input name="mycheckbox" type="checkbox" value="1" /></label>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Content goes here</td>
                                    <td>Content goes here</td>
                                    <td>
                                        <form action="." method="post">
                                            <label><input name="mycheckbox" type="checkbox" value="1" /></label>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Content goes here</td>
                                    <td>Content goes here</td>
                                    <td>
                                        <form action="." method="post">
                                            <label><input name="mycheckbox" type="checkbox" value="1" /></label>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        

        <?php include '../footer/foooter.php';?>

    </body>
</html>
