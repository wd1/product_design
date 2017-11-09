<?php 

$vc_is_wp_version_3_6_more = version_compare(preg_replace('/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo('version')), '3.6') >= 0;

return array(
	  "name" => __("Client", "js_composer"),
	  "base" => "client",
	  "allowed_container_element" => 'vc_row',
	  "is_container" => true,
	  "content_element" => false,
	  "params" => array(
	    array(
	      "type" => "fws_image",
	      "heading" => __("Image", "js_composer"),
	      "param_name" => "image",
	      "value" => "",
	      "description" => __("Select image from media library.", "js_composer")
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("URL", "js_composer"),
	      "param_name" => "url",
	      "description" => __("Add an optional link to your client", "js_composer")
	    ),
	    array(
	      "admin_label" => true,
	      "type" => "textfield",
	      "heading" => __("Client Name", "js_composer"),
	      "param_name" => "name",
	      "description" => __("Fill this out to keep track of which client is which in your page builder interface.", "js_composer")
	    )
	  ),
	  'js_view' => ($vc_is_wp_version_3_6_more ? 'VcTabView' : 'VcTabView35')
	);

?>