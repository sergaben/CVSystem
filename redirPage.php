    <?php require_once 'core/init.php'; ?>
    <?php
                    header("refresh:6,url=index.php");
    ?>
   <html>
    <head>
        <title>CV website KU</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="Stylesheet"  href="../Cssstyles/Login.css">
        <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
       
        <div class= "container-fluid" id="MainContainerFluid">
                <h1 class="titleCss">CV Kingston System</h1>
                <?php
                    echo " <h2> Redirecting you to the login page in 6 seconds</h2>";
                ?>
        </div>
        <!--<script src="JSscripts/makeChangesInHtmlCode.js"></script>-->
        <?php include 'footer/foooter.php';?>   
    </body>

    <!--onclick="document.getElementById('changeTitle').innerHTML = 'KU Talent Staff Login Screen'" -->

</html>
