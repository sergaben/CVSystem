<!DOCTYPE html>
<html style="position: relative; min-height: 100%;">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../Jsscripts/bootstrap-filestyle.min.js"> </script>
        <link type="text/css" rel="stylesheet" href="../Cssstyles/optimisedMainPage.css"/>
        <title>Logout Page</title>
    </head>
        <style>
    /* layout.css Style */

.upload-drop-zone {
  height: 200px;
  border-width: 2px;
  margin-bottom: 20px;
}

/* skin.css Style*/
.upload-drop-zone {
  color: #ccc;
  border-style: dashed;
  border-color: #ccc;
  line-height: 200px;
  text-align: center
}
.upload-drop-zone.drop {
  color: #222;
  border-color: #222;
}
    </style>
    <body style="margin: 0 0 100px;">
        <!-- <a class="navbar-brand">-->
        <?php require_once '../core/init.php'; ?>
        <nav class="navbar navbar-default" >
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
                        <!--<span class="sr-only">Toggle navigation</span>-->
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="containerImg"><a class="navbar-brand" href="#"><img id="logoImage" src="../images/KingstonLogo.png" ></a></div>
                </div>
                <div id="myNavbar" class="collapse navbar-collapse ">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../index.php" <?php session_unset() ?>>Logout</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact US</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container-fluid">
        <div class="container-fluid" id="mainTitle">
            <h1 id="Title">Your CV Space</h1>
            <h3 class="SubTitle">Welcome {Student Name,kNumber}</h3>
        </div>
        <div class ="container-fluid" id="containerFluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div id="CVfeedback" style="height:100%;width:40%">
                            <h2 class="SubTitle">CV Feedback</h2>
                            <div class="table-responsive table-hover">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Staff's Name</th>
                                            <th>Feedback's date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Content goes here</td>
                                            <td><a href="studentDisplayCVFeedback.php">Content goes here</a></td>
                                        <tr>
                                        <tr>
                                            <td>Content goes here</td>
                                            <td>Content goes here</td>
                                        <tr>
                                        <tr>
                                            <td>Content goes here</td>
                                            <td>Content goes here</td>
                                        <tr>
                                        <tr>
                                            <td>Content goes here</td>
                                            <td>Content goes here</td>
                                        <tr>
                                        <tr>
                                            <td>Content goes here</td>
                                            <td>Content goes here</td>
                                        <tr>
                                        <tr>
                                            <td>Content goes here</td>
                                            <td>Content goes here</td>
                                        <tr>
                                        <tr>
                                            <td>Content goes here</td>
                                            <td>Content goes here</td>
                                        <tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class=" .col-xs-12 .col-sm-6 .col-lg-4 ">
                        <h2 class="SubTitle">CV Upload</h2>
                        <div id="fileUpload field" style="height:50%;width:70%">
                            <form role="form">
                                <div class="form-group">
                                
                                <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading"><strong>Upload Files</strong> <small>Student CV Upload</small></div>
        <div class="panel-body">

          <!-- Standar Form -->
          <h4>Select files from your computer</h4>
          <form action="Student.upload.php" method="POST" enctype="multipart/form-data" id="js-upload-form">
            <div class="form-inline">
              <div class="form-group">
                <input type="file" name="files[]" id="js-upload-files" multiple>
              </div>
              <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
            </div>
          </form>

          <!-- Drop Zone -->
          <h4>Or drag and drop files below</h4>
          <div class="upload-drop-zone" id="drop-zone">
            Just drag and drop files here
          </div>

          <!-- Progress Bar -->
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
              <span class="sr-only">60% Complete</span>
            </div>
          </div>

          <!-- Upload Finished -->
          <div class="js-upload-finished">
            <h3>Processed files</h3>
            <div class="list-group">
              <a href="studentDisplayCVFeedback.php" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>Sergio CV</a>
              <a href="studentDisplayCVFeedback.php" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>Jirreh CV</a>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- /container -->
     
     <script>
     function($) {
    'use strict';

    // UPLOAD CLASS DEFINITION
    // ======================

    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('js-upload-form');

    var startUpload = function(files) {
        console.log(files)
    }

    uploadForm.addEventListener('submit', function(e) {
        var uploadFiles = document.getElementById('js-upload-files').files;
        e.preventDefault()

        startUpload(uploadFiles)
    })

    dropZone.ondrop = function(e) {
        e.preventDefault();
        this.className = 'upload-drop-zone';

        startUpload(e.dataTransfer.files)
    }

    dropZone.ondragover = function() {
        this.className = 'upload-drop-zone drop';
        return false;
    }

    dropZone.ondragleave = function() {
        this.className = 'upload-drop-zone';
        return false;
    }

}(jQuery);
     </script>
                                
        <?php include '../footer/foooter.php';?>   
    </body>
</html>