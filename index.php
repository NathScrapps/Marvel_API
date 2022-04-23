<?php
require_once './assets/complements/conexion.php';
    $claseDatabase = new Database();
    try {
        $db = $claseDatabase->getConnection();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $sucursales = $db->prepare('SELECT * FROM sucursales');
    $sucursales->execute();
    $sucursales = $sucursales->fetchAll();
    

    $count = $db->prepare('SELECT * FROM sucursales');
    $count->execute();
    $count = $count ->rowCount();

    $count_invent = $db->prepare('SELECT * FROM inventario');
    $count_invent->execute();
    $count_invent = $count_invent ->rowCount();

require_once './assets/views/index.view.php';