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
    $comic_in_branch = $db->prepare('SELECT C.id_inventario, C.id_comic, C.title, C.descripcion, C.pagenums, C.imagen, GROUP_CONCAT(distinct C.id_sucursal) AS sucursalescomic FROM inventario AS C WHERE C.id_comic = :idcom');
    $comic_in_branch->execute(array(':idcom'=>$id));
    $comic_in_all_branch = $comic_in_branch->fetch();
    $comic_id = $comic_in_all_branch['id_comic'];
    $title = $comic_in_all_branch['title'];
    $descripcion = $comic_in_all_branch['descripcion'];
    $pagenums = $comic_in_all_branch['pagenums'];
    $imagen = $comic_in_all_branch['imagen'];
    $branchs_comic = $comic_in_all_branch['sucursalescomic']; 
    $arraysucursales = explode(',', $branchs_comic);
    $sucursalname = array();
    foreach ($arraysucursales as $id_unique) {
        $sqlsuc = $db->prepare("SELECT * FROM sucursales WHERE id = :id_unique");
        $sqlsuc->execute(array(':id_unique'=>$id_unique));
        $unique_branch = $sqlsuc->fetch();
        $name = $unique_branch['sucursal'];
        $arr[$id_unique] = $name;
    }
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
            <img src="<?php echo $imagen;?>" style="min-height: 200px;max-height:540px;justify-content: center;display: flex;margin: auto;" class="img-fluid rounded-start" alt="<?php echo $title;?>">
        </div>
        <div class="col-md-8">
        <div class="card-body" style="height: 100%; align-content: space-between;display: grid;">
            <h5 class="card-title"><?php echo $title;?></h5>
            <div class="align-items-stretch">
                <?php 
                if($descripcion==''){
                    $descripcion.="Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit. Ex itaque cum distinctio fuga, suscipit, 
                    officiis iusto officia laboriosam consectetur, fugit dolorem. 
                    Deleniti dolorem dolore sequi nemo tempore corrupti eius, labore 
                    voluptatum fugit assumenda, quaerat, quo ex quam omnis ad. Laudantium 
                    fugit omnis animi hic quae alias, labore ipsum perspiciatis provident.";
                    }?>
                <p class="card-text"><?php echo ucfirst($descripcion);?></p>
                <p class="card-text text-info"><?php echo 'No.páginas:'.$pagenums;?></p>
            </div>
            <p class="card-text align-items-end mt-auto" >
                <small class="text-muted">
                    Disponible en:
                    <?php foreach($arr as $branch => $perName):?>
                        <a href="Comics_branch.php?id=<?php echo $branch;?>"><?php echo $perName; ?></a>
                    <?php endforeach;?>
                </small></p>
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
<?php endif; ?>  

    <a class="btn btn___regresar" href="./All-comics.php"><i class="las la-long-arrow-alt-left" style="margin-right:5px;"></i>Regresar</a>
<?php 
    require_once './assets/complements/footer.php';
?>

