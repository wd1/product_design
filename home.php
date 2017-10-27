<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
    $_COOKIE['userName'] = $userRow['userName'];
?>
<!DOCTYPE html>
<html lang="en" ng-app="app">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,Angular 2,Angular4,Angular 4,jQuery,CSS,HTML,RWD,Dashboard,React,React.js,Vue,Vue.js">
    <link rel="shortcut icon" href="https://nymbl.io/wp-content/uploads/2016/03/nymbl-favicon.png">

    <title>Nymbl Instant Mockups</title>

    <!-- Main styles for this application -->
    <link href="css/style.css" rel="stylesheet">
    
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/simple-line-icons.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/cropper.css" rel="stylesheet">
</head>

<!-- BODY options, add following classes to body to change options

	// Header options
	1. '.header-fixed'					- Fixed Header

	// Sidebar options
	1. '.sidebar-fixed'					- Fixed Sidebar
	2. '.sidebar-hidden'				- Hidden Sidebar
	3. '.sidebar-off-canvas'		- Off Canvas Sidebar
  4. '.sidebar-minimized'			- Minimized Sidebar (Only icons)
  5. '.sidebar-compact'			  - Compact Sidebar

	// Aside options
	1. '.aside-menu-fixed'			- Fixed Aside Menu
	2. '.aside-menu-hidden'			- Hidden Aside Menu
	3. '.aside-menu-off-canvas'	- Off Canvas Aside Menu

	// Footer options
	1. 'footer-fixed'						- Fixed footer

	-->

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden   pace-done pace-done">
    <button type="button" id="do_modal_crop" class="btn btn-primary" style="display:none;" data-target="#modal_crop" data-toggle="modal">
      Launch the Cropper
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modal_crop" role="dialog" aria-labelledby="modalLabel" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Adjust Image Crop <span id="crop_dimension" style="color: lightgrey;vertical-align: middle;"></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="loader1" id="crop_spinner" style="z-index: 1000;"></div>
            <div class="img-container" style="height:500px;">
              <img id="image" src="img/SampleUpload.jpg" alt="Picture" style="width:600px;">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="" onClick="getCropData(this)">Crop</button>
          </div>
        </div>
      </div>
    </div>

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
    <!-- User Interface -->
    <script> var userid =
    <?php echo $_SESSION['user'];?> ;
      </script>
    <script>
        var adminid = "";
        adminid = '<?php 
            if(isset($_SESSION["adminid"]))
                echo $_SESSION["adminid"];
            else
                echo "";
        ?>' ;
    </script>
    
    <button id="viewPrivacy_btn" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#largeModal" style="display:none;">
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
                    <span class="d-md-down-none"  style="vertical-align:middle;">&nbsp;<?php echo $userRow['userName'];?> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#" style="vertical-align:middle;"><i class="icon-credit-card" style="vertical-align:middle;" ></i><span style="vertical-align:middle;font-size: 13px;"> Billing</span></a>
                    <a class="dropdown-item" onClick="resetpassword()" style="vertical-align:middle;"><i class="icon-screen-tablet" style="vertical-align:middle;"></i><span style="vertical-align:middle;font-size: 13px;"> Password</span></a>
                    <a class="dropdown-item" href="logout.php?logout" style="vertical-align:middle;"><i class="fa fa-lock" style="vertical-align:middle;"></i><span style="vertical-align: middle;font-size: 13px;"> Logout</span></a>
                </div>
            </li>
        </ul>

    </header>

        <ui-view  style="margin-top: 55px;">      
        <div class="animated fadeIn">
            <div id="loader_parent" class="card-footer" ng-controller="trafficDemoCtrl" style="padding:10px 20px;">
                <div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="" style="width:100%;">
                                <select class="form-control input-sm" id="product_list" style="float:left; font-size: 12px;">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card col-md-4" style="margin-top:10px;padding-left:20px;padding-right:25px; padding-bottom:10px;">
                        <div class="row card-body" style="margin-left: -10px;">
                            <div class="col-sm-4" style="width:33.3333%;padding-left: 5px;padding-right: 5px;">
                                <button id="upload-button" type="button" class="btn btn-secondary btn-sm" style="margin-top:10px;width:100%;font-size: 12px;"><i class="icon-cloud-upload"></i>&nbsp; Upload</button>
                            </div>
                            
                            <div class="col-sm-4" style="width:33.3333%;padding-left: 5px;padding-right: 5px;">
                                <button id="export-button" type="button" class="btn btn-secondary btn-sm" style="margin-top:10px;width:100%;font-size: 12px;"><i class="icon-cloud-download"></i>&nbsp; Mockup</button>
                            </div>
                            
                            <div class="col-sm-4" style="width:33.3333%;padding-left: 5px;padding-right: 5px;">
                                <button id="export-art-button" type="button" class="btn btn-secondary btn-sm" style="margin-top:10px;width:100%;font-size: 12px;"><i class="icon-cloud-download"></i>&nbsp; Print File</button>
                            </div>
                            <input class="file-upload" type="file" accept="image/*"/>
                        </div>
                    </div>
                </div>
                <div style="clear: both;"></div>
                <div class="card-block" style="padding:20px;">
                    <div class="row" style="">
                        <div id="mockup-image" style="width: 100%;">
                        
                        </div>
                    </div>
                </div>
                
            </div>
            <!--/.card-->
        
            

        </div>
        </ui-view>

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
    
   

    <!-- Bootstrap and necessary plugins -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="js/libs/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="js/libs/fabric.js"></script>
    <script src="js/libs/scrawlCore.js"></script>
    <script src="js/libs/cropper.js"></script>
    <script src="js/libs/perspective.js"></script>        
    <!-- AngularJS -->

    <script src="js/main.js"></script>
    <script src="js/footerfunction.js"></script>
   
    <!-- AngularJS CoreUI App scripts -->

 <!--   <script src="js/app.js"></script>

      <script src="js/routes.js"></script>

    <script src="js/demo/routes.js"></script>

    <script src="js/controllers.js"></script>
    <script src="js/directives.js"></script> -->
    
</body>

</html>
