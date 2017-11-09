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
	  "name" => __("Portfolio", "js_composer"),
	  "base" => "nectar_portfolio",
	  "weight" => 8,
	  "icon" => "icon-wpb-portfolio",
	  "category" => __('Nectar Elements', 'js_composer'),
	  "description" => __('Add a portfolio element', 'js_composer'),
	  "params" => array(
		array(
		  "type" => "dropdown",
		  "heading" => __("Layout", "js_composer"),
		  "param_name" => "layout",
		  "admin_label" => true,
		  "value" => array(
			    "3 Columns" => "3",
			    "4 Columns" => "4",
			    "Fullwidth" => "fullwidth",
			    "Constrained Fullwidth" => "constrained_fullwidth"
			),
		  "description" => __("Please select the layout you would like for your portfolio. The Constrained Fullwidth option will allow your projects to display with the same formatting options only available to full width layouut, but will limit the width to your website container area.", "js_composer"),
		  'save_always' => true
		),
		array(
	      "type" => 'checkbox',
	      "heading" => __("Constrain Max Columns to 4?", "js_composer"),
	      "param_name" => "constrain_max_cols",
	      "description" => __("This will change the max columns to 4 (default is 5 for fullwidth). Activating this will make it easier to create a grid with no empty spaces at the end of the list on all screen sizes.", "js_composer"),
	      "value" => Array(__("Yes, please", "js_composer") => 'true'),
	      "dependency" => Array('element' => "layout", 'value' => 'fullwidth')
	    ),
	    /*
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Remove Column Padding?", "js_composer"),
	      "param_name" => "remove_column_padding",
	      "description" => __("This will allow your projects to sit flush against each other.", "js_composer"),
	      "value" => Array(__("Yes, please", "js_composer") => 'true'),
	      "dependency" => Array('element' => "layout", 'value' => array('3', '4'))
	    ),*/
	    array(
		  "type" => "dropdown_multi",
		  "heading" => __("Portfolio Categories", "js_composer"),
		  "param_name" => "category",
		  "admin_label" => true,
		  "value" => $types_options,
		  'save_always' => true,
		  "description" => __("Please select the categories you would like to display for your portfolio. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "js_composer")
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Starting Category", "js_composer"),
		  "param_name" => "starting_category",
		  "admin_label" => false,
		  "value" => $types_options_2,
		  'save_always' => true,
		  "description" => __("Please select the category you would like you're portfolio to start filtered on.", "js_composer"),
		  "dependency" => Array('element' => "enable_sortable", 'not_empty' => true)
		),
	    array(
		  "type" => "dropdown",
		  "heading" => __("Project Style", "js_composer"),
		  "param_name" => "project_style",
		  "admin_label" => true,
		  'save_always' => true,
		  "value" => array(
			    "Meta below thumb w/ links on hover" => "1",
			    "Meta on hover + entire thumb link" => "2",
			    "Meta on hover w/ zoom + entire thumb link" => "7",
			    "Meta overlaid - bottom left aligned" => "8",
			    "Meta overlaid w/ zoom effect on hover" => "3",
			    "Meta overlaid w/ zoom effect on hover alt" => "5",
			    "Meta from bottom on hover + entire thumb link" => "4",
			    "3D Parallax on hover" => "6"
			),
		  "description" => __("Please select the style you would like your projects to display in ", "js_composer")
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Item Spacing", "js_composer"),
		  "param_name" => "item_spacing",
		  'save_always' => true,
		  "value" => array(
		  		"Default" => "default",
			    "1px" => "1px",
			    "2px" => "2px",
			    "3px" => "3px",
			    "4px" => "4px",
			    "5px" => "5px",
			    "6px" => "6px",
			    "7px" => "7px",
			    "8px" => "8px",
			    "9px" => "9px",
			    "10px" => "10px",
			    "15px" => "15px",
			    "20px" => "20px"
			),
		  "dependency" => Array('element' => "layout", 'value' => array('fullwidth','constrained_fullwidth')),
		  "description" => __("Please select the spacing you would like between your items. ", "js_composer")
		),/*
		array(
	      "type" => 'checkbox',
	      "heading" => __("Disable Featured Image Cropping", "js_composer"),
	      "param_name" => "disable_cropping",
	      "description" => __("This will allow your portfolio items to display without any cropping - useful for photography layouts.", "js_composer"),
	      "value" => Array(__("Yes, please", "js_composer") => 'true')
	    ),*/
		array(
	      "type" => 'checkbox',
	      "heading" => __("Masonry Style", "js_composer"),
	      "param_name" => "masonry_style",
	      "description" => __("This will allow your portfolio items to display in a masonry layout as opposed to a fixed grid. You can define your masonry sizes in each project. <br/> ", "js_composer"),
	      "value" => Array(__("Yes, please", "js_composer") => 'true')
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Enable Sortable", "js_composer"),
	      "param_name" => "enable_sortable",
	      "description" => __("Checking this box will allow your portfolio to display sortable filters", "js_composer"),
	      "value" => Array(__("Yes, please", "js_composer") => 'true')
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Horizontal Filters", "js_composer"),
	      "param_name" => "horizontal_filters",
	      "description" => __("This will allow your filters to display horizontally instead of in a dropdown. (Only used if you enable sortable above.)", "js_composer"),
	      "value" => Array(__("Yes, please", "js_composer") => 'true'),
	      "dependency" => Array('element' => "enable_sortable", 'not_empty' => true)
	    ),
	    array(
		  "type" => "dropdown",
		  "heading" => __("Filter Alignment", "js_composer"),
		  "param_name" => "filter_alignment",
		  "value" => array(
		     "Default" => "default",
			 "Centered" => "center",
			 "Left" => "left"
		   ),
		  'save_always' => true,
		  "dependency" => Array('element' => "horizontal_filters", 'not_empty' => true),
		  "description" => __("Please select the alignment you would like for your horizontal filters", "js_composer")
		),
	    array(
		  "type" => "dropdown",
		  "heading" => __("Filter Color Scheme", "js_composer"),
		  "param_name" => "filter_color",
		  "value" => array(
		     "Default" => "default",
			 "Accent-Color" => "accent-color",
			 "Extra-Color-1" => "extra-color-1",
			 "Extra-Color-2" => "extra-color-2",	
			 "Extra-Color-3" => "extra-color-3",
			 "Accent-Color Underline" => "accent-color-underline",
			 "Extra-Color-1 Underline" => "extra-color-1-underline",
			 "Extra-Color-2 Underline" => "extra-color-2-underline",	
			 "Extra-Color-3 Underline" => "extra-color-3-underline",
			 "Black" => "black"
		   ),
		  'save_always' => true,
		  "dependency" => Array('element' => "enable_sortable", 'not_empty' => true),
		  "description" => __("Please select the color scheme you would like for your filters. Only applies to full width inline filters and regular dropdown filters", "js_composer")
		),

	    array(
	      "type" => 'checkbox',
	      "heading" => __("Enable Pagination", "js_composer"),
	      "param_name" => "enable_pagination",
	      "description" => __("Would you like to enable pagination for this portfolio?", "js_composer"),
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
	      "heading" => __("Projects Per Page", "js_composer"),
	      "param_name" => "projects_per_page",
	      "description" => __("How many projects would you like to display per page? <br/> If pagination is not enabled, will simply show this number of projects <br/> Enter as a number example \"20\"", "js_composer")
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Lightbox Only", "js_composer"),
	      "param_name" => "lightbox_only",
	      "description" => __("This will remove the single project page from being accessible thus rendering your portfolio into only a gallery.", "js_composer"),
	      "value" => Array(__("Yes, please", "js_composer") => 'true')
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
		  "description" => __("Please select the style you would like your projects to display in ", "js_composer")
		)
	  )
	);

?>