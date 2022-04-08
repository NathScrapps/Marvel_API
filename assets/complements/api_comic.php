<?php
/* Direccion de dónde vamos a consumir los datos */
$url = 'https://gateway.marvel.com:443/v1/public/comics?format=comic&orderBy=title&limit=52&ts=1&apikey=d08578d6407e27408beb952d33978d92&hash=9c38532a5b99818bcf7d8d1ee7a297c5';
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