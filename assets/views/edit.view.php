<?php
    require_once './assets/complements/api_comic.php';
?>

<?php require_once './assets/complements/header.php';?>

<body style="cursor:default;background-color: #040720;">

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
            <a href="./Comics_branch.php?id=<?php echo $sucursalid;?>"><p class="d-inline-block text-light"><?php echo $sucursal; ?></p></a>
    </header>
</div>

<?php if(!($error == '')):?>
    <div class="d-flex justify-content-center mt-3">
        <div class='alert alert-dismissible fade show alert_error' role='alert'>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
            <?php echo $error;?>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    </div>
<?php endif;?>

<aside class="d-flex justify-content-center m-5">
    <div class="edit__section-title">
        <a href="index.php" style="text-decoration:none;"><h1 class="edit__title">Seleccionar Cómics para la venta </h1></a>
    </div>
</aside>
<a class="btn btn___regresar" href="./Options_Brands.php"><i class="las la-long-arrow-alt-left" style="margin-right:5px;"></i>Regresar</a>

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
        <div class="contenido_card">
            <div class="card_es" style="width: 18rem; background-image: url('<?php echo $functionres; ?>');">
                <div class="layer">
                    <h3>Cómic:<?php echo $comicid; ?></h3>
                    <p><?php echo $comictiltle; ?></p>
                    <form action="edit_brands.php?id=<?php echo $sucursalid;?>" method="POST" class="card__form_register">
                        <input type="text" hidden name="idcomic" value="<?php echo $comicid?>">
                        <input type="text" hidden name="comictiltle" value="<?php echo $comictiltle?>">
                        <input type="text" hidden name="comicdesc" value="<?php echo $comicdesc?>">
                        <input type="text" hidden name="pages" value="<?php echo $pages?>">
                        <input type="text" hidden name="imagen" value="<?php echo $functionres?>">
                        <div class="input_checkboxgroup_card">
                            <label for="check_comic" class="disponible_label">¿Disponible?</label>
                            <input type="checkbox" name="check_comic" id="check_comic" class="form-check-input" value="Available" required>
                        </div>
                        <div class="line_form"></div>
                        <input type="submit" class="buttonnn" name="add" value="Agregar a tienda">
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<a class="btn btn___regresar" href="./Options_Brands.php"><i class="las la-long-arrow-alt-left" style="margin-right:5px;"></i>Regresar</a>
<?php 
    require_once './assets/complements/footer.php';
?>



