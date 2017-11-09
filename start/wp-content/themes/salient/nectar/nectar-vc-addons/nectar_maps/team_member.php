<?php 

return array(
		  "name" => __("Team Member", "js_composer"),
		  "base" => "team_member",
		  "icon" => "icon-wpb-team-member",
		  "category" => __('Nectar Elements', 'js_composer'),
		  "description" => __('Add a team member element', 'js_composer'),
		  "params" => array(
		 	 array(
		      "type" => "fws_image",
		      "heading" => __("Image", "js_composer"),
		      "param_name" => "image_url",
		      "value" => "",
		      "description" => __("Select image from media library.", "js_composer")
		    ),
		 	 array(
		      "type" => "fws_image",
		      "heading" => __("Bio Image", "js_composer"),
		      "param_name" => "bio_image_url",
		      "value" => "",
		       "dependency" => Array('element' => "team_memeber_style", 'value' => array('bio_fullscreen')),
		      "description" => __("<i>Image Size Guidelines</i>  <br/>  <strong>Bio Image:</strong> large with a portrait aspect ratio - will be shown at the full screen height at 50% of the page width. <br/> <strong>Team Small Image:</strong> Will display at 500x500 so ensure the image you're uploading is at least that size.", "js_composer")
		    ),
		    array(
			  "type" => "dropdown",
			  "heading" => __("Team Member Stlye", "js_composer"),
			  "param_name" => "team_memeber_style",
			  "value" => array(
				 "Meta below" => "meta_below",
				 "Meta overlaid" => "meta_overlaid",
				 "Meta overlaid alt" => "meta_overlaid_alt",
				 "Bio Shown Fullscreen Modal" => "bio_fullscreen"
			   ),
			  'save_always' => true,
			  "description" => __("Please select the style you desire for your team member.", "js_composer")
			),
		    array(
		      "type" => "textfield",
		      "heading" => __("Name", "js_composer"),
		      "param_name" => "name",
		      "admin_label" => true,
		      "description" => __("Please enter the name of your team member", "js_composer")
		    ),
			array(
		      "type" => "textfield",
		      "heading" => __("Job Position", "js_composer"),
		      "param_name" => "job_position",
		      "admin_label" => true,
		      "description" => __("Please enter the job position for your team member", "js_composer")
		    ),
		    array(
		      "type" => "textarea",
		      "heading" => __("Team Member Bio", "js_composer"),
		      "param_name" => "team_member_bio",
		      "description" => __("The main text portion of your team member", "js_composer"),
		      "dependency" => Array('element' => "team_memeber_style", 'value' => array('bio_fullscreen'))
		    ),
		    array(
		      "type" => "textarea",
		      "heading" => __("Description", "js_composer"),
		      "param_name" => "description",
		      "description" => __("The main text portion of your team member", "js_composer"),
		      "dependency" => Array('element' => "team_memeber_style", 'value' => array('meta_below'))
		    ),
		    array(
		      "type" => "textarea",
		      "heading" => __("Social Media", "js_composer"),
		      "param_name" => "social",
		      "dependency" => Array('element' => "team_memeber_style", 'value' => array('meta_below')),
		      "description" => __("Enter any social media links with a comma separated list. e.g. Facebook,http://facebook.com, Twitter,http://twitter.com", "js_composer")
		    ),
		    array(
			  "type" => "dropdown",
			  "heading" => __("Team Member Link Type", "js_composer"),
			  "param_name" => "link_element",
			  "value" => array(
				 "None" => "none",
				 "Image" => "image",
				 "Name" => "name",	
				 "Both" => "both"
			   ),
			  'save_always' => true,
			   "dependency" => Array('element' => "team_memeber_style", 'value' => array('meta_below')),
			  "description" => __("Please select how you wish to link your team member to an arbitrary URL", "js_composer")
			),
			array(
		      "type" => "textfield",
		      "heading" => __("Team Member Link URL", "js_composer"),
		      "param_name" => "link_url",
		      "admin_label" => false,
		      "description" => __("Please enter the URL for your team member link", "js_composer"),
		      "dependency" => Array('element' => "link_element", 'value' => array('image', 'name', 'both'))
		    ),
		    array(
		      "type" => "textfield",
		      "heading" => __("Team Member Link URL", "js_composer"),
		      "param_name" => "link_url_2",
		      "admin_label" => false,
		      "description" => __("Please enter the URL for your team member link", "js_composer"),
		      "dependency" => Array('element' => "team_memeber_style", 'value' => array('meta_overlaid','meta_overlaid_alt')),
		    ),
		     array(
			  "type" => "dropdown",
			  "heading" => __("Link Color", "js_composer"),
			  "param_name" => "color",
			  "value" => array(
				 "Accent Color" => "Accent-Color",
				 "Extra Color-1" => "Extra-Color-1",
				 "Extra Color-2" => "Extra-Color-2",	
				 "Extra Color-3" => "Extra-Color-3"
			   ),
			  'save_always' => true,
			   "dependency" => Array('element' => "team_memeber_style", 'value' => array('meta_below')),
			  'description' => __( 'Choose a color from your <a target="_blank" href="'. admin_url() .'?page=Salient&tab=6">globally defined color scheme</a>', 'js_composer' ),
			)
		  )
		);

?>