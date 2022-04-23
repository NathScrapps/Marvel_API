<?php require_once './assets/complements/header.php';?>
<body style="background-color:#950606;">
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
                <h1 data-text="Configuración de Sucursales">Configuración de Sucursales</h1>
            </div>
    </header>
</div>
<!-- branch section -->

<div class="container container__form-table">
   <div class="row d-flex flex-wrap-reverse justify-content-center">
        <?php if(!($errores == '')):?>
            <?php echo $errores;?>
        <?php endif; ?>
        <img src="./assets/imgSource/img_form.jpg" alt="" class="img__form">
        <form class="form__brands_config" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <h4>Registrar sucursal</h4>
                <div class="linear_form"></div>
                <div class="in__block">
                    <label for="sucursal" class="icon_input"><i class="las la-store"></i></label>
                    <input type="text" name="sucursal" id="sucursal" placeholder="Nombre de la sucursal:" required>
                </div>
                <div class="in__block">
                    <label for="direccion" class="icon_input"><i class="las la-map-marked"></i></label>
                    <textarea name="direccion" id="direccion" id="direccion" placeholder="Dirección de la sucursal:" required></textarea>
                </div>
                <div class="in__block">
                    <label for="habre" class="horario">Apertura:</label>
                    <input type="time" name="habre" id="habre" required>
                </div>
                <div class="in__block">
                    <label for="hcierra" class="horario">Cierre:</label>
                    <input type="time" name="hcierra" id="hcierra" required>
                </div>
                <input type="submit" value="Guardar">
        </form>
   </div>
   <div class="bg-light mt-4" style="box-shadow: 12px 7px #000;">
        <table class="table caption-top table-bordered" style="font-size: 12.5px;">
            <caption class="text-black" style="text-align: center;">Lista de Sucursales creadas</caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Ubicación</th>
                    <th scope="col">Horario:</th>
                    <th scope="col">Opciones:</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sucursales as $sucursal):?>
                    <tr>
                        <td><?php echo $sucursal['id']; ?></td>
                        <td><?php echo $sucursal['sucursal']; ?></td>
                        <td><?php echo $sucursal['direc']; ?></td>
                        <td><?php echo $sucursal['habre'].' a '.$sucursal['hcierra'];?></td>
                        <td class="options_brand">
                            <a class="editar" href="edit_branddata.php?id=<?php echo $sucursal['id']?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar"><i class='bx bxs-edit'></i></a>
                            <a class="delete" href="delete_brands.php?id=<?php echo $sucursal['id']?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Eliminar"><i class='bx bxs-trash'></i></a>
                            <a class="invent" href="edit_brands.php?id=<?php echo $sucursal['id']?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar inventario"><i class='bx bxs-box'></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<a class="btn btn___regresar" href="./index.php"><i class="las la-home" style="margin-right:5px;"></i>Inicio</a>

<?php 
    require_once './assets/complements/footer.php';
?>
