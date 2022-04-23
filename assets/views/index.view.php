<?php require_once './assets/complements/header.php';?>
<body style="background-color: #040720;background-image: none;">

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
                <h1 data-text="Sucursales">Sucursales</h1>
            </div>
    </header>
</div>
<!-- branch section -->
<?php if($count == 0): ?>
    <section class="container__brand card__comic_container" id="container__brand">
        <h4 class="title1__not_bd">Primero debes ingresar sucursales a la base de datos <i class='bx bxs-right-arrow-alt'></i></h4>
        <div class="card_not_bd">
        <div class="card-info_not_bd">
            <p class="title_not_bd">
            <a class="btn_not_bd" href="./Options_Brands.php"><i class='bx bxs-edit'></i>Agregar Sucursal</a>
            </p>
        </div>
        </div>
    </section>
<?php else: ?>
<section class="container__brand card__comic_container" id="container__brand">
    <?php foreach ($sucursales as $sucursal):?>
        <div class="card__branch">
            <div class="card-img-holder">
                <img src="./assets/imgSource/card_picture.jpg" alt="Branch image">
            </div>
            <h3 class="blog-title"><?php echo $sucursal['sucursal']; ?></h3>
            <span class="blog-time"><?php echo '<strong>Horario: </strong>'.$sucursal['habre'].'-'.$sucursal['hcierra']; ?></span>
            <p class="description__branch">
            <?php echo '<strong>Dirección: </strong>'.$sucursal['direc']; ?>
            </p>
            <div class="options__branch">
                <span>Visitar tienda</span>
                <a href="Comics_branch.php?id=<?php echo $sucursal['id'];?>" class="btn__branch"><i class='bx bxs-navigation' aria-hidden="true"></i></a>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<div class="col btns_section">
    <?php if($count_invent > 0): ?>
    <a class="btn___sucursales" href="./All-comics.php"><i class='bx bx-photo-album'></i>|Ver todos los cómics</a>
    <?php endif; ?>
    <a class="btn___configuracion" href="./Options_Brands.php"><i class='bx bxs-edit'></i>|Configuración de sucursales</a>
</div>
<?php endif; ?>
<?php 
    require_once './assets/complements/footer.php';
?>




