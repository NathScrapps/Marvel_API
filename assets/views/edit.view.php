<?php
    require_once './assets/complements/api_comic.php';
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
    <script src="./assets/js/jquery-3.6.0.min.js"></script>
    <title>Cómics - Marvel</title>
</head>
<body>

<div class="header">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto">
            <div class="marvel__container_logo me-2" >
                <a href="index.php">
                    <img src="./assets/imgSource/marvel_comics.png" alt="marvel comics" class="marvel__logo">
                </a>
            </div>
        </div>
            <div class="tiltle_brands ms-3 me-3">
                <h1 data-text="Inventario de sucursal">Inventario de sucursal</h1>
            </div>
            <p class="d-inline-block text-light"><?php echo $sucursal; ?></p>
    </header>
</div>

<aside class="d-flex justify-content-center m-5">
    <div class="edit__section-title">
        <a href="index.php" style="text-decoration:none;"><h1 class="edit__title">Seleccionar Cómics para la venta </h1></a>
    </div>
</aside>
<section class="container__brand">

    <?php foreach ($objRes->data->results as $comic): ?>
        
        <?php 
        $comicid =$comic->id;
        $comictiltle =$comic->title;
        $comicdesc = $comic->description;
        $pages = $comic->pageCount;
        $urlThumbImg = ($comic->thumbnail->path);
        $extImg = ($comic->thumbnail->extension);   
        $functionres = changeImgNF($urlThumbImg,$extImg);
        ?>

        <div class="card card_comic" style="width: 18rem;">
            <a href="#">
                <img src="<?php echo $functionres; ?>" class="card-img-top img__comic" alt="<?php echo $comictiltle ?>">
            </a>
            <div class="card-body">
                <p class="card_text">
                    <?php echo  "<strong>id:</strong> ".$comicid."<br/>"; ?>
                    <?php echo "<strong>Título:</strong> ".$comictiltle."<br/>"; ?>
                </p>
                <form action="edit_brands.php?id=<?php echo $sucursal;?>" method="POST" class="card__form">
                    <input type="text" hidden name="idcomic" value="<?php echo $comicid?>">
                    <input type="text" hidden name="comictiltle" value="<?php echo $comictiltle?>">
                    <input type="text" hidden name="comicdesc" value="<?php echo $comicdesc?>">
                    <input type="text" hidden name="pages" value="<?php echo $pages?>">
                    <input type="text" hidden name="imagen" value="<?php echo $functionres?>">
                    <input type="checkbox" name="check_comic" id="check_comic" class="form-check-input" value="Available" required>
                    <label for="check_comic">Disponible a la venta:</label>
                    <input type="submit" class="btnConsulta" name="add" value="Aceptar">
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<a class="btn btn___regresar" href="./Options_Brands.php">Volver</a>
<?php 
    require_once './assets/complements/footer.php';
?>




