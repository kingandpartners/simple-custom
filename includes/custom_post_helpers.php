<?php

function get_simple_custom_posts($post_type) {
  return get_posts(array(
    'post_type'      => $post_type,
    'posts_per_page' => 1000
  ));
}

function basic_location($type, $value) {
  return array(
    'location' => array(
      array(
        array(
          'param'    => $type,
          'operator' => '==',
          'value'    => $value,
        )
      )
    )
  );
}

function basic_post_type_args($singular, $plural) {
  return array(
    'labels' => array(
      'name'               => _x( $plural, 'post type general name' ),
      'singular_name'      => _x( $singular, 'post type singular name' ),
      'add_new'            => _x( 'Add New', $singular ),
      'add_new_item'       => __( "Add New $singular" ),
      'edit_item'          => __( "Edit $singular" ),
      'new_item'           => __( "New $singular" ),
      'all_items'          => __( "All $plural" ),
      'view_item'          => __( "View $singular" ),
      'search_items'       => __( "Search $plural" ),
      'not_found'          => __( "No $plural found" ),
      'not_found_in_trash' => __( "No $plural found in the Trash" ),
      'parent_item_colon'  => '',
      'menu_name'          => $plural
    ),
    'description'   => '',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array('title'),
    'has_archive'   => underscoreize($singular),
    'rewrite'       => array(
      'slug'       => underscoreize($singular),
      'with_front' => false
    )
  );
}

function register_simple_custom_post($singular, $plural, $options = array()) {
  $defaults = basic_post_type_args($singular, $plural);
  $fields = (array_key_exists('fields', $options)) ? $options['fields'] : null;
  unset($options['fields']);
  $args = array_merge($defaults, $options);
  register_post_type(underscoreize($singular), $args);
  register_simple_custom_fields($singular, $plural, $fields);
}

function register_simple_custom_fields($singular, $plural, $fields, $location = array()) {
  if (!$fields) { return; }
  simple_custom_field($singular, $plural, array_map(
    'register_simple_custom_field',
    array_fill(0, count($fields), underscoreize($singular)),
    $fields
  ), $location);
}

function register_simple_custom_page($options) {
  foreach($options['sections'] as $section) {
    register_simple_custom_fields(
      $section['title'],
      $section['title'],
      $section['fields'],
      basic_location('page_template', $options['template'])
    );
  }
}

function register_simple_custom_field($under_singular, $attributes) {
  return $attributes($under_singular . '_');
}

function simple_custom_field($singular, $plural, $fields, $location = array()) {
  $under_singular = underscoreize($singular);
  $under_plural   = underscoreize($plural); 
  $location       = array_merge(basic_location('post_type', $under_singular), $location);
  $fields         = array_merge(
    array(
      'key'    => $under_plural,
      'title'  => $plural,
      'fields' => $fields
    )
  , $fields);
  acf_add_local_field_group(array_merge($fields, $location));
}