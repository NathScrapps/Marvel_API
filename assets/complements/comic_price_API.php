<?php
$url_price = "https://gateway.marvel.com:443/v1/public/comics/$comic_id?ts=$YOUR_TS_VALUE&apikey=$YOUR_PUBLIC_KEY&hash=$YOUR_HASH_MD5_VALUE";
$options_url_connection=array(
    "ssl"=>array(
        "verify_peer"=>false,"verify_peer_name"=>false
    )
);
$response = file_get_contents($url_price,false,stream_context_create($options_url_connection));
$comic_json = json_decode($response);
?>
