<?php

function addHttp($url) {
  
  if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
    $url = "http://" . $url;
  }
  
  return $url;

}