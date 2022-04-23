<?php require_once './assets/complements/header.php';?>

<body style="background-color:var(--violet-color);">

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
                <h1 data-text="Cómics disponibles">Cómics disponibles</h1>
            </div>
    </header>
</div>

<section class="container__brand mt-4">
    <?php foreach($allcomics as $comic): ?>
        <div class="content_example" style="margin-bottom:25px;">
            <div class="card-container-comic">
                <div class="card_example_si">
                <a href="comic-details.php?id=<?php echo $comic['id_comic'];?>">
                    <div class="bg"></div>
                        <img src="<?php echo $comic['imagen']; ?>" alt="<?php echo $comic['title']; ?>">
                </a>
                </div>
            </div>
	    </div>
    <?php endforeach; ?>
</section>

    <a class="btn btn___regresar" href="./index.php"><i class="las la-long-arrow-alt-left" style="margin-right:5px;"></i>Regresar</a>
<?php 
    require_once './assets/complements/footer.php';
?>



