<?php
// $url = 'https://gateway.marvel.com:443/v1/public/characters?ts=1&apikey=d08578d6407e27408beb952d33978d92&hash=9c38532a5b99818bcf7d8d1ee7a297c5';
// $opc=array(
//     "ssl"=>array(
//         "verify_peer"=>false,"verify_peer_name"=>false
//     )
// );

// $response = file_get_contents($url,false,stream_context_create($opc));
// $objRes = json_decode($response);
// $carousel=0;

// foreach ($objRes->data->results as $character) {
//     $carousel++;
//     $pathChar = $character->thumbnail->path;
//     $extChar = $character->thumbnail->extension;
//     echo    "<img src='$pathChar.$extChar' alt='' width='100'><br/>";
//     echo "id: ".  $character->id.'<br/>';
//     echo    "name:".$character->name.'<br/>';
//     echo    "description:".$character->description.'<br/>';
//     if ($carousel == 4) {
//         break;
//     }
// }
/*Aun no */
// function changeImgNF($urlThumbImg,$extImg){
//     $replace = './assets/imgSource/dummy.jpg';
//     $imgOffic = "$urlThumbImg.$extImg";  
//     $rest = substr($urlThumbImg, -19);
//     if ($rest == 'image_not_available') {
//         return $replace;
//     }else {
//         return $imgOffic;
//     }
// }

require_once './assets/views/index.view.php';