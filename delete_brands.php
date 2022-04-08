<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        try {
            $conexion = new  PDO('mysql:host=localhost;dbname=gest_comics', 'root', '');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $stmt= $conexion->prepare('DELETE FROM sucursales WHERE id = :id');
        $stmt->execute(array(':id'=>$id));
    }
header('Location: Options_Brands.php');

?>