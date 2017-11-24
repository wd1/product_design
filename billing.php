 <?php

 session_start();
 include_once 'dbconnect.php';
 
 
 if(isset($_GET['token']['id']))
 { 
	$token=$_GET['token']['id'];
	$name_entered=$_GET['token']['card']['name'];
	$address_city=$_GET['token']['card']['address_city'];
	$address_line1=$_GET['token']['card']['address_line1'];
	$address_state=$_GET['token']['card']['address_state'];
	$address_zip=$_GET['token']['card']['address_zip'];
	//print_r($_GET['token']);exit;
	$name=$_SESSION['userName'];
	 $email= $_SESSION['UserEmail'];
	 $password=$_SESSION['userPass'];
	  include_once('stripe-php-3.14.2/init.php');
	  \Stripe\Stripe::setApiKey("sk_test_4PkVw92BxmBISwG6Busn3Nru");
	 $customer = \Stripe\Customer::create(array(
			  "email" => $email,
			  "source" => $token,
			));
		 $customerid=$customer->id; 
  //echo "insert into users (token) values ('$token')";exit;
  $res=mysql_query("insert into users (userName,userEmail,userPass,address,city,state,zip,token) values ('$name','$email','$password','$address_line1','$address_city','$address_state','$address_zip','$token')") or die(mysql_error());
  // header("refresh:3;url=/admin/dashboard/index.php");
  
    if($res)
    {		
      $password = hash('sha256', $password); // password hashing using SHA256
			$res_login=mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
 			$row=mysql_fetch_array($res_login);
 			$count = mysql_num_rows($res_login); // if uname/pass correct it returns must be 1 row
  
			if( $count == 1 ) {

				$_SESSION['user'] = $row['userId'];

        $_COOKIE['user'] = $row['userId'];
				
        $_SESSION['userName']='';
        $_SESSION['UserEmail']='';
        $_SESSION['userPass']='';
				header("Location: home.php");
 			}
		
		$subject = "Welcome to Nymbl Instant Mockups";
		
 		$message_email="
 		<table><tr><td>Hello $name_entered ~\n\n </td><tr>\n\n\n\n
		<tr><td>\n\n</td></tr>
		<tr><td> Thank you for signing up with Nymbl Instant Mockups. We hope you find the service valuable and would love to hear your feedback.<br>\n\n</td></tr>
		
		<tr><td>\n\n</td></tr>
		
		<tr><td>Please email us at <a mailto='support@nymbl.io'>support@nymbl.io</a> at any time with any issues, concerns or recommendations.</td></tr>
		<tr><td>\n\n</td></tr>
		<tr><td>\n\n</td></tr>
		<tr><td>\n\n</td></tr>
		
		<tr><td> Thanks again,<tr><td>\n\n</td></tr>
		
		<tr><td>\n\n</td></tr>
		<tr><td>\n\n</td></tr>
		 <tr><td>The Nymbl Instant Mockups Team</td></tr></table>";
		
		$headers = "From: nymbl.io <noreply@nymbl.io>" . "\r\n" .
		
		"To: $email " . "\r\n" .
		
		"Content-type: text/html; charset=utf-8" . "\r\n" .
		
		'X-Mailer: PHP/' . phpversion();
		
		// send email
 		// mail($email, $subject, $message_email, $headers);
 		
 	  echo json_encode(array('done' =>1));  exit;
   }
   else{
    echo json_encode(array('done' =>0));  exit;
   }
   
 }
 ?>
<!DOCTYPE html>
<script>
    if(location.protocol != "https:") {
        location.href = 'https:' + window.location.href.substring(window.location.protocol.length);
    }
</script>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <script src="js/libs/jquery.min.js" type="text/javascript"></script>
		<script src="https://js.stripe.com/v3/"></script>
      <script src="js/index.js?c=1233211"></script>
    <title>Billing | Nymbl Instant Mockup</title>

   
    
    
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
      
	<link href="css/base.css?c=34422" rel="stylesheet">
    
    <link href="css/example2.css" rel="stylesheet">
    
     <link href="css/style.css" rel="stylesheet">

    <link href="css/cropper.css" rel="stylesheet">
    
    <link rel="shortcut icon" href="https://nymbl.io/wp-content/uploads/2016/03/nymbl-favicon.png">

    <link href="css/simple-line-icons.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
	<!--<script src="js/libs/jquery.min.js"></script>
     <script src="js/libs/bootstrap.min.js"></script>
    
    
    
 
 

	<script src="js/footerfunction.js"></script>-->

  
	
 
 
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden   pace-done pace-done">

	 
	 
  <button id="viewTerms_btn" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#largeModal" style="display:none;">
		Launch large modal
	</button>
	<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary" role="document" style="width: 60%;">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Plan Overview & Signup</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Introductory Offer: $10/mo + ¢10/mockup download (print file included). Cancel at any time. 100% satisfaction guaranteed or your money back with no questions asked.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
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
<div class="globalContent">
    <main>
		<section class="container-lg">

		 <div class="cell example example2">
          <form id="stripfrm">
          <h1 style="margin-bottom: 0.5rem;font-weight: 500;line-height: 1.1;color: inherit;font-size: 1.5rem; font-family: Open Sans;text-align: center;">Billing Method</h1>
          <p class="text-muted" style="font-family: Open Sans;text-align: center;">Enter a credit card payment method for future payments.</p>
           <div class="row">
            <div class="field">
              <input id="example2-name" class="input empty" type="text" placeholder="Name" required>
              <label for="example2-name">Name</label>
              <div class="baseline"></div>
            </div>
          </div>
          
          <div class="row">
            <div class="field">
              <input id="example2-address" class="input empty" type="text" placeholder="185 Berry St" required>
              <label for="example2-address">Address</label>
              <div class="baseline"></div>
            </div>
          </div>
         
          <div class="row">
            <div class="field half-width">
              <input id="example2-city" class="input empty" type="text" placeholder="San Francisco" required>
              <label for="example2-city">City</label>
              <div class="baseline"></div>
            </div>
            <div class="field quarter-width">
              <input id="example2-state" class="input empty" type="text" placeholder="CA" required>
              <label for="example2-state">State</label>
              <div class="baseline"></div>
            </div>
            <div class="field quarter-width">
              <input id="example2-postal-code" class="input empty" type="text" placeholder="94107" required>
              <label for="example2-postal-code">ZIP</label>
              <div class="baseline"></div>
            </div>
          </div>
          <div class="row">
            <div class="field">
              <div id="example2-card-number" class="input empty"></div>
              <label for="example2-card-number">Card Number</label>
              <div class="baseline"></div>
            </div>
          </div>
          <div class="row">
            <div class="field half-width">
              <div id="example2-card-expiry" class="input empty"></div>
              <label for="example2-card-expiry">Expiration</label>
              <div class="baseline"></div>
            </div>
            <div class="field half-width">
              <div id="example2-card-cvc" class="input empty"></div>
              <label for="example2-card-cvc">CVC</label>
              <div class="baseline"></div>
            </div>
          </div>
          <input type="submit" value="Add Billing Method">
            <input id="example2-StriptToken" name="example2-StriptToken" type="hidden"   >
          <div class="error" role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
              <path class="base" fill="#000" d="M8.5,17 C3.80557963,17 0,13.1944204 0,8.5 C0,3.80557963 3.80557963,0 8.5,0 C13.1944204,0 17,3.80557963 17,8.5 C17,13.1944204 13.1944204,17 8.5,17 Z"></path>
              <path class="glyph" fill="#FFF" d="M8.5,7.29791847 L6.12604076,4.92395924 C5.79409512,4.59201359 5.25590488,4.59201359 4.92395924,4.92395924 C4.59201359,5.25590488 4.59201359,5.79409512 4.92395924,6.12604076 L7.29791847,8.5 L4.92395924,10.8739592 C4.59201359,11.2059049 4.59201359,11.7440951 4.92395924,12.0760408 C5.25590488,12.4079864 5.79409512,12.4079864 6.12604076,12.0760408 L8.5,9.70208153 L10.8739592,12.0760408 C11.2059049,12.4079864 11.7440951,12.4079864 12.0760408,12.0760408 C12.4079864,11.7440951 12.4079864,11.2059049 12.0760408,10.8739592 L9.70208153,8.5 L12.0760408,6.12604076 C12.4079864,5.79409512 12.4079864,5.25590488 12.0760408,4.92395924 C11.7440951,4.59201359 11.2059049,4.59201359 10.8739592,4.92395924 L8.5,7.29791847 L8.5,7.29791847 Z"></path>
            </svg>
            <span class="message"></span></div>
         </form>  
         <div class="success">
          <div class="icon">
            <svg width="84px" height="84px" viewBox="0 0 84 84" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <circle class="border" cx="42" cy="42" r="40" stroke-linecap="round" stroke-width="4" stroke="#000" fill="none"></circle>
              <path class="checkmark" stroke-linecap="round" stroke-linejoin="round" d="M23.375 42.5488281 36.8840688 56.0578969 64.891932 28.0500338" stroke-width="4" stroke="#000" fill="none"></path>
            </svg>
          </div>
          <h3 class="title">Billing Method Added Successfully</h3>
          <p class="message"><!--<span>Thanks for trying Stripe Elements. No money was charged, but we generated a token: </span>--><span class="token"> </span></p>
          
        </div>
       
      </div>
      
		 </section>
		
</main></div>


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

<script src="js/example2.js"></script>
<script>
$("#viewTerms_btn").click();
</script>
</body>



</html>



<?php ob_end_flush(); ?>