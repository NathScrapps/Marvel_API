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
        $sucursal = $row['id'];
    }
}

if (isset($_POST['add'])) {
    $id_sucursal = $_GET['id'];
    $id_comic = $_POST['idcomic'];
    $title = $_POST['comictiltle'];
    $description = $_POST['comicdesc'];
    $pagenums = $_POST['pages'];
    $imagen = $_POST['imagen'];
    $status = $_POST['check_comic'];
    try {
        $conexion = new  PDO('mysql:host=localhost;dbname=gest_comics', 'root', '');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $comic= $conexion->prepare(
        'INSERT INTO inventario(id_inventario,id_comic,title,descripcion,pagenums,imagen,disponibilidad,id_sucursal) 
        VALUES (null,:idcomic,:comictiltle,:comicdesc,:pages,:imagen,:check_comic,:id)');
    $comic->execute(array(
        ':idcomic'=>$id_comic,
        ':comictiltle'=>$title,
        ':comicdesc'=>$description,
        ':pages'=>$pagenums,
        ':imagen'=>$imagen,
        ':check_comic'=>$status,
        ':id'=>$id_sucursal
    ));
    header("Location: edit_brands.php?id=$id_sucursal");
}

require_once './assets/views/edit.view.php';