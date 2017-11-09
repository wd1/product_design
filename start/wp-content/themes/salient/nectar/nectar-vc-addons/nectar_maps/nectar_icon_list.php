<?php 
	
	$vc_is_wp_version_3_6_more = version_compare(preg_replace('/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo('version')), '3.6') >= 0;
	
	$tab_id_1 = time().'-1-'.rand(0, 100);
	$tab_id_2 = time().'-2-'.rand(0, 100);

	return array(
	  "name"  => __("Icon List", "js_composer"),
	  "base" => "nectar_icon_list",
	  "show_settings_on_create" => false,
	  "is_container" => true,
	  "icon" => "icon-wpb-fancy-ul",
	  "category" => __('Nectar Elements', 'js_composer'),
	  "description" => __('Create an icon list', 'js_composer'),
	  "params" => array(
	   
	    array(
	      "type" => "checkbox",
		  "class" => "",
		  "heading" => "Animate Element?",
		  "value" => array("Yes, please" => "true" ),
		  "param_name" => "animate",
		  "description" => ""
	    ),
	     array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Icon Color",
			"param_name" => "color",
			"value" => array(
				"Default (inherit from row Text Color)" => "default",
				"Accent Color" => "Accent-Color",
				"Extra Color 1" => "Extra-Color-1",
				"Extra Color 2" => "Extra-Color-2",	
				"Extra Color 3" => "Extra-Color-3",
				"Color Gradient 1" => "extra-color-gradient-1",
				"Color Gradient 2" => "extra-color-gradient-2"
			),
			'save_always' => true,
			'description' => __( 'Choose a color from your <a target="_blank" href="'. admin_url() .'?page=Salient&tab=6">globally defined color scheme</a>', 'js_composer' ),
		),

	    array(
	      "type" => "dropdown",
	      "heading" => __("Icon Size", "js_composer"),
	      "param_name" => "icon_size",
	      "value" => array(
				"Small" => "small",
				"Medium" => "medium",
				"Large" => "large"
			),
	      'save_always' => true,
	      "description" => __("Please select the direction you would like your list items to display in", "js_composer")
	    ),

	    array(
	      "type" => "dropdown",
	      "heading" => __("Icon Style", "js_composer"),
	      "param_name" => "icon_style",
	      "value" => array(
				"Icon Colored W/ Border" => "border",
				"Icon Colored No Border" => "no-border"
			),
	      'save_always' => true,
	      "description" => __("Please select the direction you would like your list items to display in", "js_composer")
	    ),

	  ),
	  "custom_markup" => '
	  <div class="wpb_tabs_holder wpb_holder vc_container_for_children">
	  <ul class="tabs_controls">
	  </ul>
	  %content%
	  </div>'
	  ,
	  'default_content' => '
	  [nectar_icon_list_item title="'.__('List Item','js_composer').'" id="'.$tab_id_1.'"]  [/nectar_icon_list_item]
	  [nectar_icon_list_item title="'.__('List Item','js_composer').'" id="'.$tab_id_2.'"] [/nectar_icon_list_item]
	  ',
	  "js_view" => ($vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35')
	);

?>