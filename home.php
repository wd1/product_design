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
	$res=mysqli_query($conn,"SELECT * FROM users WHERE userId=".$_SESSION['user']);
    
	$userRow=mysqli_fetch_array($res);
    $_COOKIE['userName'] = $userRow['userName'];
    $token = $userRow['token'];
    $downloads1 = $userRow['downloads_1'];
    $downloads2 = $userRow['downloads_2'];
?>
<script>
    // if(location.protocol != "https:") {
    //     location.href = 'https:' + window.location.href.substring(window.location.protocol.length);
    // }
</script>
<!DOCTYPE html>
<html lang="en" ng-app="app">

<head>
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <link rel="shortcut icon" href="img/nymbl-favicon.png">

    <title>Nymbl Instant Mockups</title>

    <!-- Main styles for this application -->
    <link href="css/style.css" rel="stylesheet">
    
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/simple-line-icons.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/cropper.css" rel="stylesheet">
    <script src="js/libs/jquery.min.js"></script>
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
    <button type="button" id="filesize_modal_btn" class="btn btn-primary" style="display:none;" data-target="#filesize_modal" data-toggle="modal">
      
    </button>

    <!-- Modal -->
    <div id="filesize_modal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg modal-primary" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">FileSize Limitation</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<p>
                    Max file size for uploads is 15MB. Please adjust file and try again.
                    </p>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="">OK</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
	</div>
    <button type="button" id="download_modal_btn" class="btn btn-primary" style="display:none;" data-target="#download_modal" data-toggle="modal">
      
    </button>

    <!-- Modal -->
    <div id="download_modal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg modal-primary" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Free-Tier Warning</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<p>
                    You have 1 more mockup remaining after this for the Free-Tier monthly offering. Click ‘Signup Now’ below to add a billing method to continue using the service at special introductory rates. Or, click ‘Signup Later’ and you will be reminded again.
                    </p>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="">Signup Later</button>
                    <a href="billing.php" type="" class="btn btn-primary">Signup Now</a>
                    
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
	</div>
    <button type="button" id="download_error_modal_btn" class="btn btn-primary" style="display:none;" data-target="#download_error_modal" data-toggle="modal">
      
    </button>

    <!-- Modal -->
    <div id="download_error_modal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg modal-primary" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Free-Tier Limit Reached</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<p>
                    You’ve reached the free-tier limit of 7 mockups/mo. Please add a billing method for continued usage at our introductory rates. Click ‘Sign Up Now’ below to review plan details and add card info. Thanks!
                    </p>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
					<a href="billing.php" class="btn btn-primary">Add Billing Method</a>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
	</div>
    <button type="button" id="do_modal_instruction" class="btn btn-primary" style="display:none;" data-target="#modal_instruction" data-toggle="modal">
      Launch the Cropper
    </button>

    <!-- Modal -->
    <div id="modal_instruction" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg modal-primary" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Instructions</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<p>1. Click ‘Upload’, select a hi-res JPG or PNG design.<br>
                        2. Crop / Position the uploaded design.<br>
                        3. Click outside mockup area.<br>
                        4. Click ‘Mockup’ to download mockup. Click ‘Print File’ to download print file.<br>
                        5. For additional help, visit our <a href="https://nymbl.io/designer/start/faq/" target="_blank">FAQ</a> page.
                    </p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="oninsruction()">Don't Show Again</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" >OK</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
	</div>
    <button type="button" id="do_modal_crop" class="btn btn-primary" style="display:none;" data-target="#modal_crop" data-toggle="modal">
      Launch the Cropper
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modal_crop" role="dialog" onmousedown="modal_mousedown()" onmouseup="modal_mouseup()" aria-labelledby="modalLabel" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Adjust Image Crop <span id="crop_dimension" style="color: lightgrey;vertical-align: middle;"></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="loader1" id="crop_spinner" style="z-index: 1000;"></div>
            <div class="img-container" style="">
              <img id="image" src="" alt="Picture" style="width:600px;">
            </div>
          </div>
          <div class="modal-footer">
            <input id="crop_label" type="button" class="btn btn-default" style="background-color: lightgrey;" data-dismiss="" value="Crop (Click Once)" onmousedown="crop_mousedown()" onmouseup="crop_mouseup()" onClick="getCropData()">
          </div>
        </div>
      </div>
    </div>

    <button id="viewPrivacy_btn" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#largeModal1" style="display:none;">
		Launch large modal
	</button>
	<div id="largeModal1" class="modal fade" role="dialog" >
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
                    <div>
					<h4 class="modal-title">PRIVACY POLICY</h4>
                    <h7>Last Updated: Nov 26, ’16</h7>
                    </div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<p>PRIVACY POLICY</p>
<p>1 – WHAT DO WE DO WITH YOUR INFORMATION?</p>
<p>When you create an account or place an order within our app, we collect the personal and business information you give us such as your name, business name, address, phone number and email address.<br><br>
When you browse our site, we also automatically receive your computer’s internet protocol (IP) address in order to provide us with information that helps us learn about your browser and operating system.<br><br>
Email marketing (if applicable): With your permission, we may send you emails about our store, new products and other updates.</p>
<p>2 – CONSENT</p>
<p>How do you get my consent?<br><br>
When you provide us with personal information to create an account and/or complete a transaction, verify your credit card, place an order, arrange for a delivery or return a purchase, we imply that you consent to our collecting it and using it for that specific reason only.<br><br>
If we ask for your personal information for a secondary reason, like marketing, we will either ask you directly for your expressed consent, or provide you with an opportunity to say no.<br><br>
How do I withdraw my consent?<br><br>
If after you opt-in, you change your mind, you may withdraw your consent for us to contact you, for the continued collection, use or disclosure of your information, at anytime, by contacting us at gene@onebellacasa.com or mailing us at:<br><br>
Nymbl Inc. 4620 W Moncrieff Pl Denver, CO 80212</p>
<p>3 – DISCLOSURE</p>
<p>We may disclose your personal information if we are required by law to do so or if you violate our Terms of Service.</p>
<p>4 – HOSTING</p>
<p>Our site is hosted by a third-party at PCIcomplianthosting.com. They provide us with the online platform that allows us to sell our products and services to you.<br><br>
Your data is stored through our host’s data storage, databases and the general infrastructure. They store your data on a secure server behind a firewall.<br><br>
Payment:<br><br>
Credit Cards: All credit card payments are processed via Stripe and is encrypted through the Payment Card Industry Data Security Standard (PCI-DSS). Your purchase transaction data is stored only as long as is necessary to complete your purchase transaction. After that is complete, your purchase transaction information is deleted.<br><br>
All direct payment gateways adhere to the standards set by PCI-DSS as managed by the PCI Security Standards Council, which is a joint effort of brands like Visa, MasterCard, American Express and Discover.<br><br>
PCI-DSS requirements help ensure the secure handling of credit card information by our store and its service providers.<br><br>
ACH / Bank Payment: ACH payments are handled by Plaid, whose Privacy Policy can be viewed here. As a Nymbl Inc. user, you acknowledge and agree that your information will be treated in accordance with Plaids Privacy Policy. You are put on notice of, and agree to, the policy prior to engaging with our product in a manner that uses Plaid and ACH payments. As a user of Nymbl Inc. you provide express authorization to grant Plaid the right, power and authority to access and transmit the your User Data as reasonably necessary for Plaid to provide the Service to you.</p>
<p>5 – THIRD-PARTY SERVICES</p>
<p>In general, the third-party providers used by us will only collect, use and disclose your information to the extent necessary to allow them to perform the services they provide to us.<br><br>
However, certain third-party service providers, such as payment gateways and other payment transaction processors, have their own privacy policies in respect to the information we are required to provide to them for your purchase-related transactions.<br><br>
For these providers, we recommend that you read their privacy policies so you can understand the manner in which your personal information will be handled by these providers.<br><br>
In particular, remember that certain providers may be located in or have facilities that are located a different jurisdiction than either you or us. So if you elect to proceed with a transaction that involves the services of a third-party service provider, then your information may become subject to the laws of the jurisdiction(s) in which that service provider or its facilities are located.<br><br>
As an example, if you are located in Canada and your transaction is processed by a payment gateway located in the United States, then your personal information used in completing that transaction may be subject to disclosure under United States legislation, including the Patriot Act.<br><br>
Once you leave our store’s website or are redirected to a third-party website or application, you are no longer governed by this Privacy Policy or our website’s Terms of Service.<br><br>
Links<br><br>
When you click on links on our store, they may direct you away from our site. We are not responsible for the privacy practices of other sites and encourage you to read their privacy statements.</p>
<p>6 – SECURITY</p>
<p>To protect your personal information, we take reasonable precautions and follow industry best practices to make sure it is not inappropriately lost, misused, accessed, disclosed, altered or destroyed.<br><br>
If you provide us with your credit card information, the information is encrypted using secure socket layer technology (SSL) and stored with a AES-256 encryption. Although no method of transmission over the Internet or electronic storage is 100% secure, we follow all PCI-DSS requirements and implement additional generally accepted industry standards.</p>
<p>7 – COOKIES</p>
<p>We use cookies to track users on our website. For details on specific cookies please contact info@nextmerch.com.</p>
<p>8 – AGE OF CONSENT</p>
<p>By using this site, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.</p>
<p>9 – CHANGES TO THIS PRIVACY POLICY</p>
<p>We reserve the right to modify this privacy policy at any time, so please review it frequently. Changes and clarifications will take effect immediately upon their posting on the website. If we make material changes to this policy, we will notify you here that it has been updated, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we use and/or disclose it.<br><br>
If our store is acquired or merged with another company, your information may be transferred to the new owners so that we may continue to sell products to you.</p>
<p>QUESTIONS AND CONTACT INFORMATION</p>
<p>If you would like to: access, correct, amend or delete any personal information we have about you, register a complaint, or simply want more information contact our Privacy Compliance Officer at info@nextmerch.com or by mail at</p>
<p>Nymbl Inc. [Re: Privacy Compliance Officer] 4620 W Moncrieff Pl Denver, CO 80212
</p>
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
                    <div>
					<h4 class="modal-title">TERMS OF SERVICE</h4>
                    <h7>Last Updated: Oct 29, ’17</h7>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>OVERVIEW</p>
<p>This website, Nymbl Instant Mockups, is operated by Nymbl Inc.. Throughout the site, the terms “we”, “us” and “our” refer to Nymbl Inc.. Nymbl Inc. offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.<br><br>
By visiting our site and/ or purchasing something from us, you engage in our “Service” and agree to be bound by the following terms and conditions (“Terms of Service”, “Terms”), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.<br><br>
Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service.<br><br>
Any new features or tools which are added to the current store shall also be subject to the Terms of Service. You can review the most current version of the Terms of Service at any time on this page. We reserve the right to update, change or replace any part of these Terms of Service by posting updates and/or changes to our website. It is your responsibility to check this page periodically for changes. Your continued use of or access to the website following the posting of any changes constitutes acceptance of those changes.<br><br>
Our store is hosted PCIcomplianthosting.com. They provide us with the online e-commerce platform that allows us to sell our products and services to you.</p>
<p>1 – NYMBL INSTANT MOCKUPS APP TERMS</p>
<p>By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site. You may not use our products for any illegal or unauthorized purpose nor may you, in the use of the Service, violate any laws in your jurisdiction (including but not limited to copyright laws). You must not transmit any worms or viruses or any code of a destructive nature. A breach or violation of any of the Terms will result in an immediate termination of your Services.</p>
<p>2 – GENERAL CONDITIONS</p>
<p>We reserve the right to refuse service to anyone for any reason at any time. You understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks. You agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Service, use of the Service, or access to the Service or any contact on the website through which the service is provided, without express written permission by us. The headings used in this agreement are included for convenience only and will not limit or otherwise affect these Terms. If opting to use ACH / Bank Payments as a billing method at any time, you provide express authorization to grant Plaid the right, power and authority to access and transmit the your User Data as reasonably necessary for Plaid to provide the Service to you. </p>
<p>3 – ACCURACY, COMPLETENESS AND TIMELINESS OF INFORMATION</p>
<p>We are not responsible if information made available on this site is not accurate, complete or current. The material on this site is provided for general information only and should not be relied upon or used as the sole basis for making decisions without consulting primary, more accurate, more complete or more timely sources of information. Any reliance on the material on this site is at your own risk. This site may contain certain historical information. Historical information, necessarily, is not current and is provided for your reference only. We reserve the right to modify the contents of this site at any time, but we have no obligation to update any information on our site. You agree that it is your responsibility to monitor changes to our site.</p>
<p>4 – MODIFICATIONS TO THE SERVICE AND PRICES</p>
<p>Prices for our products are subject to change without notice. We reserve the right at any time to modify or discontinue the Service (or any part or content thereof) without notice at any time. We shall not be liable to you or to any third-party for any modification, price change, suspension or discontinuance of the Service.</p>
<p>5 – PRODUCTS OR SERVICES (if applicable)</p>
<p>Certain products or services may be available exclusively online through the website. These products or services may have limited quantities and are subject to return or exchange only according to our Return Policy. We have made every effort to display as accurately as possible the colors and images of our products that appear at the store. We cannot guarantee that your computer monitor’s display of any color will be accurate. We reserve the right, but are not obligated, to limit the sales of our products or Services to any person, geographic region or jurisdiction. We may exercise this right on a case-by-case basis. We reserve the right to limit the quantities of any products or services that we offer. All descriptions of products or product pricing are subject to change at anytime without notice, at the sole discretion of us. We reserve the right to discontinue any product at any time. Any offer for any product or service made on this site is void where prohibited. We do not warrant that the quality of any products, services, information, or other material purchased or obtained by you will meet your expectations, or that any errors in the Service will be corrected.</p>
<p>6 – ACCURACY OF BILLING AND ACCOUNT INFORMATION</p>
<p>We reserve the right to refuse any order you place with us. We may, in our sole discretion, limit or cancel quantities purchased per person, per household or per order. These restrictions may include orders placed by or under the same customer account, the same credit card, and/or orders that use the same billing and/or shipping address. In the event that we make a change to or cancel an order, we may attempt to notify you by contacting the e-mail and/or billing address/phone number provided at the time the order was made. We reserve the right to limit or prohibit orders that, in our sole judgment, appear to be placed by dealers, resellers or distributors.<br><br>
You agree to provide current, complete and accurate purchase and account information for all purchases made at our store. You agree to promptly update your account and other information, including your email address and credit card numbers and expiration dates, so that we can complete your transactions and contact you as needed.<br><br>
For more detail, please review our Returns Policy.</p>
<p>7 – OPTIONAL TOOLS</p>
<p>We may provide you with access to third-party tools over which we neither monitor nor have any control nor input. You acknowledge and agree that we provide access to such tools ”as is” and “as available” without any warranties, representations or conditions of any kind and without any endorsement. We shall have no liability whatsoever arising from or relating to your use of optional third-party tools. Any use by you of optional tools offered through the site is entirely at your own risk and discretion and you should ensure that you are familiar with and approve of the terms on which tools are provided by the relevant third-party provider(s). We may also, in the future, offer new services and/or features through the website (including, the release of new tools and resources). Such new features and/or services shall also be subject to these Terms of Service.</p>
<p>8 – THIRD-PARTY LINKS</p>
<p>Certain content, products and services available via our Service may include materials from third-parties. Third-party links on this site may direct you to third-party websites that are not affiliated with us. We are not responsible for examining or evaluating the content or accuracy and we do not warrant and will not have any liability or responsibility for any third-party materials or websites, or for any other materials, products, or services of third-parties. We are not liable for any harm or damages related to the purchase or use of goods, services, resources, content, or any other transactions made in connection with any third-party websites. Please review carefully the third-party’s policies and practices and make sure you understand them before you engage in any transaction. Complaints, claims, concerns, or questions regarding third-party products should be directed to the third-party.</p>
<p>9 – USER COMMENTS, FEEDBACK AND OTHER SUBMISSIONS</p>
<p>If, at our request, you send certain specific submissions (for example contest entries) or without a request from us you send creative ideas, suggestions, proposals, plans, or other materials, whether online, by email, by postal mail, or otherwise (collectively, ‘comments’), you agree that we may, at any time, without restriction, edit, copy, publish, distribute, translate and otherwise use in any medium any comments that you forward to us. We are and shall be under no obligation (1) to maintain any comments in confidence; (2) to pay compensation for any comments; or (3) to respond to any comments. We may, but have no obligation to, monitor, edit or remove content that we determine in our sole discretion are unlawful, offensive, threatening, libelous, defamatory, pornographic, obscene or otherwise objectionable or violates any party’s intellectual property or these Terms of Service. You agree that your comments will not violate any right of any third-party, including copyright, trademark, privacy, personality or other personal or proprietary right. You further agree that your comments will not contain libelous or otherwise unlawful, abusive or obscene material, or contain any computer virus or other malware that could in any way affect the operation of the Service or any related website. You may not use a false e-mail address, pretend to be someone other than yourself, or otherwise mislead us or third-parties as to the origin of any comments. You are solely responsible for any comments you make and their accuracy. We take no responsibility and assume no liability for any comments posted by you or any third-party.</p>
<p>10 – PERSONAL INFORMATION</p>
<p>Your submission of personal information through the store is governed by our Privacy Policy. To view our Privacy Policy.</p>
<p>11 – ERRORS, INACCURACIES AND OMISSIONS</p>
<p>Occasionally there may be information on our site or in the Service that contains typographical errors, inaccuracies or omissions that may relate to product descriptions, pricing, promotions, offers, product shipping charges, transit times and availability. We reserve the right to correct any errors, inaccuracies or omissions, and to change or update information or cancel orders if any information in the Service or on any related website is inaccurate at any time without prior notice (including after you have submitted your order). We undertake no obligation to update, amend or clarify information in the Service or on any related website, including without limitation, pricing information, except as required by law. No specified update or refresh date applied in the Service or on any related website, should be taken to indicate that all information in the Service or on any related website has been modified or updated.</p>
<p>12 – PROHIBITED USES</p>
<p>In addition to other prohibitions as set forth in the Terms of Service, you are prohibited from using the site or its content: (a) for any unlawful purpose; (b) to solicit others to perform or participate in any unlawful acts; (c) to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; (d) to infringe upon or violate our intellectual property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability; (f) to submit false or misleading information; (g) to upload or transmit viruses or any other type of malicious code that will or may be used in any way that will affect the functionality or operation of the Service or of any related website, other websites, or the Internet; (h) to collect or track the personal information of others; (i) to spam, phish, pharm, pretext, spider, crawl, or scrape; (j) for any obscene or immoral purpose; or (k) to interfere with or circumvent the security features of the Service or any related website, other websites, or the Internet. We reserve the right to terminate your use of the Service or any related website for violating any of the prohibited uses.</p>
<p>13 – DISCLAIMER OF WARRANTIES; LIMITATION OF LIABILITY</p>
<p>We do not guarantee, represent or warrant that your use of our service will be uninterrupted, timely, secure or error-free. We do not warrant that the results that may be obtained from the use of the service will be accurate or reliable. You agree that from time to time we may remove the service for indefinite periods of time or cancel the service at any time, without notice to you. You expressly agree that your use of, or inability to use, the service is at your sole risk. The service and all products and services delivered to you through the service are (except as expressly stated by us) provided ‘as is’ and ‘as available’ for your use, without any representation, warranties or conditions of any kind, either express or implied, including all implied warranties or conditions of merchantability, merchantable quality, fitness for a particular purpose, durability, title, and non-infringement. In no case shall Nymbl, our directors, officers, employees, affiliates, agents, contractors, interns, suppliers, service providers or licensors be liable for any injury, loss, claim, or any direct, indirect, incidental, punitive, special, or consequential damages of any kind, including, without limitation lost profits, lost revenue, lost savings, loss of data, replacement costs, or any similar damages, whether based in contract, tort (including negligence), strict liability or otherwise, arising from your use of any of the service or any products procured using the service, or for any other claim related in any way to your use of the service or any product, including, but not limited to, any errors or omissions in any content, or any loss or damage of any kind incurred as a result of the use of the service or any content (or product) posted, transmitted, or otherwise made available via the service, even if advised of their possibility. Because some states or jurisdictions do not allow the exclusion or the limitation of liability for consequential or incidental damages, in such states or jurisdictions, our liability shall be limited to the maximum extent permitted by law.</p>
<p>14 – INDEMNIFICATION</p>
<p>You agree to indemnify, defend and hold harmless Nymbl and our parent, subsidiaries, affiliates, partners, officers, directors, agents, contractors, licensors, service providers, subcontractors, suppliers, interns and employees, harmless from any claim or demand, including reasonable attorneys’ fees, made by any third-party due to or arising out of your breach of these Terms of Service or the documents they incorporate by reference, or your violation of any law or the rights of a third-party.</p>
<p>15 – SEVERABILITY</p>
<p>In the event that any provision of these Terms of Service is determined to be unlawful, void or unenforceable, such provision shall nonetheless be enforceable to the fullest extent permitted by applicable law, and the unenforceable portion shall be deemed to be severed from these Terms of Service, such determination shall not affect the validity and enforceability of any other remaining provisions.</p>
<p>16 – TERMINATION</p>
<p>The obligations and liabilities of the parties incurred prior to the termination date shall survive the termination of this agreement for all purposes. These Terms of Service are effective unless and until terminated by either you or us. You may terminate these Terms of Service at any time by notifying us that you no longer wish to use our Services, or when you cease using our site. If in our sole judgment you fail, or we suspect that you have failed, to comply with any term or provision of these Terms of Service, we also may terminate this agreement at any time without notice and you will remain liable for all amounts due up to and including the date of termination; and/or accordingly may deny you access to our Services (or any part thereof).</p>
<p>17 – ENTIRE AGREEMENT</p>
<p>The failure of us to exercise or enforce any right or provision of these Terms of Service shall not constitute a waiver of such right or provision. These Terms of Service and any policies or operating rules posted by us on this site or in respect to The Service constitutes the entire agreement and understanding between you and us and govern your use of the Service, superseding any prior or contemporaneous agreements, communications and proposals, whether oral or written, between you and us (including, but not limited to, any prior versions of the Terms of Service). Any ambiguities in the interpretation of these Terms of Service shall not be construed against the drafting party.</p>
<p>18 – GOVERNING LAW</p>
<p>These Terms of Service and any separate agreements whereby we provide you Services shall be governed by and construed in accordance with the laws of Denver, Colorado USA.</p>
<p>19 – CHANGES TO TERMS OF SERVICE</p>
<p>You can review the most current version of the Terms of Service at any time at this page. We reserve the right, at our sole discretion, to update, change or replace any part of these Terms of Service by posting updates and changes to our website. It is your responsibility to check our website periodically for changes. Your continued use of or access to our website or the Service following the posting of any changes to these Terms of Service constitutes acceptance of those changes.</p>
<p>20 – CONTACT INFORMATION</p>
<p>Questions about the Terms of Service should be sent to us at info@nymbl.io.</p>


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
    <script> 
        var userid =
         <?php echo $_SESSION['user'];?> ;
        var showflag = 
         '<?php echo $userRow['showflag'];?>' ;
        var adminid = "";
        adminid = '<?php 
            if(isset($_SESSION["adminid"]))
                echo $_SESSION["adminid"];
            else
                echo "";
        ?>' ;
        var token = '<?php echo  $token;?>';
        var downloads1 = '<?php echo  $downloads1;?>';

        var downloads2 ='<?php echo $downloads2;?>';
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
            <a class="dropdown-item" style="color: #6bacc1;"  href="admin/dashboard/"><i class="icon-magic-wand" aria-hidden="true"></i> Creator Tool</a>
        </div>
        <a class="navbar-brand" href="#"></a>
        

        <ul class="nav navbar-nav d-md-down-none">
                    <!--<button type="button" class="btn btn-primary" id="modal_open" data-target="#modal" data-toggle="modal">
                        Export Art Image
                    </button>-->
            <li class="nav-item px-3">
                <a id="creator_tool_link" class="nav-link" style="color: #6bacc1;" href="admin/dashboard/"><i class="icon-magic-wand" aria-hidden="true"></i> Creator Tool</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" style="color: #6bacc1;"  href=""><i class="icon-refresh " aria-hidden="true"></i></a>
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
                    <a class="dropdown-item" href="billing.php" style="vertical-align:middle;"><i class="icon-credit-card" style="vertical-align:middle;" ></i><span style="vertical-align:middle;font-size: 13px;"> Billing</span></a>
                    <a class="dropdown-item" onClick="resetpassword()" style="vertical-align:middle;"><i class="icon-lock" style="vertical-align:middle;"></i><span style="vertical-align:middle;font-size: 13px;"> Password</span></a>
                    <a class="dropdown-item" href="logout.php?logout" style="vertical-align:middle;"><i class="icon-arrow-right-circle " style="vertical-align:middle;"></i><span style="vertical-align: middle;font-size: 13px;"> Logout</span></a>
                </div>
            </li>
        </ul>

    </header>

        <ui-view  style="margin-top: 55px;">      
        <div class="animated fadeIn">
            <div id="loader_parent" class="card-footer" ng-controller="trafficDemoCtrl" style="padding:10px 20px;background:#f8f8f8;">
                <div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="stylish" style="width:100%; color:#607d8b;">
                                <span>
                                    <input id="product_name_label" style="border: 1px solid #cfd8dc;width:100%;padding-left:18px;color:#607d8b;" value="Select Mockup" readonly>
                                    <button id="caret" style="color:#ccc;width: 12px;height: 12px; background: red;background: url(img/down-arrow.png); background-size: auto auto;background-size: 100% 100%;margin-right: 5px;margin-top:3px;display:inline-block;"></button>                                    
                                    <br>
                                    <select  id="product_list" style="border: 1px solid #cfd8dc;border-top:none;float:left; color:#607d8b; font-size: 12px;width:100%;">
                                    </select>
                                </span>
                            </div>
                            <!-- <div class="" style="width:100%;">
                                <select class="form-control input-sm" >
                                </select>
                            </div> -->
                        </div>
                    </div>
                    <div class="card col-lg-4" style="margin-top:10px;padding-left:20px;padding-right:25px; padding-bottom:10px;">
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
                    <a class="nav-link" href='#' style="padding:0px;color:#263238;" onClick="inst_domodal()"><i class="icon-support" aria-hidden="true"  style="vertical-align:middle;"></i><span style="vertical-align:middle;"> Help</span></a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto" style="margin-right: 20px;">

                <li class="nav-item dropdown">
                    <span class="float-right"><a href="mailto:instantmockups@nymbl.io?subject=Feedback">Feedback</a>
                    </span>
                </li>
            </ul>
            
        </footer>
    
    <div id="mockup_moto" style="font-family:sans-serif; color:#94a6af;font-size:30px;position: absolute;display: inline;">
        <i class="icon-list" style="vertical-align:middle;padding-bottom: 3px;" aria-hidden="true"></i> &nbsp;Select Mockup
    </div>

    <!-- Bootstrap and necessary plugins -->
    
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
