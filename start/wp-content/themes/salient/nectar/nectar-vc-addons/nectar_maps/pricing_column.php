<?php 

$vc_is_wp_version_3_6_more = version_compare(preg_replace('/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo('version')), '3.6') >= 0;

return array(
	  "name" => __("Pricing Column", "js_composer"),
	  "base" => "pricing_column",
	  "allowed_container_element" => 'vc_row',
	  "is_container" => true,
	  "content_element" => false,
	  "params" => array(
	    array(
	      "type" => "textfield",
	      "heading" => __("Title", "js_composer"),
	      "param_name" => "title",
	      "description" => __("Please enter a title for your pricing column", "js_composer")
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Price", "js_composer"),
	      "param_name" => "price",
	       "admin_label" => true,
	      "description" => __("Enter the price for your column", "js_composer")
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Currency Symbol", "js_composer"),
	      "param_name" => "currency_symbol",
	      "description" => __("Enter the currency symbol that will display for your price", "js_composer")
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Interval", "js_composer"),
	      "param_name" => "interval",
	      "description" => __("Enter the interval for your pricing e.g. \"Per Month\" or \"Per Year\" ", "js_composer")
	    ),
	    array(
	      "type" => "checkbox",
		  "class" => "",
		  "heading" => "Highlight Column?",
		  "value" => array("Yes, please" => "true" ),
		  "param_name" => "highlight",
		  "description" => ""
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Highlight Reason", "js_composer"),
	      "param_name" => "highlight_reason",
	      "description" => __("Enter the reason for the column being highlighted e.g. \"Most Popular\"" , "js_composer"),
	      "dependency" => Array('element' => "highlight", 'not_empty' => true)
	    ),
	    array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Color",
			"param_name" => "color",
			"value" => array(
				"Accent Color" => "Accent-Color",
				"Extra Color 1" => "Extra-Color-1",
				"Extra Color 2" => "Extra-Color-2",	
				"Extra Color 3" => "Extra-Color-3"
			),
			'save_always' => true,
			'description' => __( 'Choose a color from your <a target="_blank" href="'. admin_url() .'?page=Salient&tab=6">globally defined color scheme</a>', 'js_composer' ),
		),
		array(
	      "type" => "textarea_html",
	      "holder" => "hidden",
	      "heading" => __("Text Content", "js_composer"),
	      "param_name" => "content",
	      "value" => __("", "js_composer")
	    )
	  ),
	  'js_view' => ($vc_is_wp_version_3_6_more ? 'VcTabView' : 'VcTabView35')
	);


?>