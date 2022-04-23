<?php 
require_once './assets/complements/conexion.php';
$claseDatabase = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $reg = $_GET['id_sucursal'];
    try {
        $db = $claseDatabase->getConnection();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $comic_details_on_branch = $db->prepare('SELECT * FROM inventario WHERE id_comic = :id AND id_sucursal = :branch_id');
    $comic_details_on_branch->execute(array(':id'=>$id, ':branch_id'=>$reg));
    $comic_details = $comic_details_on_branch->fetch();
    // var contains values of query
    $comic_id = $comic_details['id_comic'];
    $comic_title = $comic_details['title'];
    $comic_description = $comic_details['descripcion'];
    $comic_pages = $comic_details['pagenums'];
    $comic_imagen = $comic_details['imagen'];
    $comic_sucursal = $comic_details['id_sucursal']; 
}
?>

<?php require_once './assets/complements/header.php';?>
<body style="background-color: #040726;">
<div class="header">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto">
            <div class="marvel__container_logo me-2" >
                <a href="./index.php">
                    <img src="./assets/imgSource/marvel_comics.png" alt="marvel comics" class="marvel__logo">
                </a>
            </div>
        </div>
            <div class="tiltle_brands ms-3 me-3">
                <h1 data-text="Cómic">Cómic</h1>
            </div>
    </header>
</div>

<section class="container__brand" style="width: 90%;">
    <div class="card m-3 card_comic_info">
    <div class="row g-0">
        <div class="col-md-4" style="display: flex;">
            <img src="<?php echo $comic_imagen;?>" style="min-height: 200px;max-height:540px;justify-content: center;display: flex;margin: auto;" class="img-fluid rounded-start" alt="<?php echo $comic_title;?>">
        </div>
        <div class="col-md-8">
        <div class="card-body" style="height: 100%; align-content: space-between;display: grid;">
            <h5 class="card-title"><?php echo $comic_title;?></h5>
            <div class="align-items-stretch">
                <?php 
                if($comic_description==''){
                    $comic_description.="Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit. Ex itaque cum distinctio fuga, suscipit, 
                    officiis iusto officia laboriosam consectetur, fugit dolorem. 
                    Deleniti dolorem dolore sequi nemo tempore corrupti eius, labore 
                    voluptatum fugit assumenda, quaerat, quo ex quam omnis ad. Laudantium 
                    fugit omnis animi hic quae alias, labore ipsum perspiciatis provident.";
                    }?>
                <p class="card-text"><?php echo ucfirst($comic_description);?></p>
                <p class="card-text text-info"><?php echo 'No.páginas:'.$comic_pages;?></p>
            </div>
            <p class="card-text align-items-end mt-auto">
                <?php require_once './assets/complements/comic_price_API.php';?>

                <?php foreach($comic_json->data->results as $price_com):?>
                    <?php $comic_price = ($price_com->prices[0]->price);?>
                <small class="text-muted">Precio: <?php echo "USD ".$comic_price;?></small>
                <?php endforeach; ?>
            </p>
        </div>
        </div>
    </div>
    </div>
</section>

<?php require_once './assets/complements/character_comicAPI.php';?>

<?php if($objComic->data->total == 0):?>
    <aside class="d-flex justify-content-center m-5">
        <div class="edit__section-title">
            <a style="text-decoration:none;"><h1 class="edit__title">No se encontraron personajes</h1></a>
        </div>
    </aside>
<?php else: ?>    
    <aside class="d-flex justify-content-center m-5">
        <div class="edit__section-title">
            <a style="text-decoration:none;"><h1 class="edit__title">Personajes </h1></a>
        </div>
    </aside>
    <section class="container__brand_personaje">
        <?php foreach($objComic->data->results as $personaje): ?>
            <?php 
            $personid = $personaje->id;
            $personname = $personaje->name;
            $persondesc = $personaje->description;
            $personcomics = $personaje->comics->available;
            $personThumb = ($personaje->thumbnail->path);
            $extenImg = ($personaje->thumbnail->extension);   
            $functiochange = changeImg($personThumb,$extenImg);
            ?>
        <div class="card__character">
            <div class="card-img__character">
                <img src="<?php echo $functiochange?>" alt="">
            </div>
            <div class="card-info__character">
                <p class="title__character"><?php echo $personname ?></p>
                <p class="subtitle__character"><?php echo filter_var($persondesc, FILTER_SANITIZE_STRING);?></p>
                <small class="note__character"><?php echo "Personaje en $personcomics cómics.";?> </small>
            </div>
        </div>
        <?php endforeach; ?>
    </section>
<?php endif;?>
<a class="btn btn___regresar" href="./Comics_branch.php?id=<?php echo $reg;?>"><i class="las la-long-arrow-alt-left" style="margin-right:5px;"></i>Regresar</a>
<?php 
    require_once './assets/complements/footer.php';
?>

