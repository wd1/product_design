<?php 

$is_admin = is_admin();

$woo_args = array(
	'taxonomy' => 'product_cat',
);
$woo_types = ($is_admin) ? get_categories($woo_args) : array('All' => 'all');
$woo_options = array("All" => "all");

if($is_admin) {
	foreach ($woo_types as $type) {
		$woo_options[$type->name] = $type->slug;
	}
} else {
	$woo_options['All'] = 'all';
}

////recent products
return array(
  "name" => __("WooCommerce Products", "js_composer"),
  "base" => "nectar_woo_products",
  "weight" => 8,
  "icon" => "icon-wpb-recent-products",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('Display your products', 'js_composer'),
  "params" => array(
  	array(
	  "type" => "dropdown",
	  "heading" => __("Product Type", "js_composer"),
	  "param_name" => "product_type",
	  "value" => array(
	  	'All' => 'all',
	  	'Sale Only' => 'sale',
	  	'Featured Only' => 'featured',
	  	'Best Selling Only' => 'best_selling'
	  ),
	  'save_always' => true,
	  "description" => __("Please select the type of products you would like to display.", "js_composer")
	),
	array(
	  "type" => "dropdown_multi",
	  "heading" => __("Product Categories", "js_composer"),
	  "param_name" => "category",
	  "admin_label" => true,
	  "value" => $woo_options,
	  'save_always' => true,
	  "description" => __("Please select the categories you would like to display in your products. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "js_composer")
	),
	array(
	  "type" => "dropdown",
	  "heading" => __("Number Of Columns", "js_composer"),
	  "param_name" => "columns",
	  "value" => array(
	  	'4' => '4',
	  	'3' => '3',
	  	'2' => '2',
	  	'1' => '1'
	  ),
	  'save_always' => true,
	  "description" => __("Please select the number of columns you would like to display.", "js_composer")
	),
	array(
      "type" => "textfield",
      "heading" => __("Number Of Products", "js_composer"),
      "param_name" => "per_page",
       "admin_label" => true,
      "description" => __("How many posts would you like to display? <br/> Enter as a number example \"4\"", "js_composer")
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Enable Carousel Display", "js_composer"),
      "param_name" => "carousel",
      "description" => __("This will override your column choice", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => true),
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Enable Controls On Hover", "js_composer"),
      "param_name" => "controls_on_hover",
      "dependency" => Array('element' => "carousel", 'not_empty' => true),
      "description" => __("This will add buttons for additional user control over your product carousel", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => true),
    )
  )
);

?>