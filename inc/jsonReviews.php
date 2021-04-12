<?php
// read json file
$reviewjson = file_get_contents("reviews.json");
// convert json into associative array
$reviews = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $reviewjson), true );
return $reviews;
?>