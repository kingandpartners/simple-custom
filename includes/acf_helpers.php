<?php

// This function helps to maintain a bidirectional association between separate
// post types. For instance, a menu item belongs to many menu categories and
// a menu category belongs to many menu items. 
function update_associated_field($value, $post_id, $field, $associated_field) {
  $field_name  = $field['name'];
  $global_name = 'bidirectional_update';
  if (!empty($GLOBALS[$global_name])) return $value;
  $GLOBALS[$global_name] = 1;
  if (!is_array($value)) $value = array();

  // find posts need to be added
  foreach($value as $item_id) {
    $items = get_field($associated_field, $item_id, false);

    if (empty($items)) $items = array();
    if (in_array($post_id, $items)) continue;

    $items[] = $post_id;

    update_field($associated_field, $items, $item_id);
  }

  // find posts which have been removed
  $old_value = get_field($field_name, $post_id, false);
  if (!is_array($old_value)) $old_value = array();

  foreach($old_value as $item_id) {
    if (in_array($item_id, $value)) continue;
    $items = get_field($associated_field, $item_id, false);
    if (empty($items)) continue;

    $pos = array_search($post_id, $items);
    unset($items[$pos]);

    update_field($associated_field, $items, $item_id);
  }

  $GLOBALS[$global_name] = 0;
}
