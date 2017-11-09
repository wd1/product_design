<?php 

return array(
	  "name" => __("Food Menu Item", "js_composer"),
	  "base" => "nectar_food_menu_item",
	  "icon" => "icon-wpb-pricing-table",
	  "category" => __('Nectar Elements', 'js_composer'),
	  "description" => __('Create restaurant menus', 'js_composer'),
	  "params" => array(
	  	 array(
			  "type" => "dropdown",
			  "heading" => __("Style", "js_composer"),
			  "param_name" => "style",
			  "value" => array(
				    'Default' => 'default',
				    'Line From Name To Price' => 'line_between'
				),
			  'save_always' => true,
			  "description" => __("Please select the desired style for your item", "js_composer")
			),
	  		array(
			"type" => "textfield",
			"class" => "",
			"description" => __("The item name", "js_composer"),
			"heading" => "Item Name",
			"admin_label" => true,
			"param_name" => "item_name"
			),
	    array(
	      "type" => "textfield",
	      "heading" => __("Item Price", "js_composer"),
	      "param_name" => "item_price",
	       "admin_label" => true,
	      "description" => __("The price of your item - include the currency symbol of your choosing i.e. \"$29\"", "js_composer")
	    ),
	     array(
			  "type" => "dropdown",
			  "heading" => __("Item Name Heading Tag", "js_composer"),
			  "param_name" => "item_name_heading_tag",
			  "value" => array(
				    'H3' => 'h3',
				    'H4' => 'h4',
				    'H5' => 'h5',
				    'H6' => 'h6'
				),
			  'save_always' => true,
			  "description" => __("Please select the desired heading tag for your item name", "js_composer")
			),
	    array(
		      "type" => "textarea",
		      "heading" => __("Item Description", "js_composer"),
		      "param_name" => "item_description",
		      "description" => __("Please enter description for your item", "js_composer")
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