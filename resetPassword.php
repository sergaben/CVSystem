<!DOCTYPE html>
<html>
<head>
    <title>CV website KU</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"      crossorigin="anonymous"></script>
    <script src="Jsscripts/JQueryScripts.js" type="text/javascript"></script>
    <link rel="stylesheet"  href="Cssstyles/loginRedone.css?v=<?php echo date('his'); ?>">
</head>
<body>
<div class="container-fluid">
    <div class="row" id="mainTitle">
        <div class="col-xs-12" >
            <div class="kLogo">
                <img src="images/KingstonLogo.png">
            </div>
            <div id="Title" >
                <h1 class="title" >Kingston CV System</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row" id="breadCrumb">
            <div class="col-xs-12 col-offset-md-6">
                <ol class="breadcrumb" style="background-color: white; margin-top: 2%; margin-bottom: 0;">
                    <li><a href="index.php">Login</a></li>
                    <li class="active">Reset Password</li>
                </ol>
            </div>
        </div>
        <div class="row" id="Title">
            <div class="col-sm-12">
                <h1>Reset Password</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <p class="text-center">Use the form below to change your password. Your password cannot be the same as your username.</p>
                <form method="post" id="passwordForm">
                    <input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off">
                    <div class="checks row">
                        <div class="col-xs-12 col-md-6">
                            <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters Long<br>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase Letter
                        </div>
                    </div>
                    <div class="checks row">
                        <div class="col-xs-12 col-md-6">
                            <span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase Letter<br>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Number
                        </div>
                    </div>

                    <input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off">
                    <div class="checks row">
                        <div class="col-xs-12 col-md-12">
                            <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
                        </div>
                    </div>
                    <div class="increaseMarginTop row">
                        <div class="col-xs-12 col-md-12 ">
                            <input type="submit" class="btn btn-primary btn-load " data-loading-text="Changing Password..." value="Change Password">
                        </div>
                    </div>
                </form>
            </div><!--/col-sm-6-->
        </div><!--/row-->
    </div>
</div>
</body>
<Script>
    $("input[type=password]").keyup(function(){
        var ucase = new RegExp("[A-Z]+");
        var lcase = new RegExp("[a-z]+");
        var num = new RegExp("[0-9]+");

        if($("#password1").val().length >= 8){
            $("#8char").removeClass("glyphicon-remove");
            $("#8char").addClass("glyphicon-ok");
            $("#8char").css("color","#00A41E");
        }else{
            $("#8char").removeClass("glyphicon-ok");
            $("#8char").addClass("glyphicon-remove");
            $("#8char").css("color","#FF0004");
        }

        if(ucase.test($("#password1").val())){
            $("#ucase").removeClass("glyphicon-remove");
            $("#ucase").addClass("glyphicon-ok");
            $("#ucase").css("color","#00A41E");
        }else{
            $("#ucase").removeClass("glyphicon-ok");
            $("#ucase").addClass("glyphicon-remove");
            $("#ucase").css("color","#FF0004");
        }

        if(lcase.test($("#password1").val())){
            $("#lcase").removeClass("glyphicon-remove");
            $("#lcase").addClass("glyphicon-ok");
            $("#lcase").css("color","#00A41E");
        }else{
            $("#lcase").removeClass("glyphicon-ok");
            $("#lcase").addClass("glyphicon-remove");
            $("#lcase").css("color","#FF0004");
        }

        if(num.test($("#password1").val())){
            $("#num").removeClass("glyphicon-remove");
            $("#num").addClass("glyphicon-ok");
            $("#num").css("color","#00A41E");
        }else{
            $("#num").removeClass("glyphicon-ok");
            $("#num").addClass("glyphicon-remove");
            $("#num").css("color","#FF0004");
        }

        if($("#password1").val() == $("#password2").val()){
            $("#pwmatch").removeClass("glyphicon-remove");
            $("#pwmatch").addClass("glyphicon-ok");
            $("#pwmatch").css("color","#00A41E");
        }else{
            $("#pwmatch").removeClass("glyphicon-ok");
            $("#pwmatch").addClass("glyphicon-remove");
            $("#pwmatch").css("color","#FF0004");
        }
    });
</Script>
</html>