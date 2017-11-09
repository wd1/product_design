<?php
$output = $el_class = $width = '';
extract(shortcode_atts(array(
    'el_class' => '',
    'width' => '1/1',
    'offset' => '',
    'css' => '',
    "boxed" => 'false', 
    "centered_text" => 'false', 
    'enable_animation' => '',
    'animation' => '', 
    'column_padding' => 'no-extra-padding',
    'column_padding_position'=> 'all',
    'top_margin' => '',
    'bottom_margin' => '',
    'delay' => '0',
    'background_color' => '',
    'background_color_hover' => '',
    'background_hover_color_opacity' => '1',
    'background_color_opacity' => '1',
    'background_image' => '',
    'enable_bg_scale' => '',
    'column_link' => '',
    'font_color' => '',
    'tablet_text_alignment' => '',
    'phone_text_alignment' => '',
    'column_border_width' => 'none',
    'column_border_color' => '',
    'column_border_style' => '',
    'enable_border_animation' => '',
    'border_animation_delay' => '',
    'column_shadow' => 'none'

), $atts));

//var init
$el_class = $this->getExtraClass($el_class);
$width = wpb_translateColumnWidthToSpan($width);
$width = vc_column_offset_class_merge($offset, $width);
$box_border = null;
$parsed_animation = null;	
$style = 'style="';

$el_class .= ' wpb_column column_container vc_column_container col';
if($boxed == 'true' && empty($background_image) && empty($background_color))  { $el_class .= ' boxed'; $box_border = '<span class="bottom-line"></span>'; }
if($centered_text == 'true') $el_class .= ' centered-text';

//responsive text alignment
if(!empty($tablet_text_alignment) && $tablet_text_alignment != 'default') 
    $el_class .= ' force-tablet-text-align-'.$tablet_text_alignment;
if(!empty($phone_text_alignment) && $phone_text_alignment != 'default') 
    $el_class .= ' force-phone-text-align-'.$phone_text_alignment;

//style related
$background_color_string = null;
$has_bg_color = 'false';
if(!empty($background_color)) {
	$background_color_string .= $background_color;	
    $has_bg_color = 'true';
}
if(!empty($background_image)) {
	
    if(!preg_match('/^\d+$/',$background_image)){
                    
        $style .= 'background-image: url('.$background_image . '); ';
    
    } else {

    	$bg_image_src = wp_get_attachment_image_src($background_image, 'full');
    	$style .= ' background-image: url(\''.$bg_image_src[0].'\'); ';
    }

}
if(!empty($font_color)) $style .= ' color: '.$font_color.';';

if(!empty($top_margin)) {
    //class for neg margin to adjust z-index
    if(strpos($top_margin,'-') !== false) {
        $el_class .= ' neg-marg';
    }
    //actual margin proc
    if(strpos($top_margin,'%') !== false) {
        $style .= 'margin-top: '. $top_margin .'; ';
    } else {
        $style .= 'margin-top: '. $top_margin .'px; ';
    }
}
if(!empty($bottom_margin)) {
    if(strpos($bottom_margin,'%') !== false){
        $style .= 'margin-bottom: '. $bottom_margin .'!important; ';
    } else {    
        $style .= 'margin-bottom: '. $bottom_margin .'px!important; ';
    }
}

(empty($background_color) && empty($background_image) && empty($font_color) && empty($top_margin) && empty($bottom_margin) ) ? $style = null : $style .= '"';

$using_bg = (!empty($background_image) || !empty($background_color)) ? 'data-using-bg="true"': null;

$using_reveal_animation = false;

if(!empty($animation) && $animation != 'none' && $enable_animation == 'true') {
     $el_class .= ' has-animation';
     
     $parsed_animation = str_replace(" ","-",$animation);
     $delay = intval($delay);

     if($animation == 'reveal-from-right' || $animation == 'reveal-from-bottom' || $animation == 'reveal-from-left' || $animation == 'reveal-from-top')
        $using_reveal_animation = true;
}

if($using_reveal_animation == false) $el_class .= ' '. $column_padding;
if($using_reveal_animation == true) {
    $style2 = $style;
    $style = null;
}

$border_html = null;
if(!empty($column_border_width) && $column_border_width != 'none') {
    $column_border_markup = 'border: '. $column_border_width.' solid rgba(255,255,255,0); ';
    if($style == null) {
         $style = 'style="'.$column_border_markup.'"';
     }
    else {
        //remove the ending quotation first since it's already closed
        $style = substr($style,0,-1);
        $style .= $column_border_markup . '"';
    }
    $border_html = '<span class="border-wrap" style="border-color: '.$column_border_color.';"><span class="border-top"></span><span class="border-right"></span><span class="border-bottom"></span><span class="border-left"></span></span>';
} else {
    $column_border_markup = null;
}


$column_link_html = (!empty($column_link)) ? '<a class="column-link" href="'.$column_link.'"></a>' : null;
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$output .= "\n\t".'<div '.$style.' class="'.$css_class.'" '.$using_bg.' data-shadow="'.$column_shadow.'" data-border-animation="'.$enable_border_animation.'" data-border-animation-delay="'.$border_animation_delay.'" data-border-width="'.$column_border_width.'" data-border-style="'.$column_border_style.'" data-border-color="'.$column_border_color.'" data-bg-cover="'.$enable_bg_scale.'" data-padding-pos="'. $column_padding_position .'" data-has-bg-color="'.$has_bg_color.'" data-bg-color="'.$background_color_string.'" data-bg-opacity="'.$background_color_opacity.'" data-hover-bg="'.$background_color_hover.'" data-hover-bg-opacity="'.$background_hover_color_opacity.'" data-animation="'.strtolower($parsed_animation).'" data-delay="'.$delay.'">' . $column_link_html . $border_html;
if($using_reveal_animation == true) $output .= "\n\t\t".'<div class="column-inner-wrap"><div '.$style2.' data-bg-cover="'.$enable_bg_scale.'" class="column-inner '.$column_padding.'">';
else  $output .= "\n\t\t".'<div class="vc_column-inner">';
$output .= "\n\t\t\t".'<div class="wpb_wrapper">';
$output .= "\n\t\t\t\t".wpb_js_remove_wpautop($content);
$output .= "\n\t\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper'); 
if($using_reveal_animation == true) $output .= "\n\t\t".'</div></div>';
else $output .= "\n\t\t".'</div>';
$output .= "\n\t".'</div> '.$this->endBlockComment($el_class) . "\n";

echo $output;