<?php get_header(); ?>

<?php 

global $nectar_theme_skin, $options;

$bg = get_post_meta($post->ID, '_nectar_header_bg', true);
$bg_color = get_post_meta($post->ID, '_nectar_header_bg_color', true);
$fullscreen_header = (!empty($options['blog_header_type']) && $options['blog_header_type'] == 'fullscreen' && is_singular('post')) ? true : false;
$blog_header_type = (!empty($options['blog_header_type'])) ? $options['blog_header_type'] : 'default';
$fullscreen_class = ($fullscreen_header == true) ? "fullscreen-header full-width-content" : null;
$theme_skin = (!empty($options['theme-skin']) && $options['theme-skin'] == 'ascend') ? 'ascend' : 'default';
$hide_sidebar = (!empty($options['blog_hide_sidebar'])) ? $options['blog_hide_sidebar'] : '0'; 
$blog_type = $options['blog_type']; 
$blog_social_style = (!empty($options['blog_social_style'])) ? $options['blog_social_style'] : 'default';

if(have_posts()) : while(have_posts()) : the_post();

	nectar_page_header($post->ID); 

endwhile; endif;



 if($fullscreen_header == true) { 

	if(empty($bg) && empty($bg_color)) { ?>
		<div class="not-loaded default-blog-title fullscreen-header" id="page-header-bg" data-midnight="light" data-alignment="center" data-parallax="0" data-height="450" style="height: 450px;">
			<div class="container">	
				<div class="row">
					<div class="col span_6 section-title blog-title">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="author-section">
						 	<span class="meta-author">  
						 		<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), 100 ); }?>
						 	</span> 
							 <div class="avatar-post-info vcard author">
							 	<span class="fn"><?php the_author_posts_link(); ?></span>
							 	<span class="meta-date date updated"><i><?php echo get_the_date(); ?></i></span>
							 </div>
						</div>
					</div>
				</div>
			</div>
			<?php 
			 	 $button_styling = (!empty($options['button-styling'])) ? $options['button-styling'] : 'default'; 
			 	 if($button_styling == 'default'){
			 	 	echo '<div class="scroll-down-wrap"><a href="#" class="section-down-arrow"><i class="icon-salient-down-arrow icon-default-style"> </i></a></div>';
			 	 } else if($button_styling == 'slightly_rounded' || $button_styling == 'slightly_rounded_shadow') {
			 	 	echo '<div class="scroll-down-wrap no-border"><a href="#" class="section-down-arrow"><svg class="nectar-scroll-icon" viewBox="0 0 30 45" enable-background="new 0 0 30 45">
                			<path class="nectar-scroll-icon-path" fill="none" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10" d="M15,1.118c12.352,0,13.967,12.88,13.967,12.88v18.76  c0,0-1.514,11.204-13.967,11.204S0.931,32.966,0.931,32.966V14.05C0.931,14.05,2.648,1.118,15,1.118z"></path>
            			  </svg></a></div>';
			 	 } else {
			 	 	echo '<div class="scroll-down-wrap"><a href="#" class="section-down-arrow"><i class="fa fa-angle-down top"></i><i class="fa fa-angle-down"></i></a></div>';
			 	 }
			?>
		</div>
	<?php } 


	if($theme_skin != 'ascend') { ?>
		<div class="container">
			<div id="single-below-header" class="<?php echo $fullscreen_class; ?> custom-skip">
				<?php if($blog_social_style != 'fixed_bottom_right') { ?>
					<span class="meta-share-count"><i class="icon-default-style steadysets-icon-share"></i> <?php echo '<a href=""><span class="share-count-total">0</span> <span class="plural">'. __('Shares',NECTAR_THEME_NAME) . '</span> <span class="singular">'. __('Share',NECTAR_THEME_NAME) .'</span> </a>'; nectar_blog_social_sharing(); ?> </span>
				<?php } else { ?>
					<span class="meta-love"><span class="n-shortcode"> <?php echo nectar_love('return'); ?>  </span></span>
				<?php } ?>
				<span class="meta-category"><i class="icon-default-style steadysets-icon-book2"></i> <?php the_category(', '); ?></span>
				<span class="meta-comment-count"><i class="icon-default-style steadysets-icon-chat-3"></i> <a href="<?php comments_link(); ?>"><?php comments_number( __('No Comments', NECTAR_THEME_NAME), __('One Comment ', NECTAR_THEME_NAME), __('% Comments', NECTAR_THEME_NAME) ); ?></a></span>
			</div><!--/single-below-header-->
		</div>

	<?php }

 } ?>





<div class="container-wrap <?php echo ($fullscreen_header == true) ? 'fullscreen-blog-header': null; ?> <?php if($blog_type == 'std-blog-fullwidth' || $hide_sidebar == '1') echo 'no-sidebar'; ?>">

	<div class="container main-content">
		
		<?php if(get_post_format() != 'quote' && get_post_format() != 'status' && get_post_format() != 'aside') { ?>
			
			<?php if(have_posts()) : while(have_posts()) : the_post();
			
			    if((empty($bg) && empty($bg_color)) && $fullscreen_header != true) { ?>

					<div class="row heading-title" data-header-style="<?php echo $blog_header_type; ?>">
						<div class="col span_12 section-title blog-title">
							<?php if($blog_header_type == 'default_minimal') { ?> 
							<span class="meta-category">

									<?php $categories = get_the_category();
											if ( ! empty( $categories ) ) {
												$output = null;
											    foreach( $categories as $category ) {
											        $output .= '<a class="'.$category->slug.'" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', NECTAR_THEME_NAME), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>';
											    }
											    echo trim( $output);
											} ?>
									</span> 

							</span> <?php } ?>
							<h1 class="entry-title"><?php the_title(); ?></h1>
							
							<div id="single-below-header">
								<span class="meta-author vcard author"><span class="fn"><?php echo __('By', NECTAR_THEME_NAME); ?> <?php the_author_posts_link(); ?></span></span><!--
  								--><span class="meta-date date updated"><?php echo get_the_date(); ?></span><!--
								--><?php if($blog_header_type != 'default_minimal') { ?><span class="meta-category"><?php the_category(', '); ?></span> <?php } else { ?><!--
									--><span class="meta-comment-count"><a href="<?php comments_link(); ?>"> <?php comments_number( __('No Comments', NECTAR_THEME_NAME), __('One Comment ', NECTAR_THEME_NAME), __('% Comments', NECTAR_THEME_NAME) ); ?></a></span>
								<?php } ?>
							</ul><!--project-additional-->
							</div><!--/single-below-header-->
							
							<?php if($blog_header_type != 'default_minimal') { ?>
								<div id="single-meta" data-sharing="<?php echo ( !empty($options['blog_social']) && $options['blog_social'] == 1 ) ? '1' : '0'; ?>">
									<ul>
										
										<li class="meta-comment-count">
											<a href="<?php comments_link(); ?>"><i class="icon-default-style steadysets-icon-chat"></i> <?php comments_number( __('No Comments', NECTAR_THEME_NAME), __('One Comment ', NECTAR_THEME_NAME), __('% Comments', NECTAR_THEME_NAME) ); ?></a>
										</li>
										
									 	<li>
									   		<?php echo '<span class="n-shortcode">'.nectar_love('return').'</span>'; ?>
									   	</li>

										<?php if( !empty($options['blog_social']) && $options['blog_social'] == 1 &&  $blog_social_style != 'fixed_bottom_right') { 
											   
											    echo '<li class="meta-share-count"><a href="#"><i class="icon-default-style steadysets-icon-share"></i><span class="share-count-total">0</span></a> <div class="nectar-social">';
											   
											
												//facebook
												if(!empty($options['blog-facebook-sharing']) && $options['blog-facebook-sharing'] == 1) { 
													echo "<a class='facebook-share nectar-sharing' href='#' title='".__('Share this', NECTAR_THEME_NAME)."'> <i class='fa fa-facebook'></i> <span class='count'></span></a>";
												}
												//twitter
												if(!empty($options['blog-twitter-sharing']) && $options['blog-twitter-sharing'] == 1) {
													echo "<a class='twitter-share nectar-sharing' href='#' title='".__('Tweet this', NECTAR_THEME_NAME)."'> <i class='fa fa-twitter'></i> <span class='count'></span></a>";
												}
												//google plus
												if(!empty($options['blog-google-plus-sharing']) && $options['blog-google-plus-sharing'] == 1) {
													echo "<a class='google-plus-share nectar-sharing-alt' href='#' title='".__('Share this', NECTAR_THEME_NAME)."'> <i class='fa fa-google-plus'></i> <span class='count'>0</span></a>";
												}
												
												//linkedIn
												if(!empty($options['blog-linkedin-sharing']) && $options['blog-linkedin-sharing'] == 1) {
													echo "<a class='linkedin-share nectar-sharing' href='#' title='".__('Share this', NECTAR_THEME_NAME)."'> <i class='fa fa-linkedin'></i> <span class='count'> </span></a>";
												}
												//pinterest
												if(!empty($options['blog-pinterest-sharing']) && $options['blog-pinterest-sharing'] == 1) {
													echo "<a class='pinterest-share nectar-sharing' href='#' title='".__('Pin this', NECTAR_THEME_NAME)."'> <i class='fa fa-pinterest'></i> <span class='count'></span></a>";
												}
												
											  echo '</div></li>';
			
									 		}
										?>

										
			
									</ul>
									
									
								</div><!--/single-meta-->

								<?php } ?>
						</div><!--/section-title-->
					</div><!--/row-->
				
			<?php }
			
			endwhile; endif; ?>
			
		<?php } ?>
			
		<div class="row">
			
			<?php 

			if ( function_exists( 'yoast_breadcrumb' ) ){ yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } 

			$options = get_nectar_theme_options(); 

			global $options;

			$blog_standard_type = (!empty($options['blog_standard_type'])) ? $options['blog_standard_type'] : 'classic';

			if($blog_standard_type == 'minimal')
				$std_minimal_class = 'standard-minimal';
			else
				$std_minimal_class = '';

			if($blog_type == 'std-blog-fullwidth' || $hide_sidebar == '1'){
				echo '<div id="post-area" class="col '.$std_minimal_class.' span_12 col_last">';
			} else {
				echo '<div id="post-area" class="col '.$std_minimal_class.' span_9">';
			}
			
				 if(have_posts()) : while(have_posts()) : the_post(); 
					
		
					if ( floatval(get_bloginfo('version')) < "3.6" ) {
						//old post formats before they got built into the core
						 get_template_part( 'includes/post-templates-pre-3-6/entry', get_post_format() ); 
					} else {
						//WP 3.6+ post formats
						 get_template_part( 'includes/post-templates/entry', get_post_format() ); 
					} 
	
				 endwhile; endif; 
				
				 wp_link_pages(); 
					

				    global $options; 

				    if($theme_skin != 'ascend') {
						if( !empty($options['author_bio']) && $options['author_bio'] == true){ 
							$grav_size = 80;
							$fw_class = null; 
						?>
							
							<div id="author-bio" class="<?php echo $fw_class; ?>">
								<div class="span_12">
									<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), $grav_size, null, get_the_author() ); }?>
									<div id="author-info">
										<h3><span><?php if(!empty($options['theme-skin']) && $options['theme-skin'] == 'ascend') { _e('Author', NECTAR_THEME_NAME); } else { _e('About', NECTAR_THEME_NAME); } ?></span> <?php the_author(); ?></h3>
										<p><?php the_author_meta('description'); ?></p>
									</div>
									<?php if(!empty($options['theme-skin']) && $options['theme-skin'] == 'ascend'){ echo '<a href="'. get_author_posts_url(get_the_author_meta( 'ID' )).'" data-hover-text-color-override="#fff" data-hover-color-override="false" data-color-override="#000000" class="nectar-button see-through-2 large"> '. __("More posts by",NECTAR_THEME_NAME) . ' ' .get_the_author().' </a>'; } ?>
									<div class="clear"></div>
								</div>
							</div>
							
					<?php } ?>

					<div class="comments-section">
						   <?php comments_template(); ?>
					 </div>   


				<?php } ?>

				<?php if($blog_header_type == 'default_minimal' && $blog_social_style != 'fixed_bottom_right')  { ?>
				
					<div class="bottom-meta">	
						<?php
							echo '<div class="sharing-default-minimal">'; 
								nectar_blog_social_sharing();
							echo '</div>'; ?>
					</div>
				<?php } ?>


			</div><!--/span_9-->
			
			<?php if($blog_type != 'std-blog-fullwidth' && $hide_sidebar != '1') { ?>
				
				<div id="sidebar" class="col span_3 col_last">
					<?php get_sidebar(); ?>
				</div><!--/sidebar-->
				

			<?php } ?>
			
			
		</div><!--/row-->

		

		<!--ascend only author/comment positioning-->
		<div class="row">

			<?php if($theme_skin == 'ascend' && $fullscreen_header == true) { ?>

			<div id="single-below-header" class="<?php echo $fullscreen_class; ?> custom-skip">
				<?php if($blog_social_style != 'fixed_bottom_right') { ?>
					<span class="meta-share-count"><i class="icon-default-style steadysets-icon-share"></i> <?php echo '<a href=""><span class="share-count-total">0</span> <span class="plural">'. __('Shares',NECTAR_THEME_NAME) . '</span> <span class="singular">'. __('Share',NECTAR_THEME_NAME) .'</span> </a>'; nectar_blog_social_sharing(); ?> </span>
				<?php } else { ?>
					<span class="meta-love"><span class="n-shortcode"> <?php echo nectar_love('return'); ?>  </span></span>
				<?php } ?>
				<span class="meta-category"><i class="icon-default-style steadysets-icon-book2"></i> <?php the_category(', '); ?></span>
				<span class="meta-comment-count"><i class="icon-default-style steadysets-icon-chat-3"></i> <a class="comments-link" href="<?php comments_link(); ?>"><?php comments_number( __('No Comments', NECTAR_THEME_NAME), __('One Comment ', NECTAR_THEME_NAME), __('% Comments', NECTAR_THEME_NAME) ); ?></a></span>
			</div><!--/single-below-header-->

			<?php }

			if($theme_skin == 'ascend') nectar_next_post_display(); ?>

			<?php if( !empty($options['author_bio']) && $options['author_bio'] == true && $theme_skin == 'ascend'){ 
						$grav_size = 80;
						$fw_class = 'full-width-section '; 
						$next_post = get_previous_post();
						$next_post_button = (!empty($options['blog_next_post_link']) && $options['blog_next_post_link'] == '1') ? 'on' : 'off';
					?>
						
						<div id="author-bio" class="<?php echo $fw_class; if(empty($next_post) || $next_post_button == 'off' || $fullscreen_header == false && $next_post_button == 'off') echo 'no-pagination'; ?>">
							<div class="span_12">
								<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), $grav_size,  null, get_the_author() ); }?>
								<div id="author-info">
									<h3><span><?php if(!empty($options['theme-skin']) && $options['theme-skin'] == 'ascend') {  echo '<i>' . __('Author', NECTAR_THEME_NAME) . '</i>'; } else { _e('About', NECTAR_THEME_NAME); } ?></span> <?php the_author(); ?></h3>
									<p><?php the_author_meta('description'); ?></p>
								</div>
								<?php if(!empty($options['theme-skin']) && $options['theme-skin'] == 'ascend'){ echo '<a href="'. get_author_posts_url(get_the_author_meta( 'ID' )).'" data-hover-text-color-override="#fff" data-hover-color-override="false" data-color-override="#000000" class="nectar-button see-through-2 large">' . __("More posts by",NECTAR_THEME_NAME) . ' ' . get_the_author().' </a>'; } ?>
								<div class="clear"></div>
							</div>
						</div>
 
			 <?php } ?>


			  <?php if($theme_skin == 'ascend') { ?>

			 	 <div class="comments-section" data-author-bio="<?php if(!empty($options['author_bio']) && $options['author_bio'] == true) { echo 'true'; } else { echo 'false'; } ?>">
					   <?php comments_template(); ?>
				 </div>   

			 <?php } ?>

		</div>


	   <?php if($theme_skin != 'ascend') nectar_next_post_display(); ?>
		
	</div><!--/container-->

</div><!--/container-wrap-->



<?php if($blog_social_style == 'fixed_bottom_right') { ?>
	<div class="nectar-social-sharing-fixed"> 

		<?php
			// portfolio social sharting icons
			if( !empty($options['blog_social']) && $options['blog_social'] == 1) {
				
				echo '<a href="#"><i class="icon-default-style steadysets-icon-share"></i></a> <div class="nectar-social">';
				
				
				//facebook
				if(!empty($options['blog-facebook-sharing']) && $options['blog-facebook-sharing'] == 1) { 
					echo "<a class='facebook-share nectar-sharing' href='#' title='".__('Share this', NECTAR_THEME_NAME)."'> <i class='fa fa-facebook'></i> </a>";
				}
				//twitter
				if(!empty($options['blog-twitter-sharing']) && $options['blog-twitter-sharing'] == 1) {
					echo "<a class='twitter-share nectar-sharing' href='#' title='".__('Tweet this', NECTAR_THEME_NAME)."'> <i class='fa fa-twitter'></i> </a>";
				}
				//google plus
				if(!empty($options['blog-google-plus-sharing']) && $options['blog-google-plus-sharing'] == 1) {
					echo "<a class='google-plus-share nectar-sharing-alt' href='#' title='".__('Share this', NECTAR_THEME_NAME)."'> <i class='fa fa-google-plus'></i> </a>";
				}
				
				//linkedIn
				if(!empty($options['blog-linkedin-sharing']) && $options['blog-linkedin-sharing'] == 1) {
					echo "<a class='linkedin-share nectar-sharing' href='#' title='".__('Share this', NECTAR_THEME_NAME)."'> <i class='fa fa-linkedin'></i> </a>";
				}
				//pinterest
				if(!empty($options['blog-pinterest-sharing']) && $options['blog-pinterest-sharing'] == 1) {
					echo "<a class='pinterest-share nectar-sharing' href='#' title='".__('Pin this', NECTAR_THEME_NAME)."'> <i class='fa fa-pinterest'></i> </a>";
				}
				
				echo '</div>';

			}	
			?>
		</div><!--nectar social sharing fixed-->

	<?php } ?>
	
<?php get_footer(); ?>