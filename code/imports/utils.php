<?php

require_once 'blacklist.php';

/**
 * @return mysqli
 *
 * This function is the basic DB access function used throughout the site
 */
function get_db() {
  $db = mysqli_connect('localhost', 'root', 'root', 'FedNews');

  if (!$db) die(mysqli_connect_error());
  else return $db;
}

/**
 * @param $pass String - The password that is to be hashed
 *
 * @return string The hashed password
 *
 * This function is used in the signup process to generate hased passwords
 * for the DB
 */
function get_hash($pass) {
  $bytes = openssl_random_pseudo_bytes(30);
  $random_data = substr(base64_encode($bytes), 0, 22);
  $random_data = strtr($random_data, '+', '.');

  $local_salt = "$2y$12$" . $random_data;
  return crypt($pass, $local_salt);
}

/**
 * @param $string    String - The input to be filtered. Can be any case (upper
 *                   or lower).
 *
 * @return array
 *
 * This function is used to parse incoming news stories. It returns an array
 * containing banned words which appear in the text
 */
function filter_language($string) {
    global $blacklist;
  $words = explode(' ', strtolower($string));
  $found = [];
  foreach ($blacklist as $item)
    if (in_array($item, $words)) $found[] = $item;


  return $found;
}