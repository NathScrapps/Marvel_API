<?php
require_once './assets/complements/conexion.php';
$claseDatabase = new Database();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        try {
            $conexion = $claseDatabase->getConnection();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $stmt= $conexion->prepare('DELETE FROM sucursales WHERE id = :id');
        $stmt->execute(array(':id'=>$id));
    }
header('Location: Options_Brands.php');

?>