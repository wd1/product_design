<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<?php  //$this->load->view('common/head'); ?>

<head>
<meta charset="utf-8" />
<title>Next Merch | Orders</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="Preview page of Metronic Admin Theme #2 for native bootstrap modals" name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- END PAGE LEVEL PLUGINS -->

<link href="<?php echo base_url();?>/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
	
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="<?php echo base_url();?>/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?php echo base_url();?>/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="<?php echo base_url();?>/assets/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="<?php echo base_url();?>/assets/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->
<link rel="shortcut icon" href="<?php echo base_url();?>/assets/layouts/layout2/img/favicon.png" /> </head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md">
<!-- BEGIN HEADER -->
<?php $this->load->view('common/header'); ?>
<!-- END HEADER --> 
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER --> 
<!-- BEGIN CONTAINER -->
<div class="page-container"> 
<!-- BEGIN SIDEBAR -->
<?php $this->load->view('common/sidebar'); ?>

<!-- END SIDEBAR --> 
<!-- BEGIN CONTENT -->

<div class="page-content-wrapper"> 
<!-- BEGIN CONTENT BODY -->
	<div class="page-content"> 
<!-- BEGIN PAGE HEADER--> 
<!-- BEGIN THEME PANEL -->
<div class="theme-panel">
<!--<div class="toggler tooltips" data-container="body" data-placement="left" data-html="true" data-original-title="Click to open advance theme customizer panel"> <i class="icon-settings"></i> </div>-->
<div class="toggler-close"> <i class="icon-close"></i> </div>
<div class="theme-options">
	<div class="theme-option theme-colors clearfix"> <span> THEME COLOR </span>
		<ul>
			<li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
			<li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
			<li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
			<li class="color-dark tooltips" data-style="dark" data-container="body" data-original-title="Dark"> </li>
			<li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
		</ul>
	</div>
	<div class="theme-option"> <span> Layout </span>
		<select class="layout-option form-control input-small">
		<option value="fluid" selected="selected">Fluid</option>
		<option value="boxed">Boxed</option>
		</select>
	</div>
	<div class="theme-option"> <span> Header </span>
		<select class="page-header-option form-control input-small">
		<option value="fixed" selected="selected">Fixed</option>
		<option value="default">Default</option>
		</select>
	</div>
	<div class="theme-option"> <span> Top Dropdown</span>
		<select class="page-header-top-dropdown-style-option form-control input-small">
		<option value="light" selected="selected">Light</option>
		<option value="dark">Dark</option>
		</select>
	</div>
	<div class="theme-option"> <span> Sidebar Mode</span>
		<select class="sidebar-option form-control input-small">
		<option value="fixed">Fixed</option>
		<option value="default" selected="selected">Default</option>
		</select>
	</div>
	<div class="theme-option"> <span> Sidebar Style</span>
		<select class="sidebar-style-option form-control input-small">
		<option value="default" selected="selected">Default</option>
		<option value="compact">Compact</option>
		</select>
	</div>
	<div class="theme-option"> <span> Sidebar Menu </span>
		<select class="sidebar-menu-option form-control input-small">
		<option value="accordion" selected="selected">Accordion</option>
		<option value="hover">Hover</option>
		</select>
	</div>
	<div class="theme-option"> <span> Sidebar Position </span>
		<select class="sidebar-pos-option form-control input-small">
		<option value="left" selected="selected">Left</option>
		<option value="right">Right</option>
		</select>
	</div>
	<div class="theme-option"> <span> Footer </span>
		<select class="page-footer-option form-control input-small">
		<option value="fixed">Fixed</option>
		<option value="default" selected="selected">Default</option>
		</select>
	</div>
</div>
</div>
<?php  if(!empty($payment_method)){?>
<div id="prefix_610546842319" class="custom-alerts alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Please enter a payment method in the Settings section.</div>
<?php }?>
<!-- END THEME PANEL -->
<h1 class="page-title">Orders </h1>
<div class="page-bar">
	<ul class="page-breadcrumb">
	<li> <i class="icon-home"></i> <a href="<?php echo base_url();?>home">Dashboard</a> <i class="fa fa-angle-right"></i> </li>
	<li> <span>Orders</span> </li>
	</ul>
	<div class="page-toolbar">
	</div>
</div>
<!-- END PAGE HEADER-->


<!--
<div class="form-actions">
<div class="row">
<div class="col-md-offset-3 col-md-9" style="margin-left:0%">
<button type="button" class="btn red  btn-lg" data-target="#long" data-toggle="modal" style=" padding:9px 22px;">PLACE AN ORDER</button>
</div>
</div>
</div>
-->

<!--Modal-->
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Modal Title</h4>
</div>
<div class="modal-body"> Modal body goes here </div>
<div class="modal-footer">
<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
<button type="button" class="btn green">Save changes</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<div id="long" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
<div class="modal-dialog" style="width:90%;">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Place On Order</h4>
</div>
<!--div class="modal-body">
<iframe style="border: 0px; " src="https://www.orderdesk.me/" width="100%" height="500px"></iframe>
</div-->
<!--<div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
</div>-->
</div>
</div>
</div>


<!-- BEGIN PAGE BASE CONTENT -->

<div style="background-color:#fff;padding:10px 8px; color:#949494">
<form action="<?php echo base_url();?>Orders/postOrder" method="post">
	<div class="row">	
		<div class="col-md-12">
			<br />
				<label class="col-md-2 control-label"><strong>Order Details</strong></label>

			<br />
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="col-md-2 control-label">Email:											
				</label>
				<div class="col-md-4">
					<input type="email" class="form-control" name="email" placeholder="" required> 
				</div>

				<label class="col-md-2 control-label">PO Number:											
				</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="order_id" placeholder="" value="<?php echo(isset($po_number)?$po_number:''); ?>" required> 
				</div>
			</div>	
		</div>		
	</div>			

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="col-md-2 control-label">Order Total:											
				</label>
				<div class="col-md-4">
 				<span   class="order_total" > </span>
                <input type="hidden" name="order_total"  id="order_total" class="order_total" value="">
                </div>
				<label class="col-md-2 control-label">Shipping  Total:											
				</label>
				<div class="col-md-4">
					<span   class="shipping_total" > </span>
                    <input type="hidden" name="shipping_total" id="shipping_total" class="shipping_total" value="">
				</div>
			</div>
		</div>		
	</div>	
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="col-md-2 control-label">Tax Total:											
				</label>
				<div class="col-md-4">
 					<span   class="tax_total" > </span>
                    <input type="hidden" name="tax_total"  id="tax_total" class="tax_total" value="">
				</div>
				<label class="col-md-2 control-label">Grand Total:											
				</label>
				<div class="col-md-4">
 					<span   class="amount_due" > </span>
                    <input type="hidden" name="amount_due"  id="amount_due" class="amount_due" value="">
				</div>
                
			</div>
		</div>
	</div>	


	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<div class="form-section-vgap">
					<label class="col-md-6 control-label"><strong>Shipping Address</strong></label>
				</div>	
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="col-md-2 control-label">First Name:											
				</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="shipping_first_name" placeholder="" required> 
				</div>
				<label class="col-md-2 control-label">Last Name:											
				</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="shipping_last_name" placeholder="" required> 
				</div>
			</div>
		</div>
	</div>			

	<div class="row">
		<div class="col-md-12">		
			<div class="form-group">
				<label class="col-md-2 control-label">Phone:											
				</label>
				<div class="col-md-4">
				<input type="text" class="form-control" name="shipping_phone" placeholder="" required> 
				</div>
				<label class="col-md-2 control-label">Company Name:											
				</label>
				<div class="col-md-4">
				<input type="text" class="form-control" name="shipping_company" placeholder="" required> 
				</div>
			</div>	
		</div>
	</div>	

		
	<div class="row">
		<div class="col-md-12">	
			<div class="form-group">
				<label class="col-md-2 control-label">Address:											
				</label>
				<div class="col-md-4">
				<input type="text" class="form-control" name="shipping_address" placeholder="" required> 
				</div>
				<label class="col-md-2 control-label">City:											
				</label>
				<div class="col-md-4">
				<input type="text" class="form-control" name="shipping_city" placeholder="" required> 
				</div>
			</div>	
		</div>
	</div>	

	<div class="row">
		<div class="col-md-12">	
			<div class="form-group">
				<label class="col-md-2 control-label">State:											
				</label>
				<div class="col-md-4">
				<input type="text" class="form-control" name="shipping_state" placeholder="" required> 
				</div>
				<label class="col-md-2 control-label">Postal Code:											
				</label>
				<div class="col-md-4">
				<input type="text" class="form-control" name="shipping_post_code" placeholder="" required> 
				</div>
			</div>	
		</div>
	</div>		

			
	<div class="row">
		<div class="col-md-12">	
			<div class="form-group">
			<label class="col-md-2 control-label">Shipping Method:											
				</label>
				<div class="col-md-4">
					<select class="form-control" name="shipping_method">
					<option value="1" selected="selected">Standard</option>
					<option value="2">2 Day Domestic</option>
					<option value="3">Overnight Domestic</option>
					<option value="4">Expedited International</option>					
				  </select>
				</div>
				
				<label class="col-md-2 control-label">Country:											
				</label>
				<div class="col-md-4">
					<select class="form-control" name="shipping_country" id="shipping_country" required>
					<option value="0">Select</option>
					<?php foreach($countries as $country){ ?>
					<option value="<?php echo $country->country_id;?>"><?php echo $country->short_name;?></option>
					<?php }?>
				  </select>
				</div>
			</div>
			
		</div>
	</div>		

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<div class="form-section-vgap">
					<label class="col-md-6 control-label"><strong>Customer/Billing Address</strong></label>
				</div>	
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="col-md-6 control-label" >Use a Different Address for Billing/Customer:  
				
				<label class="mt-checkbox">
					<input type="checkbox" name="is_billing_different_address" id="customer_address_chkbox" placeholder=""> 
					<span></span>
                </label>	
				</label>
				<div class="col-md-6">&nbsp;</div>
			</div>
		</div>
	</div>

	<div class="row customer_address_fields">
		<div class="col-md-12">
			<div class="form-group">
				<label class="col-md-2 control-label">First Name:											
				</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="billing_first_name" placeholder=""> 
				</div>
				<label class="col-md-2 control-label">Last Name:											
				</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="billing_last_name" placeholder=""> 
				</div>
			</div>
		</div>
	</div>			

	<div class="row customer_address_fields">
		<div class="col-md-12">		
			<div class="form-group">
				<label class="col-md-2 control-label">Phone:											
				</label>
				<div class="col-md-4">
				<input type="text" class="form-control" name="billing_phone" placeholder=""> 
				</div>
				<label class="col-md-2 control-label">Company Name:											
				</label>
				<div class="col-md-4">
				<input type="text" class="form-control" name="billing_company_name" placeholder=""> 
				</div>
			</div>	
		</div>
	</div>	

	<div class="row customer_address_fields">
		<div class="col-md-12">	
			<div class="form-group">
				<label class="col-md-2 control-label">Address:											
				</label>
				<div class="col-md-4">
				<input type="text" class="form-control" name="billing_address" placeholder=""> 
				</div>
				<label class="col-md-2 control-label">City:											
				</label>
				<div class="col-md-4">
				<input type="text" class="form-control" name="billing_city" placeholder=""> 
				</div>
			</div>	
		</div>
	</div>	

	<div class="row customer_address_fields">
		<div class="col-md-12">	
			<div class="form-group">
				<label class="col-md-2 control-label">State:											
				</label>
				<div class="col-md-4">
				<input type="text" class="form-control" name="billing_state" placeholder=""> 
				</div>
				<label class="col-md-2 control-label">Postal Code:											
				</label>
				<div class="col-md-4">
				<input type="text" class="form-control" name="billing_post_code" placeholder=""> 
				</div>
			</div>	
		</div>
	</div>		

			
	<div class="row customer_address_fields">
		<div class="col-md-12">	
			<div class="form-group">
				<label class="col-md-2 control-label">Country:											
				</label>
				<div class="col-md-4">
				  <select class="form-control" name="billing_country">
					<option value="0">Select</option>
					<?php foreach($countries as $country){ ?>
					<option value="<?php echo $country->country_id;?>"><?php echo $country->short_name;?></option>
					<?php }?>
				  </select>
				</div>
			</div>
			
		</div>
	</div>		
		

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<div class="form-section-vgap">
					<label class="col-md-6 control-label"><strong>Select Products in Your Inventory to Add to Order</strong></label>
				</div>	
			</div>
		</div>
	</div>
	 <?php if($user_orders){?>
	<div class="row input_fields_wrap">
		<div class="col-md-12">
			<div class="form-group">
				<div class="col-md-4">
					<div>Name:</div>
					<div>
                    
                    
						<select  onChange="changethis(this.value,this)" name="inv_product[]" class="form-control search_orders"  >   <option value="">Please Select Product</option>
 							<?php  foreach($user_orders as $signleorder){ ?>
							<option   class="orderoptions" value="<?php  echo $signleorder->id;?>"><?php  echo $signleorder->product_name;?></option>
							<?php  }?>
						</select>
                       
					</div>
				</div>
                <?php  //if($user_orders){ foreach($user_orders as $signleorder){ ?>
               <!-- <span class="hideme" id="txtfields-<?php  //echo $signleorder->id;?>" style="display:none">-->
				<div class="col-md-2">
					<div>SKU:</div>
					<div>
						<input disabled class="form-control" type="text" name ="search_sku[]" value="<?php  //echo $signleorder->sku;?>" />
					</div>
				</div>
                <div class="col-md-2">
					<div>Price:</div>
					<div>
						<input class="form-control" type="text" disabled name ="search_price[]" value="<?php  //echo $signleorder->price;?>" />
					</div>
				</div>
                <div class="col-md-2">
					<div>Qty:</div>
					<div>
						<input class="form-control"   type="text" name="search_qty[]" value="1" />
					</div>
				</div>
                <div class="col-md-2"><div>&nbsp;&nbsp;</div><div>
                <a href="#" class="remove_field">Remove</a> </div></div>
                
               <!-- </span>-->
				<?php  //}   //}?>
        
           </div> 
       
		</div>
	</div> 
     
     <!--<div class="row">
		<div class="col-md-12">
			<div class="form-group">  
             <div class="col-md-2">
					<div>&nbsp;&nbsp;</div>
					 
                    <a style="color:#fff" href="javascript:;" class="btn green" id ="addanother"> Add Another Product
                                                                            <i class="fa fa-plus"></i>
                                                                        </a>
                                                                        
                     
            
			 </div>
                
       </div> </div></div>-->
            
	<!--<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<div class="col-md-4" style="padding-top:5px">
					<button class="btn btn-default" id="search_products" onclick="return false;">Search</button>
				</div>
			</div>
		</div>
	</div>-->
	
	<!--div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<div class="col-md-2">
					<div>Name:</div>
					<div><input type="text" class="form-control"  name="product_sku" placeholder=""></div>
				</div>

				<div class="col-md-2">
					<div>Code:</div>
					<div><input type="text" class="form-control" name="product_sku" placeholder=""></div>
				</div>

				<div class="col-md-2">
					<div>Price:</div>
					<div><input type="text" class="form-control" name="product_sku" placeholder=""></div>  
				</div>

				<div class="col-md-2">
					<div>Qty:</div>
					<div><input type="text" class="form-control" name="product_sku" placeholder=""> </div> 
				</div>

				<div class="col-md-2">
					<div>Weight:</div>
					<div><input type="text" class="form-control" name="product_sku" placeholder=""></div> 
				</div>

				<div class="col-md-2">
					<div>Delivery Type:</div>
					<div><input type="text" class="form-control" name="product_sku" placeholder=""></div> 
				</div>
			</div>
		</div>
	</div-->

	
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<div class="col-md-12">
					 <table id="products_list" style="width:100%">
					 
					 </table>			
				 </div>
			 </div>
		</div>
	</div>
	 <div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="col-md-2 control-label">Order Total:											
				</label>
				<div class="col-md-4">
 				<span   class="order_total" > </span>
                 </div>
				<label class="col-md-2 control-label">Shipping  Total:											
				</label>
				<div class="col-md-4">
					<span   class="shipping_total" > </span>
 				</div>
			</div>
		</div>		
	</div>	
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="col-md-2 control-label">Tax Total:											
				</label>
				<div class="col-md-4">
 					<span   class="tax_total" > </span>
 				</div>
				
                <label class="col-md-2 control-label">Grand Total:											
				</label>
				<div class="col-md-4">
 					<span   class="amount_due" > </span>
 				</div>
                
			</div>
		</div>
	</div>	
      
     

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<div class="col-md-6" style="padding-top:5px; width:60%">
					<button class="btn green add_field_button" >+ Add Another Product</button>
                   
                   <button onClick="calc_shipping2()" class="btn btn-success">
				<i class="fa fa-check"></i> UPDATE / CALCULATE
			</button>
                   
                    <button style="display:none" onClick="validateorder()" class="btn btn-success submitorder">
				<i class="fa fa-check"></i> SUBMIT ORDER
			</button>
            
            
				</div>
			</div>
			</div>
            
             
            
		</div>
        
        
        </div>
<?php }?>

        
    
	<div class="row">
		<div class="col-md-12">
			<br /><br />
				<label class="col-md-2 control-label add_field_button"><strong>Add Order Note</strong></label>
			<br />
		</div>
	</div>


	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="col-md-2 control-label" style="text-align:left">Order Note:</label>
				<div class="col-md-10">
					<textarea class="wysihtml5 form-control" rows="8" id="order_note" name="order_note"></textarea>	
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12" style="text-align:center;padding:20px 0px">
			<button type="button" name="back" class="btn btn-secondary-outline back-button">
				<i class="fa fa-angle-left"></i> Back
			</button>								
			<button style="display:none" onClick="validateorder()"  class="btn btn-success submitorder">
				<i class="fa fa-check"></i> SUBMIT ORDER
			</button>
		</div>
	</div>
	
</form>
				

    
</div>


</div>

</div>

<!-- END PAGE BASE CONTENT -->

</div>
<!-- END CONTENT BODY --> 
</div>
<?php $this->load->view('common/quick_sidebar'); ?>

<!-- END CONTENT --> 

</div>
<!-- END CONTAINER --> 
<!-- BEGIN FOOTER -->
<?php  //$this->load->view('common/footer'); ?>
<!-- BEGIN FOOTER -->
<div class="page-footer">
<div class="page-footer-inner"> 
		<?php echo date('Y'); ?>  ©  Next Merch by <a href="#">Next Merch LLC</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <a href="https://nextmerch.com/terms" target="_blank">Terms</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <a href="https://nextmerch.com/privacy/" target="_blank">Privacy</a>
			<div class="scroll-to-top"> <i class="icon-arrow-up"></i> </div>
</div>
<!-- END FOOTER --> 
<?php  //$this->load->view('common/footer'); ?>
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo base_url();?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->


		
 <!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
 <!-- END PAGE LEVEL PLUGINS -->		
		
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url();?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->

 <!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>/assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
		
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>/assets/pages/scripts/ui-modals.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url();?>/assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>

<style type="text/css">
.add-product-section-label{text-align:left;}
.form-group, .customer_address_fields {padding:5px 0 0 0;}
.form-section-vgap{padding:20px 0 10px 0;}
.btn:not(.md-skip):not(.bs-select-all):not(.bs-deselect-all) {    
    padding: 10px 15px !important;
	.row { margin-top:8px !important;}
}
</style>

<script type="text/javascript">
$(document).ready(function(){
	$('.customer_address_fields').hide();
	$('#customer_address_chkbox').click(function() {
		if($('#customer_address_chkbox').prop('checked')) {
		$('.customer_address_fields').show(); 
		} else {
		$('.customer_address_fields').hide(); 
		}
	});	
	
	
	$( "#search_products" ).click(function() {		
		//incomplete
 		var cat_id = $("#search_category").val();	
		var sku  = '';	
		sku = $("#search_sku").val();
		
		$.ajax({
				url: "<?php echo base_url();?>orders/getProductsList/" + cat_id + '/' + sku,
				type: "GET",
				dataType:"html",
				success: function(data){
					$("#products_list") .html(data);
				},				
            });
	});
	
	$( "#firstrow" ).change(function() {
	var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
	 
	$('.hideme').css('display','none');
	$('#txtfields-'+valueSelected).css('display','block');
	
	});
	
	
		
	 
}); 
  
 

$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment<option value="">Please Select Product</option>
            $(wrapper).append('<div class="col-md-12"><div class="form-group">'+'<div class="col-md-4"><div>Name:</div><div><select name="inv_product[]"  onChange="changethis(this.value,this)" class="form-control search_orders"  ><option value="">Please Select Product</option><?php  foreach($user_orders as $signleorder){ ?><option   class="orderoptions" value="<?php  echo $signleorder->id;?>"><?php  echo $signleorder->product_name;?></option><?php  }?></select></div></div><div class="col-md-2"><div>SKU:</div><div>'+'<input disabled class="form-control" type="text" name ="search_sku[]" value="" />'+'</div></div><div class="col-md-2"><div>Price:</div><div><input class="form-control" type="text" name ="search_price[]" value="" /></div></div>'+'<div class="col-md-2"><div>Qty:</div><div><input class="form-control srch_qy"   type="text" name="search_qty[]" value="1" />'+'</div></div><div class="col-md-2"><div>&nbsp;&nbsp;</div><div><a href="#" class="remove_field">Remove</a><//div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().parent().parent().parent('div').remove(); x--;
    })
	
	
	
});

 

function changethis(value,current){
			var selectedopt=$("option:selected", this);
			 $(selectedopt).attr('selected', 'selected');
			var product_id=value;
			
	$.ajax({
				url: "<?php echo base_url();?>orders/get_single_order/" + product_id,
				type: "GET",
				dataType: 'json',
				success: function(data){
					 
 					$(current).parent().parent().next().find('input').val(data.sku);
					$(current).parent().parent().next().next().find('input').val('$'+data.price);
					$(current).parent().parent().next().next().find('input').attr('disabled',true);
					//$("#products_list") .html(data);
				},				
            });
 	
	}
	
/*function calc_shipping(qty_value){
	alert(qty_value);
	alert($('#shipping_country').val());
	$.ajax({
				url: "<?php echo base_url();?>orders/get_product_details/" + qty_value,
				type: "GET",
				dataType: 'json',
				success: function(data){
					 
 					 alert(data);
					//$("#products_list") .html(data);
				},				
            });
}*/
function validateorder(){
	
	 //event.preventDefault();
	product_arr = $('select.search_orders').map(function(){
              return this.value
          }).get()
		  
 if(product_arr==''){	
     event.preventDefault();
	 alert('Please select product to order.');
	 return false;
	}
	 
} 
function calc_shipping2(){
	validateorder();
	event.preventDefault();
	//alert(qty_value);
	var country=$('#shipping_country').val();
	var price_arr = [];
	var qty_arr = [];
	var product_arr = [];
	i = 0;
	$('input[name^="search_price"]').each(function() {
     price_arr[i++] = $(this).val();
	 
});


i=0;
$('input[name^="search_qty"]').each(function() {
     qty_arr[i++] = $(this).val();
	 
});

 product_arr = $('select.search_orders').map(function(){
              return this.value
          }).get()

/* alert(price_arr);
 alert(qty_arr);
 alert(product_arr);
return false;*/
if(product_arr!=''){
	$.ajax({
				url: "<?php echo base_url();?>orders/get_product_details?prds_arr="+product_arr+"&qty_arr="+qty_arr+"&price_arr="+price_arr+"&country="+country,
				type: "GET",
				dataType: 'json',
				success: function(data){
					 
 					 // alert(data.price_total);
					  $('.order_total').text('$'+data.price_total);
					  $('#order_total').val(data.price_total);
					 // alert(data.shippingTotal);
					  $('.shipping_total').text('$'+data.shippingTotal);
					  $('#shipping_total').val(data.shippingTotal);
					  
					  $('.tax_total').text('$'+data.calculate_shipping);
					  $('#tax_total').val(data.calculate_shipping);
					  
					  $('.amount_due').text('$'+(data.grandtotal));
					  $('#amount_due').val( (data.grandtotal));
					  
					  $('.submitorder').show();
					//$("#products_list") .html(data);
				},				
            });
} else{
	 alert('Please select product to order.');
	}
}

</script>



</body>
</html>