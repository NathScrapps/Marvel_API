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
                <h1 data-text="Editar información de Sucursal">Editar información de Sucursal</h1>
            </div>
    </header>
</div>
<!-- branch section -->
<div class="container container__form-table">
   <div class="row d-flex d-wrap">
       <div class="rowrow d-flex justify-content-center">
                <form class="form__brands_config" action="edit_branddata.php?id=<?php echo $_GET['id']?>" method="POST">
                   <h4>Datos de la sucursal</h4>
                   <div class="linear_form"></div>
                        <input type="text" name="sucursal" id="sucursal" placeholder="Nombre de la sucursal:" value="<?php echo $sucursal;?>">
                        <input type="text" name="direccion" id="direccion" placeholder="Dirección de la sucursal:" value="<?php echo $direccion;?>">
                   <div class="in__block">
                       <label for="habre">Apertura:</label>
                       <input type="time" name="habre" id="habre" value="<?php echo $horabre;?>">
                   </div>
                   <div class="in__block">
                       <label for="hcierra">Cierre:</label>
                       <input type="time" name="hcierra" id="hcierra" value="<?php echo $horcierra?>">
                   </div>
                   <input type="submit" name="update" value="Actualizar">
               </form>
       </div>
   </div>
   <a class="btn btn___regresar" href="./Options_Brands.php">Volver</a>
</div>

<?php 
    require_once './assets/complements/footer.php';
?>
