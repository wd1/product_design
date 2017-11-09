<?php 

$is_admin = is_admin();

$blog_types = ($is_admin) ? get_categories() : array('All' => 'all');

		$blog_options = array("All" => "all");

		if($is_admin) {
			foreach ($blog_types as $type) {
				if(isset($type->name) && isset($type->slug))
					$blog_options[htmlspecialchars($type->name)] = htmlspecialchars($type->slug);
			}
		} else {
			$blog_options['All'] = 'all';
		}
		
return array(
		  "name" => __("Recent Posts", "js_composer"),
		  "base" => "recent_posts",
		  "weight" => 8,
		  "icon" => "icon-wpb-recent-posts",
		  "category" => __('Nectar Elements', 'js_composer'),
		  "description" => __('Display your recent blog posts', 'js_composer'),
		  "params" => array(
		  	array(
			  "type" => "dropdown",
			  "heading" => __("Style", "js_composer"),
			  "param_name" => "style",
			  "admin_label" => true,
			  "value" => array(	
				    'Default' => 'default',
				    'Minimal' => 'minimal',
				    'Minimal - Title Only' => 'title_only',
				    'Classic Enhanced' => 'classic_enhanced',
				    'Classic Enhanced Alt' => 'classic_enhanced_alt',
				    'Slider' => 'slider'
				),
			  'save_always' => true,
			  "description" => __("Please select desired style here.", "js_composer")
			),
			array(
			  "type" => "dropdown",
			  "heading" => __("Color Scheme", "js_composer"),
			  "param_name" => "color_scheme",
			  "admin_label" => true,
			  "value" => array(	
				    'Light' => 'light',
				    'Dark' => 'dark',
				),
			  "dependency" => Array('element' => "style", 'value' => array('classic_enhanced')),
			  'save_always' => true,
			  "description" => __("Please select your desired coloring here.", "js_composer")
			),
			array(
		      "type" => "textfield",
		      "heading" => __("Slider Height", "js_composer"),
		      "param_name" => "slider_size",
		      "admin_label" => false,
		      "dependency" => Array('element' => "style", 'value' => 'slider'),
		      "description" => __("Don't include \"px\" in your string. e.g. 650", "js_composer")
		    ),
			array(
			  "type" => "dropdown_multi",
			  "heading" => __("Blog Categories", "js_composer"),
			  "param_name" => "category",
			  "admin_label" => true,
			  "value" => $blog_options,
			  'save_always' => true,
			  "description" => __("Please select the categories you would like to display in your recent posts. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "js_composer")
			),
			array(
			  "type" => "dropdown",
			  "heading" => __("Number Of Columns", "js_composer"),
			  "param_name" => "columns",
			  "admin_label" => false,
			  "value" => array(
			  	'4' => '4',
			  	'3' => '3',
			  	'2' => '2',
			  	'1' => '1'
			  ),
			  "dependency" => Array('element' => "style", 'value' => array('default','minimal','title_only','classic_enhanced', 'classic_enhanced_alt')),
			  'save_always' => true,
			  "description" => __("Please select the number of posts you would like to display.", "js_composer")
			),
			array(
		      "type" => "textfield",
		      "heading" => __("Number Of Posts", "js_composer"),
		      "param_name" => "posts_per_page",
		      "description" => __("How many posts would you like to display? <br/> Enter as a number example \"4\"", "js_composer")
		    ),
		    array(
		      "type" => "textfield",
		      "heading" => __("Post Offset", "js_composer"),
		      "param_name" => "post_offset",
		      "description" => __("Optioinally enter a number e.g. \"2\" to offset your posts by - useful for when you're using multiple styles of this element on the same page and would like them to no show duplicate posts", "js_composer")
		    ),
			array(
		      "type" => 'checkbox',
		      "heading" => __("Enable Title Labels", "js_composer"),
		      "param_name" => "title_labels",
		      "description" => __("These labels are defined by you in the \"Blog Options\" tab of your theme options panel.", "js_composer"),
		      "value" => Array(__("Yes, please", "js_composer") => 'true'),
		      "dependency" => Array('element' => "style", 'value' => 'default')
		    ),
		  )
		);

?>