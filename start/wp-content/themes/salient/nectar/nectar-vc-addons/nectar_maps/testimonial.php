<?php

$vc_is_wp_version_3_6_more = version_compare(preg_replace('/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo('version')), '3.6') >= 0;
	
	return array(
	  "name" => __("Testimonial", "js_composer"),
	  "base" => "testimonial",
	  "allowed_container_element" => 'vc_row',
	  "is_container" => true,
	  "content_element" => false,
	  "params" => array(
	  	array(
			"type" => "attach_image",
			"class" => "",
			"heading" => "Image",
			"value" => "",
			"param_name" => "image",
			"description" => "Add an optional image for the person/company who supplied the testimonial"
		),
	    array(
	      "type" => "textfield",
	      "heading" => __("Name", "js_composer"),
	      "param_name" => "name",
	      "admin_label" => true,
	      "description" => __("Name or source of the testimonial", "js_composer")
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Subtitle", "js_composer"),
	      "param_name" => "subtitle",
	      "admin_label" => false,
	      "description" => __("The optional subtitle that will follow the testimonial name", "js_composer")
	    ),
	    array(
	      "type" => "textarea",
	      "heading" => __("Quote", "js_composer"),
	      "param_name" => "quote",
	      "description" => __("The testimonial quote", "js_composer")
	    ),
	    array(
		  "type" => "dropdown",
		  "heading" => __("Star Rating", "js_composer"),
		  "param_name" => "star_rating",
		  "admin_label" => false,
		  "value" => array(
		  	"Hidden" => "none",
			 "5 Stars" => "100%",
			 "4.5 Stars" => "91%",
			 "4 Stars" => "80%",
			 "3.5 Stars" => "701%",
			 "3 Stars" => "60%",
			 "2.5 Stars" => "51%",
			 "2 Stars" => "40%",
			 "1.5 Stars" => "31%",
			 "1 Stars" => "20%",
		   ),
		  'save_always' => true,
		  "description" => __("Please select the star raing you would like to show for your testimonial", "js_composer")
		),
	    array(
	      "type" => "tab_id",
	      "heading" => __("Testimonial ID", "js_composer"),
	      "param_name" => "id"
	    )
	  ),
	  'js_view' => ($vc_is_wp_version_3_6_more ? 'VcTabView' : 'VcTabView35')
	);

?>