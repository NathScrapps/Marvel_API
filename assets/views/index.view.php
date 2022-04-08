<?php
    try {
        $db = new  PDO('mysql:host=localhost;dbname=gest_comics', 'root', '');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $sucursales = $db->prepare('SELECT * FROM sucursales');
    $sucursales->execute();
    $sucursales = $sucursales->fetchAll();
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
                <a href="#">
                    <img src="./assets/imgSource/marvel_comics.png" alt="marvel comics" class="marvel__logo">
                </a>
            </div>
        </div>
            <div class="tiltle_brands ms-3 me-3">
                <h1 data-text="Sucursales">Sucursales</h1>
            </div>
    </header>
</div>
<!-- branch section -->
<section class="container__brand card__comic_container" id="container__brand">
    <?php foreach ($sucursales as $sucursal):?>
        <div class="card__brand card0">
            <div class="card__brand-border">
                <h4><?php echo $sucursal['sucursal']; ?></h4>
                <div class="card__brand-content">
                    <a href="Comics_branch.php?id=<?php echo $sucursal['id'];?>">Visitar tienda<i class='bx bxs-navigation' aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>
<a class="btn btn___regresar" href="./Options_Brands.php">Ver Opciones </a>
<?php 
    require_once './assets/complements/footer.php';
?>




