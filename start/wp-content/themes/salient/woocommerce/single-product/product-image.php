<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product, $woocommerce, $options;

wp_enqueue_script('iosSlider');

if(!empty($options['single_product_gallery_type']) && $options['single_product_gallery_type'] == 'ios_slider') {

	if( $woocommerce && version_compare( $woocommerce->version, "3.0", ">=" ) ) {
		$product_attach_ids = $product->get_gallery_image_ids(); 
	} else {
		$product_attach_ids = $product->get_gallery_attachment_ids(); 
	} 
	?>


    <div class="images">

    	<div class="iosSlider product-slider">

			<div class="slider">

				<?php if (has_post_thumbnail()) { 

					$img_link = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

					$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
					$thumbnail_size    = apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' );
					$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
					$thumbnail_post    = get_post( $post_thumbnail_id );
					$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );

					$attributes = array(
						'title'                   => get_post_field( 'post_title', $post_thumbnail_id ),
						'data-caption'            => get_post_field( 'post_excerpt', $post_thumbnail_id ),
						'data-src'                => $full_size_image[0],
						'data-large_image'        => $full_size_image[0],
						'data-large_image_width'  => $full_size_image[1],
						'data-large_image_height' => $full_size_image[2],
					);
					
				?>
             
                <div class="slide">
                	<div data-thumb="<?php echo get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ); ?>" class="easyzoom woocommerce-product-gallery__image">
	                	<a href="<?php echo $img_link; ?>">
	                		<?php echo get_the_post_thumbnail( $post->ID, 'shop_single', $attributes ); ?>
	                	</a>
	                </div>
                </div>
				
				<?php } else { 
					echo '<div class="slide">'.apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID ) .'</div>';
				}

				if ( $product_attach_ids ) {

					foreach ($product_attach_ids as $product_attach_id) {

						$img_link = wp_get_attachment_url( $product_attach_id );
			
						if (!$img_link)
							continue;

						printf( '<div class="slide"><div class="easyzoom"><a href="%s" title="%s"> %s </a></div></div>', wp_get_attachment_url($product_attach_id),esc_attr( get_post($product_attach_id)->post_title ), wp_get_attachment_image($product_attach_id, 'shop_single'));
				
					}
				}
			?>
			
			</div>
         	
    		<div class="slider_controls">
				 <div class="nav_wrap">
		       		 <a href="#" class="prev_slide" onclick="return false;"><span class="fa fa-angle-left"></span></a>
		       		 <a href="#" class="next_slide" onclick="return false;"><span class="fa fa-angle-right"></span></a>
		        </div>
       		</div>
		</div>
		
	</div>

        		
	<?php if ( $product_attach_ids ) { 

		$img_size = get_option('shop_thumbnail_image_size'); ?>
        
        <div class="iosSlider product-thumbs" style="min-height:<?php echo ($img_size['height']).'px'; ?>!important">
			<div class ="slider">
                        <?php 	
                        
						$img_height = ($img_size['height']); 

                        if ( has_post_thumbnail() ) { ?>
                      	  <div class="thumb active" style="height:<?php echo $img_height . 'px'; ?>"><div class="thumb-inner"><?php echo get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) ) ?></div></div>
                        <?php } 
						
						foreach ( $product_attach_ids as $product_attach_id) {

							$img_link = wp_get_attachment_url($product_attach_id);
				
							if ( !$img_link )
								continue;
							
							$img_size = wp_get_attachment_image($product_attach_id, apply_filters('single_product_small_thumbnail_size', 'shop_thumbnail'));
							$classes = array();
							$image_class = esc_attr( implode(' ', $classes));
						
							echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<div class="thumb"  style="height:'.$img_height.'px"><div class="thumb-inner">%s</div></div>', $img_size ), $product_attach_id, $post->ID, $image_class );
							
					
						} ?>
			</div>

        	 <div class="slider_controls">
				  <div class="nav_wrap">
		       		 <a href="#" onclick="return false;" class="prev_slide"><span class="fa fa-angle-left"></span></a>
		       		 <a href="#" onclick="return false;" class="next_slide"><span class="fa fa-angle-right"></span></a>
		        </div>
       		</div>
		</div>

    <?php } 



} 
//default lightbox functionality
else { ?>


	<div class="images">

	<?php
	if( $woocommerce && version_compare( $woocommerce->version, "3.0", ">=" ) ) {

		global $post, $product;
		$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
		$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
		$thumbnail_size    = apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' );
		$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
		$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
		$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
		$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
			'woocommerce-product-gallery',
			'woocommerce-product-gallery--' . $placeholder,
			'woocommerce-product-gallery--columns-' . absint( $columns ),
			'images',
		) );
		?>
		<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
			<figure class="woocommerce-product-gallery__wrapper">
				<?php
				$attributes = array(
					'title'                   => get_post_field( 'post_title', $post_thumbnail_id ),
					'data-caption'            => get_post_field( 'post_excerpt', $post_thumbnail_id ),
					'data-src'                => $full_size_image[0],
					'data-large_image'        => $full_size_image[0],
					'data-large_image_width'  => $full_size_image[1],
					'data-large_image_height' => $full_size_image[2],
				);

				if ( has_post_thumbnail() ) {
					$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
					$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
					$html .= '</a></div>';
				} else {
					$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
					$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
					$html .= '</div>';
				}

				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

				do_action( 'woocommerce_product_thumbnails' );
				?>
			</figure>
		</div>



<?php } else { //old layout before 3.0
	  
		
			if ( has_post_thumbnail() ) {
				$attachment_count = count( $product->get_gallery_attachment_ids() );
				$gallery          = $attachment_count > 0 ? '[product-gallery]' : '';
				$props            = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
				$image            = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
					'title'	 => $props['title'],
					'alt'    => $props['alt'],
				) );
				echo apply_filters(
					'woocommerce_single_product_image_html',
					sprintf(
						'<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto%s">%s</a>',
						esc_url( $props['url'] ),
						esc_attr( $props['caption'] ),
						$gallery,
						$image
					),
					$post->ID
				);
			} else {
				echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );
			}
		?>

		<?php do_action( 'woocommerce_product_thumbnails' ); 

	 } ?>

	 </div><!--images-->

 <?php } ?>
 
