<?php 

return array(
		  "name" => __("Milestone", "js_composer"),
		  "base" => "milestone",
		  "icon" => "icon-wpb-milestone",
		  "category" => __('Nectar Elements', 'js_composer'),
		  "description" => __('Add an animated milestone', 'js_composer'),
		  "params" => array(
			array(
		      "type" => "textfield",
		      "heading" => __("Milestone Number", "js_composer"),
		      "param_name" => "number",
		      "admin_label" => true,
		      "description" => __("The number/count of your milestone e.g. \"13\"", "js_composer")
		    ),
		    array(
			  "type" => "dropdown",
			  "heading" => __("Milestone Number Inherit Font", "js_composer"),
			  "param_name" => "heading_inherit",
			  "value" => array(
			     "Default" => "default",
				 "h1" => "h1",
				 "h2" => "h2",
				 "h3" => "h3",
				 "h4" => "h4",
				 "h5" => "h5",
			   ),
			  'save_always' => true,
			  "description" => __("Please select if you would like your milestone number to inherit a font family from any heading tag", "js_composer")
			),
		    array(
		      "type" => "textfield",
		      "heading" => __("Milestone Symbol", "js_composer"),
		      "param_name" => "symbol",
		      "admin_label" => false,
		      "description" => __("An optional symbol to place next to the number counted to. e.g. \"%\" or \"+\"", "js_composer")
		    ),
		    array(
			  "type" => "dropdown",
			  "heading" => __("Milestone Symbol Position", "js_composer"),
			  "param_name" => "symbol_position",
			  "value" => array(
			     "After Number" => "after",
				 "Before Number" => "before",
			   ),
			  'save_always' => true,
			  "description" => __("Please select the position you would like for your symbol.", "js_composer"),
			  "dependency" => Array('element' => "symbol", 'not_empty' => true)
			),
		    array(
		      "type" => "textfield",
		      "heading" => __("Milestone Subject", "js_composer"),
		      "param_name" => "subject",
		      "admin_label" => true,
		      "description" => __("The subject of your milestones e.g. \"Projects Completed\"", "js_composer")
		    ),
		    array(
			  "type" => "dropdown",
			  "heading" => __("Milestone Subject Padding", "js_composer"),
			  "param_name" => "subject_padding",
			  "value" => array(
			     "0%" => "0",
				 "2%" => "2%",
				 "4%" => "4%",
				 "6%" => "6%",
				 "8%" => "8%",
				 "10%" => "10%",
			   ),
			  'save_always' => true,
			  "description" => __("Please select amount of padding you would like your subject to have", "js_composer")
			),

		     array(
			  "type" => "dropdown",
			  "heading" => __("Color", "js_composer"),
			  "param_name" => "color",
			  "value" => array(
			     "Default (inherit from row Text Color)" => "Default",
				 "Accent-Color" => "Accent-Color",
				 "Extra-Color-1" => "Extra-Color-1",
				 "Extra-Color-2" => "Extra-Color-2",	
				 "Extra-Color-3" => "Extra-Color-3"
			   ),
			  'save_always' => true,
			  'description' => __( 'Choose a color from your <a target="_blank" href="'. admin_url() .'?page=Salient&tab=6">globally defined color scheme</a>', 'js_composer' ),
			),

		     array(
			  "type" => "dropdown",
			  "heading" => __("Animation Effect", "js_composer"),
			  "param_name" => "effect",
			  "value" => array(
				 "Count To Value" => "count",
				 "Motion Blur Slide In" => "motion_blur"
			   ),
			  'save_always' => true,
			  "description" => __("Please select the animation you would like your milestone to have", "js_composer")
			),
		     array(
		      "type" => "textfield",
		      "heading" => __("Milestone Number Font Size", "js_composer"),
		      "param_name" => "number_font_size",
		      "admin_label" => false,
		      "description" => __("Enter your size in pixels, the default is 62.", "js_composer")
		    ),
		     array(
		      "type" => "textfield",
		      "heading" => __("Milestone Symbol Font Size", "js_composer"),
		      "param_name" => "symbol_font_size",
		      "admin_label" => false,
		      "description" => __("Enter your size in pixels.", "js_composer"),
		      "dependency" => Array('element' => "symbol", 'not_empty' => true)
		    ),
		     array(
			  "type" => "dropdown",
			  "heading" => __("Milestone Symbol Alignment", "js_composer"),
			  "param_name" => "symbol_alignment",
			  "value" => array(
			     "Default" => "Default",
				 "Superscript" => "Superscript",
			   ),
			  'save_always' => true,
			  "description" => __("Please select the alignment you desire for your symbol.", "js_composer"),
			  "dependency" => Array('element' => "symbol", 'not_empty' => true)
			),

		     array(
			  "type" => "dropdown",
			  "heading" => __("Milestone Text Alignment", "js_composer"),
			  "param_name" => "milestone_alignment",
			  "value" => array(
			     "Default" => "default",
				 "Left" => "left",
				 "Right" => "right",
			   ),
			  'save_always' => true,
			  "description" => __("Please select the alignment for your overall milestone.", "js_composer"),
			)

		  )
		);

?>