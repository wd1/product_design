

    <!DOCTYPE html>
    <html ng-app="app" class="ng-scope" lang="en"><head><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="CoreUI - Free Bootstrap 4 Admin Template">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="bootstrap, template, admin, angular, jquery">
        <link rel="shortcut icon" href="img/nymbl-favicon.png">

        <title>Change Password</title>

        <!-- Main styles for this application -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/cropper.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
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
    
     <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden   pace-done pace-done">
      <?php 
    		require_once 'dbconnect.php';
            if($_GET['userid']) {
                $_SESSION['user'] = $_GET['userid'];
                
            }
            $passError = '';
            $emailError = '';


            // select loggedin users detail
            $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
            $userRow=mysql_fetch_array($res);

    		if(isset($_POST['re_password']))
    		{
                $old_pass=$_POST['old_pass'];
                $new_pass=$_POST['new_pass'];
                $re_pass=$_POST['re_pass'];
                $user = $_POST['userid'];
                $_SESSION['user'] = $user;
                $chg_pwd=mysql_query("SELECT userId, userName, userPass FROM users WHERE userId='$user'");
                
                $chg_pwd1=mysql_fetch_array($chg_pwd);
                $data_pwd=$chg_pwd1['userPass'];
                $password = hash('sha256', $old_pass);
                
                if($data_pwd==$password){
                    if($new_pass==$re_pass){
                        $newpassword = hash('sha256', $new_pass);
                        $update_pwd=mysql_query("UPDATE users set userPass='$newpassword' where userId='$user'");
                        $query = "UPDATE users set userPass='$newpassword' where userId='$user'";
                        echo "<script>alert('Update Sucessfully'); window.location='index.php'</script>";
                        // echo "<script>alert(`".$query."`); </script>";
                    }
                    else{
                        echo "<script>alert('Your new and Retype Password is not match'); </script>";
                    }
                }
                else
                {
                    echo "<script>alert('Old Password is incorrect'); </script>";
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
        <button class="navbar-toggler d-lg-none mr-auto" type="button" style="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">☰</button>
        <div class="dropdown-menu dropdown-menu-left">
            <a class="dropdown-item" href="admin/dashboard/"><i class="icon-magic-wand" aria-hidden="true"></i> Creator Tool</a>
        </div>
        <a class="navbar-brand" href="#"></a>
        

        <ul class="nav navbar-nav d-md-down-none">
                    <!--<button type="button" class="btn btn-primary" id="modal_open" data-target="#modal" data-toggle="modal">
                        Export Art Image
                    </button>-->
            <li class="nav-item px-3">
                <a class="nav-link" href="admin/dashboard/"><i class="icon-magic-wand" aria-hidden="true"></i> Creator Tool</a>
            </li>
       <!--     <li class="nav-item px-3">
                <a  class="nav-link" href="#"><i class="icon-cloud-download" aria-hidden="true"></i> Print File</a>
            </li>
            <li class="nav-item px-3">
                <a  class="nav-link" href="#"><i class="icon-cloud-download" aria-hidden="true"></i> Product Image</a>
            </li>  -->
           
        </ul>
        <ul class="nav navbar-nav ml-auto" style="margin-right: 20px;">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-user" aria-hidden="true" style="vertical-align:middle;"></i>

                    <!-- <img src="img/avatars/user.png" class="img-avatar" alt=""> -->
                    <span class="d-md-down-none"  style="vertical-align:middle;"><?php echo $userRow['userName'];?> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#" style="vertical-align:middle;"><i class="icon-settings" style="vertical-align:middle;" ></i><span style="vertical-align:middle;font-size: 13px;"> Settings</span></a>
                    <a class="dropdown-item" href="billing.php" style="vertical-align:middle;"><i class="icon-credit-card" style="vertical-align:middle;" ></i><span style="vertical-align:middle;font-size: 13px;"> Billing</span></a>
                    <a class="dropdown-item" onClick="resetpassword()" style="vertical-align:middle;"><i class="icon-lock" style="vertical-align:middle;"></i><span style="vertical-align:middle;font-size: 13px;"> Password</span></a>
                    <a class="dropdown-item" href="logout.php?logout" style="vertical-align:middle;"><i class="icon-arrow-right-circle " style="vertical-align:middle;"></i><span style="vertical-align: middle;font-size: 13px;"> Logout</span></a>
                </div>
            </li>
        </ul>

    </header>
        <!-- User Interface -->
    <div id="appbody" style="margin-top:55px;">
        <ui-view class="ng-scope"><div class="container-fluid ng-scope">
            <ui-view class="ng-scope"><div class="container ng-scope">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                    <div class="row">
                        <div vamiddle="" id="login_panel" class="col-md-8 m-x-auto pull-xs-none" style="">
                            <div class="card-group">
                                <div class="card p-a-2">
                                    <div class="card-block">
                                        <input id="userid" name="userid" type="text" value="<?php echo $_SESSION['user'] ?>" style="display:none;">
                                        <h1>Change Password</h1>
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
                                        <p class="text-muted">Change your password</p>
                                        <div class="input-group m-b-2">
                                            <span class="input-group-addon"><i class="icon-user"></i></span>
                                            <input id="password" name="old_pass" class="form-control" placeholder="Old Password..." type="password" maxlength="15" value="" required />
                                        </div>
                                        <span class="text-danger"><?php echo $emailError; ?></span>
                                        <div class="input-group m-b-2">
                                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                                            <input type="password" class="form-control" name="new_pass" placeholder="New Password..." type="password" maxlength="15" value=""  required />
                                        </div>
                                        <div class="input-group m-b-2">
                                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                                            <input type="password" class="form-control" name="re_pass" placeholder="Retype New Password..." type="password" maxlength="15" value="" required />
                                        </div>
                                        <span class="text-danger"><?php echo $passError; ?></span>
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
    document.getElementById("appbody").style.height = (window.innerHeight- document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight)+"px";
    document.getElementsByTagName("form")[0].style.marginTop = (document.getElementById("appbody").offsetHeight -document.getElementsByTagName("form")[0].offsetHeight)/2 + "px";
    $("body").on("contextmenu",function(e){
        return false;
    });
</script>
<script src="js/footerfunction.js"></script>
</body>
</html>