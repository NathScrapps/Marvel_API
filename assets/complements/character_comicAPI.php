<?php
$url = "https://gateway.marvel.com:443/v1/public/comics/$comic_id/characters?orderBy=name&limit=52&ts=$YOUR_TS_VALUE&apikey=$YOUR_PUBLIC_KEY&hash=$YOUR_HASH_MD5_VALUE";
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
