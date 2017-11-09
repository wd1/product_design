<?php 

return array(
		  "name" => __("Fancy Box", "js_composer"),
		  "base" => "fancy_box",
		  "icon" => "icon-wpb-fancy-box",
		  "category" => __('Nectar Elements', 'js_composer'),
		  "description" => __('Add a fancy box element', 'js_composer'),
		  "params" => array(
		 	 array(
		      "type" => "fws_image",
		      "heading" => __("Image", "js_composer"),
		      "param_name" => "image_url",
		      "value" => "",
		      "description" => __("Select a background image from the media library.", "js_composer")
		    ),
		    array(
		      "type" => "textarea_html",
		      "heading" => __("Box Content", "js_composer"),
		      "param_name" => "content",
		      "admin_label" => true,
		      "description" => __("Please enter the text desired for your box", "js_composer")
		    ),
		    array(
		      "type" => "textfield",
		      "heading" => __("Link URL", "js_composer"),
		      "param_name" => "link_url",
		      "admin_label" => false,
		      "description" => __("Please enter the URL you would like for your box to link to", "js_composer")
		    ),
		    array(
		       "type" => "checkbox",
			  "class" => "",
			  "heading" => "Open Link In New Tab",
			  "value" => array("Yes, please" => "true" ),
			  "param_name" => "link_new_tab",
			  "description" => "",
		       "dependency" => Array('element' => "link_url", 'not_empty' => true)
		    ),
		     array(
		      "type" => "textfield",
		      "heading" => __("Link Text", "js_composer"),
		      "param_name" => "link_text",
		      "admin_label" => false,
		      "description" => __("Please enter the text that will be displayed for your box link", "js_composer")
		    ),
		     array(
		      "type" => "textfield",
		      "heading" => __("Min Height", "js_composer"),
		      "param_name" => "min_height",
		      "admin_label" => false,
		      "description" => __("Please enter the minimum height you would like for you box. Enter in number of pixels - Don't enter \"px\", default is \"300\"", "js_composer")
		    ),
		     array(
			  "type" => "dropdown",
			  "heading" => __("Link Color", "js_composer"),
			  "param_name" => "color",
			  "value" => array(
				 "Accent Color" => "Accent-Color",
				 "Extra Color-1" => "Extra-Color-1",
				 "Extra Color-2" => "Extra-Color-2",	
				 "Extra Color-3" => "Extra-Color-3"
			   ),
			  'save_always' => true,
			  'description' => __( 'Choose a color from your <a target="_blank" href="'. admin_url() .'?page=Salient&tab=6">globally defined color scheme</a>', 'js_composer' ),
			)
		  )
		);

?>