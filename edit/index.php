<?php
	ob_start();
	session_start();
	require_once '../dbconnect.php';
	
	// if session is not set this will redirect to login page
	// if( !isset($_SESSION['user']) ) {
	// 	header("Location: ../index.php");
	// 	exit;
	// }
	// // select loggedin users detail
	
    if(!isset($_POST['warp'])) {
        header("Location: ../admin/dashboard/");
        exit;
    }
    $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
    // $userRow['userName'] = "AAA";
    // $_COOKIE['userName'] = $userRow['userName'];
    if(isset($_FILES['product_file'])) {
        // echo $_FILES['product_file']['tmp_name'];
        if(file_exists("../img/temp/temp.png")) unlink("../img/temp/temp.png");
        if(move_uploaded_file($_FILES['product_file']['tmp_name'],"../img/temp/temp.png")) {
            // echo $_FILES['product_file']['name']. " OK";
        } else {
            // echo $_FILES['product_file']['name']. " No Product File";
            $errormsg = 'No Product File';
            $error = true;
        }
        if(file_exists("../img/temp/temp-mask.png")) unlink("../img/temp/temp-mask.png");
        if(isset($_FILES['mask_file'])) {
            if(move_uploaded_file($_FILES['mask_file']['tmp_name'],"../img/temp/temp-mask.png")) {
                // echo $_FILES['mask_file']['name']. " OK";
            } else {
                // echo $_FILES['mask_file']['name']. " No Mask File";
                $errormsg = 'No Mask File';
                $error = true;
            }
        }
        if(file_exists("../img/temp/temp-shadow.png")) unlink("../img/temp/temp-shadow.png");
        if(isset($_FILES['shadow_file'])) {
            // echo $_POST['shadow_name']. " OK";
            if(move_uploaded_file($_FILES['shadow_file']['tmp_name'],"../img/temp/temp-shadow.png")) {
                // echo $_FILES['shadow_file']['name']. " OK";
            } else {
                // echo $_FILES['shadow_file']['name']. " No Shadow File";
                $errormsg = 'No Shadow File';
                $error = true;
            }
        }
        if(file_exists("../img/temp/temp-texture-dark.png")) unlink("../img/temp/temp-texture-dark.png");
        if(isset($_FILES['texture-dark_file'])) {
            if(move_uploaded_file($_FILES['texture-dark_file']['tmp_name'],"../img/temp/temp-texture-dark.png")) {
                // echo $_FILES['texture-dark_file']['name']. " OK";
            } else {
                // echo $_FILES['texture-dark_file']['name']. " No Texture-dark File";
                $errormsg = 'No Texture Dark File';
                $error = true;
            }
        }
        if(file_exists("../img/temp/temp-texture-white.png")) unlink("../img/temp/temp-texture-white.png");
        if(isset($_FILES['texture-white_file'])) {
            if(move_uploaded_file($_FILES['texture-white_file']['tmp_name'],"../img/temp/temp-texture-white.png")) {
                // echo $_FILES['texture-white_file']['name']. " OK";
            } else {
                // echo $_FILES['texture-white_file']['name']. " No Texture-white File";
                $errormsg = 'No Texture White File';
                $error = true;
            }
        }
        $productname = $_POST['pr-name'];
        $width = $_POST['art-width'];
        $height = $_POST['art-height'];
        if($width == '')
            $width = 0;
        if($height == '')
            $height = 0;
        $x = $_POST['art-x'];
        $y = $_POST['art-y'];
        $blend_mode = $_POST['blend_mode'];
        $opacity = $_POST['opacity'];
        $user = $_POST['userid'];
        $admin = $_POST['adminid'];
        $mockup_list = $_POST['mockup_list'];
    }
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

    <title>Image Warp | Nymbl Creator Tool</title>

    <!-- Main styles for this application -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/cropper.css" rel="stylesheet">
    <link href="../css/font-awesome.css" rel="stylesheet">
    <link href="../css/simple-line-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/drag_points.css" />
    <script src="../js/libs/jquery.min.js"></script>
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

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden   pace-done pace-done" data-defaultimage="">
<script>
/*
$productname = $_POST['product_name'];
        $width = $_POST['width'];
        $height = $_POST['height'];
        if($width == '')
            $width = 0;
        if($height == '')
            $height = 0;
        $x = $_POST['x'];
        $y = $_POST['y'];
        $blend_mode = $_POST['blend_mode'];
        $opacity = $_POST['opacity'];
        $user = $_POST['userid'];
        $admin = $_POST['adminid'];
        $mockup_list = $_POST['mockup_list']; 
*/
var product_name = "<?php echo $productname ?>";
var art_width = "<?php echo $width ?>";
var art_height = "<?php echo $height ?>";
var upload_x = "<?php echo $x ?>";
var upload_y = "<?php echo $y ?>";
var blend_mode = "<?php echo $blend_mode ?>";
var user = "<?php echo $user ?>";
var opacity = "<?php echo $opacity ?>";
var admin = "<?php echo $admin ?>";
var mockup_list = "<?php echo $mockup_list ?>";

</script>
    
    <!-- Modal -->
    <button id="modal_id_instruction" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_instruction" style="display:none;">Open Modal</button>

    <!-- Modal -->
    <div id="myModal_instruction" class="modal fade" role="dialog">
        <div class="modal-dialog modal-primary modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Scale Upload</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Please select any hi-res JPG to upload, scale and position over the product. Position the image over the product with extra space for the bleed.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="instruction_ok()">OK</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
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
            <div class="img-container" style="">
              <img id="image" src="../img/SampleUpload.jpg" alt="Picture" style="width:600px;">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="" onClick="getCropData1(this)">Crop</button>
          </div>
        </div>
      </div>
    </div>
    <div id="my_instruction" class="modal fade" role="dialog">
        <div class="modal-dialog modal-primary" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Instruction (Perspective)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>To make perspective, please follow these instructions</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="">OK</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>

    <button type="button" id="do_modal_crop" class="btn btn-primary" style="display:none;" data-target="#modal_crop" data-toggle="modal">
      Launch the cropper
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modal_crop" role="dialog" aria-labelledby="modalLabel" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Adjust Image Crop</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="loader1" id="crop_spinner"></div>
            <div class="img-container" style="">
              <img id="image" src="../img/SampleUpload.jpg" alt="Picture" style="width:600px;">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" onClick="getCropData(this)">Crop</button>
          </div>
        </div>
      </div>
    </div>

    <button id="onload_modal" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#onload_modal_content" style="display:none;">Open Modal</button>

    <!-- Modal -->
    <div id="onload_modal_content" class="modal fade" role="dialog">
        <div class="modal-dialog modal-primary modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Instructions</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Drag each corner circle on the following image to the outside edges of the product image.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="">OK</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>

    <button id="modal_id" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="display:none;">Open Modal</button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-primary modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Product Mockup Saved</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="confirm_ok()">OK</button>
                </div>
            </div>
            <!-- /.modal-content -->
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
            <a class="dropdown-item" href="#"><i class="icon-magic-wand" aria-hidden="true"></i> Image Warp</a>
        </div>
        <a class="navbar-brand" href="#"></a>
        

        <ul class="nav navbar-nav d-md-down-none">
                    <!--<button type="button" class="btn btn-primary" id="modal_open" data-target="#modal" data-toggle="modal">
                        Export Art Image
                    </button>-->
            <li class="nav-item px-3">
                <a class="nav-link" href="#"><i class="icon-magic-wand" aria-hidden="true"></i> Image Warp</a>
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
                    <a class="dropdown-item" href="#" style="vertical-align:middle;"><i class="icon-settings" style="vertical-align:middle;" ></i><span style="vertical-align:middle;font-size: 13px;"> Settings</span></a>
                    <a class="dropdown-item" href="#" style="vertical-align:middle;"><i class="icon-credit-card" style="vertical-align:middle;" ></i><span style="vertical-align:middle;font-size: 13px;"> Billing</span></a>
                    <a class="dropdown-item" onClick="resetpassword()" style="vertical-align:middle;"><i class="icon-lock" style="vertical-align:middle;"></i><span style="vertical-align:middle;font-size: 13px;"> Password</span></a>
                    <a class="dropdown-item" href="../logout.php?logout" style="vertical-align:middle;"><i class="icon-arrow-right-circle " style="vertical-align:middle;"></i><span style="vertical-align: middle;font-size: 13px;"> Logout</span></a>
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
                            <div class="" style="width: 100%;">
                                <input class="form-control" id="name" placeholder="Enter your name" type="text" value="<?php echo $productname?>">
                            </div>
                        </div>
                    </div>
                    <div class="card col-md-4" style="margin-top:10px;padding-left:20px;padding-right:25px; padding-bottom:10px;">
                        <div class="row card-body" style="margin-left: -10px;">
                            <div class="col-sm-4" style="width:33.3333%;padding-left: 5px;padding-right: 5px;">
                                <button id="perspective-button" type="button" class="btn btn-secondary btn-sm" style="margin-top:10px;width:100%;font-size: 12px;"><i class="icon-cloud-upload"></i>&nbsp; Perspective</button>
                            </div>
                            <div class="col-sm-4" style="width:33.3333%;padding-left: 5px;padding-right: 5px;">
                                <button id="instruction-button" type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#my_instruction" style="margin-top:10px;width:100%;font-size: 12px;" onClick=""><i class="icon-info"></i>&nbsp; Instructions</button>
                            </div>                          
                            <div class="col-sm-4" style="width:33.3333%;padding-left: 5px;padding-right: 5px;">
                                <button id="save-button" type="button" class="btn btn-secondary btn-sm" style="margin-top:10px;width:100%;font-size: 12px;" onClick="save_result()"><i class="icon-arrow-right"></i><span>&nbsp; Next Step</span></button>
                            </div>
                            <input class="file-upload" type="file" accept="image/*"/>
                        </div>
                    </div>
                </div>
                <div style="clear: both;"></div>
                <div class="card-block" style="padding:20px;">
                    <div class="row" style="">
                        <img id="swan" src="../img/SampleUpload.jpg" class="demo114"  style="position: fixed;visibility: hidden;"/>
                        <div id="mockup-image" style="width: 100%;text-align:center;">
                        <!--    <canvas id="mycanvas" width="600" height="600"></canvas> -->
                        
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
    <script src="../js/libs/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

    <script src="../js/libs/fabric.js"></script>
    <script src="../js/libs/cropper.js"></script>
    <!-- AngularJS -->

    <!--  <script src="../js/libs/PerspectiveTransform.min.js"></script> -->
    <!-- <script src="../js/lib/require-2.1.4.js" data-main="../js/edit_main"></script> -->
    <script src="../js/libs/scrawlCore.js"></script>
    <script src="../js/libs/perspective.js"></script>   
    <script src="../js/edit.js"></script>
    <script src="../js/footerfunction.js"></script>
    <!-- AngularJS CoreUI App scripts -->

 <!--   <script src="js/app.js"></script>

      <script src="js/routes.js"></script>

    <script src="js/demo/routes.js"></script>

    <script src="js/controllers.js"></script>
    <script src="js/directives.js"></script> -->
    
</body>

</html>
