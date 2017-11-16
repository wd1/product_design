<?php
	ob_start();
	session_start();
	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}
	include_once 'dbconnect.php';

	$error = false;
	$nameError = '';
	$emailError = '';
	$passError = '';
	$confirmError = '';
	$name = '';
	$email = '';
	$pass = '';
	if ( isset($_POST['btn-signup']) ) {
		
		// clean user inputs to prevent sql injections
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		
		$confirm_pass = trim($_POST['confirm_pass']);
		$confirm_pass = strip_tags($confirm_pass);
		$confirm_pass = htmlspecialchars($confirm_pass);

		// basic name validation
		if (empty($name)) {
			$error = true;
			$nameError = "Please enter your full name.";
		} else if (strlen($name) < 3) {
			$error = true;
			$nameError = "Name must be at least 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			$error = true;
			$nameError = "Name can’t contain numbers or special characters";
		}
		
		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		} else {
			// check email exist or not
			$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		}
		// password validation
		if (empty($pass)){
			$error = true;
			$passError = "Please enter password.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Password must have atleast 6 characters.";
		}
		
		if ($confirm_pass != $pass) {
			$error = true;
			$confirmError = "Passwords do not match.";
		}

		// password encrypt using SHA256();
		$password = hash('sha256', $pass);
		
		// if there's no error, continue to signup
		if( !$error ) {
			$_SESSION['userName'] = $name;
	 		$_SESSION['UserEmail'] = $email;
	 		$_SESSION['userPass'] = $password;
			// header("refresh:1;url=billing.php");
			
			
			$query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
			$res = mysql_query($query);
				
			if ($res) {
				$errTyp = "success";
				$errMSG = "Successfully Registered! Redirecting...";
                
				
				$res_login=mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
				$row=mysql_fetch_array($res_login);
				$count = mysql_num_rows($res_login); // if uname/pass correct it returns must be 1 row
	
				if( $count == 1 ) {

					$_SESSION['user'] = $row['userId'];

					$_COOKIE['user'] = $row['userId'];

						//header("Location: home.php");
					// unset($name);
					// unset($email);
					// unset($pass);
					header("refresh:1;url=home.php");
				}
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}	
			
			
		
		}
		
		
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Nymbl Instant Mockups | Register</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/cropper.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/nymbl-favicon.png">
    <link href="css/simple-line-icons.css" rel="stylesheet">
</head>
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
	
		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" style="margin: auto;margin-top: 130px;">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6">
						<div class="card mx-4">
							<div class="card-body p-4">
								<h1>Register</h1>
								<?php
								if ( isset($errMSG) ) {
									
									?>
									<div class="form-group">
									<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
									<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
									</div>
									</div>
									<?php
								}
								?>
								<p class="text-muted">Create your account</p>
								<span class="text-danger"><?php echo $nameError; ?></span>
								<div class="input-group mb-3">
									<span class="input-group-addon"><i class="icon-user"></i>
									</span>
									<input name="name" class="form-control" placeholder="Enter Name" type="text" maxlength="50" value="<?php echo $name ?>">
								</div>
								
								
								<span class="text-danger"><?php echo $emailError; ?></span>
								<div class="input-group mb-3">
									<span class="input-group-addon">@</span>
									<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
								</div>
								
								<span class="text-danger"><?php echo $passError; ?></span>
								<div class="input-group mb-3">
									<span class="input-group-addon"><i class="icon-lock"></i>
									</span>
									<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
								</div>

								<span class="text-danger"><?php echo $confirmError; ?></span>
								<div class="input-group mb-3">
									<span class="input-group-addon"><i class="icon-lock"></i></span>
									<input class="form-control" name="confirm_pass" placeholder="Confirm password" type="password">
								</div>

								
								<button type="submit" class="btn btn-block btn-success" name="btn-signup">Create Account</button>
								<div class="form-group"> <br>
									<a href="index.php">Sign in Here...</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
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
        </ul>
		<ul class="nav navbar-nav ml-auto" style="margin-right: 20px;">

            <li class="nav-item dropdown">
                <span class="float-right">Powered by <a href="http://nymbl.io">Nymbl</a>
				</span>
            </li>
        </ul>
		
	</footer>
<script src="js/libs/jquery.min.js"></script>
<script src="js/libs/bootstrap.min.js"></script>

<script>
    document.getElementById("appbody").style.height = (window.innerHeight- document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight)+"px";
	document.getElementsByTagName("form")[0].style.marginTop = (document.getElementById("appbody").offsetHeight -document.getElementsByTagName("form")[0].offsetHeight)/2 + "px";  
</script>
<script src="js/footerfunction.js"></script>
</body>

</html>

<?php ob_end_flush(); ?>