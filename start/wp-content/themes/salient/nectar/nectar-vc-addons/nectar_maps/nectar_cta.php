<?php 

return array(
	  "name" => __("Call To Action", "js_composer"),
	  "base" => "nectar_cta",
	  "icon" => "icon-wpb-milestone",
	  "category" => __('Nectar Elements', 'js_composer'),
	  "description" => __('minimal & animated', 'js_composer'),
	  "params" => array(
	  		array(
			"type" => "dropdown",
			"class" => "",
			'save_always' => true,
			"heading" => "Heading Tag",
			"param_name" => "heading_tag",
			"value" => array(
				"H6" => "h6",
				"H5" => "h5",
				"H4" => "h4",
				"H3" => "h3",
				"H2" => "h2",
				"H1" => "h1"
			)),
	    array(
	      "type" => "textfield",
	      "heading" => __("Call to action text", "js_composer"),
	      "param_name" => "text",
	       "admin_label" => true,
	      "description" => __("The text that will appear before the actual CTA link", "js_composer")
	    ),
	     array(
	      "type" => "textfield",
	      "heading" => __("Link text", "js_composer"),
	      "param_name" => "link_text",
	      "description" => __("The text that will be used for the CTA link", "js_composer")
	    ),
	     array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => "CTA Text Color",
				"param_name" => "text_color",
				"value" => "",
				"description" => ""
			),
	      array(
	      "type" => "textfield",
	      "heading" => __("Link URL", "js_composer"),
	      "param_name" => "url",
	      "description" => __("The URL that will be used for the link", "js_composer")
	    ),
	      array(
			  "type" => "dropdown",
			  "heading" => __("Link Type", "js_composer"),
			  "param_name" => "link_type",
			  "value" => array(
				    'Regular (open in same tab)' => 'regular',
				    'Open In New Tab' => 'new_tab',
				),
			  'save_always' => true,
			  "description" => __("Please select the type of link you will be using.", "js_composer")
			),
	      array(
			  "type" => "dropdown",
			  "heading" => __("Alignment", "js_composer"),
			  "param_name" => "alignment",
			  "admin_label" => true,
			  "value" => array(
				    'Left' => 'left',
				    'Center' => 'center',
				    'Right' => 'right',
				),
			  'save_always' => true,
			  "description" => __("Please select the desired alignment for your CTA", "js_composer")
			),
	      array(
	      "type" => "textfield",
	      "heading" => __("Extra Class Name", "js_composer"),
	      "param_name" => "class",
	      "description" => __("", "js_composer")
	    ),
	  )
	);

?>