<?php 

return array(
	  "name" => __("Single Image", "js_composer"),
	  "base" => "image_with_animation",
	  "icon" => "icon-wpb-single-image",
	  "category" => __('Nectar Elements', 'js_composer'),
	  "description" => __('Simple image with CSS animation', 'js_composer'),
	  "params" => array(
	    array(
	      "type" => "fws_image",
	      "heading" => __("Image", "js_composer"),
	      "param_name" => "image_url",
	      "value" => "",
	      "description" => __("Select image from media library.", "js_composer")
	    ),
	    array(
	      "type" => "dropdown",
	      "heading" => __("Image Alignment", "js_composer"),
	      'save_always' => true,
	      "param_name" => "alignment",
	      "value" => array(__("Align left", "js_composer") => "", __("Align right", "js_composer") => "right", __("Align center", "js_composer") => "center"),
	      "description" => __("Select image alignment.", "js_composer")
	    ),
	    array(
		  "type" => "dropdown",
		  "heading" => __("CSS Animation", "js_composer"),
		  "param_name" => "animation",
		  "admin_label" => true,
		  "value" => array(
			    __("Fade In", "js_composer") => "Fade In", 
			    __("Fade In From Left", "js_composer") => "Fade In From Left", 
			    __("Fade In From Right", "js_composer") => "Fade In From Right", 
			    __("Fade In From Bottom", "js_composer") => "Fade In From Bottom", 
			    __("Grow In", "js_composer") => "Grow In",
			    __("Flip In Horizontal", "js_composer") => "Flip In",
			    __("Flip In Vertical", "js_composer") => "flip-in-vertical",
			    __("None", "js_composer") => "None"
			),
		  'save_always' => true,
		  "description" => __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "js_composer")
		),
		array(
	      "type" => "textfield",
	      "heading" => __("Animation Delay", "js_composer"),
	      "param_name" => "delay",
	      "description" => __("Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in \"one by one\" effect in horizontal columns.", "js_composer")
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Link to large image?", "js_composer"),
	      "param_name" => "img_link_large",
	      "description" => __("If selected, image will be linked to the bigger image.", "js_composer"),
	      "value" => Array(__("Yes, please", "js_composer") => 'yes')
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Image link", "js_composer"),
	      "param_name" => "img_link",
	      "description" => __("Enter url if you want this image to have link.", "js_composer"),
	      "dependency" => Array('element' => "img_link_large", 'is_empty' => true)
	    ),
	    array(
	      "type" => "dropdown",
	      "heading" => __("Link Target", "js_composer"),
	      "param_name" => "img_link_target",
	      "value" => array(__("Same window", "js_composer") => "_self", __("New window", "js_composer") => "_blank"),
	      "dependency" => Array('element' => "img_link", 'not_empty' => true)
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Extra class name", "js_composer"),
	      "param_name" => "el_class",
	      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
	    ),
	    array(
	      "type" => "dropdown",
	      "heading" => __("Box Shadow", "js_composer"),
	      'save_always' => true,
	      "param_name" => "box_shadow",
	      "value" => array(__("None", "js_composer") => "none", __("Small Depth", "js_composer") => "small_depth", __("Medium Depth", "js_composer") => "medium_depth", __("Large Depth", "js_composer") => "large_depth", __("Very Large Depth", "js_composer") => "x_large_depth"),
	      "description" => __("Select your desired image box shadow", "js_composer")
	    ),
	    array(
	      "type" => "dropdown",
	      "heading" => __("Max Width", "js_composer"),
	      'save_always' => true,
	      "param_name" => "max_width",
	      "value" => array(
		      	__("100%", "js_composer") => "100%",
		      	__("125%", "js_composer") => "125%", 
		      	__("150%", "js_composer") => "150%",
		      	__("165%", "js_composer") => "165%",  
		      	__("175%", "js_composer") => "175%", 
		      	__("200%", "js_composer") => "200%", 
		      	__("225%", "js_composer") => "225%", 
		      	__("250%", "js_composer") => "250%"
	      ),
	      "description" => __("Select your desired max width here - by default images are not allowed to display larger than the column they're contained in. Changing this to a higher value will allow you to create designs where your image overflows out of the column partially off screen.", "js_composer")
	    )
	  )
	);

?>