<?php 
return array(
	  "name" => __("Toggle Panels", "js_composer"),
	  "base" => "toggles",
	  "show_settings_on_create" => false,
	  "is_container" => true,
	  "icon" => "icon-wpb-ui-accordion",
	  "category" => __('Nectar Elements', 'js_composer'),
	  "description" => __('jQuery toggles/accordion', 'js_composer'),
	  "params" => array(
	  	array(
		  "type" => "dropdown",
		  "heading" => __("Style", "js_composer"),
		  "param_name" => "style",
		  "admin_label" => true,
		  "value" => array(
			 "Default" => "default",
			 "Minimal" => "minimal",
		   ),
		  'save_always' => true,
		  "description" => __("Please select the style you desire for your toggle element.", "js_composer")
		),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Allow collapsible all", "js_composer"),
	      "param_name" => "accordion",
	      "description" => __("Select checkbox to turn the toggles in an accordion.", "js_composer"),
	      "value" => Array(__("Allow", "js_composer") => 'true')
	    )
	  ),
	  "custom_markup" => '
	  <div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">
	  %content%
	  </div>
	  <div class="tab_controls">
	 <a class="add_tab" title="' . __( 'Add section', 'js_composer' ) . '"><span class="vc_icon"></span> <span class="tab-label">' . __( 'Add section', 'js_composer' ) . '</span></a>
	  </div>
	  ',
	  'default_content' => '
	  [toggle title="'.__('Section', "js_composer").'"][/toggle]
	  [toggle title="'.__('Section', "js_composer").'"][/toggle]
	  ',
	  'js_view' => 'VcAccordionView'
	);
?>