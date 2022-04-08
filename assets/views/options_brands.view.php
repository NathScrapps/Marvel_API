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
   <div class="rowrow d-flex justify-content-center">
                <?php if(!($errores == '')):?>
                    <?php echo $errores;?>
                <?php endif; ?>
            <form class="form__brands_config" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <h4>Datos de la sucursal</h4>
                <div class="linear_form"></div>
                <input type="text" name="sucursal" id="sucursal" placeholder="Nombre de la sucursal:">
                <input type="text" name="direccion" id="direccion" placeholder="Dirección de la sucursal:">
                <div class="in__block">
                    <label for="habre">Apertura:</label>
                    <input type="time" name="habre" id="habre">
                </div>
                <div class="in__block">
                    <label for="hcierra">Cierre:</label>
                    <input type="time" name="hcierra" id="hcierra">
                </div>
                <input type="submit" value="Guardar">
            </form>
   </div>
   <div class="row bg-light mt-4">
        <table class="table caption-top table-bordered">
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
                            <a href="edit_branddata.php?id=<?php echo $sucursal['id']?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar"><i class='bx bxs-edit-alt'></i></a>
                            <a href="delete_brands.php?id=<?php echo $sucursal['id']?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Eliminar"><i class='bx bxs-trash'></i></a>
                            <a href="edit_brands.php?id=<?php echo $sucursal['id']?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar inventario"><i class='bx bxs-box'></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
<a class="btn btn___regresar" href="./index.php">Inicio</a>

<?php 
    require_once './assets/complements/footer.php';
?>
