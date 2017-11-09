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

<article id="post-<?php the_ID(); ?>" <?php post_class($masonry_item_sizing.' link'); ?>>
	
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
						<?php if (function_exists('get_avatar')) { echo '<div class="grav-wrap"><a href="'.get_author_posts_url($post->post_author).'">'.get_avatar( get_the_author_meta('email'), 90 ).'</a></div>'; } ?>
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
					
					<?php 
					$link = get_post_meta($post->ID, '_nectar_link', true); 
					$link_text = get_the_content(); ?>
					
					<a target="_blank" href="<?php echo $link; ?>">
						
						<div class="link-inner">
							<span class="link-wrap">
								<?php 
									$h_num = '2';
									if($using_masonry == true && $masonry_type == 'classic_enhanced') {
										$h_num = '3';
									} 	
								?>
								<h<?php echo $h_num; ?> class="title">
									<?php if(empty($link_text)) { echo get_the_title(); } else { echo $link_text; } ?>
								</h<?php echo $h_num; ?>>
						    	<span class="destination"> <?php echo $link; ?></span>
						    </span>
					    	<span title="Link" class="icon"></span>
						</div><!--/link-inner-->
					
					</a>
					
				</div><!--/content-inner-->


			<?php }

			//other styles
			else { ?>
			
			<div class="content-inner">
				
				<?php 
				$link = get_post_meta($post->ID, '_nectar_link', true); 
				$link_text = get_the_content(); ?>
				
				<a target="_blank" href="<?php echo $link; ?>">
					
					<div class="link-inner">
						<span class="link-wrap">
							<?php 
								$h_num = '2';
								if($using_masonry == true && $masonry_type == 'classic_enhanced') {
									$h_num = '3';
								} 	
							?>
							<h<?php echo $h_num; ?> class="title">
								<?php if(empty($link_text)) { echo get_the_title(); } else { echo $link_text; } ?>
							</h<?php echo $h_num; ?>>
					    	<span class="destination"> <?php echo $link; ?></span>
					    </span>
				    	<span title="Link" class="icon"></span>
					</div><!--/link-inner-->
				
				</a>
				
			</div><!--/content-inner-->

			<?php } // other styles ?>
			
		</div><!--/post-content-->
	
	</div><!--/inner-wrap-->
			
</article><!--/article-->