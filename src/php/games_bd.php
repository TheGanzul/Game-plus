<?php
$conection = mysqli_connect("localhost", "root", "", "gameplus_bd");
/*
if($conection){
    echo 'conectado exitosamente';
}else{
    echo 'no conectado';
}
*/

// Consulta SQL para obtener datos de la base de datos games
$sql = "SELECT id, 'name', cover, banner, 'description', developer, category, img_clasification, text_clasification,'version', release_date FROM games_bd";
$result = $conection->query($sql);

$game_id= $_GET['id'];

$query = "SELECT * FROM games_bd WHERE id = $game_id";
$result = mysqli_query($conection, $query);


if ($row = mysqli_fetch_assoc($result)) {
    $name = $row['name'];
    $cover = $row['cover'];
    $banner = $row['banner'];
    $description = $row['description'];
    $developer = $row['developer'];
    $category = $row['category'];
    $img_clasification = $row['img_clasification'];
    $text_clasification = $row['text_clasification'];
    $version = $row['version'];
    $release_date = $row['release_date'];

}

// Consulta SQL para obtener datos de la base de datos gallery
$gallery_query = "SELECT images FROM gallery WHERE game_id = $game_id";
$gallery_result = mysqli_query($conection, $gallery_query);

// Creamos un array para almacenar las rutas de las imágenes de la galería
$gallery_images = array();

while ($gallery_row = mysqli_fetch_assoc($gallery_result)) {
    $gallery_images[] = $gallery_row['images'];
}

mysqli_close($conection);

?>