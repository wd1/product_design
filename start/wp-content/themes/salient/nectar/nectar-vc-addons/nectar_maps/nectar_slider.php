<?php 


	$is_admin = is_admin();

	$slider_locations = ($is_admin) ? get_terms('slider-locations') : array('All' => 'all');
	$locations = array();

	if($is_admin) {
		foreach ($slider_locations as $location) {
			$locations[$location->name] = $location->name;
		}
	} else {
		$locations['All'] = 'all';
	}

	if (empty($locations)) {
		$location_desc = 
	      '<div class="alert">' .
		 __('You currently don\'t have any Slider Locations setup. Please create some and add assign slides to them before using this!',NECTAR_THEME_NAME). 
		'<br/><br/>
		<a href="' . admin_url('edit.php?post_type=nectar_slider') . '">'. __('Link to Nectar Slider', NECTAR_THEME_NAME) . '</a>
		</div>';
	} else { $location_desc = ''; }

	return array(
	  "name" => __("Nectar Slider", "js_composer"),
	  "base" => "nectar_slider",
	  "icon" => "icon-wpb-nectar-slider",
	  "category" => __('Nectar Elements', 'js_composer'),
	  "description" => __('The jaw-dropping slider by ThemeNectar', 'js_composer'),
	  "weight" => 10,
	  "params" => array(
	    array(
	      "type" => "dropdown",
	      "heading" => __("Select Slider", "js_composer"),
	      "admin_label" => true,
	      "param_name" => "location",
	      "value" => $locations,
	      "description" => $location_desc,
	      'save_always' => true
	    ),
		array(
	      "type" => "textfield",
	      "heading" => __("Slider Height", "js_composer"),
	      "param_name" => "slider_height",
	      "admin_label" => true,
	      "description" => __("Don't include \"px\" in your string. e.g. 650", "js_composer")
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Flexible Slider Height", "js_composer"),
	      "param_name" => "flexible_slider_height",
	      "description" => __("Would you like the height of your slider to constantly scale in porportion to the screen size?", "js_composer"),
	      "value" => Array(__("Yes, please", "js_composer") => 'true')
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Minimum Slider Height", "js_composer"),
	      "param_name" => "min_slider_height",
	      "dependency" => Array('element' => "flexible_slider_height", 'not_empty' => true),
	      "description" => __("When using the flexible height option the slider can become very short on mobile devices - use this to ensure it stays tall enough for your content Don't include \"px\" in your string. e.g. 250", "js_composer")
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Display Full Width?", "js_composer"),
	      "param_name" => "full_width",
	      "description" => __("Would you like this slider to display the full width of the page?", "js_composer"),
	      "value" => Array(__("Yes, please", "js_composer") => 'true')
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Fullscreen Slider?", "js_composer"),
	      "param_name" => "fullscreen",
	      "description" => __("This will cause your slider to resize to always fill the users screen size", "js_composer"),
	      "value" => Array(__("Yes, please", "js_composer") => 'true'),
	      "dependency" => Array('element' => "full_width", 'not_empty' => true)
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Display Arrow Navigation?", "js_composer"),
	      "param_name" => "arrow_navigation",
	      "description" => __("Would you like this slider to display arrows on the right and left sides?", "js_composer"),
	      "value" => Array(__("Yes, please", "js_composer") => 'true'),
	      "dependency" => Array('element' => "overall_style", 'value' => 'classic')
	    ),
	     array(
	      "type" => "dropdown",
	      "heading" => __("Slider Next/Prev Button Styling", "js_composer"),
	      "param_name" => "slider_button_styling",
	      "dependency" => Array('element' => "arrow_navigation", 'not_empty' => true),
	      "value" => array(
				'Standard With Slide Count On Hover' => 'btn_with_count',
				'Next/Prev Slide Preview On Hover' => 'btn_with_preview'
	      ),
	      "description" => 'Please select your slider button styling here',
	    ),
	     array(
	      "type" => "dropdown",
	      "heading" => __("Overall Style", "js_composer"),
	      "param_name" => "overall_style",
	      "value" => array(
				'Classic' => 'classic',
				'Directional Based Content Movement' => 'directional'
	      ),
	      'save_always' => true,
	      "description" => 'Please select your overall style here - note that some styles will remove the possibility to control certain options.'
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Display Bullet Navigation?", "js_composer"),
	      "param_name" => "bullet_navigation",
	      "description" => __("Would you like this slider to display bullets on the bottom?", "js_composer"),
	      "value" => Array(__("Yes, please", "js_composer") => 'true'),
	      "dependency" => Array('element' => "overall_style", 'value' => 'classic')
	    ),
	     array(
	      "type" => "dropdown",
	      "heading" => __("Bullet Navigation Style", "js_composer"),
	      "param_name" => "bullet_navigation_style",
	      "value" => array(
				'See Through & Solid On Active' => 'see_through',
				'Solid & Scale On Active' => 'scale'
	      ),
	      "description" => 'Please select your overall bullet navigation style here.',
	      "dependency" => Array('element' => "bullet_navigation", 'not_empty' => true)
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Enable Swipe on Desktop?", "js_composer"),
	      "param_name" => "desktop_swipe",
	      "description" => __("Would you like this slider to have swipe interaction on desktop?", "js_composer"),
	      "value" => Array(__("Yes, please", "js_composer") => 'true'),
	      "dependency" => Array('element' => "overall_style", 'value' => 'classic')
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Parallax Slider?", "js_composer"),
	      "param_name" => "parallax",
	      "description" => __("will only activate if the slider is the <b>top level element</b> in the page", "js_composer"),
	      "value" => Array(__("Yes, please", "js_composer") => 'true')
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Loop Slider?", "js_composer"),
	      "param_name" => "loop",
	      "description" => __("Would you like your slider to loop infinitely?", "js_composer"),
	      "value" => Array(__("Yes, please", "js_composer") => 'true'),
	      "dependency" => Array('element' => "overall_style", 'value' => 'classic')
	    ),
	    array(
	      "type" => "dropdown",
	      "heading" => __("Slider Transition", "js_composer"),
	      "param_name" => "slider_transition",
	      "value" => array(
				'Slide' => 'slide',
				'Fade' => 'fade'
	      ),
	      "description" => 'Please select your slider transition here',
	      "dependency" => Array('element' => "overall_style", 'value' => 'classic'),
	      'save_always' => true
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Autorotate?", "js_composer"),
	      "param_name" => "autorotate",
	      "description" => __("If you would like this slider to autorotate, enter the rotation speed in miliseconds here. i.e 5000", "js_composer")
	    ),
	    array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Button Sizing",
			"param_name" => "button_sizing",
			"value" => array(
				"Regular" => "regular",
				"Large" => "large",
				"Jumbo" => "jumbo"
			),
			'save_always' => true,
			"description" => ""
		),
		array(
	  	  "type" => "textfield",
	      "heading" => __("Tablet Header Font Size", "js_composer"),
	      "param_name" => "tablet_header_font_size",
	      "admin_label" => false,
	      "description" => __("Don't include \"px\" in your string. e.g. 32", "js_composer"),
	  	  "group" => "Mobile Text Sizing Override"
	  	),
	  	array(
	  	  "type" => "textfield",
	      "heading" => __("Tablet Caption Font Size", "js_composer"),
	      "param_name" => "tablet_caption_font_size",
	      "admin_label" => false,
	      "description" => __("Don't include \"px\" in your string. e.g. 20", "js_composer"),
	  	  "group" => "Mobile Text Sizing Override"
	  	),
	  	array(
	  	  "type" => "textfield",
	      "heading" => __("Phone Header Font Size", "js_composer"),
	      "param_name" => "phone_header_font_size",
	      "admin_label" => false,
	      "description" => __("Don't include \"px\" in your string. e.g. 24", "js_composer"),
	  	  "group" => "Mobile Text Sizing Override"
	  	),
	  	array(
	  	  "type" => "textfield",
	      "heading" => __("Phone Caption Font Size", "js_composer"),
	      "param_name" => "phone_caption_font_size",
	      "admin_label" => false,
	      "description" => __("Don't include \"px\" in your string. e.g. 14", "js_composer"),
	  	  "group" => "Mobile Text Sizing Override"
	  	)
	  )
	);
	

?>