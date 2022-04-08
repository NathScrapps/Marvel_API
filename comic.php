<?php 

$errores ='';
$host = "localhost";
$usuario = "root";
$pass = "";
$dbName = "gest_comics";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $reg = $_GET['id_sucursal'];
    try {
        $con= mysqli_connect($host, $usuario, $pass, $dbName);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $query = "SELECT * FROM inventario WHERE id_comic = $id";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $comic_id = $row['id_comic'];
        $comic_title = $row['title'];
        $comic_description = $row['descripcion'];
        $comic_pages = $row['pagenums'];
        $comic_imagen = $row['imagen'];
        $comic_sucursal = $row['id_sucursal'];
    }

    try {
        $db = new  PDO('mysql:host=localhost;dbname=gest_comics', 'root', '');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $sucursales = $db->prepare('SELECT * FROM sucursales WHERE id = :id_sucursal');
    $sucursales->execute(array('id_sucursal'=>$comic_sucursal));
    $sucursales = $sucursales->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/imgSource/logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Cómics - Marvel</title>
</head>
<body>
<div class="header">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto">
            <div class="marvel__container_logo me-2" >
                <a href="./index.php">
                    <img src="./assets/imgSource/marvel_comics.png" alt="marvel comics" class="marvel__logo">
                </a>
            </div>
        </div>
            <div class="tiltle_brands ms-3 me-3">
                <h1 data-text="Cómic">Cómic</h1>
            </div>
    </header>
</div>

<section class="container__brand" style="width: 90%;">
    <div class="card m-3 card_comic_info">
    <div class="row g-0">
        <div class="col-md-4" style="display: flex;">
            <img src="<?php echo $comic_imagen;?>" style="min-height: 200px;max-height:540px;justify-content: center;display: flex;margin: auto;" class="img-fluid rounded-start" alt="<?php echo $comic_title;?>">
        </div>
        <div class="col-md-8">
        <div class="card-body" style="height: 100%; align-content: space-between;display: grid;">
            <h5 class="card-title"><?php echo $comic_title;?></h5>
            <div class="align-items-stretch">
                <?php 
                if($comic_description==''){
                    $comic_description.="Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit. Ex itaque cum distinctio fuga, suscipit, 
                    officiis iusto officia laboriosam consectetur, fugit dolorem. 
                    Deleniti dolorem dolore sequi nemo tempore corrupti eius, labore 
                    voluptatum fugit assumenda, quaerat, quo ex quam omnis ad. Laudantium 
                    fugit omnis animi hic quae alias, labore ipsum perspiciatis provident.";
                    }?>
                <p class="card-text"><?php echo ucfirst($comic_description);?></p>
                <p class="card-text text-info"><?php echo 'No.páginas:'.$comic_pages;?></p>
            </div>
            <p class="card-text align-items-end mt-auto" >
                <small class="text-muted">
                    Disponible en:
                    <?php foreach($sucursales as $sucursal):?>
                        <a href="Comics_branch.php?id=<?php echo $sucursal['id']; ?>"><?php echo $sucursal['sucursal']; ?></a>
                    <?php endforeach;?>
                </small></p>
        </div>
        </div>
    </div>
    </div>
</section>

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

<aside class="d-flex justify-content-center m-5">
    <div class="edit__section-title">
        <a href="index.php" style="text-decoration:none;"><h1 class="edit__title">Personajes </h1></a>
    </div>
</aside>
<section class="container__brand_personaje">
    <?php foreach($objComic->data->results as $personaje): ?>
        <?php 
        $personid = $personaje->id;
        $personname = $personaje->name;
        $persondesc = $personaje->description;
        $personcomics = $personaje->comics->available;
        $personThumb = ($personaje->thumbnail->path);
        $extenImg = ($personaje->thumbnail->extension);   
        $functiochange = changeImg($personThumb,$extenImg);
        ?>

    <div class="card__brand card0" style="background: url(<?php echo $functiochange?>)center center no-repeat;background-size: 300px;">   
        <div class="card__brand-border">
            <h4><?php echo $personname ?></h4>
            <div class="card__brand-content" style="top: 180px;left: 47px;">
                <a><?php echo $persondesc;?></a>
            </div>
            <a style="font-size:11px;"><?php echo "Personaje en $personcomics cómics.";?> </a>
        </div>
    </div>
    <?php endforeach; ?>
</section>


    <a class="btn btn___regresar" href="./Comics_branch.php?id=<?php echo $reg;?>">Regresar</a>
<?php 
    require_once './assets/complements/footer.php';
?>

