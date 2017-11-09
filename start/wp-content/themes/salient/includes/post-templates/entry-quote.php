<?php 
$options = get_nectar_theme_options(); 
global $post;

$masonry_size_pm = get_post_meta($post->ID, '_post_item_masonry_sizing', true); 
$masonry_item_sizing = (!empty($masonry_size_pm)) ? $masonry_size_pm : 'regular'; 
$using_masonry = null;
$masonry_type = (!empty($options['blog_masonry_type'])) ? $options['blog_masonry_type'] : 'classic'; 
global $layout;
$blog_type = $options['blog_type']; 
$blog_standard_type = (!empty($options['blog_standard_type'])) ? $options['blog_standard_type'] : 'classic';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($masonry_item_sizing.' quote'); ?>>
	
	<div class="inner-wrap animated">

		<div class="post-content">
			
			<?php if( !is_single() ) { ?>
				
				<div class="post-meta">
		
					<div class="date">
						<?php 
						if(
						$blog_type == 'masonry-blog-sidebar' && substr( $layout, 0, 3 ) != 'std' || 
						$blog_type == 'masonry-blog-fullwidth' && substr( $layout, 0, 3 ) != 'std' || 
						$blog_type == 'masonry-blog-full-screen-width' && substr( $layout, 0, 3 ) != 'std' || 
						$layout == 'masonry-blog-sidebar' || $layout == 'masonry-blog-fullwidth' || $layout == 'masonry-blog-full-screen-width') {
							$using_masonry = true;
							echo get_the_date();
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
					
					<?php if($using_masonry == true && $masonry_type == 'meta_overlaid') { } else { 

						if(!($using_masonry != true && $blog_standard_type == 'minimal')) { ?> 
						<div class="nectar-love-wrap">
							<?php if( function_exists('nectar_love') ) nectar_love(); ?>
						</div><!--/nectar-love-wrap-->	
					<?php } } ?>
								
				</div><!--/post-meta-->
			
			<?php } ?>
			
			<?php 
				$img_size = ($blog_type == 'masonry-blog-sidebar' && substr( $layout, 0, 3 ) != 'std' || $blog_type == 'masonry-blog-fullwidth' && substr( $layout, 0, 3 ) != 'std' || $blog_type == 'masonry-blog-full-screen-width' && substr( $layout, 0, 3 ) != 'std' || $layout == 'masonry-blog-sidebar' || $layout == 'masonry-blog-fullwidth' || $layout == 'masonry-blog-full-screen-width') ? 'large' : 'full';
			 	if($using_masonry == true && $masonry_type == 'meta_overlaid') $img_size = (!empty($masonry_item_sizing)) ? $masonry_item_sizing : 'portfolio-thumb';
			 	if($using_masonry == true && $masonry_type == 'classic_enhanced') $img_size = (!empty($masonry_item_sizing) && $masonry_item_sizing == 'regular') ? 'portfolio-thumb' : 'full';
				
				if($using_masonry == true && $masonry_type == 'classic_enhanced' && $masonry_item_sizing != 'regular') echo'<a href="' . get_permalink() . '" class="img-link"><span class="post-featured-img">'.get_the_post_thumbnail($post->ID, $img_size, array('title' => '')) .'</span></a>'; 
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
				
				<?php } ?>

				<div class="content-inner">

				<?php 
				$quote = get_post_meta($post->ID, '_nectar_quote', true);
				$quote_author = get_post_meta($post->ID, '_nectar_quote_author', true); 
				?>

				<?php if( !is_single() ) { ?> <a href="<?php the_permalink(); ?>"><?php } ?> 

				
				<?php if ( has_post_thumbnail() ) {
					$quote_bg_img_src = wp_get_attachment_url(get_post_thumbnail_id());
					$quote_bg = 'style=" background-image: url('.$quote_bg_img_src.'); "';
				} else {
					$quote_bg = null;
				} ?>

				<div class="quote-inner" <?php echo $quote_bg;?>>
					
						<span class="quote-wrap">
								
								<h4 class="title">
									<?php echo $quote; ?>
								</h4>
							
							
					    	<span class="author"> 
					    		<?php 

					    			if(!empty($quote_author)) 
					    				echo $quote_author; 
					    			else 
					    			    the_title(); 
					    		?>
					    	</span> 
					    </span>
			    	<span title="Quote" class="icon"></span>

			    
			    	
				</div><!--/quote-inner-->

				<?php if( !is_single() ) { ?> </a> 

					<?php
					global $post;
					$use_excerpt = (!empty($options['blog_auto_excerpt']) && $options['blog_auto_excerpt'] == '1') ? 'true' : 'false'; 

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
					} ?>

				<?php } ?>

				<?php 
				$below_content = get_the_content();
				if(is_single() && !empty( $below_content )){ ?>
					<div class="quote-below-content">	
						<?php the_content('<span class="continue-reading">'. __("Read More", NECTAR_THEME_NAME) . '</span>'); ?>
					</div>
				<?php } ?>
				
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

				<?php 
				$quote = get_post_meta($post->ID, '_nectar_quote', true);
				$quote_author = get_post_meta($post->ID, '_nectar_quote_author', true); 
				?>

				<?php if( !is_single() ) { ?> <a href="<?php the_permalink(); ?>"><?php } ?> 

				<div class="quote-inner">
					
					
						<span class="quote-wrap">
								
								<?php 
									$h_num = '2';
									if($using_masonry == true && $masonry_type == 'classic_enhanced') {
										$h_num = '3';
									} 	
								?>
								<h<?php echo $h_num; ?> class="title">
									<?php echo $quote; ?>
								</h<?php echo $h_num; ?>>
							
							
					    	<span class="author"> 
					    		<?php 

					    			if(!empty($quote_author)) 
					    				echo $quote_author; 
					    			else 
					    			    the_title(); 
					    		?>
					    	</span> 
					    </span>
			    	<span title="Quote" class="icon"></span>

			    
			    	
				</div><!--/quote-inner-->

				<?php if( !is_single() ) { ?> </a> <?php } ?>

				<?php 
				$below_content = get_the_content();
				if(is_single() && !empty( $below_content )){ ?>
					<div class="quote-below-content">	
						<?php the_content('<span class="continue-reading">'. __("Read More", NECTAR_THEME_NAME) . '</span>'); ?>
					</div>
				<?php } ?>
				
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