<?php 

extract(shortcode_atts(array("heading_tag" => "h3", 'text' => '', "link_text" => "", 'text_color' => '', 'url' => '', 'link_type' => 'regular', 'alignment' => 'left', 'class' => '' ), $atts));

$target = ($link_type == 'new_tab') ? 'target="_blank"' : null;
$style = (!empty($text_color)) ? ' style="color: '.$text_color.';"' : null;
$text_color = (!empty($text_color)) ? 'custom' : 'std';

echo '<div class="nectar-cta '.$class.'" data-alignment="'.$alignment.'" data-text-color="'.$text_color.'" > <'.$heading_tag. $style.'> <span class="text">'.$text.'</span> <span class="link_wrap"><a '.$target .' class="link_text" href="'.$url.'">'.$link_text.'<span class="arrow"></span></a></span> </'.$heading_tag.'> </div>';

?>