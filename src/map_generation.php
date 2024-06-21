<?php
    include("mylib.php");

    $regions = array(
        /*01. Агаповский МР*/new Region("Агаповский МР", "АГП", 7, 16, $_POST["1-2"], $_POST["1-3"]),
        /*02. Аргаяшский МР*/new Region("Аргаяшский МР", "АРГ", 8.5, 5, $_POST["2-2"], $_POST["2-3"]),
        /*03. Ашинский МР*/new Region("Ашинский МР", "АШН", 1, 4, $_POST["3-2"], $_POST["3-3"]),
        /*04. Брединский МР*/new Region("Брединский МР", "БРД", 8.5, 19, $_POST["4-2"], $_POST["4-3"]),
        /*05. Варненский МР*/new Region("Варненский МР", "ВРН", 10, 16, $_POST["5-2"], $_POST["5-3"]),
        /*06. Верхнеуральский МР*/new Region("Верхнеуральский МР", "ВУР", 5.5, 13, $_POST["6-2"], $_POST["6-3"]),
        /*07. Еманжелинский МР*/new Region("Еманжелинский МР", "ЕМН", 10, 10, $_POST["8-2"], $_POST["8-3"]),
        /*08. Еткульский МР*/new Region("Еткульский МР", "ЕТК", 11.5, 9, $_POST["9-2"], $_POST["9-3"]),
        /*09. Карталинский МР*/new Region("Карталинский МР", "КРТ", 8.5, 17, $_POST["12-2"], $_POST["12-3"]),
        /*10. Каслинский МР*/new Region("Каслинский МР", "КСЛ", 10, 2, $_POST["13-2"], $_POST["13-3"]),
        /*11. Катав-Ивановский МР*/new Region("Катав-Ивановский МР", "КТВ", 1, 6, $_POST["14-2"], $_POST["14-3"]),
        /*12. Кизильский МР*/new Region("Кизильский МР", "КЗЛ", 7, 18, $_POST["15-2"], $_POST["15-3"]),
        /*13. Коркинский МР*/new Region("Коркинский МР", "КРК", 8.5, 9, $_POST["17-2"], $_POST["17-3"]),
        /*14. Красноармейский МР*/new Region("Красноармейский МР", "КРС", 11.5, 5, $_POST["18-2"], $_POST["18-3"]),
        /*15. Кунашакский МР*/new Region("Кунашакский МР", "КНШ", 11.5, 3, $_POST["19-2"], $_POST["19-3"]),
        /*16. Кусинский МР*/new Region("Кусинский МР", "КСН", 5.5, 5, $_POST["20-2"], $_POST["20-3"]),
        /*17. Нагайбакский МР*/new Region("Нагайбакский МР", "НГБ", 7, 14, $_POST["25-2"], $_POST["25-3"]),
        /*18. Нязепетровский МР*/new Region("Нязепетровский МР", "НЗП", 5.5, 3, $_POST["26-2"], $_POST["26-3"]),
        /*19. Октябрьский МР*/new Region("Октябрьский МР", "ОКТ", 11.5, 11, $_POST["28-2"], $_POST["28-3"]),
        /*20. Пластовский МР*/new Region("Пластовский МР", "ПЛС", 7, 12, $_POST["29-2"], $_POST["29-3"]),
        /*21. Саткинский МР*/new Region("Саткинский МР", "СТК", 4, 6, $_POST["30-2"], $_POST["30-3"]),
        /*22. Сосновский МР*/new Region("Сосновский МР", "ССН", 10, 6, $_POST["32-2"], $_POST["32-3"]),
        /*23. Увельский МР*/new Region("Увельский МР", "УВЛ", 10, 12, $_POST["35-2"], $_POST["35-3"]),
        /*24. Уйский МР*/new Region("Уйский МР", "УСК", 7, 10, $_POST["36-2"], $_POST["36-3"]),
        /*25. Чесменский МР*/new Region("Чесменский МР", "ЧСМ", 8.5, 15, $_POST["40-2"], $_POST["40-3"]),
        /*26. Верхнеуфалейский ГО*/new Region("Верхнеуфалейский ГО", "ВУФ", 7, 2, $_POST["7-2"], $_POST["7-3"]),
        /*27. Златоустовский ГО*/new Region("Златоустовский ГО", "ЗЛТ", 5.5, 7, $_POST["10-2"], $_POST["10-3"]),
        /*28. Карабашский ГО*/new Region("Карабашский ГО", "КРБ", 7, 4, $_POST["11-2"], $_POST["11-3"]),
        /*29. Копейский ГО*/new Region("Копейский ГО", "КПС", 10, 8, $_POST["16-2"], $_POST["16-3"]),
        /*30. Кыштымский ГО*/new Region("Кыштымский ГО", "КШТ", 8.5, 3, $_POST["21-2"], $_POST["21-3"]),
        /*31. Магнитогорский ГО*/new Region("Магнитогорский ГО", "МГН", 5.5, 15, $_POST["23-2"], $_POST["23-3"]),
        /*32. Миасский ГО*/new Region("Миасский ГО", "МСС", 7, 6, $_POST["24-2"], $_POST["24-3"]),
        /*33. Озёрский ГО*/new Region("Озёрский ГО", "ОЗР", 10, 4, $_POST["27-2"], $_POST["27-3"]),
        /*34. Снежинский ГО*/new Region("Снежинский ГО", "СНЖ", 8.5, 1, $_POST["31-2"], $_POST["31-3"]),
        /*35. Трёхгорный ГО*/new Region("Трёхгорный ГО", "ТРХ", 2.5, 7, $_POST["33-2"], $_POST["33-3"]),
        /*36. Усть-Катавский ГО*/new Region("Усть-Катавский ГО", "УКТ", 2.5, 5, $_POST["37-2"], $_POST["37-3"]),
        /*37. Челябинский ГО*/new Region("Челябинский ГО", "ЧЛБ", 8.5, 7, $_POST["39-2"], $_POST["39-3"]),
        /*38. Южноуральский ГО*/new Region("Южноуральский ГО", "ЮЖН", 8.5, 11, $_POST["41-2"], $_POST["41-3"]),
        /*39. Локомотивный ГО*/new Region("Локомотивный ГО", "ЛКМ", 10, 18, $_POST["22-2"], $_POST["22-3"]),
        /*40. Чебаркульский ГО + МР*/new Region("Чебаркульский ГО + МР", "ЧБР", 7, 8, $_POST["38-2"], $_POST["38-3"]),
        /*41. Троицкий ГО + МР*/new Region("Троицкий ГО + МР", "ТРЦ", 8.5, 13, $_POST["34-2"], $_POST["34-3"])
    );

    $edge_lenght = 104;
    $width = 13 * $edge_lenght;
    $height = 21 * $edge_lenght * sqrt(3) / 2;

    header('Content-type: image/png');
    $image_map = imageCreateTrueColor($width, $height);
    $transparent = imagecolorallocatealpha($image_map, 0, 0, 0, 127);
    imagefill($image_map, 0, 0, $transparent);
    imagesavealpha($image_map, true);

    for($i = 0; $i < count($regions); $i++)
    {   
        //1. Заполняем поле шестигранниками
        $color = imageColorAllocate($image_map, hexToRgb($regions[$i]->color)['r'], hexToRgb($regions[$i]->color)['g'], hexToRgb($regions[$i]->color)['b']);
        imageFilledPolygon($image_map, hex_coordinates($edge_lenght, 0, $regions[$i]->x_center, $regions[$i]->y_center), 6, $transparent);
        imageFilledPolygon($image_map, hex_coordinates($edge_lenght, 4, $regions[$i]->x_center, $regions[$i]->y_center), 6, $color);

        $CENTER = $regions[$i]->x_center * $edge_lenght;
        $FONT = 'ttf//YandexSansDisplay-Regular.ttf';
        $size = 24;
        $text = $regions[$i]->shortname;
        $textcolor = imagecolorallocate($image_map, 0, 0, 0);
        $box = imagettfbbox($size, 0, $FONT, $text);
        $left = $CENTER-round(($box[2] - $box[0]) / 2);
        $interval = 5;
        
        imagettftext($image_map, $size, 0, $left, $regions[$i]->y_center * $edge_lenght * sqrt(3) / 2 - $interval, imagecolorallocate($image_map, hexToRgb($_POST["text_color"])['r'], hexToRgb($_POST["text_color"])['g'], hexToRgb($_POST["text_color"])['b']), $FONT, $text);

        $text = $regions[$i]->index;
        $box = imagettfbbox($size, 0, $FONT, $text);
        $left = $CENTER-round(($box[2] - $box[0]) / 2);
        imagettftext($image_map, $size, 0, $left, $regions[$i]->y_center * $edge_lenght * sqrt(3) / 2 + $size + $interval, imagecolorallocate($image_map, hexToRgb($_POST["text_color"])['r'], hexToRgb($_POST["text_color"])['g'], hexToRgb($_POST["text_color"])['b']), $FONT, $text);
    }
    
    $image_header = get_header("Тестовый Заголовок", $edge_lenght);

    $image_result =imagecreatetruecolor(max(imagesx($image_map), imagesx($image_header)), imagesy($image_map) + imagesy($image_header));
    imagefill($image_result, 0, 0, imagecolorallocatealpha($image_result, 0, 0, 0, 127));
    imagesavealpha($image_result, true);

    imagecopy($image_result, $image_header, 0, 0, 0, 0, imagesx($image_header), imagesy($image_header));
    imagecopy($image_result, $image_map, 0, imagesy($image_header), 0, 0, imagesx($image_map), imagesy($image_map));

    $filename = "images//" . date("d-m-Y-H-i-s") . ".png";
    imagepng($image_result, $filename);
    imageDestroy($image_map);
    imageDestroy($image_header);
    imageDestroy($image_result);



    echo($filename);
    delete_files_folder("images", "png");
?>