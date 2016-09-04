<?php
    include "registrationResources.php";    

    addToBasecamp('/projects/9793820/accesses.json', $_POST['mail']);
    registerPersonal($_POST['mail']);
    slackAdd($_POST['mail']);
    emails($_POST['mail'], "Welcome to SGA!", 'WelcomeMessage.txt');
?>
<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="stylesheet" href="/itracker/css/itracker.css">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="/itracker/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/itracker/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="/itracker/dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="/itracker/plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="/itracker/plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="/itracker/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="/itracker/plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="/itracker/plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="/itracker/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon -->
        <link rel="icon" href="/favicon.ico" type="image/x-icon"> 
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"> 

        <title>Join UMBC SGA</title>
        <!-- <script>document.write('<base href="' + document.location + '" />');</script> -->
        <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
        <!-- <link rel="stylesheet" href="css/style.css"> -->
    </head>
    <body class="hold-transition hold-transition login-page skin-yellow">
        <header class="main-header">
            <!-- Logo -->
            <a href="/itracker/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>i</b>Tr</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Join UMBC SGA</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="hidden-xs">
                            <a href="http://50.umbc.edu/"><small>UMBC50</small></a>
                        </li>
                        <li class="hidden-xs">
                            <a href="http://umbc.edu/go/umbc-azindex"><small>A-Z Index</small></a>
                        </li>
                        <li class="hidden-xs">
                            <a href="http://my.umbc.edu/"><small>myUMBC</small></a>
                        </li>
                        <li class="hidden-xs">
                            <a href="http://my.umbc.edu/events"><small>Events</small></a>
                        </li>
                        <li class="hidden-xs">
                            <a href="http://umbc.edu/go/directory"><small>Directory</small></a>
                        </li>
                        <li class="hidden-xs">
                            <a href="http://umbc.edu/go/maps"><small>Maps</small></a>
                        </li>
                        <li class="hidden-xs">
                            <a href="http://umbc.edu/search"><small>Search</small></a>
                        </li>
                  
                    </ul>
                </div>
            </nav>
        </header>
        <div class="login-box">
            <div class="login-box-body">
                <p class="login-box-msg">You have been signed up for SGA! </p>
                
            </div>
        </div>
        <footer class="">
            <div class="pull-right hidden-xs">
                <!-- <b>Version</b> 2.3.0 -->
                <div id="umbc-footer-logo">
                    <a href="http://umbc.edu" title="UMBC: An Honors University in Maryland">UMBC: An Honors University in Maryland</a>
                </div>
                <nav id="umbc-footer-nav">
                    <a href="http://about.umbc.edu/">About UMBC</a> | <a href="http://about.umbc.edu/visitors-guide/contact-us/">Contact Us</a> | <a href="http://umbc.edu/go/equal-opportunity">Equal Opportunity</a><br/>
                    Follow UMBC: <a href="https://www.facebook.com/umbcpage" id="umbc-footer-facebook" title="Follow on Facebook">Facebook</a>, <a href="http://twitter.com/umbc" id="umbc-footer-twitter" title="Follow on Twitter">Twitter</a>, <a href="http://umbc.edu/news" id="umbc-footer-news" title="UMBC News">UMBC News</a>
                </nav>
            </div>
            Created by <a href="https://www.linkedin.com/in/justinlchavez">Justin Chavez</a>, <a href="https://www.linkedin.com/in/matthew-landen-20a809100">Matthew Landen</a>, and <a href="https://www.linkedin.com/in/joshuamassey1">Joshua Massey</a>.<br/>
            Base Theme: AdminLTE by <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.
            <div id="umbc-footer-info">
                <strong>&copy; University of Maryland, Baltimore County</strong> • 1000 Hilltop Circle • Baltimore, MD 21250
            </div>
        </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="/itracker/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="/itracker/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="/itracker/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="/itracker/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="/itracker/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/itracker/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/itracker/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="/itracker/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="/itracker/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="/itracker/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="/itracker/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/itracker/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/itracker/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/itracker/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/itracker/dist/js/demo.js"></script>

    <!-- SOCIAL MEDIA -->
    <script>
        function FacebookShare() {
            var fb = "https://www.facebook.com/sharer/sharer.php?u=";
            window.open(fb.concat(document.URL));
        }

        function TwitterShare() {
            var tw = "https://twitter.com/home?status=Check%20this%20out%20on%20the%20UMBC%20SGA%20iTracker!%20";
            window.open(tw.concat(document.URL));
        }
    </script>
    </body>
</html>