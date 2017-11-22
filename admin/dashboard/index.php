
<?php
	ob_start();
	session_start();
	require_once '../../dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>

<html ng-app="app" class="ng-scope" lang="en"><head><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Nymbl.io Designer">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="bootstrap, template, admin, angular, jquery">
        <link rel="shortcut icon" href="../../img/nymbl-favicon.png">

        <title>Creator | Nymbl Instant Mockups</title>

        <!-- Main styles for this application -->
        <link href="../../css/style.css" rel="stylesheet">
        <link href="../../css/cropper.css" rel="stylesheet">
        <link href="../../css/simple-line-icons.css" rel="stylesheet">
        <link href="../../css/font-awesome.css" rel="stylesheet">
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

    <button type="button" id="do_modal_instruction" class="btn btn-primary" style="display:none;" data-target="#modal_instruction" data-toggle="modal">
      Launch the Cropper
    </button>

    <!-- Modal -->
    <div id="modal_instruction" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Instructions</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<p>1. Enter data in fields as requested<br>
                       2. For Product Images use PNG layers exported from a PSD mockup.<br>
                    </p>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
					<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="oninsruction()">OK</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
	</div>
    <button id="uploadconfirm_btn" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#uploadmodal" style="display:none;">
    	Launch large modal
	</button>
	<div id="uploadmodal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-primary modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Perspective Edit</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Is this product mockup at an angle (perspective adjustment required for uploaded design)?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="needupload()">No</button>
					<button type="button" class="btn btn-primary"  data-dismiss="modal" onclick="needwarp()">Yes</button>
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
    <script> var userid ="<?php echo $_SESSION['user'];?>";
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
    
    
 <!--     <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button" style="">☰</button>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" style="">☰</button>

        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" styl"color:#29363d" href="#">Dashboard</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" styl"color:#29363d" href="#">Users</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" styl"color:#29363d" href="#">Settings</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto" style="margin-right: 20px;">
            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="#"><i class="icon-list"></i></a>
            </li>
            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="img/avatars/6.jpg" class="img-avatar" alt="">
                    <span class="d-md-down-none">admin</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Logout</a>
                </div>
            </li>
        </ul>

    </header> -->
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
    <!-- Trigger the modal with a button -->
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
                    <p>Uploaded Successfully</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>

    <button id="modal_id1" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1" style="display:none;">Open Modal</button>

    <!-- Modal -->
    <div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog modal-primary modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you want to remove this mockup?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="deleteproductfromlist()" >OK</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
        <header id="theader" class="app-header navbar">
            <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button" style="">☰</button>
            <a class="navbar-brand" href="#"></a>
            

            <ul class="nav navbar-nav d-md-down-none">
                        <!--<button type="button" class="btn btn-primary" id="modal_open" data-target="#modal" data-toggle="modal">
                            Export Art Image
                        </button>-->
                <li class="nav-item px-3">
                    <a class="nav-link" style="color: #6bacc1;"  href="https://nymbl.io/designer/home.php"><i class="icon-direction" aria-hidden="true"></i> Go to Instant Mockups</a>
                </li>
            <!--    <li class="nav-item px-3">
                    <a  id="export-art-button" class="nav-link"  download="Product.jpg"  href="#"><i class="icon-action-redo" aria-hidden="true"></i> Export Print File</a>
                </li>
                <li class="nav-item px-3">
                    <a id="export-button" class="nav-link" download="Mockup.jpg"  href="#"><i class="icon-picture" aria-hidden="true"></i> Export Product Image</a>
                </li>
                <li class="nav-item px-3">
                    <a id="upload-button" class="nav-link" styl"color:#29363d" href="#"><i class="icon-cloud-upload" aria-hidden="true"></i> Upload</a>
                    <input class="file-upload" type="file" accept="image/*"/>
                </li> -->
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
                        <a class="dropdown-item" href="../../billing.php" style="vertical-align:middle;"><i class="icon-credit-card" style="vertical-align:middle;" ></i><span style="vertical-align:middle;font-size: 13px;"> Billing</span></a>
                        <a class="dropdown-item" onClick="resetpassword()" style="vertical-align:middle;"><i class="icon-lock" style="vertical-align:middle;"></i><span style="vertical-align:middle;font-size: 13px;"> Password</span></a>
                        <a class="dropdown-item" href="../../logout.php?logout" style="vertical-align:middle;"><i class="icon-arrow-right-circle " style="vertical-align:middle;"></i><span style="vertical-align: middle;font-size: 13px;"> Logout</span></a>
                    </div>
                </li>
            </ul>

        </header>
        
        <div class="app-body" style="margin-top: 30px;">
            <div class="container" style="">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="margin-left:auto;margin-right:auto;margin-bottom: 30px;">  
                        <div id="product_list" class="card" style="margin-bottom:0.5rem;margin-top: 0.5rem;">
                                <div class="card-header col-md-12 form-control-label" for="multiple-select" style="font-weight: bold;">Product Catalog</div>
                                <div class="">
                                    <select id="multiple-select" name="multiple-select" class="form-control" size="5" style="padding-top: 20px;">
                                    </select> 
                                </div>
                            </div>
                            
                            <button id="viewlistproduct_btn" onclick="viewlistproduct()" type="view" class="btn btn-sm btn-primary" style="float:left; margin-top: 10px;">View Selected Product</button>   
                            <button id="deleteproduct_btn" onclick="deleteproduct()" type="view" class="btn btn-sm btn-primary" style="margin-left:20px;margin-top: 10px;">Delete Selected</button>
                            
                        
                    </div>
                    <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="">  
                        <!-- image-preview-filename input [CUT FROM HERE]-->
                    
                        <div class="card" id="dashboard_panel" style="margin-bottom:3.5rem;">
                            <div class="card-header">
                                <strong>Add a Product to Catalog</strong>
                            </div>
                            <div class="card-block">
                                <form action="" method="post" class="ng-pristine ng-valid">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label style="vertical-align:middle;" for="pr-name">Product Name:</label>
                                                <a  id="question_mark" data-toggle="tooltip" title="This field presents the name of your product." class="icon-question" style="color:black;"></a>
                                                <input id="pr-name" name="pr-name" class="form-control" placeholder="Enter Name" type="text">
                                            </div>
                                            <div class="col-md-6">
                                                <label style="vertical-align:middle;" for="pr-code">Product Code / SKU:</label>
                                                <a  id="question_mark" data-toggle="tooltip" title="This field presents the code/SKU of your product." class="icon-question" style="color:black;"></a>
                                                <input id="pr-code" name="pr-code" class="form-control" placeholder="Enter Code" type="text">
                                            </div>
                                        </div>     
                                    </div>
                                    <?php
                                    if ( isset($_SESSION['adminid']) ) {
                                        
                                        ?>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label style="vertical-align:middle;" for="pr-cost">Product Cost:</label>
                                                    <a  id="question_mark" data-toggle="tooltip" title="This field presents the cost of your product." class="icon-question" style="color:black;"></a>
                                                    <input id="pr-cost" name="pr-cost" class="form-control" placeholder="Enter Cost" type="text">
                                                </div>
                                                <div class="col-md-6">
                                                    <label style="vertical-align:middle;" for="pr-price">Product Price:</label>
                                                    <a  id="question_mark" data-toggle="tooltip" title="This field presents the price of your product." class="icon-question" style="color:black;"></a>
                                                    <input id="pr-price" name="pr-price" class="form-control" placeholder="Enter Price" type="text">
                                                </div>
                                            </div>     
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    
                                    <div class="form-group" style="display:none;">
                                        <label for="mask-name">Mask Name</label>
                                        <input id="mask-name" name="mask-name" class="form-control" placeholder="Product Mask Name" type="text" disabled>
                                    </div>
                                    <div class="form-group" style="display:none;">
                                        <label for="shadow-name">Shadow / Extras Name</label>
                                        <input id="shadow-name" name="shadow-name" class="form-control" placeholder="Product Shadow / Extras Name" type="text" disabled>
                                    </div>
                                    <div class="form-group" style="display:none;">
                                        <label for="texture-dark-name">Texture Black Name</label>
                                        <input id="texture-dark-name" name="texture-dark-name" class="form-control" placeholder="Product Texture Black Name" type="text" disabled>
                                    </div>
                                    <div class="form-group" style="display:none;">
                                        <label for="texture-white-name">Texture White Name</label>
                                        <input id="texture-white-name" name="texture-white-name" class="form-control" placeholder="Product Texture White Name" type="text" disabled>
                                    </div>
                                    <div class="form-group" style="">
                                        
                                    </div>
                                    
                                    <div  class="form-group">
                                        <div class="checkbox">
                                            <label class="switch switch-xs switch-3d switch-primary" style="vertical-align: middle;">
                                                
                                                <input id="apparel_check" class="switch-input" name="apparel_check" value="apparel" type="checkbox">
                                                <span class="switch-label"></span>
                                                <span class="switch-handle"></span>
                                            </label>
                                            <label for="apparel_check" style="vertical-align: middle;">
                                               Product is DTG printed apparel (not all-over print)?
                                            </label>
                                            
                                            <a  id="question_mark" data-toggle="tooltip" title="Apparel Image pointer." class="icon-question" style="color:black;"></a>
                                        </div>
                                        
                                        <div id="width_height" style="margin-top:10px;" >
                                            <label for="" style="vertical-align:middle;">
                                                Print File Dimensions (Pixels) & DPI:
                                            </label>
                                            <a  id="question_mark" data-toggle="tooltip" title="These fields are real width and height of your mockup image." class="icon-question" style="color:black;"></a>
                                            <div class="row">
                                                
                                                <div class="col-md-4">
                                                    <label for="art-width">Width:</label>
                                                    <input id="art-width" name="art-width" class="form-control" placeholder="Enter Width" type="" value='0'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="art-height">Height:</label>
                                                    <input id="art-height" name="art-height" class="form-control" placeholder="Enter Height" type=""  value='0'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="art-height">DPI:</label>
                                                    <input id="art-dpi" name="art-dpi" class="form-control" placeholder="Enter DPI" type=""  value='0'>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-6">
                                            <label for="art-x">X:</label>
                                            <input id="art-x" name="art-x" class="form-control" placeholder="Enter X position" type="" value="0">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="art-y">Y:</label>
                                            <input id="art-y" name="art-y" class="form-control" placeholder="Enter Y position" type="" value="0">
                                        </div>
                                        </div>
                                        <span class="help-block">Please enter offset position of rectangle</span>
                                        <a  id="question_mark" data-toggle="tooltip" title="The X and Y is for the Art File." class="icon-question" style="color:black;vertical-align: middle;"></a>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="ccmonth">Art Blend Mode & Opacity:</label>
                                                <select class="form-control" id="blend_mode" style="padding-top: 5px;">
                                                    <option value="Multiply">Multiply</option>
                                                    <option value="Normal">Normal</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="opacity">Opacity:</label>
                                                <input id="opacity" name="opacity" style="width: 90%;display: table-cell;" class="form-control" value="100" type="">
                                                <span>%</span>
                                            </div>
                                        </div>
                                    </div>
                                     <?php
                                    if ( isset($_SESSION['adminid']) ) {
                                        
                                        ?>
                                        <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="ccmonth">Provider:</label>
                                                <select class="form-control" id="provider" style="padding-top: 5px;">
                                                    <option value="" disabled selected>Select</option>
                                                    <option value="Colorad Timberline">Colorad Timberline</option>
                                                    <option value="Dubow Textiles">Dubow Textiles</option>
                                                    <option value="Artsy Couture">Artsy Couture</option>
                                                    <option value="Printed Mint">Printed Mint</option>
                                                    <option value="MWW">MWW</option>
                                                    <option value="SSI">SSI</option>
                                                    <option value="Canvus Print Lab">Canvus Print Lab</option>
                                                    <option value="Printful">Printful</option>
                                                    <option value="Bayphoto">Bayphoto</option>
                                                    <option value="CGPrints">CGPrints</option>
                                                    <option value="Catalyst">Catalyst</option>
                                                    <option value="Jakprints">Jakprints</option>
                                                    <option value="Jondo Global">Jondo Global</option>
                                                    <option value="Jondo UK">Jondo UK</option>
                                                    <option value="Revilo Group">Revilo Group</option>
                                                    <option value="OneFlow">OneFlow</option>
                                                    <option value="DTG2Go">DTG2Go</option>
                                                    <option value="Two Fifteen">Two Fifteen</option>
                                                    <option value="The Dream Junction">The Dream Junction</option>
                                                    <option value="LatentLight">LatentLight</option>
                                                    <option value="Progressive Solutions">Progressive Solutions</option>
                                                    <option value="TShirt & Sons">TShirt & Sons</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4" style="text-align: left;" >
                                                <label for="ccmonth">Print Location:</label>
                                                <!-- <div class="radio">
                                                    <label for="radio1">
                                                        <input id="radio1" name="radios" value="Front" type="radio"> Front
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="radio2">
                                                        <input id="radio2" name="radios" value="Back" type="radio"> Back&nbsp;
                                                    </label>
                                                </div> -->
                                                <select class="form-control" id="print_location" style="padding-top: 5px;">
                                                    <option value="Front">Front</option>
                                                    <option value="Back">Back</option>
                                                    <option value="Front & Back">Front & Back</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ccmonth">Print Mode:</label>
                                                <select class="form-control" id="print_mode" style="padding-top: 5px;">
                                                    <option value="" disabled selected>Select</option>
                                                    <option value="Sublimation">Sublimation</option>
                                                    <option value="DTG with White">DTG with White</option>
                                                    <option value="DTG no White">DTG no White</option>
                                                    <option value="Embroidery">Embroidery</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                        <?php
                                    }
                                    ?>
                                    
                                    <div class="form-group">
                                        
                                            <div class="checkbox">
                                                <label class="switch switch-xs switch-3d switch-primary" style="vertical-align: middle;">              
                                                    <input id="checkbox1" class="switch-input" name="checkbox1" value="option1" type="checkbox">
                                                    <span class="switch-label"></span>
                                                    <span class="switch-handle"></span>
                                                </label>
                                                <label for="checkbox1" style="">
                                                    &nbsp;Add this product to mockup marketplace
                                                </label>
                                                <a  id="question_mark" data-toggle="tooltip" title="This mockup will be offered in our marketplace for others to use. You will receive a 35% commission on all sales derived from your mockup. Payments are sent via PayPal monthly. If checked, an email with additional info will be sent." class="icon-question" style="color:black;vertical-align: middle;"></a>
                                            </div>
                                      
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <div class="form-group">
                                    <label for="pr-mask">Product Image (Required):</label>
                                    <a id="question_mark" href="#" data-toggle="tooltip" title="The main image for product." class="icon-question" style="color:black;vertical-align: middle;"></a>
                                    <div class="input-group image-preview" style="margin-bottom: 10px;">
                                        <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                        <span class="input-group-btn">               
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;background:white;border-color: #ccc;color: #333;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                        </span>
                                        <div class="btn btn-sm btn-primary image-preview-input">
                                            <span class="glyphicon glyphicon-folder-open"></span>
                                            <span class="image-preview-input-title">Browse</span>
                                            <input id="product_file" type="file" accept="image/png, image/jpeg, image/gif" name="product_file"/> <!-- rename it -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mask-name">Mask Image (Required):</label>
                                    <a  id="question_mark" data-toggle="tooltip" title="This image is the mask image for rendering." class="icon-question" style="color:black;vertical-align: middle;"></a>
                                    <div class="input-group image-preview1" style="margin-bottom: 10px;">
                                        <input type="text" class="form-control image-preview-filename1" disabled="disabled">
                                        <span class="input-group-btn">               
                                            <button type="button" class="btn btn-primary image-preview-clear1" style="display:none;background:white;border-color: #ccc;color: #333;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                        </span>
                                        <div class="btn btn-sm btn-primary image-preview-input1">
                                            <span class="glyphicon glyphicon-folder-open"></span>
                                            <span class="image-preview-input-title1">Browse</span>
                                            <input id="mask_file" type="file" accept="image/png, image/jpeg, image/gif" name="mask_file"/> <!-- rename it -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mask-name">Shadow / Extras Image (Required):</label>
                                    <a id="question_mark" data-toggle="tooltip" title="This image is the shadow image for rendering." class="icon-question" style="color:black;vertical-align: middle;"></a>
                                    <div class="input-group image-preview2" style="margin-bottom: 10px;">
                                        <input type="text" class="form-control image-preview-filename2" disabled="disabled">
                                        <span class="input-group-btn">               
                                            <button type="button" class="btn btn-primary image-preview-clear2" style="display:none;background:white;border-color: #ccc;color: #333;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                        </span>
                                        <div class="btn btn-sm btn-primary image-preview-input2">
                                            <span class="glyphicon glyphicon-folder-open"></span>
                                            <span class="image-preview-input-title2">Browse</span>
                                            <input id="shadow_file" type="file" accept="image/png, image/jpeg, image/gif" name="shadow_file"/> <!-- rename it -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mask-name">Texture Black/Dark Image (Optional):</label>
                                    <a  id="question_mark" data-toggle="tooltip" title="This image is the Texture(Black) image for rendering." class="icon-question" style="color:black;vertical-align: middle;"></a>
                                    <div class="input-group image-preview3" style="margin-bottom: 10px;">
                                        <input type="text" class="form-control image-preview-filename3" disabled="disabled">
                                        <span class="input-group-btn">               
                                            <button type="button" class="btn btn-primary image-preview-clear3" style="display:none;background:white;border-color: #ccc;color: #333;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                        </span>
                                        <div class="btn btn-sm btn-primary image-preview-input3">
                                            <span class="glyphicon glyphicon-folder-open"></span>
                                            <span class="image-preview-input-title3">Browse</span>
                                            <input id="texture-dark_file" type="file" accept="image/png, image/jpeg, image/gif" name="texture-dark_file"/> <!-- rename it -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mask-name">Texture White/Light Image (Optional):</label>
                                    <a  id="question_mark" data-toggle="tooltip" title="This image is the Texture(white) image for rendering." class="icon-question" style="color:black;vertical-align: middle;"></a>
                                    <div class="input-group image-preview4" style="margin-bottom: 10px;">
                                        <input type="text" class="form-control image-preview-filename4" disabled="disabled">
                                        <span class="input-group-btn">               
                                            <button type="button" class="btn btn-primary image-preview-clear4" style="display:none;background:white;border-color: #ccc;color: #333;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                        </span>
                                        <div class="btn btn-sm btn-primary image-preview-input4">
                                            <span class="glyphicon glyphicon-folder-open"></span>
                                            <span class="image-preview-input-title4">Browse</span>
                                            <input id="texture-white_file" type="file" accept="image/png, image/jpeg, image/gif" name="texture-white_file"/> <!-- rename it -->
                                        </div>
                                    </div>
                                </div>
                                <button id="upload_btn" onclick="upload()" type="Upload" class="btn btn-sm btn-primary" style="float:left;">Upload</button>
                                <button id="viewproduct_btn" onclick="viewproduct()" type="view" class="btn btn-sm btn-primary" style="float:left; margin-left:20px;" disabled>View Product</button>
                                <div class="loader" style="float: left;margin-left: 30px;"></div>
                            </div>
                        </div> 
                    </div>
                    
                </div>
            </div>
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
    
<script src="../../js/libs/jquery.min.js"></script>
<script src="../../js/libs/tether.min.js"></script>
<script src="../../js/libs/bootstrap.min.js"></script>
<script src="../../js/libs/fabric.js"></script>
<!-- AngularJS -->
<script src="../js/libs/angular.min.js"></script>
<script src="../js/libs/cropper.js"></script>
<!-- AngularJS plugins -->
<script src="../js/libs/angular-ui-router.min.js"></script>
<script src="../js/libs/ocLazyLoad.min.js"></script>
<script src="../js/libs/angular-breadcrumb.min.js"></script>
<script src="../js/libs/loading-bar.min.js"></script>

<!-- AngularJS CoreUI App scripts -->

<script src="../js/app.js"></script>
<script src="../js/demo/dashboard.js"></script>
<script src="../../js/footerfunction.js"></script>
<!--<script src="../js/routes.js"></script>-->

<!--<script src="../js/demo/routes.js"></script>

<script src="../js/controllers.js"></script>
<script src="../js/directives.js"></script>-->
</body></html>