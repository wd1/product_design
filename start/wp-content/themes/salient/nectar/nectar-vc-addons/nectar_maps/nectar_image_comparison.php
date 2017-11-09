<?php 

return array(
	  "name" => __("Image Comparison", "js_composer"),
	  "base" => "nectar_image_comparison",
	  "icon" => "icon-wpb-single-image",
	  "category" => __('Nectar Elements', 'js_composer'),
	  "description" => __('Shows differences in two images', 'js_composer'),
	  "params" => array(
	    array(
	      "type" => "fws_image",
	      "heading" => __("Image One", "js_composer"),
	      "param_name" => "image_url",
	      "value" => "",
	      "description" => __("Select image from media library.", "js_composer")
	    ),
	    array(
	      "type" => "fws_image",
	      "heading" => __("Image Two", "js_composer"),
	      "param_name" => "image_2_url",
	      "value" => "",
	      "description" => __("Select image from media library.", "js_composer")
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Extra class name", "js_composer"),
	      "param_name" => "el_class",
	      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
	    )
	  )
	);

?>