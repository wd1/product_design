<?php 

return array(
			"name" => "Split Line Heading",
			"base" => "split_line_heading",
			"icon" => "icon-wpb-split-line-heading",
			"allowed_container_element" => 'vc_row',
			"category" => __('Nectar Elements', 'js_composer'),
			"description" => __('Animated multi line heading', 'js_composer'),
			"params" => array(
				array(
			      "type" => "textarea_html",
			      "holder" => "div",
			      "heading" => __("Text Content", "js_composer"),
			      "param_name" => "content",
			      "value" => __("", "js_composer"),
			      "description" => __("Each Line of this editor will be animated separately. Separate text with the Enter or Return key on your Keyboard.", "js_composer"),
			      "admin_label" => false
			    ),

			)
	);

?>