<?php 

return array(
	  "name" => __("Social Buttons", "js_composer"),
	  "base" => "social_buttons",
	  "icon" => "icon-wpb-social-buttons",
	  "category" => __('Nectar Elements', 'js_composer'),
	  "description" => __('Add social buttons to any page', 'js_composer'),
	  "params" => array(
	     array(
	      "type" => 'checkbox',
	      "heading" => __("Display full width?", "js_composer"),
	      "param_name" => "full_width_icons",
	      "description" => __("This will make your social icons expand to fit edge to edge in whatever space they're placed." , "js_composer"),
	      "value" => Array(__("Yes", "js_composer") => 'true')
	    ),
	   /* array(
	      "type" => 'checkbox',
	      "heading" => __("Hide share counts?", "js_composer"),
	      "param_name" => "hide_share_count",
	      "description" => __("This will remove your share counts from displaying to the user" , "js_composer"),
	      "value" => Array(__("Yes", "js_composer") => 'true')
	    ), */
	 	 array(
	      "type" => 'checkbox',
	      "heading" => __("Nectar Love", "js_composer"),
	      "param_name" => "nectar_love",
	      "value" => Array(__("Yes", "js_composer") => 'true')
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Facebook", "js_composer"),
	      "param_name" => "facebook",
	      "value" => Array(__("Yes", "js_composer") => 'true')
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Twitter", "js_composer"),
	      "param_name" => "twitter",
	      "value" => Array(__("Yes", "js_composer") => 'true')
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Google+", "js_composer"),
	      "param_name" => "google_plus",
	      "value" => Array(__("Yes", "js_composer") => 'true')
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("LinkedIn", "js_composer"),
	      "param_name" => "linkedin",
	      "value" => Array(__("Yes", "js_composer") => 'true')
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Pinterest", "js_composer"),
	      "param_name" => "pinterest",
	      "description" => '',
	      "value" => Array(__("Yes", "js_composer") => 'true')
	    )
	  )
	);

?>