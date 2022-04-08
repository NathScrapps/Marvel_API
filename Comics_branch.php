<?php require_once './assets/complements/api_comic.php';
    if (isset($_GET['id'])) {
        $id_sucursal = $_GET['id'];
        $disponible = 'Available';
        try {
            $db = new  PDO('mysql:host=localhost;dbname=gest_comics', 'root', '');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $comics = $db->prepare('SELECT * FROM inventario WHERE id_sucursal = :id AND disponibilidad = :disponible');
        $comics->execute(array(
            ':id'=>$id_sucursal,
            ':disponible'=>$disponible
        ));
        $comics = $comics->fetchAll();
    }
?>
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
                <h1 data-text="Cómics disponibles">Cómics disponibles</h1>
            </div>
    </header>
</div>

<section class="container__brand">
    <?php foreach ($comics as $comic): ?>
        <div class="card card_comic" style="width: 18rem; height:520px;">
            <a href="comic.php?id=<?php echo $comic['id_comic'];?>&id_sucursal=<?php echo $comic['id_sucursal'];?>">
                <img src="<?php echo $comic['imagen']; ?>" class="card-img-top img__comic" alt="<?php echo $comic['title']; ?>">
            </a>
            <div class="card-body">
                <p class="card_text">
                    <?php echo "<strong>Título: </strong>".$comic['title']."<br/>"; ?>
                    <?php $desc=$comic['descripcion'];
                if($desc==''){
                    $desc.="Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit. Ex itaque cum distinctio fuga, suscipit, 
                    officiis iusto officia laboriosam consectetur, fugit dolorem. 
                    Deleniti dolorem dolore sequi nemo tempore corrupti eius, labore 
                    voluptatum fugit assumenda, quaerat, quo ex quam omnis ad. Laudantium 
                    fugit omnis animi hic quae alias, labore ipsum perspiciatis provident.";
                    }?>
                    <?php echo "<strong>Descripción: </strong>".strtolower(substr($desc,0,60))."..."; ?>
                </p>
            </div>
        </div>
    <?php endforeach; ?>
</section>


    <a class="btn btn___regresar" href="./index.php">Regresar</a>
<?php 
    require_once './assets/complements/footer.php';
?>


