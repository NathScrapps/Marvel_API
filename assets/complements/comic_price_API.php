<?php
$url_price = "https://gateway.marvel.com:443/v1/public/comics/$comic_id?ts=1&apikey=d08578d6407e27408beb952d33978d92&hash=9c38532a5b99818bcf7d8d1ee7a297c5";
$options_url_connection=array(
    "ssl"=>array(
        "verify_peer"=>false,"verify_peer_name"=>false
    )
);
$response = file_get_contents($url_price,false,stream_context_create($options_url_connection));
$comic_json = json_decode($response);
?>
