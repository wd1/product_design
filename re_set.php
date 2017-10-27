

    <!DOCTYPE html>
    <html ng-app="app" class="ng-scope" lang="en"><head><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="CoreUI - Free Bootstrap 4 Admin Template">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="bootstrap, template, admin, angular, jquery">
        <link rel="shortcut icon" href="https://nymbl.io/wp-content/uploads/2016/03/nymbl-favicon.png">

        <title>Change Password</title>

        <!-- Main styles for this application -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/cropper.css" rel="stylesheet">
        <!--<script async="" src="https://www.google-analytics.com/analytics.js"></script><script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-9510961-27', 'auto');
            ga('send', 'pageview');
        </script>-->
    
    </head>
    
     <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden   pace-done pace-done">
      <?php 
    		require_once 'dbconnect.php';

            // die($token);
            // if($_GET('token')) {
                // die("Wrong URL or Not Secure connection.");
            // } 
            
    		if(isset($_POST['new_pass']))
    		{
                $userid = $_POST['userid'];
                $new_pass=$_POST['new_pass'];
                $newpassword = hash('sha256', $new_pass);
                $update_pwd=mysql_query("UPDATE users set userPass='$newpassword' where userId='$userid'");
                $query = "UPDATE users set userPass='$newpassword' where userId='$userid'";
                // die ($query);
                header("refresh:3;url=index.php");
            } else {
                $userid = $_GET['id'];
                $token = $_GET['token'];
                $res=mysql_query("SELECT userId, userName, userPass, token FROM users WHERE userId='$userid'");
                $row=mysql_fetch_array($res);
                $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
                if( $count == 1 && $row['token']==$token ) {
                    
                } else {
                    die ("Wrong url or not secured parameter");
                }
            }
    	?>
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
                        <div vamiddle="" id="login_panel" class="col-md-8 m-x-auto pull-xs-none" style="margin-top: 160.65px;">
                            <div class="card-group">
                                <div class="card p-a-2">
                                    <div class="card-block">
                                        <input id="userid" name="userid" type="text" value="<?php echo $_GET['id'] ?>" style="display:none;">
                                        <h1>Set Your Password</h1>
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
                                        <p class="text-muted">Please entter your new password</p>
                                        <div class="input-group m-b-1">
                                            <span class="input-group-addon"><i class="icon-user"></i></span>
                                            <input id="password" name="new_pass" class="form-control" placeholder="New Password..." type="password" maxlength="15" value="" required />
                                        </div>
                                        <div class="">
                                            <div class="col-xs-6">
                                                <input type="submit" class="btn btn-primary" style="float:right;" value="Reset Password" name="re_password" />
                                            </div>
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
                <a class="" href="http://nymbl.io" style="padding:0px;">Nymbl Inc</a> &copy; 2017.
            </li>
            <li class="nav-item px-3" style="position: relative;min-width: 50px;margin: 0 !important;text-align: center;">
                <a class="nav-link" style="padding:0px;" onClick="viewTerms()"><i class="" aria-hidden="true"></i> Terms</a>
            </li>
            <li class="nav-item px-3" style="display:inline-block;position: relative;min-width: 50px;margin: 0 !important;text-align: center;">
                <a class="nav-link" style="padding:0px;" onClick="viewPrivacy()"><i class="" aria-hidden="true"></i> Privacy</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto" style="margin-right: 20px;">

            <li class="nav-item dropdown">
                <span class="float-right">Powered by <a href="http://nymbl.io">Nymbl</a>
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
    document.getElementById("appbody").style.height = (window.innerHeight- document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-5)+"px";
</script>
<script src="js/footerfunction.js"></script>
</body>
</html>