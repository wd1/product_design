<?php 

return array(
		  "name" => __("Google Map", "js_composer"),
		  "base" => "nectar_gmap",
		  "icon" => "icon-wpb-map",
		  "category" => __('Nectar Elements', 'js_composer'),
		  "description" => __('Flexible Google Map', 'js_composer'),
		  "params" => array(
		    array(
		      "type" => "textfield",
		      "heading" => __("Map height", "js_composer"),
		      "param_name" => "size",
		      "description" => __('Enter map height in pixels. Example: 200. <span>As of June 2016, a Google map API key is needed to allow this element to display. Please See the Salient options panel > general settings > css/script related tab to enter this.</span>', "js_composer")
		    ),
		    array(
		      "type" => "textfield",
		      "heading" => __("Map Center Point Latitude", "js_composer"),
		      "param_name" => "map_center_lat",
		      "description" => __("Please enter the latitude for the maps center point.", "js_composer")
		    ),
		    array(
		      "type" => "textfield",
		      "heading" => __("Map Center Point Longitude", "js_composer"),
		      "param_name" => "map_center_lng",
		      "description" => __("Please enter the longitude for the maps center point.", "js_composer")
		    ),
		    
		  	array(
		      "type" => "dropdown",
		      "heading" => __("Map Zoom", "js_composer"),
		      "param_name" => "zoom",
		      'save_always' => true,
		      "value" => array(__("14 - Default", "js_composer") => 14, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20)
		    ),
		    array(
		      "type" => 'checkbox',
		      "heading" => __("Eanble Zoom In/Out", "js_composer"),
		      "param_name" => "enable_zoom",
		      "description" => __("Do you want users to be able to zoom in/out on the map?", "js_composer"),
		      "value" => Array(__("Yes, please", "js_composer") => true),
		    ),

		    array(
			  "type" => "dropdown",
			  "heading" => __("Marker Style", "js_composer"),
			  "param_name" => "marker_style",
			  "value" => array(
			     "Default Google Style" => "default",
				 "Nectar Animated" => "nectar",
			   ),
			  'save_always' => true,
			  "description" => __("Please select the marker style you would like <br/> <b>Default Google Style</b> <i> - Will display the Google standard map marker and also allow you to optionally override it with an image</i> <br/> <b>Nectar Animated</b> <i>- Will use a custom Nectar CSS based marker (the modern option).</i> ", "js_composer")
			),

		    array(
			  "type" => "dropdown",
			  "heading" => __("Marker Color", "js_composer"),
			  "param_name" => "nectar_marker_color",
			  "value" => array(
				 "Accent-Color" => "accent-color",
				 "Extra-Color-1" => "extra-color-1",
				 "Extra-Color-2" => "extra-color-2",	
				 "Extra-Color-3" => "extra-color-3"
			   ),
			  'save_always' => true,
			  "dependency" => Array('element' => "marker_style", 'value' => 'nectar'),
			  "description" => __("Please select the color for your nectar marker.", "js_composer")
			),

		    array(
		      "type" => "attach_image",
		      "heading" => __("Marker Image", "js_composer"),
		      "param_name" => "marker_image",
		      "dependency" => Array('element' => "marker_style", 'value' => 'default'),
		      "value" => "",
		      "description" => __("Select image from media library.", "js_composer")
		    ),
		    array(
		      "type" => 'checkbox',
		      "heading" => __("Marker Animation", "js_composer"),
		      "param_name" => "marker_animation",
		      "dependency" => Array('element' => "marker_style", 'value' => 'default'),
		      "description" => __("This will cause your markers to do a quick bounce as they load in.", "js_composer"),
		      "value" => Array(__("Yes, please", "js_composer") => true),
		    ),
		    
		    array(
		      "type" => 'checkbox',
		      "heading" => __("Greyscale Color", "js_composer"),
		      "param_name" => "map_greyscale",
		      "description" => __("Toggle a greyscale color scheme (will also unlock further custom options)", "js_composer"),
		      "value" => Array(__("Yes, please", "js_composer") => true),
		    ),
		    array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => "Map Extra Color",
				"param_name" => "map_color",
				"value" => "",
				"dependency" => Array('element' => "map_greyscale", 'not_empty' => true),
				"description" => "Use this to define a main color that will be used in combination with the greyscale option for your map"
			),
			array(
		      "type" => 'checkbox',
		      "heading" => __("Ultra Flat Map", "js_composer"),
		      "param_name" => "ultra_flat",
		      "dependency" => Array('element' => "map_greyscale", 'not_empty' => true),
		      "description" => __("This removes street/landmark text & some extra details for a clean look", "js_composer"),
		      "value" => Array(__("Yes, please", "js_composer") => true),
		    ),
		    array(
		      "type" => 'checkbox',
		      "heading" => __("Dark Color Scheme", "js_composer"),
		      "param_name" => "dark_color_scheme",
		      "dependency" => Array('element' => "map_greyscale", 'not_empty' => true),
		      "description" => __("Enable this option for a dark colored map (This will override the extra color choice)", "js_composer"),
		      "value" => Array(__("Yes, please", "js_composer") => true),
		    ),
			
		    array(
		      "type" => "textarea",
		      "heading" => __("Map Marker Locations", "js_composer"),
		      "param_name" => "map_markers",
		      "description" => __("Please enter the the list of locations you would like with a latitude|longitude|description format. <br/> Divide values with linebreaks (Enter). Example: <br/> 39.949|-75.171|Our Location <br/> 40.793|-73.954|Our Location #2", "js_composer")
		    ),
		    
		  )
		);
?>