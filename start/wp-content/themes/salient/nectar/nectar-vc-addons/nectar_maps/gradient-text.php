<?php 

return array(
		  "name" => __("Gradient Text", "js_composer"),
		  "base" => "nectar_gradient_text",
		  "icon" => "icon-wpb-nectar-gradient-text",
		  "category" => __('Nectar Elements', 'js_composer'),
		  "description" => __('Add text with gradient coloring', 'js_composer'),
		  "params" => array(
		  	array(
			"type" => "dropdown",
			"class" => "",
			'save_always' => true,
			"heading" => "Heading Tag",
			"param_name" => "heading_tag",
			"value" => array(
				"H1" => "h1",
				"H2" => "h2",
				"H3" => "h3",
				"H4" => "h4",
				"H5" => "h5",
				"H6" => "h6"
			)),
		    array(
				"type" => "dropdown",
				"class" => "",
				'save_always' => true,
				"heading" => "Text Color",
				"param_name" => "color",
				"admin_label" => false,
				"value" => array(
					"Color Gradient 1" => "extra-color-gradient-1",
			 		"Color Gradient 2" => "extra-color-gradient-2"
				),
				'description' => __( 'Choose a color from your <a target="_blank" href="'. admin_url() .'?page=Salient&tab=6">globally defined color scheme</a>. <br/> Will fallback to the first color of the gardient on non webkit browsers.', 'js_composer' ),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				'save_always' => true,
				"heading" => "Gradient Direction",
				"param_name" => "gradient_direction",
				"admin_label" => false,
				"value" => array(
					"Horizontal" => "horizontal",
			 		"Diagonal" => "diagonal"
				),
				"description" => "Select your desired gradient direction"
			),
			array(
		      "type" => "textarea",
		      "heading" => __("Text Content", "js_composer"),
		      "param_name" => "text",
		      "admin_label" => true,
		      "description" => __("The text that will display with gradient coloring", "js_composer")
		    ),
		    array(
		      "type" => "textfield",
		      "heading" => __("Margin <span>Top</span>", "js_composer"),
		      "param_name" => "margin_top",
		      "edit_field_class" => "col-md-2",
		      "description" => __("." , "js_composer")
		    ),
			 array(
		      "type" => "textfield",
		      "heading" => __("<span>Right</span>", "js_composer"),
		      "param_name" => "margin_right",
		      "edit_field_class" => "col-md-2",
		      "description" => __("" , "js_composer")
		    ),
			array(
		      "type" => "textfield",
		      "heading" => __("<span>Bottom</span>", "js_composer"),
		      "param_name" => "margin_bottom",
		      "edit_field_class" => "col-md-2",
		      "description" => __("" , "js_composer")
		    ),
		    array(
		      "type" => "textfield",
		      "heading" => __("<span>Left</span>", "js_composer"),
		      "param_name" => "margin_left",
		      "edit_field_class" => "col-md-2",
		      "description" => __("" , "js_composer")
		    ),
		 	 
		  )
		);
?>