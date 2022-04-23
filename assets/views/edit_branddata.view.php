<?php require_once './assets/complements/header.php';?>
<body style="background-color:var(--heavy-blue);">
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
                <h1 data-text="Editar información de Sucursal">Editar información de Sucursal</h1>
            </div>
    </header>
</div>
<!-- branch section -->
<div class="section_edit">
   <div class="d-flex d-wrap justify-content-center">
       <div class="form_content">
            <div class="Container__cat_rotate">
                <img class="cat_rotate" src="./assets/imgSource/Lazy_Cat_Spinning_cat_transparent_by_Icons8.gif" alt="cat_rotate">
            </div>
                <form class="form__brands_config" action="edit_branddata.php?id=<?php echo $_GET['id']?>" method="POST">
                    <h4>Actualizar sucursal</h4>
                    <div class="linear_form"></div>
                    <div class="in__block">
                        <label for="sucursal" class="icon_input"><i class="las la-store"></i></label>
                        <input type="text" name="sucursal" id="sucursal" placeholder="Nombre de la sucursal:" value="<?php echo $sucursal;?>" required>
                    </div>
                    <div class="in__block">
                        <label for="direccion" class="icon_input"><i class="las la-map-marked"></i></label>
                        <textarea name="direccion" id="direccion" id="direccion" placeholder="Dirección de la sucursal:" required><?php echo $direccion;?></textarea>
                    </div>
                   <div class="in__block">
                       <label for="habre" class="horario">Apertura:</label>
                       <input type="time" name="habre" id="habre" value="<?php echo $horabre;?>" required>
                   </div>
                   <div class="in__block">
                       <label for="hcierra" class="horario">Cierre:</label>
                       <input type="time" name="hcierra" id="hcierra" value="<?php echo $horcierra?>" required>
                   </div>
                   <input type="submit" name="update" value="Actualizar">
               </form>
        </div>
   </div>
   <a class="btn btn___regresar" href="./Options_Brands.php"><i class="las la-long-arrow-alt-left" style="margin-right:5px;"></i>Regresar</a>
</div>

<?php 
    require_once './assets/complements/footer.php';
?>
