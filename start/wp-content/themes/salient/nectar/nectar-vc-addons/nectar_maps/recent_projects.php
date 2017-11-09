<?php 

$is_admin = is_admin();

$portfolio_types = ($is_admin) ? get_terms('project-type') : array('All' => 'all');

	$types_options = array("All" => "all");
	$types_options_2 = array("Default" => "default");

	if($is_admin) {
		foreach ($portfolio_types as $type) {
			$types_options[$type->name] = $type->slug;
			$types_options_2[$type->name] = $type->slug;
		}

	} else {
		$types_options['All'] = 'all';
		$types_options_2['All'] = 'all';
	}
	
return array(
		  "name" => __("Recent Projects", "js_composer"),
		  "base" => "recent_projects",
		  "weight" => 8,
		  "icon" => "icon-wpb-recent-projects",
		  "category" => __('Nectar Elements', 'js_composer'),
		  "description" => __('Show off some recent projects', 'js_composer'),
		  "params" => array(
		    array(
			  "type" => "dropdown_multi",
			  "heading" => __("Portfolio Categories", "js_composer"),
			  "param_name" => "category",
			  "admin_label" => true,
			  "value" => $types_options,
			  'save_always' => true,
			  "description" => __("Please select the categories you would like to display for your recent projects carousel. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "js_composer")
			),
		    array(
			  "type" => "dropdown",
			  "heading" => __("Project Style", "js_composer"),
			  "param_name" => "project_style",
			  "admin_label" => true,
			  "value" => array(
				    "Meta below thumb w/ links on hover" => "1",
				    "Meta on hover + entire thumb link" => "2",
				    "Title overlaid w/ zoom effect on hover" => "3",
				    "Meta from bottom on hover + entire thumb link" => "4",
				    "Fullscreen Zoom Slider" => 'fullscreen_zoom_slider'
				),
			  'save_always' => true,
			  "description" => __("Please select the style you would like your projects to display in ", "js_composer")
			),
			array(
			  "type" => "dropdown",
			  "heading" => __("Slider Controls", "js_composer"),
			  "param_name" => "slider_controls",
			  "admin_label" => true,
			   "dependency" => Array('element' => "project_style", 'value' => array('fullscreen_zoom_slider')),
			  "value" => array(
				    "Prev/Nect Arrows" => "arrows",
				    "Pagination Lines" => "pagination",
				    "Both" => "both",
				),
			  'save_always' => true,
			  "description" => __("Please select the controls you would like your slider to use ", "js_composer")
			),
			array(
			  "type" => "dropdown",
			  "heading" => __("Slider Text Color", "js_composer"),
			  "param_name" => "slider_text_color",
			   "dependency" => Array('element' => "project_style", 'value' => array('fullscreen_zoom_slider')),
			  "admin_label" => true,
			  "value" => array(
				    "Light" => "light",
				    "Dark" => "dark"
				),
			  'save_always' => true,
			  "description" => __("Please select the color scheme that will be used for your slider text/controls ", "js_composer")
			),
			array(
			  "type" => "dropdown",
			  "heading" => __("Overlay Strength", "js_composer"),
			  "param_name" => "overlay_strength",
			  "admin_label" => true,
			  "value" => array(
				    "0" => "0",
				    "0.1" => "0.1",
				    "0.2" => "0.2",
				    "0.3" => "0.3",
				    "0.4" => '0.4',
				    "0.5" => '0.5',
				    "0.6" => '0.6',
				    "0.7" => '0.7',
				    "0.8" => '0.8',
				    "0.9" => '0.9',
				    "1" => '1'
				),
			  'save_always' => true,
			  "dependency" => Array('element' => "project_style", 'value' => array('fullscreen_zoom_slider')),
			  "description" => __("Please select the strength you would like for the image color overlay on your projects ", "js_composer")
			),
			array(
		      "type" => "textfield",
		      "heading" => __("Auto rotate", "js_composer"),
		      "param_name" => "autorotate",
		      "value" => '',
		      "dependency" => Array('element' => "project_style", 'value' => array('fullscreen_zoom_slider')),
		      "description" => __("If you would like this to auto rotate, enter the rotation speed in miliseconds here. i.e 5000", "js_composer")
		    ),
			array(
		      "type" => 'checkbox',
		      "heading" => __("Full Width Carousel", "js_composer"),
		      "param_name" => "full_width",
		      "description" => __("This will make your carousel extend the full width of the page.", "js_composer"),
		      "value" => Array(__("Yes, please", "js_composer") => 'true'),
		      "dependency" => Array('element' => "project_style", 'value' => array('1','2','3','4')),
		    ),
		    array(
		      "type" => "textfield",
		      "heading" => __("Heading Text", "js_composer"),
		      "param_name" => "heading",
		      "description" => __("Enter any text you would like for the heading of your carousel", "js_composer"),
		      "dependency" => Array('element' => "project_style", 'value' => array('1','2','3','4'))
		    ),
			array(
		      "type" => "textfield",
		      "heading" => __("Page Link Text", "js_composer"),
		      "param_name" => "page_link_text",
		      "description" => __("This will be the text that is in a link leading users to your desired page (will be omitted for full width carousels and an icon will be used instead)", "js_composer"),
		      "dependency" => Array('element' => "project_style", 'value' => array('1','2','3','4'))
		    ),
		    array(
		      "type" => "textfield",
		      "heading" => __("Page Link URL", "js_composer"),
		      "param_name" => "page_link_url",
		      "description" => __("Enter portfolio page URL you would like to link to. Remember to include \"http://\"!", "js_composer"),
		      "dependency" => Array('element' => "project_style", 'value' => array('1','2','3','4'))
		    ),	
		    array(
			  "type" => "dropdown",
			  "heading" => __("Controls & Text Color", "js_composer"),
			  "param_name" => "control_text_color",
			  "value" => array(
				    "Dark" => "dark",
				    "Light" => "light",
				),
			  'save_always' => true,
			  "description" => __("Please select the color you desire for your carousel controls/heading text.", "js_composer"),
			  "dependency" => Array('element' => "project_style", 'value' => array('1','2','3','4'))
			),
		    array(
		      "type" => 'checkbox',
		      "heading" => __("Hide Carousel Controls", "js_composer"),
		      "param_name" => "hide_controls",
		      "description" => __("Checking this box will remove the controls from your carousel", "js_composer"),
		      "value" => Array(__("Yes, please", "js_composer") => 'true'),
		      "dependency" => Array('element' => "project_style", 'value' => array('1','2','3','4'))
		    ),
		    array(
		      "type" => "textfield",
		      "heading" => __("Number of Projects To Show", "js_composer"),
		      "param_name" => "number_to_display",
		      "description" => __("Enter as a number example \"6\"", "js_composer")
		    ),
		    array(
		      "type" => 'checkbox',
		      "heading" => __("Lightbox Only", "js_composer"),
		      "param_name" => "lightbox_only",
		      "description" => __("This will remove the single project page from being accessible thus rendering your portfolio into only a gallery.", "js_composer"),
		      "value" => Array(__("Yes, please", "js_composer") => 'true'),
		      "dependency" => Array('element' => "project_style", 'value' => array('1','2','3','4'))
		    )
		  )
		);

?>