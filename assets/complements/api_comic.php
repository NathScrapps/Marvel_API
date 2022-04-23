<?php
/* Direccion de dónde vamos a consumir los datos */
$url = "https://gateway.marvel.com:443/v1/public/comics?format=comic&orderBy=title&limit=52&ts=$YOUR_TS_VALUE&apikey=$YOUR_HASH_MD5_VALUE";
$opciones=array(
    "ssl"=>array(
        "verify_peer"=>false,"verify_peer_name"=>false
    )
);

$respuesta = file_get_contents($url,false,stream_context_create($opciones));
$objRes = json_decode($respuesta);


function changeImgNF($urlThumbImg,$extImg){
    $replace = './assets/imgSource/dummy.jpg';
    $imgOffic = "$urlThumbImg.$extImg";  
    $rest = substr($urlThumbImg, -19);
    if ($rest == 'image_not_available') {
        return $replace;
    }else {
        return $imgOffic;
    }
}
?>