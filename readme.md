Defining custom posts with ACF fields traditionally requires writing a lot of large, redundant arrays. This plugin adds helper functions that allow you to create robust custom posts (and pages) using ACF pro with small amounts of code.

### Attributes

Custom posts are made up of attributes. Use functions in `includes/attribute_helpers.php` to create completely custom attributes.

**includes/basic_attributes.php**
```php

// ...

function image_attributes($prefix = '') {
  return basic_attributes('Image', $prefix, array(
    'type' => 'image'
  ));
}

function link_attributes($prefix = '') {
  return basic_attributes('Link', $prefix, array(
    'type' => 'text'
  ));
}

// ...

```

### Post Types

Post types define a singular and plural label for the post type along with abbreviated options for creating custom post types. `fields` is an array of attribute names defined by functions in `includes/basic_attributes.php`

**web/app/themes/YOUR_THEME/includes/custom_post_types.php**
```php
register_simple_custom_post('Grocery Retailer', 'Grocery Retailers', array(
  'menu_icon' => 'dashicons-store',
  'fields'    => array(
    'image_attributes',
    'link_attributes'
  )
));
```

### Pages

```php
register_simple_custom_page(array(
  'title'    => 'Our Purpose',
  'template' => 'page-our-purpose.php',
  'sections' => array(
    array(
      'title'  => 'Content Blocks',
      'fields' => array(
        'content_block_attributes'
      )
    )
  )
));
```