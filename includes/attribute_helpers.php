<?php

function basic_attributes($label, $prefix, $options = array()) {
  return array_merge(array(
    'key'   => $prefix . underscoreize($label),
    'label' => $label,
    'name'  => $prefix . underscoreize($label),
  ), $options);
}

function text_attribute($type, $prefix = '') {
  return basic_attributes($type, $prefix, array(
    'type' => 'text'
  ));
}

function conditional_attribute($field, $value, $attributes) {
  return array_merge($attributes, array(
    'conditional_logic' => array(
      array(
        array(
          'field'    => $field,
          'operator' => '==',
          'value'    => $value,
        )
      )
    )
  ));
}

function textarea_attribute($type, $prefix = '') {
  return basic_attributes($type, $prefix, array(
    'type' => 'textarea'
  ));
}

function number_attribute($type, $prefix = '') {
  return basic_attributes($type, $prefix, array(
    'type' => 'number'
  ));
}

function file_attribute($type, $prefix = '') {
  return basic_attributes($type, $prefix, array(
    'type' => 'file'
  ));
}

function image_attribute($type, $prefix = '') {
  return basic_attributes($type, $prefix, array(
    'type' => 'image'
  ));
}

function relationship_attribute($label, $underscore, $prefix) {
  $post_type = is_array($underscore) ? $underscore : array($underscore);
  return basic_attributes($label, $prefix, array(
    'label'     => $label,
    'type'      => 'relationship',
    'post_type' => $post_type,
    'elements'  => array('featured_image'),
    'filters'   => array('search', 'taxonomy')
  ));
}

function repeater_attribute($type, $prefix = '', $fields = array()) {
  return basic_attributes($type, $prefix, array(
    'type'       => 'repeater',
    'sub_fields' => $fields
  ));
}

function select_attribute($type, $prefix = '', $choices = array()) {
  return basic_attributes($type, $prefix, array(
    'type'    => 'select',
    'choices' => $choices
  ));
}

function radio_attribute($type, $prefix = '', $choices = array()) {
  return basic_attributes($type, $prefix, array(
    'type'    => 'radio',
    'choices' => $choices
  ));
}

function checkbox_attribute($type, $prefix = '', $choices = array()) {
  return basic_attributes($type, $prefix, array(
    'type'    => 'checkbox',
    'choices' => $choices
  ));
}

function flex_attribute($type, $prefix = '', $layouts = array()) {
  return basic_attributes($type, $prefix, array(
    'type'    => 'flexible_content',
    'layouts' => $layouts
  ));
}

function wysiwyg_attribute($type, $prefix = '') {
  return basic_attributes($type, $prefix, array(
    'type'         => 'wysiwyg',
    'tabs'         => 'visual',
    'toolbar'      => 'Very Simple',
    'media_upload' => 0
  ));
}

function boolean_attribute($type, $prefix = '') {
  return basic_attributes($type, $prefix, array(
    'type' => 'true_false'
  ));
}
