<?php
$url = "https://gateway.marvel.com:443/v1/public/comics/$comic_id/characters?orderBy=name&limit=52&ts=1&apikey=d08578d6407e27408beb952d33978d92&hash=9c38532a5b99818bcf7d8d1ee7a297c5";
$opciones=array(
    "ssl"=>array(
        "verify_peer"=>false,"verify_peer_name"=>false
    )
);

$respuesta = file_get_contents($url,false,stream_context_create($opciones));
$objComic = json_decode($respuesta);
function changeImg($personThumb,$extenImg){
    $replaceimg = './assets/imgSource/dummy.jpg';
    $imgPerson = "$personThumb.$extenImg";  
    $restar = substr($personThumb, -19);
    if ($restar == 'image_not_available') {
        return $replaceimg;
    }else {
        return $imgPerson;
    }
}
?>