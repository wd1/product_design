<?php 

return array(
		  "name" => __("Nectar Hotspot", "js_composer"),
		  "base" => "nectar_hotspot",
		  "allowed_container_element" => 'vc_row',
		  "content_element" => false,
		  "params" => array(
		    array(
			"type" => "dropdown",
			"class" => "",
			'save_always' => true,
			"heading" => "Position",
			"param_name" => "position",
			"value" => array(
				"top" => "top",
				"right" => "right",
				"bottom" => "bottom",
				"left" => "left",
			)),
		    array(
		      "type" => "textfield",
		      "heading" => __("Left", "js_composer"),
		      "param_name" => "left"
		    ),
		    array(
		      "type" => "textfield",
		      "heading" => __("Top", "js_composer"),
		      "param_name" => "top"
		    ),
		    array(
		      "type" => "textarea_html",
		      "heading" => __("Content", "js_composer"),
		      "param_name" => "content",
		      "description" => __("", "js_composer"),
		    )
		  )
		
		);

?>