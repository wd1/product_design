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
		  "name" => __("Blog", "js_composer"),
		  "base" => "nectar_blog",
		  "weight" => 8,
		  "icon" => "icon-wpb-blog",
		  "category" => __('Nectar Elements', 'js_composer'),
		  "description" => __('Display a Blog element', 'js_composer'),
		  "params" => array(
		    array(
			  "type" => "dropdown",
			  "heading" => __("Layout", "js_composer"),
			  "param_name" => "layout",
			  "admin_label" => true,
			  "value" => array(
				    'Standard Blog W/ Sidebar' => 'std-blog-sidebar',
				    'Standard Blog No Sidebar' => 'std-blog-fullwidth',
				    'Masonry Blog W/ Sidebar' => 'masonry-blog-sidebar',
				    'Masonry Blog No Sidebar' => 'masonry-blog-fullwidth',
				    'Masonry Blog Fullwidth' => 'masonry-blog-full-screen-width'
				),
			  'save_always' => true,
			  "description" => __("Please select the layout you desire for your blog", "js_composer")
			),
			array(
			  "type" => "dropdown_multi",
			  "heading" => __("Blog Categories", "js_composer"),
			  "param_name" => "category",
			  "admin_label" => true,
			  "value" => $blog_options,
			  'save_always' => true,
			  "description" => __("Please select the categories you would like to display for your blog. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "js_composer")
			),
			array(
		      "type" => 'checkbox',
		      "heading" => __("Enable Pagination", "js_composer"),
		      "param_name" => "enable_pagination",
		      "description" => __("Would you like to enable pagination?", "js_composer"),
		      "value" => Array(__("Yes, please", "js_composer") => 'true')
		    ),
		    array(
			  "type" => "dropdown",
			  "heading" => __("Pagination Type", "js_composer"),
			  "param_name" => "pagination_type",
			  "admin_label" => true,
			  "value" => array(	
				    'Default' => 'default',
				    'Infinite Scroll' => 'infinite_scroll',
				),
			  'save_always' => true,
			  "description" => __("Please select your pagination type here.", "js_composer"),
			  "dependency" => Array('element' => "enable_pagination", 'not_empty' => true)
			),
		    array(
		      "type" => "textfield",
		      "heading" => __("Posts Per Page", "js_composer"),
		      "param_name" => "posts_per_page",
		      "description" => __("How many posts would you like to display per page? <br/> If pagination is not enabled, will simply show this number of posts <br/> Enter as a number example \"10\"", "js_composer")
		    ),
		    array(
			  "type" => "dropdown",
			  "heading" => __("Load In Animation", "js_composer"),
			  "param_name" => "load_in_animation",
			  'save_always' => true,
			  "value" => array(
				    "None" => "none",
				    "Fade In" => "fade_in",
				    "Fade In From Bottom" => "fade_in_from_bottom",
				    "Perspective Fade In" => "perspective"
				),
			  "description" => __("Please select the loading animation you would like ", "js_composer")
			)
		  )
		);

?>