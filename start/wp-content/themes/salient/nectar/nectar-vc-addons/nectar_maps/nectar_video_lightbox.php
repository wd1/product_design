<?php 

return array(
	  "name" => __("Video Lightbox", "js_composer"),
	  "base" => "nectar_video_lightbox",
	  "icon" => "icon-wpb-video-lightbox",
	  "category" => __('Nectar Elements', 'js_composer'),
	  "description" => __('Add a video lightbox link', 'js_composer'),
	  "params" => array(
	  	array(
		  "type" => "dropdown",
		  "heading" => __("Link Style", "js_composer"),
		  "param_name" => "link_style",
		  "value" => array(
		     "Play Button" => "play_button",
		     "Play Button With text" => "play_button_with_text",
		     "Play Button With Preview Image" => "play_button_2",
			 "Nectar Button" => "nectar-button"
		   ),
		  'save_always' => true,
		  "admin_label" => true,
		  "description" => __("Please select your link style", "js_composer")	  
		),
		array(
	      "type" => "textfield",
	      "heading" => __("Video URL", "js_composer"),
	      "param_name" => "video_url",
	      "admin_label" => false,
	      "description" => __("The URL to your video on Youtube or Vimeo e.g. <br/> https://vimeo.com/118023315 <br/> https://www.youtube.com/watch?v=6oTurM7gESE", "js_composer")
	    ),
	    array(
		  "type" => "dropdown",
		  "heading" => __("Play Button Color", "js_composer"),
		  "param_name" => "nectar_play_button_color",
		  "value" => array(
			 "Accent Color" => "Default-Accent-Color",
			 "Extra Color 1" => "Extra-Color-1",
			 "Extra Color 2" => "Extra-Color-2",	
			 "Extra Color 3" => "Extra-Color-3"
		   ),
		  'save_always' => true,
		  "dependency" => array('element' => "link_style", 'value' => array("play_button_2","play_button_with_text")),
		  'description' => __( 'Choose a color from your <a target="_blank" href="'. admin_url() .'?page=Salient&tab=6">globally defined color scheme</a>', 'js_composer' ),
		),
	    array(
	      "type" => "fws_image",
	      "heading" => __("Video Preview Image", "js_composer"),
	      "param_name" => "image_url",
	      "value" => "",
	      "dependency" => array('element' => "link_style", 'value' => "play_button_2"),
	      "description" => __("Select image from media library.", "js_composer")
	    ),
	    array(
	      "type" => "dropdown",
	      "dependency" => array('element' => "link_style", 'value' => "play_button_2"),
	      "heading" => __("Hover Effect", "js_composer"),
	      'save_always' => true,
	      "param_name" => "hover_effect",
	      "value" => array(__("Zoom BG Image", "js_composer") => "defaut", __("Zoom Button", "js_composer") => "zoom_button"),
	      "description" => __("Select your desired hover effect", "js_composer")
	    ),
	    array(
	      "type" => "dropdown",
	      "dependency" => array('element' => "link_style", 'value' => "play_button_2"),
	      "heading" => __("Box Shadow", "js_composer"),
	      'save_always' => true,
	      "param_name" => "box_shadow",
	      "value" => array(__("None", "js_composer") => "none", __("Small Depth", "js_composer") => "small_depth", __("Medium Depth", "js_composer") => "medium_depth", __("Large Depth", "js_composer") => "large_depth", __("Very Large Depth", "js_composer") => "x_large_depth"),
	      "description" => __("Select your desired image box shadow", "js_composer")
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Link Text", "js_composer"),
	      "param_name" => "link_text",
	      "admin_label" => false,
	      "dependency" => array('element' => "link_style", 'value' => array("nectar-button","play_button_with_text")),
	      "description" => __("The text that will be displayed for your link", "js_composer")
	    ),
	   	array(
			"type" => "dropdown",
			"class" => "",
			'save_always' => true,
			"heading" => "Text Font Style",
			"dependency" => array('element' => "link_style", 'value' => array("play_button_with_text")),
			"description" => __("Choose what element your link text will inherit styling from", "js_composer"),
			"param_name" => "font_style",
			"value" => array(
				"Paragraph" => "p",
				"H6" => "h6",
				"H5" => "h5",
				"H4" => "h4",
				"H3" => "h3",
				"H2" => "h2",
				"H1" => "h1"
			)),

	     array(
		  "type" => "dropdown",
		  "heading" => __("Color", "js_composer"),
		  "param_name" => "nectar_button_color",
		  "value" => array(
			 "Accent Color" => "Default-Accent-Color",
			 "Extra Color 1" => "Default-Extra-Color-1",
			 "Extra Color 2" => "Default-Extra-Color-2",	
			 "Extra Color 3" => "Default-Extra-Color-3",
			 "Transparent Accent Color" =>  "Transparent-Accent-Color",
			 "Transparent Extra Color 1" => "Transparent-Extra-Color-1",
			 "Transparent Extra Color 2" => "Transparent-Extra-Color-2",	
			 "Transparent Extra Color 3" => "Transparent-Extra-Color-3"
		   ),
		  'save_always' => true,
		  "dependency" => array('element' => "link_style", 'value' => "nectar-button"),
		  'description' => __( 'Choose a color from your <a target="_blank" href="'. admin_url() .'?page=Salient&tab=6">globally defined color scheme</a>', 'js_composer' ),
		),

	  )
	);

?>