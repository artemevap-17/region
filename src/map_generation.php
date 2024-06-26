<?php
    include("mylib.php");

    $edge_lenght = 104;
    $width = 13 * $edge_lenght;
    $height = 21 * $edge_lenght * sqrt(3) / 2;

    $image_map = get_map($_POST, $edge_lenght);
    $image_header = get_header($_POST, $edge_lenght);
    $image_legend = get_legend($_POST, $edge_lenght);

    //Вычисляем размеры итогового изображения
    $imageResultWidth = imagesx($image_map) + imagesx($image_legend);
    $imageResultHeight = imagesy($image_header) + imagesy($image_map);

    //Создаем изображение
    $imageResult = imageCreateTrueColor($imageResultWidth, $imageResultHeight);
    $backgroundColor = imagecolorallocatealpha($imageResult, 0, 0, 0, 127);
    imagefill($imageResult, 0, 0, $backgroundColor);
    imagesavealpha($imageResult, true);

    //Копируем заголовок
    imagecopy($imageResult, $image_header, 0, 0, 0, 0, imagesx($image_header), imagesy($image_header));
    //Копируем карту
    imagecopy($imageResult, $image_map, 0, imagesy($image_header), 0, 0, imagesx($image_map), imagesy($image_map));
    //Копируем легенду
    imagecopy($imageResult, $image_legend, imagesx($image_map), imagesy($image_header), 0, 0, imagesx($image_legend), imagesy($image_legend));
    
    header('Content-type: image/png');
    $filename = "images//" . date("d-m-Y-H-i-s") . ".png";
    imagepng($imageResult, $filename);
    
    imageDestroy($image_map);
    imageDestroy($image_header);
    imageDestroy($image_legend);
    imageDestroy($imageResult);

    echo($filename);
    delete_files_folder("images", "png");
    
?>