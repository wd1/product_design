<?php
	if(!empty($_POST["forgot-password"])){
        require_once 'dbconnect.php';
        $_SESSION['mail'] = $_POST["user-email"];
        $mail1 = $_POST["user-email"];
        $sql = "SELECT userId, userName, userPass FROM users WHERE userEmail='$mail1'";
		// $conn = mysqli_connect("localhost", "root", "", "blog_samples");
		
		// $condition = "";
		// if(!empty($_POST["user-login-name"])) 
		// 	$condition = " member_name = '" . $_POST["user-login-name"] . "'";
		// if(!empty($_POST["user-email"])) {
		// 	if(!empty($condition)) {
		// 		$condition = " and ";
		// 	}
		// 	$condition = " member_email = '" . $_POST["user-email"] . "'";
		// }
		
		// if(!empty($condition)) {
		// 	$condition = " where " . $condition;
		// }

		// $sql = "Select * from members " . $condition;
		$result = mysqli_query($conn,$sql);
		$user = mysqli_num_rows($result);
        $userinfo;
		if($user>0) {
            $userinfo = mysqli_fetch_array($result);
            $userid = $userinfo['userId'];
			require_once("forget-password-recovery-mail.php");
		} else {
			$error_message = 'No User Found';
		}
	}
?>
<head><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="CoreUI - Free Bootstrap 4 Admin Template">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="bootstrap, template, admin, angular, jquery">
        <link rel="shortcut icon" href="https://nymbl.io/wp-content/uploads/2016/03/nymbl-favicon.png">

        <title>Nymbl Instant Mockups</title>

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
<script>
function validate_forgot() {
	if((document.getElementById("user-email").value == "")) {
		document.getElementById("validation-message").innerHTML = "Email is required!"
		return false;
	}
	return true
}
</script>
<div id="appbody" style="margin-top:55px;">
        <ui-view class="ng-scope"><div class="container-fluid ng-scope">
            <ui-view class="ng-scope"><div class="container ng-scope">
                <form name="frmForgot" id="frmForgot" method="post" onSubmit="return validate_forgot();">
                    <div class="row">
                        <div vamiddle="" id="login_panel" class="col-md-6 m-x-auto pull-xs-none" style="margin-top: 160.65px;">
                            <div class="card-group">
                                <div class="card p-a-2">
                                    <div class="card-block" style="text-align:center;">
                                        <h1>Reset password</h1>
                                        <?php if(!empty($success_message)) { ?>
                                        <div class="success_message"><?php echo $success_message; ?></div>
                                        <?php } ?>

                                        <div id="validation-message">
                                            <?php if(!empty($error_message)) { ?>
                                        <?php echo $error_message; ?>
                                        <?php } ?>
                                        <p class="text-muted">Please enter your email address and press button Sent to reset your password</p>
                                        <div class="input-group m-b-1">
                                            <span class="input-group-addon"><i class="icon-user"></i></span>
                                            <input type="text" name="user-email" id="user-email" class="form-control"></div>
                                        </div>
                                        <div class="">
                                            <div class="col-xs-6">
                                                <input type="submit" name="forgot-password" id="forgot-password" class="btn btn-primary p-x-2" value="Send" class="form-submit-button">
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

</body>