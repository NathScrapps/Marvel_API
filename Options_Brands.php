<?php
require_once './assets/complements/conexion.php';
$claseDatabase = new Database();

$errores ='';
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sucursal = filter_var($_POST['sucursal'], FILTER_SANITIZE_STRING);
        $direccion =  filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
        $habre=  $_POST['habre'];
        $hcierra=  $_POST['hcierra'];
        $errores = '';
        if (empty($sucursal) or empty($direccion) or empty($habre) or empty($hcierra)) {
            $errores .= "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            ¡Agrega los datos correctamente!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
        }else {
            try {
                $db = $claseDatabase->getConnection();
            } catch (PDOException $e) {
                $errores .= $e->getMessage();
            }

        }
        if ($errores == '') {
            $stmt=$db->prepare('INSERT INTO sucursales(id,sucursal,direc,habre,hcierra) VALUES (null,:sucursal,:direccion,:habre,:hcierra)');
            $stmt->execute(array(
                ":sucursal"=>$sucursal,
                ":direccion"=>$direccion,
                ":habre"=>$habre,
                ":hcierra"=>$hcierra
            ));
        }
        header('Location: Options_Brands.php');
        
    }


try {
    $db = $claseDatabase->getConnection();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$sucursales = $db->prepare('SELECT * FROM sucursales');
$sucursales->execute();
$sucursales = $sucursales->fetchAll();

include './assets/views/options_brands.view.php';