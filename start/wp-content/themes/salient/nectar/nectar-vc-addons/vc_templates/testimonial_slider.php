<?php 

extract(shortcode_atts(array("autorotate"=>'', "disable_height_animation"=>'','style'=>'default', 'color' => '', 'star_rating_color' => 'accent-color', 'add_border' => ''), $atts));

$height_animation_class = null;
if($disable_height_animation == 'true') $height_animation_class = 'disable-height-animation';

$GLOBALS['nectar-testimonial-slider-style'] = $style;

echo '<div class="col span_12 testimonial_slider '.$height_animation_class.'" data-color="'.$color.'"  data-rating-color="'.$star_rating_color.'" data-add-border="'.$add_border.'" data-autorotate="'.$autorotate.'" data-style="'.$style.'" ><div class="slides">'.do_shortcode($content).'</div></div>';

?>