<?php
    class Region
    {
        public $name;
        public $shortname;
        public $x_center;
        public $y_center;
        public $index;
        public $color;

        public function __construct($name, $shortname, $x_center, $y_center, $index, $color)
        {
            $this->name = $name;
            $this->shortname = $shortname;
            $this->x_center = $x_center;
            $this->y_center = $y_center;
            $this->index = $index;
            $this->color = $color;
        }
    }

    function hex_coordinates($edge, $border, $x_shift, $y_shift)
    {
        $x_shift = $x_shift * ($edge);
        $y_shift = $y_shift * ($edge) * sqrt(3) / 2;

        $result = array(
            //1. Точка A
            ($edge - $border) + $x_shift, 0 + $y_shift,
            //2. Точка B
            ($edge - $border) / 2 + $x_shift, -($edge - $border) * sqrt(3) / 2 + $y_shift,
            //3. Точка C
            -($edge - $border) / 2 + $x_shift, -($edge - $border) * sqrt(3) / 2 + $y_shift,
            //4. Точка D
            -($edge - $border) + $x_shift, 0 + $y_shift,
            //5. Точка E
            -($edge - $border) / 2 + $x_shift, ($edge - $border) * sqrt(3) / 2 + $y_shift,
            //6. Точка F
            ($edge - $border) / 2 + $x_shift, ($edge - $border) * sqrt(3) / 2 + $y_shift
        );

        return $result;
    }

    function hexToRgb($hex, $alpha = false) {
        $hex      = str_replace('#', '', $hex);
        $length   = strlen($hex);
        $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
        $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
        $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
        if ( $alpha ) {
            $rgb['a'] = $alpha;
        }
        return $rgb;
    }

    function delete_files_folder($folder, $type)
    {
        $dir = scandir($folder . "/");

        $files = array();

        $now = date("d-m-Y H:i:s");

        foreach($dir as $arr)
        {
            if(explode(".", $arr)[1] == $type)
            {
                $day = explode("-", explode(".", $arr)[0])[0];
                $month = explode("-", explode(".", $arr)[0])[1];
                $year = explode("-", explode(".", $arr)[0])[2];
                $hour = explode("-", explode(".", $arr)[0])[3];
                $minutes = explode("-", explode(".", $arr)[0])[4];
                $seconds = explode("-", explode(".", $arr)[0])[5];
                $date = date($day."-".$month."-".$year." ".$hour.":".$minutes.":".$seconds);


                $files[$arr] = strtotime($now) - strtotime($date);
            }
        }

        foreach($files as $key => $value)
        {
            if($value > 30)
            {
                unlink($folder . "//" . $key);
            }
        }
    }


    function get_map($array_POST, $edge_lenght)
    {
        $regions = array(
            /*01. Агаповский МР*/new Region("Агаповский МР", "АГП", 7, 16, $array_POST["1-2"], $array_POST["1-3"]),
            /*02. Аргаяшский МР*/new Region("Аргаяшский МР", "АРГ", 8.5, 5, $array_POST["2-2"], $array_POST["2-3"]),
            /*03. Ашинский МР*/new Region("Ашинский МР", "АШН", 1, 4, $array_POST["3-2"], $array_POST["3-3"]),
            /*04. Брединский МР*/new Region("Брединский МР", "БРД", 8.5, 19, $array_POST["4-2"], $array_POST["4-3"]),
            /*05. Варненский МР*/new Region("Варненский МР", "ВРН", 10, 16, $array_POST["5-2"], $array_POST["5-3"]),
            /*06. Верхнеуральский МР*/new Region("Верхнеуральский МР", "ВУР", 5.5, 13, $array_POST["6-2"], $array_POST["6-3"]),
            /*07. Еманжелинский МР*/new Region("Еманжелинский МР", "ЕМН", 10, 10, $array_POST["8-2"], $array_POST["8-3"]),
            /*08. Еткульский МР*/new Region("Еткульский МР", "ЕТК", 11.5, 9, $array_POST["9-2"], $array_POST["9-3"]),
            /*09. Карталинский МР*/new Region("Карталинский МР", "КРТ", 8.5, 17, $array_POST["12-2"], $array_POST["12-3"]),
            /*10. Каслинский МР*/new Region("Каслинский МР", "КСЛ", 10, 2, $array_POST["13-2"], $array_POST["13-3"]),
            /*11. Катав-Ивановский МР*/new Region("Катав-Ивановский МР", "КТВ", 1, 6, $array_POST["14-2"], $array_POST["14-3"]),
            /*12. Кизильский МР*/new Region("Кизильский МР", "КЗЛ", 7, 18, $array_POST["15-2"], $array_POST["15-3"]),
            /*13. Коркинский МР*/new Region("Коркинский МР", "КРК", 8.5, 9, $array_POST["17-2"], $array_POST["17-3"]),
            /*14. Красноармейский МР*/new Region("Красноармейский МР", "КРС", 11.5, 5, $array_POST["18-2"], $array_POST["18-3"]),
            /*15. Кунашакский МР*/new Region("Кунашакский МР", "КНШ", 11.5, 3, $array_POST["19-2"], $array_POST["19-3"]),
            /*16. Кусинский МР*/new Region("Кусинский МР", "КСН", 5.5, 5, $array_POST["20-2"], $array_POST["20-3"]),
            /*17. Нагайбакский МР*/new Region("Нагайбакский МР", "НГБ", 7, 14, $array_POST["25-2"], $array_POST["25-3"]),
            /*18. Нязепетровский МР*/new Region("Нязепетровский МР", "НЗП", 5.5, 3, $array_POST["26-2"], $array_POST["26-3"]),
            /*19. Октябрьский МР*/new Region("Октябрьский МР", "ОКТ", 11.5, 11, $array_POST["28-2"], $array_POST["28-3"]),
            /*20. Пластовский МР*/new Region("Пластовский МР", "ПЛС", 7, 12, $array_POST["29-2"], $array_POST["29-3"]),
            /*21. Саткинский МР*/new Region("Саткинский МР", "СТК", 4, 6, $array_POST["30-2"], $array_POST["30-3"]),
            /*22. Сосновский МР*/new Region("Сосновский МР", "ССН", 10, 6, $array_POST["32-2"], $array_POST["32-3"]),
            /*23. Увельский МР*/new Region("Увельский МР", "УВЛ", 10, 12, $array_POST["35-2"], $array_POST["35-3"]),
            /*24. Уйский МР*/new Region("Уйский МР", "УСК", 7, 10, $array_POST["36-2"], $array_POST["36-3"]),
            /*25. Чесменский МР*/new Region("Чесменский МР", "ЧСМ", 8.5, 15, $array_POST["40-2"], $array_POST["40-3"]),
            /*26. Верхнеуфалейский ГО*/new Region("Верхнеуфалейский ГО", "ВУФ", 7, 2, $array_POST["7-2"], $array_POST["7-3"]),
            /*27. Златоустовский ГО*/new Region("Златоустовский ГО", "ЗЛТ", 5.5, 7, $array_POST["10-2"], $array_POST["10-3"]),
            /*28. Карабашский ГО*/new Region("Карабашский ГО", "КРБ", 7, 4, $array_POST["11-2"], $array_POST["11-3"]),
            /*29. Копейский ГО*/new Region("Копейский ГО", "КПС", 10, 8, $array_POST["16-2"], $array_POST["16-3"]),
            /*30. Кыштымский ГО*/new Region("Кыштымский ГО", "КШТ", 8.5, 3, $array_POST["21-2"], $array_POST["21-3"]),
            /*31. Магнитогорский ГО*/new Region("Магнитогорский ГО", "МГН", 5.5, 15, $array_POST["23-2"], $array_POST["23-3"]),
            /*32. Миасский ГО*/new Region("Миасский ГО", "МСС", 7, 6, $array_POST["24-2"], $array_POST["24-3"]),
            /*33. Озёрский ГО*/new Region("Озёрский ГО", "ОЗР", 10, 4, $array_POST["27-2"], $array_POST["27-3"]),
            /*34. Снежинский ГО*/new Region("Снежинский ГО", "СНЖ", 8.5, 1, $array_POST["31-2"], $array_POST["31-3"]),
            /*35. Трёхгорный ГО*/new Region("Трёхгорный ГО", "ТРХ", 2.5, 7, $array_POST["33-2"], $array_POST["33-3"]),
            /*36. Усть-Катавский ГО*/new Region("Усть-Катавский ГО", "УКТ", 2.5, 5, $array_POST["37-2"], $array_POST["37-3"]),
            /*37. Челябинский ГО*/new Region("Челябинский ГО", "ЧЛБ", 8.5, 7, $array_POST["39-2"], $array_POST["39-3"]),
            /*38. Южноуральский ГО*/new Region("Южноуральский ГО", "ЮЖН", 8.5, 11, $array_POST["41-2"], $array_POST["41-3"]),
            /*39. Локомотивный ГО*/new Region("Локомотивный ГО", "ЛКМ", 10, 18, $array_POST["22-2"], $array_POST["22-3"]),
            /*40. Чебаркульский ГО + МР*/new Region("Чебаркульский ГО + МР", "ЧБР", 7, 8, $array_POST["38-2"], $array_POST["38-3"]),
            /*41. Троицкий ГО + МР*/new Region("Троицкий ГО + МР", "ТРЦ", 8.5, 13, $array_POST["34-2"], $array_POST["34-3"])
        );

        $width = 13 * $edge_lenght;
        $height = 21 * $edge_lenght * sqrt(3) / 2;

        $image = imageCreateTrueColor($width, $height);
        $backgroundColor = imagecolorallocatealpha($image, 0, 0, 0, 127);
        imagefill($image, 0, 0, $backgroundColor);
        imagesavealpha($image, true);

        for($i = 0; $i < count($regions); $i++)
        {   
            //1. Заполняем поле шестигранниками
            $color = imageColorAllocate($image, hexToRgb($regions[$i]->color)['r'], hexToRgb($regions[$i]->color)['g'], hexToRgb($regions[$i]->color)['b']);
            imageFilledPolygon($image, hex_coordinates($edge_lenght, 0, $regions[$i]->x_center, $regions[$i]->y_center), 6, $backgroundColor);
            imageFilledPolygon($image, hex_coordinates($edge_lenght, 4, $regions[$i]->x_center, $regions[$i]->y_center), 6, $color);

            $center = $regions[$i]->x_center * $edge_lenght;
            $fontPath = 'ttf//YandexSansDisplay-Regular.ttf';
            $fontSize = 24;
            $text = $regions[$i]->shortname;
            $textcolor = imagecolorallocate($image, 0, 0, 0);
            $box = imagettfbbox($fontSize, 0, $fontPath, $text);
            $left = $center - round(($box[2] - $box[0]) / 2);
            $interval = 5;
            
            imagettftext($image, $fontSize, 0, $left, $regions[$i]->y_center * $edge_lenght * sqrt(3) / 2 - $interval, imagecolorallocate($image, hexToRgb($array_POST["text_color"])['r'], hexToRgb($array_POST["text_color"])['g'], hexToRgb($array_POST["text_color"])['b']), $fontPath, $text);

            $text = $regions[$i]->index;
            $box = imagettfbbox($fontSize, 0, $fontPath, $text);
            $left = $center-round(($box[2] - $box[0]) / 2);
            imagettftext($image, $fontSize, 0, $left, $regions[$i]->y_center * $edge_lenght * sqrt(3) / 2 + $fontSize + $interval, imagecolorallocate($image, hexToRgb($array_POST["text_color"])['r'], hexToRgb($array_POST["text_color"])['g'], hexToRgb($array_POST["text_color"])['b']), $fontPath, $text);
        }

        return $image;
    }


    function get_header($text_header, $edge_lenght)
    {
        // Размер шрифта
        $fontSize = 60;
        // Путь к файлу шрифта TTF
        $fontPath = 'ttf//YandexSansDisplay-Regular.ttf'; // Замените на путь к вашему шрифту
        // Определяем размер текста
        $bbox = imagettfbbox($fontSize, 0, $fontPath, $text_header);
        $textWidth = $bbox[2] - $bbox[0];
        $textHeight = $bbox[1] - $bbox[7];
        // Добавляем дополнительные отступы
        $padding = 80;
        // Устанавливаем размеры изображения
        $imageWidth = 13 * $edge_lenght;
        $imageHeight = $textHeight + 2 * $padding;
        // Создаем пустое изображение с истинными цветами
        $image = imagecreatetruecolor($imageWidth, $imageHeight);
        // Устанавливаем цвет фона (прозрачный в данном случае)
        $backgroundColor = imagecolorallocatealpha($image, 0, 0, 0, 127);
        imagefill($image, 0, 0, $backgroundColor);
        imagesavealpha($image, true);
        // Устанавливаем цвет текста
        $textColor = imagecolorallocate($image, 0, 0, 0);
        // Вычисляем координаты для текста, чтобы он был по центру
        $x = ($imageWidth - $textWidth) / 2;
        $y = ($imageHeight + $textHeight) / 2 - $bbox[1] - 30;
        // Добавляем текст на изображение
        imagettftext($image, $fontSize, 0, $x, $y, $textColor, $fontPath, $text_header);
        // Возвращаем изображение
        return $image;
    }

    function get_legend($array_POST, $edge_lenght)
    {
        $fontPath = 'ttf//YandexSansDisplay-Regular.ttf';
        $fontSize = 29;
        $padding = 10;

        $imageWidth = 2.5 * $edge_lenght + max(
            imagettfbbox($fontSize, 0, $fontPath, $array_POST['legend_text_1'])[2],
            imagettfbbox($fontSize, 0, $fontPath, $array_POST['legend_text_2'])[2],
            imagettfbbox($fontSize, 0, $fontPath, $array_POST['legend_text_3'])[2],
            imagettfbbox($fontSize, 0, $fontPath, $array_POST['legend_text_4'])[2],
            imagettfbbox($fontSize, 0, $fontPath, $array_POST['legend_text_5'])[2],
        ) + 0.5 * 104 + 10;
        $imageHight = 21 * $edge_lenght * sqrt(3) / 2;
        
        $image = imageCreateTrueColor($imageWidth, $imageHight);
        $backgroundColor = imagecolorallocatealpha($image, 0, 0, 0, 127);
        imagefill($image, 0, 0, $backgroundColor);
        imagesavealpha($image, true);

        for($i = 1; $i <= 5; $i++)
        {
            if(mb_strlen($array_POST['legend_text_' . $i]) > 0)
            {
                $color = imageColorAllocate($image, hexToRgb($array_POST['legend_color_' . $i])['r'], hexToRgb($array_POST['legend_color_' . $i])['g'], hexToRgb($array_POST['legend_color_' . $i])['b']);
                imageFilledPolygon($image, hex_coordinates($edge_lenght, 0, 1.5, 1 + 2 * $i), 6, $backgroundColor);
                imageFilledPolygon($image, hex_coordinates($edge_lenght, 8, 1.5, 1 + 2 * $i), 6, imageColorAllocate($image, hexToRgb($array_POST['legend_color_' . $i])['r'], hexToRgb($array_POST['legend_color_' . $i])['g'], hexToRgb($array_POST['legend_color_' . $i])['b']));
                
                $bbox = imagettfbbox($fontSize, 0, $fontPath, $array_POST['legend_text_' . $i]);
                $textWidth = $bbox[2] - $bbox[0];
                $textHeight = $bbox[1] - $bbox[7];
                imagettftext($image, $fontSize, 0, hex_coordinates($edge_lenght, 0, 1.5, 1 + 2 * $i)[0] + 3, hex_coordinates($edge_lenght, 0, 1.5, 1 + 2 * $i)[1] + $textHeight / 2, imageColorAllocate($image, 0, 0, 0), $fontPath, " - " . $array_POST['legend_text_' . $i]);
            }
            break;
        }

        return $image;
    }
?>