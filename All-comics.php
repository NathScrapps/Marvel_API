<?php 
require_once './assets/complements/conexion.php';
    $disponible = 'Available';
    $claseDatabase = new Database();
    try {
        $db = $claseDatabase->getConnection();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $allcomics = $db->prepare('SELECT C.id_inventario, C.id_comic, C.title, C.descripcion, C.pagenums, C.imagen, C.disponibilidad, GROUP_CONCAT(distinct C.id_sucursal) AS sucursalescomic FROM inventario AS C WHERE C.disponibilidad = :disponibilidad GROUP BY C.id_comic ORDER BY C.title');
    $allcomics->execute(array(':disponibilidad'=>$disponible));
    $allcomics = $allcomics->fetchAll();
require_once './assets/views/all-comics.view.php';