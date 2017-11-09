<?php 

return array(
			"name" => "Divider",
			"base" => "divider",
			"icon" => "icon-wpb-separator",
			"allowed_container_element" => 'vc_row',
			"category" => __('Nectar Elements', 'js_composer'),
			"description" => __('Create space between your content', 'js_composer'),
			"params" => array(
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Dividing Height",
					"param_name" => "custom_height",
					"description" => "If you would like to control the specifc number of pixels your divider is, enter it here. Don't enter \"px\", just the numnber e.g. \"20\""
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Line Type",
					'save_always' => true,
					"param_name" => "line_type",
					"value" => array(
						"No Line" => "No Line",
						"Full Width Line" => "Full Width Line",
						"Small Line" => "Small Line"
					)
				),
				array(
				  "type" => "dropdown",
				  "heading" => __("Line Thickness", "js_composer"),
				  "admin_label" => false,
				  "param_name" => "line_thickness",
				  "value" => array(
					    "1px" => "1",
					    "2px" => "2",
					    "3px" => "3",
					    "4px" => "4",
					    "5px" => "5",
					    "6px" => "6",
					    "7px" => "7",
					    "8px" => "8",
					    "9px" => "9",
					    "10px" => "10"
					),
				  "description" => __("Please select thickness of your line ", "js_composer"),
				  'save_always' => true,
				  "dependency" => Array('element' => "line_type", 'value' => array('Full Width Line','Small Line'))
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"admin_label" => false,
					"class" => "",
					"heading" => "Custom Line Width",
					"param_name" => "custom_line_width",
					"dependency" => Array('element' => "line_type", 'value' => array('Small Line')),
					"description" => "If you would like to control the specifc number of pixels that your divider is (widthwise), enter it here. Don't enter \"px\", just the numnber e.g. \"20\""
				),
				 array(
				  "type" => "dropdown",
				  "heading" => __("Divider Color", "js_composer"),
				  "param_name" => "divider_color",
				  "admin_label" => false,
				  "value" => array(
				     "Default (inherit from row Text Color)" => "default",
					 "Accent Color" => "accent-color",
					 "Extra Color 1" => "extra-color-1",
					 "Extra Color 2" => "extra-color-2",	
					 "Extra Color 3" => "extra-color-3",
					 "Color Gradient 1" => "extra-color-gradient-1",
					 "Color Gradient 2" => "extra-color-gradient-2"
				   ),
				  'save_always' => true,
				  "dependency" => Array('element' => "line_type", 'value' => array('Full Width Line','Small Line')),
				  'description' => __( 'Choose a color from your <a target="_blank" href="'. admin_url() .'?page=Salient&tab=6">globally defined color scheme</a>', 'js_composer' ),
				),
				 array(
			      "type" => 'checkbox',
			      "heading" => __("Animate Line", "js_composer"),
			      "param_name" => "animate",
			      "description" => __("If selected, the divider line will animate in when scrolled to", "js_composer"),
			      "value" => Array(__("Yes, please", "js_composer") => 'yes'),
			      "dependency" => Array('element' => "line_type", 'value' => array('Full Width Line','Small Line')),
			    ),
				 array(
			      "type" => "textfield",
			      "heading" => __("Animation Delay", "js_composer"),
			      "param_name" => "delay",
			      "dependency" => Array('element' => "line_type", 'value' => array('Full Width Line','Small Line')),
			      "description" => __("Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in \"one by one\" effect.", "js_composer")
			    ),

			)
	);

?>