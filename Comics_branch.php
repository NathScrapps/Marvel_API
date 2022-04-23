<?php
require_once './assets/complements/conexion.php';
$claseDatabase = new Database();
    if (isset($_GET['id'])) {
        $id_sucursal = $_GET['id'];
        $disponible = 'Available';
        try {
            $db = $claseDatabase->getConnection();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $comics = $db->prepare('SELECT * FROM inventario WHERE id_sucursal = :id AND disponibilidad = :disponible');
        $comics->execute(array(
            ':id'=>$id_sucursal,
            ':disponible'=>$disponible
        ));
        $comics = $comics->fetchAll();

        $sql_branch_name = $db->prepare('SELECT * FROM sucursales WHERE id = :id');
        $sql_branch_name->execute(array(':id'=>$id_sucursal));
        $branch_name = $sql_branch_name->fetch();
        $branch=$branch_name['sucursal'];
    }
?>
<?php require_once './assets/complements/header.php';?>

<body style="background-color:var(--red-car-color);">
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
                <h1 data-text="Cómics disponibles">Cómics disponibles</h1>
            </div>
            <p class="d-inline-block text-light"><?php echo $branch;?></p>
    </header>
</div>

<section class="container__brand mt-4">
    <?php foreach ($comics as $comic): ?>
        <div class="contenido_card">
            <div class="card_es" style="width: 18rem; background-image: url('<?php echo $comic['imagen']; ?>');">
                <div class="layer">
                    <h3>Cómic:<?php echo $comic['id_comic']; ?></h3>
                    <p><?php echo '<strong>Título: </strong>'.$comic['title'];?></p>
                    <?php $desc=$comic['descripcion'];
                        if($desc==''){
                            $desc.="Lorem ipsum dolor sit amet consectetur 
                            adipisicing elit. Ex itaque cum distinctio fuga, suscipit, 
                            officiis iusto officia laboriosam consectetur, fugit dolorem. 
                            Deleniti dolorem dolore sequi nemo tempore corrupti eius, labore 
                            voluptatum fugit assumenda, quaerat, quo ex quam omnis ad. Laudantium 
                            fugit omnis animi hic quae alias, labore ipsum perspiciatis provident.";
                    }?>
                    <p><?php echo "<strong>Descripción: </strong>".strtolower(substr($desc,0,70))."..."; ?>
                        <a href="comic.php?id=<?php echo $comic['id_comic'];?>&id_sucursal=<?php echo $comic['id_sucursal'];?>" class="enlace_comic">Ver más</a>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>


    <a class="btn btn___regresar" href="./index.php"><i class="las la-long-arrow-alt-left" style="margin-right:5px;"></i>Regresar</a>
<?php 
    require_once './assets/complements/footer.php';
?>


