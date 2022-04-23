<?php
$errores ='';
$host = "localhost";
$usuario = "root";
$pass = "";
$dbName = "gest_comics";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $con= mysqli_connect($host, $usuario, $pass, $dbName);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $query = "SELECT * FROM sucursales WHERE id = $id";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $sucursal= $row['sucursal'];
        $direccion = $row['direc'];
        $horabre = $row['habre'];
        $horcierra= $row['hcierra'];
    }
}

require_once './assets/complements/conexion.php';

$claseDatabase = new Database();
if (isset($_POST['update'])) {
    $id=$_GET['id'];
    $name = filter_var($_POST['sucursal'], FILTER_SANITIZE_STRING);
    $dir = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
    $abre = $_POST['habre'];
    $cierra = $_POST['hcierra'];

    try {
        $conexion = $claseDatabase->getConnection();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $sucursales= $conexion->prepare('UPDATE sucursales SET sucursal=:sucursal, direc=:direccion, habre=:habre, hcierra=:hcierra WHERE id=:id');
    $sucursales->execute(array(
        ':id'=>$id,
        ':sucursal'=>$name,
        ':direccion'=>$dir,
        ':habre'=>$abre,
        ':hcierra'=>$cierra
    ));
    header('Location: Options_Brands.php');
}

require_once './assets/views/edit_branddata.view.php';