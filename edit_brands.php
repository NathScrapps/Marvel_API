<?php
require_once './assets/complements/conexion.php';
$claseDatabase = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $db = $claseDatabase->getConnection();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $branch_query= $db->prepare("SELECT * FROM sucursales WHERE id = :id");
    $branch_query->execute(array(':id'=>$id));
    $result = $branch_query->fetch();
    $sucursalid = $result['id'];
    $sucursal = $result['sucursal'];

    $comics_in_branch= $db->prepare("SELECT * FROM inventario WHERE id_sucursal = :id");
    $comics_in_branch->execute(array(':id'=>$id));
    $comics = $comics_in_branch->fetchAll();
    $i=0;
    $id_comics_array= array();
    foreach ($comics as $comic) {
        $id_comics_array[$i] = $comic['id_comic'];
        $i++;
    }
}

$array_leght = count($id_comics_array);
$error = '';

if (isset($_POST['add'])) {
    $id_sucursal = $_GET['id'];
    $id_comic = $_POST['idcomic'];
    $title = $_POST['comictiltle'];
    $description = $_POST['comicdesc'];
    $pagenums = $_POST['pages'];
    $imagen = $_POST['imagen'];
    $status = $_POST['check_comic'];
    for($j=0; $j<$array_leght; $j++) {
        if ($id_comics_array[$j] == $id_comic) {
            $error .= "El cómic que intentas agregar ya existe actualmente";
            break;
        }
    }

    try {
        $conexion = $claseDatabase->getConnection();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    if ($error == '') {
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

}


require_once './assets/views/edit.view.php';