<?php 

return array(
	  "name" => __("Centered Heading", "js_composer"),
	  "base" => "heading",
	  "icon" => "icon-wpb-centered-heading",
	  "category" => __('Nectar Elements', 'js_composer'),
	  "description" => __('Simple heading', 'js_composer'),
	  "params" => array(
	    array(
	      "type" => "textarea_html",
	      "holder" => "div",
	      "heading" => __("Heading", "js_composer"),
	      "param_name" => "content",
	      "value" => __("", "js_composer")
	    ), 
	    array(
	      "type" => "textfield",
	      "heading" => __("Subtitle", "js_composer"),
	      "param_name" => "subtitle",
	      "description" => __("The subtitle text under the main title", "js_composer")
	    )
	  )
	);

?>