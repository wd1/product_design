<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
        $protocol = 'http';
        if(isset($_SERVER['HTTPS'])) {
            if (strtoupper($_SERVER['HTTPS']) == 'ON'){
                $protocol = 'https';
            }
        }
		// header("Location: https://".$_SERVER['HTTP_HOST']."/designer/home.php", true, 301);
        header("Location: home.php", true, 301);
		exit;
	}
	
	$error = false;
	// die($_POST['btn-login']);
    $email = '';
    $emailError = '';
    $passError = '';
	if( isset($_POST['btn-login']) ) {	
		
		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs
		
		if(empty($email)){
			$error = true;
			$emailError = "Please enter your email address.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
		
		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}
		
		// if there's no error, continue to login
		if (!$error) {
			
			$password = hash('sha256', $pass); // password hashing using SHA256
		
			$res=mysqli_query($conn,"SELECT userId, userName, userPass, userType FROM users WHERE userEmail='$email'");
			$row=mysqli_fetch_array($res);
			$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
			
			if( $count == 1 && $row['userPass']==$password ) {
				$_SESSION['user'] = $row['userId'];
                $_SESSION['userEmail'] = $email;
                $_COOKIE['user'] = $row['userId'];
                $_SESSION['adminid'] = $row['userType'];
				// header("Location: //nymbl.io/designer/home.php");
                $protocol = 'http';
                if(isset($_SERVER['HTTPS'])) {
                    if (strtoupper($_SERVER['HTTPS']) == 'ON'){
                        $protocol = 'https';
                    }
                }
                $str = "Location: $protocol://".$_SERVER['HTTP_HOST']."/designer/home.php";
                // header("Location: https://".$_SERVER['HTTP_HOST']."/designer/home.php", true, 301);
                header("Location: home.php", true, 301);
                exit;
			} else {
				$errMSG = "Incorrect Credentials, Try again...";
			}
				
		}
		
	}
?>
<script>
    // if(location.protocol != "https:") {
    //     location.href = 'https:' + window.location.href.substring(window.location.protocol.length);
    // }
</script>
<html ng-app="app" class="ng-scope" lang="en">
<head>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-75789736-3"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-75789736-3');
        </script>
<style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
        
        <link rel="shortcut icon" href="img/nymbl-favicon.png">

        <title>Nymbl Instant Mockups</title>
        <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
        <!-- Main styles for this application -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/cropper.css" rel="stylesheet">
        <link href="css/simple-line-icons.css" rel="stylesheet">
        <!--<script async="" src="https://www.google-analytics.com/analytics.js"></script><script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-9510961-27', 'auto');
            ga('send', 'pageview');
        </script>-->
        
    </head>
<script> 
    var isFirefox = typeof InstallTrigger !== 'undefined';
    var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));
    var isIE = /*@cc_on!@*/false || !!document.documentMode;
    var isEdge = !isIE && !!window.StyleMedia;
    var isChrome = !!window.chrome && !!window.chrome.webstore;
    console.log(isSafari +"," + isChrome);
    if(isSafari)
        alert("We’re currently optimized for Chrome & Firefox. Please retry with either browser.");
    </script>
    <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden   pace-done pace-done">
        <button id="viewPrivacy_btn" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#largeModal1" style="display:none;">
		Launch large modal
	</button>
	<div id="largeModal1" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Privacy</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Privacy Privacy Privacy Privacy Privacy Privacy Privacy</p>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
	</div>
	<button id="viewTerms_btn" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#largeModal" style="display:none;">
		Launch large modal
	</button>
	<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Terms</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Terms Terms Terms Terms Terms</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
       <header id="theader" class="app-header navbar">
            <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button" style="">☰</button>
            <a class="navbar-brand" href="#"></a>
       </header>
        <!-- User Interface -->
    <div id="appbody" style="margin-top:55px;">
        <ui-view class="ng-scope"><div class="container-fluid ng-scope">
            <ui-view class="ng-scope"><div class="container ng-scope">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                    <div class="row">
                        <div vamiddle="" id="login_panel" class="col-md-8 m-x-auto pull-xs-none" style="">
                            <div class="card-group">
                                <div class="card p-a-2 col-md-6">
                                    <div class="card-block">
                                        <h1>Login</h1>
                                        <?php
                                        if ( isset($errMSG) ) {
                                            
                                            ?>
                                            <div class="form-group">
                                            <div class="alert alert-danger">
                                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                                            </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <p class="text-muted">Sign In to your account</p>
                                        <div class="input-group m-b-1">
                                            <span class="input-group-addon"><i class="icon-user"></i></span>
                                            <input id="username"  name="email" class="form-control" placeholder="Your Email" type="email" value="<?php echo $email; ?>" maxlength="40">
                                        </div>
                                        <span class="text-danger"><?php echo $emailError; ?></span>
                                        <div class="input-group m-b-2">
                                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                                            <input id="password" name="pass" class="form-control" placeholder="Your Password" type="password" maxlength="15">
                                        </div>
                                        <span class="text-danger"><?php echo $passError; ?></span>
                                        <div class="">
                                            <div class="col-xs-6">
                                                <button type="submit" name="btn-login" class="btn btn-primary p-x-2">Login</button>
                                                <a href="forget.php" class="p-x-0" style="margin-left:20px;">Forgot password?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-inverse card-primary p-y-3 col-md-5" style="flex: none;">
                                    <div class="card-block text-xs-center">
                                        <div>
                                            <h2>Nymbl Instant Mockups</h2>
                                            <p>Administration</p>
                                            <hr>
                                            
                                            <div class="form-group">
                                                <span>Don't have an account?</span><br>
                                                <a href="register.php" style="color:white;font-size: 20px;font-weight: bold;">Sign Up Here...</a>
                                            </div>
                                            <!--<button type="button" class="btn btn-primary active m-t-1">Register Now!</button>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div></ui-view>
            </div>
   
<!-- /.conainer-fluid --></ui-view>
 </div>
<footer id="bfooter" class="app-footer" style="background:white;">
    <ul class="nav navbar-nav d-md-down-none" style="flex-direction: row;align-items: center; float:left;">
                <!--<button type="button" class="btn btn-primary" id="modal_open" data-target="#modal" data-toggle="modal">
                    Export Art Image
                </button>-->
        <li class="nav-item px-3" style="position: relative;min-width: 50px;margin: 0 !important;text-align: center;">
            <a class="" href="http://nymbl.io" style="padding:0px;">Nymbl Inc</a> &copy; 2017
        </li>
        <li class="nav-item px-3" style="position: relative;min-width: 50px;margin: 0 !important;text-align: center;">
            <a class="nav-link" style="padding:0px;" onClick="viewTerms()"><i class="" aria-hidden="true"></i> Terms</a>
        </li>
        <li class="nav-item px-3" style="display:inline-block;position: relative;min-width: 50px;margin: 0 !important;text-align: center;">
            <a class="nav-link" style="padding:0px;" onClick="viewPrivacy()"><i class="" aria-hidden="true"></i> Privacy</a>
        </li>
        <li class="nav-item px-3"style="position: relative;min-width: 50px;margin: 0 !important;text-align: center;">
            <a class="nav-link" href='mailto:support@nymbl.io?subject=Nymbl Instant Mockup Help' style="padding:0px;color:#263238;"><i class="icon-support" aria-hidden="true"  style="vertical-align:middle;"></i><span style="vertical-align:middle;"> Help</span></a>
        </li>
    </ul>
    <ul class="nav navbar-nav ml-auto" style="margin-right: 20px;">

        <li class="nav-item dropdown">
            <span class="float-right"><a href="mailto:instantmockups@nymbl.io?subject=Feedback">Feedback</a>
            </span>
        </li>
    </ul>
    
</footer>
<!-- App Scripts and Plugins -->
    
<script src="js/libs/jquery.min.js"></script>
<script src="js/libs/tether.min.js"></script>
<script src="js/libs/bootstrap.min.js"></script>
<!-- <script src="../../js/libs/jquery.min.js"></script>
<script src="../../js/libs/fabric.js"></script>-->
<!-- AngularJS -->
<script src="js/libs/angular.min.js"></script>
<script src="js/libs/cropper.js"></script>
<!-- AngularJS plugins -->
<script src="js/libs/angular-ui-router.min.js"></script>
<script src="js/libs/ocLazyLoad.min.js"></script>
<script src="js/libs/angular-breadcrumb.min.js"></script>
<script src="js/libs/loading-bar.min.js"></script>

<!-- AngularJS CoreUI App scripts -->

<script src="js/app.js"></script>
<script>
    document.getElementById("appbody").style.height = (window.innerHeight- document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight)+"px";
    document.getElementsByTagName("form")[0].style.marginTop = (document.getElementById("appbody").offsetHeight -document.getElementsByTagName("form")[0].offsetHeight)/2 + "px";
    $("body").on("contextmenu",function(e){
        return false;
    });
</script>
<script src="js/footerfunction.js"></script>
<!--<script src="../js/routes.js"></script>-->

<!--<script src="../js/demo/routes.js"></script>

<script src="../js/controllers.js"></script>
<script src="../js/directives.js"></script>-->
</body></html>
