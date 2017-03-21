<?php

function image_attributes($prefix = '') {
  return image_attribute('Image', $prefix);
}

function images_attributes($prefix = '') {
  return repeater_attribute('Images', $prefix, array(
    select_attribute('Type', '', array(
      'main'      => 'main',
      'secondary' => 'secondary',
      'banner'    => 'banner',
      'listing'   => 'listing'
    )),
    image_attribute('Image')
  ));
}

function images_repeater_attributes($prefix = '') {
  return repeater_attribute('Images', $prefix, array(
    images_attributes()
  ));
}

function title_attributes($prefix = '') {
  return text_attribute('Title', $prefix);
}

function title_repeater_attributes($prefix = '') {
  return repeater_attribute('Title', $prefix, array(
    title_attributes()
  ));
}

function description_attributes($prefix = '') {
  return textarea_attribute('Description', $prefix);
}

function details_attributes($prefix = '') {
  return textarea_attribute('Details', $prefix);
}

function link_attributes($prefix = '') {
  return text_attribute('Link', $prefix);
}

function links_attributes($prefix = '') {
  return repeater_attribute('Links', $prefix, array(
    text_attribute('Link Text'),
    text_attribute('Link Url')
  ));
}

function links_repeater_attributes($prefix = '') {
  return repeater_attribute('Links', $prefix, array(
    links_attributes()
  ));
}

function subtext_attributes($prefix = '') {
  return repeater_attribute('Sub Text', $prefix, array(
    textarea_attribute('Paragraph')
  ));
}

function subtext_repeater_attributes($prefix = '') {
  return repeater_attribute('Sub Text', $prefix, array(
    subtext_attributes()
  ));
}

function wysiwyg_attributes($prefix = '') {
  return repeater_attribute('Wysiwyg Field', $prefix, array(
    wysiwyg_attribute('Editor')
  ));
}

function wysiwyg_repeater_attributes($prefix = '') {
  return repeater_attribute('Wysiwyg Field', $prefix, array(
    wysiwyg_attributes()
  ));
}

function videos_attributes($prefix = '') {
  return repeater_attribute('Videos', $prefix, array(
    file_attribute('mp4'),
    file_attribute('webm'),
    image_attribute('cover'),
    image_attribute('gif')
  ));
}

function videos_repeater_attributes($prefix = '') {
  return repeater_attribute('Videos', $prefix, array(
    videos_attributes()
  ));
}


// Address attributes

function address_1_attributes($prefix = '') {
  return text_attribute('Address 1', $prefix);
}

function address_2_attributes($prefix = '') {
  return text_attribute('Address 2', $prefix);
}

function city_attributes($prefix = '') {
  return text_attribute('City', $prefix);
}

function state_attributes($prefix = '') {
  return text_attribute('State', $prefix);
}

function postal_code_attributes($prefix = '') {
  return text_attribute('Postal Code', $prefix);
}

function telephone_attributes($prefix = '') {
  return text_attribute('Telephone', $prefix);
}

function country_attributes($prefix = '') {
  return select_attribute('Country', $prefix, array(
    'UK' => 'United Kingdom',
    'US' => 'United States'
  ));
}

// Geolocation attributes

function latitude_attributes($prefix = '') {
  return text_attribute('Latitude', $prefix);
}

function longitude_attributes($prefix = '') {
  return text_attribute('Longitude', $prefix);
}

// Misc

function icon_attributes($prefix = '') {
  return array(
    text_attribute('icon')
  );
}

function url_attributes($prefix = '') {
  return array(
    text_attribute('url')
  );
}
