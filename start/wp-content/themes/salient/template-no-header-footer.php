<?php 
/*template name: No Header & Footer */
?>

<!doctype html>


<html <?php language_attributes(); ?> >
<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php $options = get_nectar_theme_options(); ?>

<?php if(!empty($options['responsive']) && $options['responsive'] == 1) { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />

<?php } else { ?>
	<meta name="viewport" content="width=1200" />
<?php } ?>	

<!--Shortcut icon-->
<?php if(!empty($options['favicon']) && !empty($options['favicon']['url'])) { ?>
	<link rel="shortcut icon" href="<?php echo nectar_options_img($options['favicon']); ?>" />
<?php } ?>

<?php wp_head(); ?>

<?php if(!empty($options['google-analytics'])) echo $options['google-analytics']; ?> 

</head>

<?php
 global $post; 
 global $woocommerce; 


//check if parallax nectar slider is being used
$parallax_nectar_slider = using_nectar_slider();
$force_effect = get_post_meta($post->ID, '_force_transparent_header', true);

$headerFormat = (!empty($options['header_format'])) ? $options['header_format'] : 'default';

// header transparent option
$transparency_markup = null;
$activate_transparency = null;

$using_page_header = using_page_header($post->ID);
$using_fw_slider = $parallax_nectar_slider;
$using_fw_slider = (!empty($options['transparent-header']) && $options['transparent-header'] == '1') ? $using_fw_slider : 0;
if($force_effect == 'on') $using_fw_slider = '1';
$disable_effect = get_post_meta($post->ID, '_disable_transparent_header', true);

if(!empty($options['transparent-header']) && $options['transparent-header'] == '1' && $headerFormat != 'left-header') {
	
	$starting_color = (empty($options['header-starting-color'])) ? '#ffffff' : $options['header-starting-color'];
	$activate_transparency = $using_page_header;
	$remove_border = (!empty($options['header-remove-border']) && $options['header-remove-border'] == '1') ? 'true' : 'false';
	$transparency_markup = ($activate_transparency == 'true') ? 'data-transparent-header="true" data-remove-border="'.$remove_border.'" class="transparent"' : null ;
}

//header vars
$logo_class = (!empty($options['use-logo']) && $options['use-logo'] == '1') ? null : 'class="no-image"'; 
$sideWidgetArea = (!empty($options['header-slide-out-widget-area']) && $headerFormat != 'left-header' ) ? $options['header-slide-out-widget-area'] : 'off';
$sideWidgetClass = (!empty($options['header-slide-out-widget-area-style'])) ? $options['header-slide-out-widget-area-style'] : 'slide-out-from-right';
$sideWidgetIconAnimation = (!empty($options['header-slide-out-widget-area-icon-animation'])) ? $options['header-slide-out-widget-area-icon-animation'] : 'spin-and-transform';
if($sideWidgetClass == 'slide-out-from-right-hover') $sideWidgetIconAnimation = 'simple-transform';
$fullWidthHeader = (!empty($options['header-fullwidth']) && $options['header-fullwidth'] == '1') ? 'true' : 'false';
$headerSearch = (!empty($options['header-disable-search']) && $options['header-disable-search'] == '1') ? 'false' : 'true';
$mobile_fixed = (!empty($options['header-mobile-fixed'])) ? $options['header-mobile-fixed'] : 'false';
$fullWidthHeader = (!empty($options['header-fullwidth']) && $options['header-fullwidth'] == '1') ? 'true' : 'false';
$headerColorScheme = (!empty($options['header-color'])) ? $options['header-color'] : 'light';
$userSetBG = (!empty($options['header-background-color']) && $headerColorScheme == 'custom') ? $options['header-background-color'] : '#ffffff';
$trans_header = (!empty($options['transparent-header']) && $options['transparent-header'] == '1') ? $options['transparent-header'] : 'false';
if($headerFormat == 'left-header') $trans_header = 'false';
$bg_header = (!empty($post->ID) && $post->ID != 0) ? $using_page_header : 0;
$bg_header = ($bg_header == 1) ? 'true' : 'false'; //convert to string for references in css
$header_box_shadow = (!empty($options['header-box-shadow'])) ? $options['header-box-shadow'] : 'small';
$perm_trans = (!empty($options['header-permanent-transparent']) && $trans_header != 'false' && $bg_header == 'true') ? $options['header-permanent-transparent'] : 'false'; 
$headerLinkHoverEffect = (!empty($options['header-hover-effect'])) ? $options['header-hover-effect'] : 'default';
$headerRemoveStickiness = (!empty($options['header-remove-fixed'])) ? $options['header-remove-fixed'] : '0'; 
$hideHeaderUntilNeeded = (!empty($options['header-hide-until-needed'])) ? $options['header-hide-until-needed'] : '0';
if($headerFormat == 'left-header') { $hideHeaderUntilNeeded = '0'; $headerRemoveStickiness = '0'; }
if($headerRemoveStickiness == '1') $hideHeaderUntilNeeded = '1';
$headerResize =  '0'; 
$dropdownStyle = (!empty($options['header-dropdown-style']) && $perm_trans != '1' && $headerFormat != 'left-header' ) ? $options['header-dropdown-style'] : 'classic';
$page_transition_effect = (!empty($options['transition-effect'])) ? $options['transition-effect'] : 'standard';
$megamenuwidth = (!empty($options['header-megamenu-width']) && $headerFormat != 'left-header') ? $options['header-megamenu-width'] : 'contained';
$megamenuRemoveTransparent = (!empty($options['header-megamenu-remove-transparent']) && $headerFormat != 'left-header') ? $options['header-megamenu-remove-transparent'] : '0'; 
$body_border = (!empty($options['body-border'])) ? $options['body-border'] : 'off';
if($hideHeaderUntilNeeded == '1' || $body_border == '1' || $headerFormat == 'left-header' || $headerRemoveStickiness == '1') $headerResize = '0';
$lightbox_script = (!empty($options['lightbox_script'])) ? $options['lightbox_script'] : 'pretty_photo';
$button_styling = (!empty($options['button-styling'])) ? $options['button-styling'] : 'default'; 
$form_style = (!empty($options['form-style'])) ? $options['form-style'] : 'default'; 
$fancy_rcs = (!empty($options['form-fancy-select'])) ? $options['form-fancy-select'] : 'default';
$footer_reveal = (!empty($options['footer-reveal'])) ? $options['footer-reveal'] : 'false'; 
$footer_reveal_shadow = (!empty($options['footer-reveal-shadow']) && $footer_reveal == '1') ? $options['footer-reveal-shadow'] : 'none'; 
$icon_style = (!empty($options['theme-icon-style'])) ? $options['theme-icon-style'] : 'inherit';
$has_main_menu = (has_nav_menu('top_nav')) ? 'true' : 'false';
$animate_in_effect = (!empty($options['header-animate-in-effect'])) ? $options['header-animate-in-effect'] : 'none';
if($headerColorScheme == 'dark') { $userSetBG = '#1f1f1f'; } 	
$userSetSideWidgetArea = $sideWidgetArea;
if($has_main_menu == 'true' && $mobile_fixed == '1') $sideWidgetArea = '1';
if($headerFormat == 'centered-menu-under-logo') $fullWidthHeader = 'false';
if($sideWidgetClass == 'slide-out-from-right-hover' && $userSetSideWidgetArea == '1') $fullWidthHeader = 'true';
$column_animation_easing = (!empty($options['column_animation_easing'])) ? $options['column_animation_easing'] : 'linear'; 
$column_animation_duration = (!empty($options['column_animation_timing'])) ? $options['column_animation_timing'] : '650'; 
$prependTopNavMobile = (!empty($options['header-slide-out-widget-area-top-nav-in-mobile']) && $userSetSideWidgetArea == '1') ? $options['header-slide-out-widget-area-top-nav-in-mobile'] : 'false';
$smooth_scrolling = (!empty($options['smooth-scrolling'])) ? $options['smooth-scrolling'] : '0';
if($body_border == '1') $smooth_scrolling = '0';
$page_full_screen_rows = (isset($post->ID)) ? get_post_meta($post->ID, '_nectar_full_screen_rows', true) : '';
if($page_full_screen_rows == 'on') $smooth_scrolling = '0';
$form_submit_style = (!empty($options['form-submit-btn-style'])) ? $options['form-submit-btn-style'] : 'default';

$using_secondary = (!empty($options['header_layout']) && $headerFormat != 'left-header') ? $options['header_layout'] : ' '; 

//using pr
$using_pr_menu = 'false';
if($headerFormat == 'menu-left-aligned' || $headerFormat == 'centered-menu') {
	if(has_nav_menu('top_nav_pull_right')) {
		$using_pr_menu = 'true';
	}
}

?>

<body <?php body_class(); ?> data-footer-reveal="<?php echo $footer_reveal; ?>" data-header-format="<?php echo $headerFormat; ?>" data-footer-reveal-shadow="<?php echo $footer_reveal_shadow; ?>" data-dropdown-style="<?php echo $dropdownStyle;?>" data-cae="<?php echo $column_animation_easing; ?>" data-megamenu-width="<?php echo $megamenuwidth; ?>" data-cad="<?php echo $column_animation_duration; ?>" data-aie="<?php echo $animate_in_effect; ?>" data-ls="<?php echo $lightbox_script;?>" data-apte="<?php echo $page_transition_effect;?>" data-hhun="<?php echo $hideHeaderUntilNeeded; ?>" data-fancy-form-rcs="<?php echo $fancy_rcs; ?>" data-form-style="<?php echo $form_style; ?>" data-form-submit="<?php echo $form_submit_style; ?>" data-is="<?php echo $icon_style; ?>" data-button-style="<?php echo $button_styling; ?>" data-header-inherit-rc="<?php echo (!empty($options['header-inherit-row-color']) && $options['header-inherit-row-color'] == '1' && $perm_trans != 1) ? "true" : "false"; ?>" data-header-search="<?php echo $headerSearch; ?>" data-animated-anchors="<?php echo (!empty($options['one-page-scrolling']) && $options['one-page-scrolling'] == '1') ? 'true' : 'false'; ?>" data-ajax-transitions="<?php echo (!empty($options['ajax-page-loading']) && $options['ajax-page-loading'] == '1') ? 'true' : 'false'; ?>" data-full-width-header="<?php echo $fullWidthHeader; ?>" data-slide-out-widget-area="<?php echo ($sideWidgetArea == '1') ? 'true' : 'false';  ?>" data-slide-out-widget-area-style="<?php echo $sideWidgetClass; ?>" data-user-set-ocm="<?php echo $userSetSideWidgetArea; ?>" data-loading-animation="<?php echo (!empty($options['loading-image-animation'])) ? $options['loading-image-animation'] : 'none'; ?>" data-bg-header="<?php echo $bg_header; ?>" data-ext-responsive="<?php echo (!empty($options['responsive']) && $options['responsive'] == 1 && !empty($options['ext_responsive']) && $options['ext_responsive'] == '1') ? 'true' : 'false'; ?>" data-header-resize="<?php echo $headerResize; ?>" data-header-color="<?php echo (!empty($options['header-color'])) ? $options['header-color'] : 'light' ; ?>" <?php echo (!empty($options['transparent-header']) && $options['transparent-header'] == '1') ? null : 'data-transparent-header="false"'; ?> data-smooth-scrolling="<?php echo $smooth_scrolling; ?>" data-permanent-transparent="<?php echo $perm_trans; ?>" data-responsive="<?php echo (!empty($options['responsive']) && $options['responsive'] == 1) ? '1'  : '0' ?>" >

<?php if(!empty($options['boxed_layout']) && $options['boxed_layout'] == '1') { echo '<div id="boxed">'; } 

$page_full_screen_rows = (isset($post->ID)) ? get_post_meta($post->ID, '_nectar_full_screen_rows', true) : ''; ?>


<div id="header-outer" data-has-menu="<?php echo $has_main_menu; ?>" <?php echo $transparency_markup; ?> data-using-pr-menu="<?php echo $using_pr_menu; ?>" data-mobile-fixed="<?php echo $mobile_fixed; ?>" data-ptnm="<?php echo $prependTopNavMobile;?>" data-lhe="<?php echo $headerLinkHoverEffect; ?>" data-user-set-bg="<?php echo $userSetBG; ?>" data-format="<?php echo $headerFormat; ?>" data-permanent-transparent="<?php echo $perm_trans; ?>" data-megamenu-rt="<?php echo $megamenuRemoveTransparent; ?>" data-remove-fixed="<?php echo $headerRemoveStickiness; ?>" data-cart="<?php echo ($woocommerce && !empty($options['enable-cart']) && $options['enable-cart'] == '1') ? 'true': 'false';?>" data-transparency-option="<?php if($disable_effect == 'on') { echo '0'; } else { echo $using_fw_slider; } ?>" data-box-shadow="<?php echo $header_box_shadow; ?>" data-shrink-num="<?php echo (!empty($options['header-resize-on-scroll-shrink-num'])) ? $options['header-resize-on-scroll-shrink-num'] : 6; ?>" data-full-width="<?php echo $fullWidthHeader; ?>" data-using-secondary="<?php echo ($using_secondary == 'header_with_secondary') ? '1' : '0'; ?>" data-using-logo="<?php if(!empty($options['use-logo'])) echo $options['use-logo']; ?>" data-logo-height="<?php if(!empty($options['logo-height'])) echo $options['logo-height']; ?>" data-m-logo-height="<?php if(!empty($options['mobile-logo-height'])) { echo $options['mobile-logo-height']; } else { echo '24'; } ?>" data-padding="<?php echo (!empty($options['header-padding'])) ? $options['header-padding'] : "28"; ?>" data-header-resize="<?php echo $headerResize; ?>"></div>
	

<div id="ajax-loading-screen" data-disable-fade-on-click="<?php echo (!empty($options['disable-transition-fade-on-click'])) ? $options['disable-transition-fade-on-click'] : '0' ; ?>" data-effect="<?php echo $page_transition_effect; ?>" data-method="<?php echo (!empty($options['transition-method'])) ? $options['transition-method'] : 'ajax' ; ?>">
	
	<?php if($page_transition_effect == 'horizontal_swipe') { ?>
		<div class="reveal-1"></div>
		<div class="reveal-2"></div>
	<?php } else if($page_transition_effect == 'center_mask_reveal') { ?>
		<span class="mask-top"></span>
		<span class="mask-right"></span>
		<span class="mask-bottom"></span>
		<span class="mask-left"></span>
	<?php } else { ?>
		<div class="loading-icon <?php echo (!empty($options['loading-image-animation']) && !empty($options['loading-image'])) ? $options['loading-image-animation'] : null; ?>"> 
			<?php 
			$loading_icon = (isset($options['loading-icon'])) ? $options['loading-icon'] : 'default';
			$loading_img = (isset($options['loading-image'])) ? nectar_options_img($options['loading-image']) : null;
			if(empty($loading_img)) { 
				if($loading_icon == 'material') {
					echo '<div class="material-icon">
							<div class="spinner">
								<div class="right-side"><div class="bar"></div></div>
								<div class="left-side"><div class="bar"></div></div>
							</div>
							<div class="spinner color-2">
								<div class="right-side"><div class="bar"></div></div>
								<div class="left-side"><div class="bar"></div></div>
							</div>
						</div>';
				} else {
					if(!empty($options['theme-skin']) && $options['theme-skin'] == 'ascend') { 
						echo '<span class="default-loading-icon spin"></span>'; 
					} else { 
						echo '<span class="default-skin-loading-icon"></span>'; 
					} 
				}
			} 
			 ?> 
		</div>
	<?php } ?>
</div>

<div id="ajax-content-wrap">

<?php 
	if($sideWidgetArea == '1' && $sideWidgetClass == 'fullscreen') echo '<div class="blurred-wrap">'; 
?>



<?php
nectar_page_header($post->ID); 

//full page
$fp_options = nectar_get_full_page_options();
extract($fp_options);

?>

<div class="container-wrap">
	
	<div class="<?php if($page_full_screen_rows != 'on') echo 'container'; ?> main-content">
		
		<div class="row">
			
			<?php 

			//breadcrumbs
			if ( function_exists( 'yoast_breadcrumb' ) && !is_home() && !is_front_page() ){ yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } 

			 //buddypress
			 global $bp; 
			 if($bp && !bp_is_blog_page()) echo '<h1>' . get_the_title() . '</h1>';
			
			 //fullscreen rows
			 if($page_full_screen_rows == 'on') echo '<div id="nectar_fullscreen_rows" data-animation="'.$page_full_screen_rows_animation.'" data-row-bg-animation="'.$page_full_screen_rows_bg_img_animation.'" data-animation-speed="'.$page_full_screen_rows_animation_speed.'" data-content-overflow="'.$page_full_screen_rows_content_overflow.'" data-mobile-disable="'.$page_full_screen_rows_mobile_disable.'" data-dot-navigation="'.$page_full_screen_rows_dot_navigation.'" data-footer="'.$page_full_screen_rows_footer.'" data-anchors="'.$page_full_screen_rows_anchors.'">';

				 if(have_posts()) : while(have_posts()) : the_post(); 
					
					 the_content(); 
		
				 endwhile; endif; 
				
			if($page_full_screen_rows == 'on') echo '</div>'; ?>

		</div><!--/row-->
		
	</div><!--/container-->
	
</div><!--/container-wrap-->





<?php 
$options = get_nectar_theme_options(); 
global $post;
$cta_link = ( !empty($options['cta-btn-link']) ) ? $options['cta-btn-link'] : '#';
$using_footer_widget_area = (!empty($options['enable-main-footer-area']) && $options['enable-main-footer-area'] == 1) ? 'true' : 'false';
$disable_footer_copyright = (!empty($options['disable-copyright-footer-area']) && $options['disable-copyright-footer-area'] == 1) ? 'true' : 'false';
$footer_reveal = (!empty($options['footer-reveal'])) ? $options['footer-reveal'] : 'false'; 
$footer_full_width = (!empty($options['footer-full-width'])) ? $options['footer-full-width'] : 'false'; 
$midnight_non_reveal = ($footer_reveal != 'false') ? null : 'data-midnight="light"';

$mobile_fixed = (!empty($options['header-mobile-fixed'])) ? $options['header-mobile-fixed'] : 'false';
$has_main_menu = (has_nav_menu('top_nav')) ? 'true' : 'false';

$sideWidgetArea = (!empty($options['header-slide-out-widget-area'])) ? $options['header-slide-out-widget-area'] : 'off';
$userSetSideWidgetArea = $sideWidgetArea;
if($has_main_menu == 'true' && $mobile_fixed == '1') $sideWidgetArea = '1';

$fullWidthHeader = (!empty($options['header-fullwidth']) && $options['header-fullwidth'] == '1') ? true : false;
$sideWidgetClass = (!empty($options['header-slide-out-widget-area-style'])) ? $options['header-slide-out-widget-area-style'] : 'slide-out-from-right';
$sideWidgetOverlayOpacity = (!empty($options['header-slide-out-widget-area-overlay-opacity'])) ? $options['header-slide-out-widget-area-overlay-opacity'] : 'dark';
$prependTopNavMobile = (!empty($options['header-slide-out-widget-area-top-nav-in-mobile'])) ? $options['header-slide-out-widget-area-top-nav-in-mobile'] : 'false';
$headerFormat = (!empty($options['header_format'])) ? $options['header_format'] : 'default';

if($sideWidgetArea == '1') { 

	if($sideWidgetClass == 'fullscreen') echo '</div><!--blurred-wrap-->'; ?>

	<div id="slide-out-widget-area-bg" class="<?php echo $sideWidgetClass . ' '. $sideWidgetOverlayOpacity; ?>"><?php if($sideWidgetClass == 'fullscreen-alt') echo '<div class="bg-inner"></div>';?></div>
	<div id="slide-out-widget-area" class="<?php echo $sideWidgetClass; ?>" data-back-txt="<?php echo __('Back', NECTAR_THEME_NAME); ?>">

		<?php if($sideWidgetClass == 'fullscreen' || $sideWidgetClass == 'fullscreen-alt') echo '<div class="inner-wrap">'; ?>

		<div class="inner">

		  <a class="slide_out_area_close" href="#"><span class="icon-salient-x icon-default-style"></span></a>


		   <?php  

		   if($userSetSideWidgetArea == 'off' || $prependTopNavMobile == '1' && $has_main_menu == 'true') { ?>
			   <div class="off-canvas-menu-container mobile-only">
			  		<ul class="menu">
					   <?php 
					  		////use default top nav menu if ocm is not activated
					  	     ////but is needed for mobile when the mobile fixed nav is on
					   		wp_nav_menu( array('theme_location' => 'top_nav', 'container' => '', 'items_wrap' => '%3$s')); 

					   		if($headerFormat == 'centered-menu' || $headerFormat == 'menu-left-aligned') {
					   			if(has_nav_menu('top_nav_pull_right')) {
									wp_nav_menu( array('walker' => new Nectar_Arrow_Walker_Nav_Menu, 'theme_location' => 'top_nav_pull_right', 'container' => '', 'items_wrap' => '%3$s' ) );  
								}
							}
					   ?>
		
					</ul>
				</div>
			<?php } 
		 
		  if(has_nav_menu('off_canvas_nav') && $userSetSideWidgetArea != 'off') { ?>
		 	 <div class="off-canvas-menu-container">
		  		<ul class="menu">
					    <?php wp_nav_menu( array('theme_location' => 'off_canvas_nav', 'container' => '', 'items_wrap' => '%3$s'));	

					  	?>	  
				</ul>
		    </div>
		    
		  <?php } 
		  
		   //widget area
		   if($sideWidgetClass != 'slide-out-from-right-hover') {
			   if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Off Canvas Menu') ) : elseif(!has_nav_menu('off_canvas_nav') && $userSetSideWidgetArea != 'off') : ?>	
			      <div class="widget">			
				 	 <h4 class="widgettitle">Side Widget Area</h4>
				 	 <p class="no-widget-added"><a href="<?php echo admin_url('widgets.php'); ?>">Click here to assign widgets to this area.</a></p>
			 	  </div>
			 <?php endif; 

			} ?>

		</div>

		<?php

			$usingSocialOrBottomText = (!empty($options['header-slide-out-widget-area-social']) && $options['header-slide-out-widget-area-social'] == '1' || !empty($options['header-slide-out-widget-area-bottom-text'])) ? true : false;
			
			echo '<div class="bottom-meta-wrap">';

			if($sideWidgetClass == 'slide-out-from-right-hover') {
			   if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Off Canvas Menu') ) : elseif(!has_nav_menu('off_canvas_nav') && $userSetSideWidgetArea != 'off') : ?>	
			      <div class="widget">			
				 	 <h4 class="widgettitle">Side Widget Area</h4>
				 	 <p class="no-widget-added"><a href="<?php echo admin_url('widgets.php'); ?>">Click here to assign widgets to this area.</a></p>
			 	  </div>
			 <?php endif; 

			} 

			global $using_secondary;
		 	/*social icons*/
			 if(!empty($options['header-slide-out-widget-area-social']) && $options['header-slide-out-widget-area-social'] == '1') {
			 	$social_link_arr = array('twitter-url','facebook-url','vimeo-url','pinterest-url','linkedin-url','youtube-url','tumblr-url','dribbble-url','rss-url','github-url','behance-url','google-plus-url','instagram-url','stackexchange-url','soundcloud-url','flickr-url','spotify-url','vk-url','vine-url');
			 	$social_icon_arr = array('fa fa-twitter','fa fa-facebook','fa fa-vimeo','fa fa-pinterest','fa fa-linkedin','fa fa-youtube','fa fa-tumblr','fa fa-dribbble','fa fa-rss','fa fa-github-alt','fa fa-be','fa fa-google-plus','fa fa-instagram','fa fa-stackexchange','fa fa-soundcloud','fa fa-flickr','icon-salient-spotify','fa fa-vk','fa-vine');
			 	
			 	echo '<ul class="off-canvas-social-links">';

			 	for($i=0; $i<sizeof($social_link_arr); $i++) {
			 		
			 		if(!empty($options[$social_link_arr[$i]]) && strlen($options[$social_link_arr[$i]]) > 1) echo '<li><a target="_blank" href="'.$options[$social_link_arr[$i]].'"><i class="'.$social_icon_arr[$i].'"></i></a></li>';
			 	}

			 	echo '</ul>';
			 } else if (!empty($options['enable_social_in_header']) && $options['enable_social_in_header'] == '1' && $using_secondary != 'header_with_secondary') {
			 	echo '<ul class="off-canvas-social-links mobile-only">';
				nectar_header_social_icons('off-canvas');
				echo '</ul>';
			 }

			 /*bottom text*/
			 if(!empty($options['header-slide-out-widget-area-bottom-text'])) {
			 	$desktop_social = (!empty($options['enable_social_in_header']) && $options['enable_social_in_header'] == '1') ? 'false' : 'true';
			 	echo '<p class="bottom-text" data-has-desktop-social="'. $desktop_social .'">'.$options['header-slide-out-widget-area-bottom-text'].'</p>';
			 }

			echo '</div><!--/bottom-meta-wrap-->';

			if($sideWidgetClass == 'fullscreen' || $sideWidgetClass == 'fullscreen-alt') echo '</div> <!--/inner-wrap-->'; ?>

	</div>
<?php } ?>


</div> <!--/ajax-content-wrap-->

<?php if(!empty($options['boxed_layout']) && $options['boxed_layout'] == '1') { echo '</div>'; } ?>

<?php if(!empty($options['back-to-top']) && $options['back-to-top'] == 1) { ?>
	<a id="to-top" class="<?php if(!empty($options['back-to-top-mobile']) && $options['back-to-top-mobile'] == 1) echo 'mobile-enabled'; ?>"><i class="fa fa-angle-up"></i></a>
<?php } 

$body_border = (!empty($options['body-border'])) ? $options['body-border'] : 'off';
if($body_border == '1') {
	echo '<div class="body-border-top"></div>
		<div class="body-border-right"></div>
		<div class="body-border-bottom"></div>
		<div class="body-border-left"></div>';
} 

wp_footer(); ?>	

</body>
</html>