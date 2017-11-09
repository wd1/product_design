<?php 
$options = get_nectar_theme_options(); 
global $post;

$masonry_size_pm = get_post_meta($post->ID, '_post_item_masonry_sizing', true); 
$masonry_item_sizing = (!empty($masonry_size_pm)) ? $masonry_size_pm : 'regular';
$using_masonry = null;
$masonry_type = (!empty($options['blog_masonry_type'])) ? $options['blog_masonry_type'] : 'classic';
$blog_type = $options['blog_type']; 
$blog_standard_type = (!empty($options['blog_standard_type'])) ? $options['blog_standard_type'] : 'classic';

global $layout; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class($masonry_item_sizing); ?>>

	<div class="inner-wrap animated">

		<div class="post-content">
			
			<?php if( !is_single() ) { ?>
				
				<?php
				 
				$extra_class = '';
				if (!has_post_thumbnail()) $extra_class = 'no-img'; 
				?>
				
				<div class="post-meta <?php echo $extra_class; ?>">
					
					<?php
					$use_excerpt = (!empty($options['blog_auto_excerpt']) && $options['blog_auto_excerpt'] == '1') ? 'true' : 'false'; 
					?>
					
					<div class="date">
						<?php 
						if(
						$blog_type == 'masonry-blog-sidebar' && substr( $layout, 0, 3 ) != 'std' || 
						$blog_type == 'masonry-blog-fullwidth' && substr( $layout, 0, 3 ) != 'std' || 
						$blog_type == 'masonry-blog-full-screen-width' && substr( $layout, 0, 3 ) != 'std' || 
						$layout == 'masonry-blog-sidebar' || $layout == 'masonry-blog-fullwidth' || $layout == 'masonry-blog-full-screen-width') {
							$using_masonry = true;
							if($masonry_type != 'classic_enhanced') echo get_the_date();
						}
						else { 

							if($blog_standard_type != 'minimal') { ?>
						
								<span class="month"><?php the_time('M'); ?></span>
								<span class="day"><?php the_time('d'); ?></span>
								<?php global $options; 
								if(!empty($options['display_full_date']) && $options['display_full_date'] == 1) {
									echo '<span class="year">'. get_the_time('Y') .'</span>';
								}
							} else {
								echo '<a href="' . get_permalink() . '">' . get_the_date() . '</a>';
							}
						} ?>
					</div><!--/date-->
					
					<?php if(($masonry_type == 'classic_enhanced' && $using_masonry == true)) { ?> 
						<span class="meta-author"> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"> <i class="icon-default-style icon-salient-m-user"></i> <?php the_author(); ?></a> </span> 
						<?php if(comments_open()) { ?>
							<span class="meta-comment-count">  <a href="<?php comments_link(); ?>">
								<i class="icon-default-style steadysets-icon-chat-3"></i> <?php comments_number( '0', '1','%' ); ?></a>
							</span>
						<?php } ?>

					<?php } ?>

					<?php if($using_masonry == true && $masonry_type == 'meta_overlaid') { } else { 

						if(!($using_masonry != true && $blog_standard_type == 'minimal')) { ?> 
						<div class="nectar-love-wrap">
							<?php if( function_exists('nectar_love') ) nectar_love(); ?>
						</div><!--/nectar-love-wrap-->	
					<?php } } ?>

				</div><!--/post-meta-->
				
			<?php } 

			$meta_overlaid_style = ($using_masonry == true && $masonry_type == 'meta_overlaid') ? true : false; ?>
			
			<?php 
				$img_size = ($blog_type == 'masonry-blog-sidebar' && substr( $layout, 0, 3 ) != 'std' || $blog_type == 'masonry-blog-fullwidth' && substr( $layout, 0, 3 ) != 'std' || $blog_type == 'masonry-blog-full-screen-width' && substr( $layout, 0, 3 ) != 'std' || $layout == 'masonry-blog-sidebar' || $layout == 'masonry-blog-fullwidth' || $layout == 'masonry-blog-full-screen-width') ? 'large' : 'full';
			 	if($using_masonry == true && $masonry_type == 'meta_overlaid') {
			 		$img_size = (!empty($masonry_item_sizing)) ? $masonry_item_sizing : 'portfolio-thumb';
			 	}
			 	if($using_masonry == true && $masonry_type == 'classic_enhanced') { 
			 		$img_size = (!empty($masonry_item_sizing) && $masonry_item_sizing == 'regular') ? 'portfolio-thumb' : 'full';


			 		if($img_size == 'regular') {
			 			$image_attrs =  array('title' => '', 'sizes' => '(min-width: 1600px) 20vw, (min-width: 1300px) 25vw, (min-width: 1000px) 33vw, (min-width: 690px) 100vw, 100vw');
			 		} else if($img_size == 'wide_tall') {
			 			$image_attrs =  array('title' => '', 'sizes' => '(min-width: 1600px) 25vw, (min-width: 1300px) 40vw, (min-width: 1000px) 50vw, (min-width: 690px) 50vw, 100vw');
			 		} else if($img_size == 'large_featured') {
			 			$image_attrs =  array('title' => '', 'sizes' => '(min-width: 690px) 100vw, 100vw');
			 		} else {
			 			$image_attrs =  array('title' => '', 'sizes' => '(min-width: 1600px) 20vw, (min-width: 1300px) 25vw, (min-width: 1000px) 33.3vw, (min-width: 690px) 50vw, 100vw');
			 		}
				 		
				 	 
			 	}

				if($using_masonry == true && $masonry_type == 'classic_enhanced') echo'<a href="' . get_permalink() . '" class="img-link"><span class="post-featured-img">'.get_the_post_thumbnail($post->ID, $img_size, $image_attrs) .'</span></a>'; 
			?>


			<?php 
			//minimal std
			if($using_masonry != true && $blog_standard_type == 'minimal') { ?>

				<?php if( !is_single() ) { ?>
					 
					<div class="post-author">
						<?php if (function_exists('get_avatar')) { echo '<div class="grav-wrap"><a href="'.get_author_posts_url($post->post_author).'">'.get_avatar( get_the_author_meta('email'), 90,  null, get_the_author() ).'</a></div>'; } ?>
						<span class="meta-author"> <?php the_author_posts_link(); ?></span>
						
					   <?php
					  echo '<span class="meta-category">';
					  
						$categories = get_the_category();
						if ( ! empty( $categories ) ) {

							echo '<span class="in">'. __('In', NECTAR_THEME_NAME) . ' </span>';

							$output = null;
							$cat_count = 0;
						    foreach( $categories as $category ) {
						        $output .= '<a class="'.$category->slug.'" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
						    	if(count($categories) > 1 && ($cat_count + 1) < count($categories)) $output .= ', ';
						    	$cat_count++;
						    }
						    echo trim( $output);
						}
				      echo '</span>'; ?>
					</div>
				<?php } ?>

				<div class="content-inner">

					<?php if ( has_post_thumbnail() ) {

						 global $options;
						 $hide_featrued_image = (!empty($options['blog_hide_featured_image'])) ? $options['blog_hide_featured_image'] : '0'; 
						 if(is_single() && $hide_featrued_image != '1'){
						 	echo '<span class="post-featured-img">'.get_the_post_thumbnail($post->ID, 'full', array('title' => '')) .'</span>';
						 }	

						} ?>
						 
						 <?php if( !is_single() ) { ?> 

							 <div class="article-content-wrap">

								<div class="post-header">
									<?php $h_num = '2'; ?>
		
									<h<?php echo $h_num; ?> class="title">
										<?php if( !is_single() && !($using_masonry == true && $masonry_type == 'classic_enhanced') ) { ?> 
											<a href="<?php the_permalink(); ?>"><?php } ?>
												<?php the_title(); ?>
											<?php if( !is_single() && !($using_masonry == true && $masonry_type == 'classic_enhanced') ) {?> </a> 
										<?php } ?>
									</h<?php echo $h_num; ?>>

									
								</div><!--/post-header-->


								<?php if ( has_post_thumbnail() ) {
			 				
					 				 if( !is_single() ) {

					 				 	echo'<a href="' . get_permalink() . '"><span class="post-featured-img">'.get_the_post_thumbnail($post->ID, $img_size, array('title' => '')) .'</span></a>'; 
					 				 } 

					 			} 

								//if no excerpt is set
								global $post;

								if(empty( $post->post_excerpt ) && $use_excerpt != 'true') {
									the_content('<span class="continue-reading">'. __("Continue Reading", NECTAR_THEME_NAME) . '</span>'); 
								}
								
								//excerpt
								else {
									echo '<div class="excerpt">';
									$excerpt_length = (!empty($options['blog_excerpt_length'])) ? intval($options['blog_excerpt_length']) : 15; 

									the_excerpt();

									echo '</div>';
									echo '<a class="more-link" href="' . get_permalink() . '"><span class="continue-reading">'. __("Continue Reading", NECTAR_THEME_NAME) .'</span></a>';
								}

								?>

								 

							</div><!--article-content-wrap-->

						<?php } //not single ?> 

						<?php 
						if(is_single()){
							//on the single post page display the content
							the_content('<span class="continue-reading">'. __("Read More", NECTAR_THEME_NAME) . '</span>'); 
						} ?>
						
						<?php global $options;
							if( $options['display_tags'] == true ){
								 
								if( is_single() && has_tag() ) {
								
									echo '<div class="post-tags"><h4>'.__('Tags:').'</h4>'; 
									the_tags('','','');
									echo '<div class="clear"></div></div> ';
									
								}
							}
						?>

				</div><!--/content-inner-->


			<?php }

			//other styles
			else { ?>

				<div class="content-inner">
					
					<?php if( !is_single() && ($using_masonry == true && $masonry_type == 'classic_enhanced') ) { ?> <a class="entire-meta-link" href="<?php the_permalink(); ?>"></a><?php } 

					if ( has_post_thumbnail() ) {
		 				
		 				 if( !is_single() ) {

		 				 	if($using_masonry == true && $masonry_type == 'meta_overlaid') {
		 				 		if($img_size == 'regular') {
		 				 			$image_attrs =  array('title' => '', 'sizes' => '(min-width: 1000px) 25vw, (min-width: 690px) 100vw, 100vw');
		 				 		} else if($img_size == 'wide_tall') {
		 				 			$image_attrs =  array('title' => '', 'sizes' => '(min-width: 1000px) 50vw, (min-width: 690px) 100vw, 100vw');
		 				 		} else if($img_size == 'large_featured') {
		 				 			$image_attrs =  array('title' => '', 'sizes' => '(min-width: 690px) 100vw, 100vw');
		 				 		} else {
		 				 			$image_attrs =  array('title' => '', 'sizes' => '(min-width: 1600px) 20vw, (min-width: 1300px) 25vw, (min-width: 1000px) 33.3vw, (min-width: 690px) 50vw, 100vw');
		 				 		}
						 		
						 	} else if($using_masonry == true && $masonry_type == 'classic') {
						 		$image_attrs =  array('title' => '', 'sizes' => '(min-width: 1600px) 20vw, (min-width: 1300px) 25vw, (min-width: 1000px) 33.3vw, (min-width: 690px) 50vw, 100vw');
						 	} else {
						 		$image_attrs =  array('title' => '');
						 	}

		 				 	if(!($using_masonry == true && $masonry_type == 'classic_enhanced')) echo'<a href="' . get_permalink() . '"><span class="post-featured-img">'.get_the_post_thumbnail($post->ID, $img_size, $image_attrs) .'</span></a>'; 
		 				 }

						 global $options;
						 $hide_featrued_image = (!empty($options['blog_hide_featured_image'])) ? $options['blog_hide_featured_image'] : '0'; 
						 if(is_single() && $hide_featrued_image != '1'){
						 	echo '<span class="post-featured-img">'.get_the_post_thumbnail($post->ID, 'full', array('title' => '')) .'</span>';
						 }	
						  
					} elseif($meta_overlaid_style == true) {

						//no image added
						$img_size = (!empty($masonry_item_sizing)) ? $masonry_item_sizing : 'portfolio-thumb';
						switch($img_size) {
							case 'large_featured':
								$no_image_size = 'no-blog-item-large-featured.jpg';
								break;
							case 'wide_tall':
								$no_image_size = 'no-portfolio-item-tiny.jpg';
								break;
							default:
								$no_image_size = 'no-portfolio-item-tiny.jpg';
								break;
						}
						 echo '<a href="' . get_permalink() . '"><span class="post-featured-img"><img src="'.get_template_directory_uri().'/img/'.$no_image_size.'" alt="no image added yet." /></span></a>';
				
					} ?>
					
					<?php if( !is_single() ) { ?>

						<?php if($using_masonry == true && $masonry_type == 'classic_enhanced') {
							echo '<span class="meta-category">';
							$categories = get_the_category();
							if ( ! empty( $categories ) ) {
								$output = null;
							    foreach( $categories as $category ) {
							        $output .= '<a class="'.$category->slug.'" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
							    }
							    echo trim( $output);
							}
						echo '</span>'; } ?>

						<div class="article-content-wrap">

							<div class="post-header">
								<?php 
								$h_num = '2';
								if($using_masonry == true && $masonry_type == 'classic_enhanced') {
									echo get_the_date(); 
									$h_num = '3';
								} ?>	
								<h<?php echo $h_num; ?> class="title">
									<?php if( !is_single() && !($using_masonry == true && $masonry_type == 'classic_enhanced') ) { ?> 
										<a href="<?php the_permalink(); ?>"><?php } ?>
											<?php the_title(); ?>
										<?php if( !is_single() && !($using_masonry == true && $masonry_type == 'classic_enhanced') ) {?> </a> 
									<?php } ?>
								</h<?php echo $h_num; ?>>

								<?php if(!($masonry_type == 'classic_enhanced' && $using_masonry == true)) { ?> 
									<span class="meta-author"><span><?php echo __('By', NECTAR_THEME_NAME); ?></span> <?php the_author_posts_link(); ?></span> <span class="meta-category">| <?php the_category(', '); ?></span> 
								
									<?php if(comments_open()) { ?>
										<span class="meta-comment-count">| <a href="<?php comments_link(); ?>">
											<?php comments_number( __('No Comments', NECTAR_THEME_NAME), __('One Comment ', NECTAR_THEME_NAME), __('% Comments', NECTAR_THEME_NAME) ); ?></a>
										</span>
									<?php } ?>

								<?php } ?>
							</div><!--/post-header-->
						<?php 
							

							if($meta_overlaid_style == false) {
								//if no excerpt is set
								global $post;
								if(empty( $post->post_excerpt ) && $use_excerpt != 'true' && !($using_masonry == true && $masonry_type == 'classic_enhanced')) {
									the_content('<span class="continue-reading">'. __("Read More", NECTAR_THEME_NAME) . '</span>'); 
								}
								
								//excerpt
								else {
									echo '<div class="excerpt">';
									$excerpt_length = (!empty($options['blog_excerpt_length'])) ? intval($options['blog_excerpt_length']) : 15; 

									if($using_masonry == true && $masonry_type == 'classic_enhanced') {

										if($masonry_item_sizing == 'wide_tall' && !empty( $post->post_excerpt )) {

											echo the_excerpt();

										} else if($masonry_item_sizing == 'large_featured') {

											echo nectar_excerpt($excerpt_length*2);
										} else {
											echo nectar_excerpt($excerpt_length);
										}

									} else {
										the_excerpt();
									}
									
										
									echo '</div>';
									echo '<a class="more-link" href="' . get_permalink() . '"><span class="continue-reading">'. __("Read More", NECTAR_THEME_NAME) .'</span></a>';
								}
							}
							
							?>
							
						</div><!--article-content-wrap-->

					<?php } ?>
					
				   
					<?php 
					if(is_single()){
						//on the single post page display the content
						the_content('<span class="continue-reading">'. __("Read More", NECTAR_THEME_NAME) . '</span>'); 
					} ?>
					
					<?php global $options;
						if( $options['display_tags'] == true ){
							 
							if( is_single() && has_tag() ) {
							
								echo '<div class="post-tags"><h4>'.__('Tags:').'</h4>'; 
								the_tags('','','');
								echo '<div class="clear"></div></div> ';
								
							}
						}
					?>
						
				</div><!--/content-inner-->

			<?php } // other styles ?>
			
		</div><!--/post-content-->

	</div><!--/inner-wrap-->
		
</article><!--/article-->