<?php

function underscoreize($string) {
  $string = strtolower($string);
  $string = str_replace(' ', '_', $string);
  return $string;
}

function paramaterize($string) {
  $string = strtolower($string);
  $string = str_replace(' ', '-', $string);
  $string = str_replace("'", '', $string);
  $string = str_replace("[", '', $string);
  $string = str_replace("]", '', $string);
  return $string;
}
