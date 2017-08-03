<!DOCTYPE html>
<html>
    <head>
        <title>Contact Us</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../Jsscripts/bootstrap-filestyle.min.js">
        </script>
        <link type="text/css" rel="stylesheet" href="Cssstyles/optimisedMainPage.css"/>

    </head><style>
    
    .fa{font-size:24px;margin:255,0.85);text-decoration:none}
    .contact a.skype:hover,.fa-skype{color:#00aff0}
    .contact a.google:hover,.fa-google-plus{color:#dd4b39}
    .contact a.linkedin:hover,.fa-linkedin{color:#0e76a8}
    .contact a.twitter:hover,.fa-twitter{color:#00acee}gin-right:5px}
    .row-first{margin-bottom:10px;margin-top:8px}
    .title-contact{margin-top:32px;display:none;}
    .contact-email { display:none; }
    a{transition:all .3s ease;-webkit-transition:all .3s ease;-moz-transition:all .3s ease;-o-transition:all .3s ease}
    .quick-contact{color:#fff;background-color:green;text-align:center}
    .contact a{-webkit-border-radius:2px;-moz-border-radius:2px;-o-border-radius:2px;border-radius:2px;display:block;background-color:rgba(255,255,255,0.25);font-size:20px;text-align:center;color:#fff;padding:7px}
    .contact a:hover{background-color:rgba(255,255
    </style>
    <script>
        $(document).ready(function () {
            $(".title-contact, .contact-email").fadeIn("slow");
        });
    </script>
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
                    <div class="containerImg"><a class="navbar-brand" href="#"><img id="logoImage" src="images/KingstonLogo.png" ></a></div>
<div class="mainTitle" ><h1 id="mainHeading">Kingston CV System</h1></div>
                </div>
                
                <div id="myNavbar" class="navColor collapse navbar-collapse ">
                    <ul class="navColor nav navbar-nav navbar-right">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="landingpage.html">About</a></li>
                        <li><a href="#">Contact US</a></li>
                    </ul>
                </div>

            </div>

        </nav>
        <div class="container bootstrap snippets" style="margin-top:40px">
            <div class="row text-center">
                <div class="col-sm-4">
                    <div class="contact-detail-box">
                        <i class="fa fa-th fa-3x text-colored"></i>
                        <h4>Get In Touch</h4>
                        <abbr title="Phone">P:</abbr> Tel: +44 (0)20 8417 7445<br>
                        E: <a href="mailto:k1557901@kingston.ac.uk" class="text-muted">k1557901@kingston.ac.uk</a>
                    </div>
                </div><!-- end col -->
                <div class="col-sm-4">
                    <div class="contact-detail-box">
                        <i class="fa fa-map-marker fa-3x text-colored"></i>
                        <h4>Our Location</h4>
                        <address>
                            Kingston University, River House<br>
                            53 To 57 High Street<br>
                            Kingston upon Thames<br>
                            Surrey KT1 1LQ<br>
                        </address>
                    </div>
                </div><!-- end col -->
                <div class="col-sm-4">
                    <div class="contact-detail-box">
                        <i class="fa fa-book fa-3x text-colored"></i>
                        <h4>24x7 Support</h4>
                        <p>Kingston University Web Developers</p>
                        <h4 class="text-muted">Tel: +44 (0)20 8417 7445</h4>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-map">

                        <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d143408.34724673786!2d-0.2083239655259434!3d51.37642650354755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x48760bbf05d559d9%3A0x2a64d629289510b1!2sKingston+University+London%2C+Penrhyn+Rd%2C+Kingston+upon+Thames+KT1+2EE!3m2!1d51.403113399999995!2d-0.303931!5e1!3m2!1sen!2suk!4v1492221847507" width="550" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>  </div>
                </div><!-- end col -->
                <!-- Contact form update form to connect to email site. action email sent to server. -->
                <div class="col-md-6">
                    <form role="form" name="ajax-form" id="ajax-form" action="http://kingstoncv.robertjamfoundation.org/contactUs.html" method="post" class="form-main">
                        <div class="form-group">
                            <label for="name2">Name</label>
                            <input class="form-control" id="name2" name="name" onblur="if(this.value == '') this.value='Name'" onfocus="if(this.value == 'Name') this.value=''" type="text" value="Name" style="display:list-item">
                            <div class="error" id="err-name" style="display: none;">Please enter name</div>
                        </div> <!-- /Form-name -->
                        <div class="form-group">
                            <label for="email2">Email</label>
                            <input class="form-control" id="email2" name="email" type="text" onfocus="if(this.value == 'E-mail') this.value='';" onblur="if(this.value == '') this.value='E-mail';" value="E-mail" style="display:list-item">
                            <div class="error" id="err-emailvld" style="display: none;">E-mail is not a valid format</div> 
                        </div> <!-- /Form-email -->
                        <div class="form-group">
                            <label for="message2">Message</label>
                            <textarea class="form-control" id="message2" name="message" rows="5" onblur="if(this.value == '') this.value='Message'" onfocus="if(this.value == 'Message') this.value=''" style="display:list-item">Message</textarea>
                            <div class="error" id="err-message" style="display: none;">Please enter message</div>
                        </div> <!-- /col -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-shadow btn-rounded w-md" id="send">Submit</button>
                        </div>
                    
                    </form> <!-- /form -->
                </div> <!-- end col -->
            </div> <!-- end row -->
            </div>
        </div>
    </body>
</html>
