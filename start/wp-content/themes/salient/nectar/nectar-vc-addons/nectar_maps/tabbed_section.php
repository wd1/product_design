<?php 

	$tab_id_1 = time().'-1-'.rand(0, 100);
	$tab_id_2 = time().'-2-'.rand(0, 100);
	$vc_is_wp_version_3_6_more = version_compare(preg_replace('/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo('version')), '3.6') >= 0;
	
	return array(
	  "name"  => __("Tabs", "js_composer"),
	  "base" => "tabbed_section",
	  "show_settings_on_create" => false,
	  "is_container" => true,
	  "icon" => "icon-wpb-ui-tab-content",
	  "category" => __('Nectar Elements', 'js_composer'),
	  "description" => __('Tabbed content', 'js_composer'),
	  "params" => array(
	  	 array(
		  "type" => "dropdown",
		  "heading" => __("Style", "js_composer"),
		  "param_name" => "style",
		  "admin_label" => true,
		  "value" => array(
			 "Default" => "default",
			 "Minimal" => "minimal",
			 "Minimal Alt" => "minimal_alt",
			 "Vertical" => "vertical"
		   ),
		  'save_always' => true,
		  "description" => __("Please select the style you desire for your tabbed element.", "js_composer")
		),
	  	 array(
		  "type" => "dropdown",
		  "heading" => __("Alignment", "js_composer"),
		  "param_name" => "alignment",
		  "admin_label" => false,
		  "value" => array(
			 "Left" => "left",
			 "Center" => "center",
			 "Right" => "right"
		   ),
		  'save_always' => true,
		  "dependency" => Array('element' => "style", 'value' => array('minimal','default', 'minimal_alt')),
		  "description" => __("Please select your tabbed alignment", "js_composer")
		),

	  	array(
	      "type" => "textfield",
	      "heading" => __("Optional CTA button", "js_composer"),
	      "param_name" => "cta_button_text",
	      "description" => __("If you wish to include an optional CTA button on your tabbed nav, enter the text here", "js_composer"),
	       "admin_label" => false,
	      "dependency" => Array('element' => "style", 'value' => array('minimal','minimal_alt'))
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("CTA button link", "js_composer"),
	      "param_name" => "cta_button_link",
	      "description" => __("Enter a URL for your button link here", "js_composer"),
	       "admin_label" => false,
	      "dependency" => Array('element' => "style", 'value' => array('minimal','minimal_alt'))
	    ),
	     array(
		  "type" => "dropdown",
		  "heading" => __("CTA Button Color", "js_composer"),
		  "param_name" => "cta_button_style",
		  "admin_label" => false,
		  "value" => array(
			 "Accent Color" => "accent-color",
			 "Extra Color 1" => "extra-color-1",
			 "Extra Color 2" => "extra-color-2",
			 "Extra Color 3" => "extra-color-3",
		   ),
		  'save_always' => true,
		  'description' => __( 'Choose a color from your <a target="_blank" href="'. admin_url() .'?page=Salient&tab=6">globally defined color scheme</a>', 'js_composer' ),
		   "dependency" => Array('element' => "style", 'value' => array('minimal','minimal_alt'))
		),


	    array(
	      "type" => "textfield",
	      "heading" => __("Extra class name", "js_composer"),
	      "param_name" => "el_class",
	      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
	    )
	  ),
	  "custom_markup" => '
	  <div class="wpb_tabs_holder wpb_holder vc_container_for_children">
	  <ul class="tabs_controls">
	  </ul>
	  %content%
	  </div>'
	  ,
	  'default_content' => '
	  [tab title="'.__('Tab','js_composer').'" id="'.$tab_id_1.'"] I am text block. Click edit button to change this text. [/tab]
	  [tab title="'.__('Tab','js_composer').'" id="'.$tab_id_2.'"] I am text block. Click edit button to change this text. [/tab]
	  ',
	  "js_view" => ($vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35')
	);
?>