<?php
    include("mylib.php");
/*
    
    $array = [
        "legend_text_1" => "Тест № 1",
        "legend_text_2" => "Тест № 1",
        "legend_text_3" => "",
        "legend_text_4" => "Тест № 1",
        "legend_text_5" => "Тест № 1",

        "legend_color_1" => "#66ccff",
        "legend_color_2" => "#66ccff",
        "legend_color_3" => "#66ccff",
        "legend_color_4" => "#66ccff",
        "legend_color_5" => "#66ccff"

    ];


    $image = get_legend($array, 104);

    header('Content-type: image/png');
    $filename = "test//" . date("d-m-Y-H-i-s") . ".png";
    imagepng($image, $filename);
    imageDestroy($image);
    */
    $data = [
        "1-2" => "0",
        "1-3" => "#66ccff",
        "16-2" => "0",
        "16-3" => "#66ccff",
        "31-2" => "0",
        "31-3" => "#66ccff",
        "2-2" => "0",
        "2-3" => "#66ccff",
        "17-2" => "0",
        "17-3" => "#66ccff",
        "32-2" => "0",
        "32-3" => "#66ccff",
        "3-2" => "0",
        "3-3" => "#66ccff",
        "18-2" => "0",
        "18-3" => "#66ccff",
        "33-2" => "0",
        "33-3" => "#66ccff",
        "4-2" => "0",
        "4-3" => "#66ccff",
        "19-2" => "0",
        "19-3" => "#66ccff",
        "34-2" => "0",
        "34-3" => "#66ccff",
        "5-2" => "0",
        "5-3" => "#66ccff",
        "20-2" => "0",
        "20-3" => "#66ccff",
        "35-2" => "0",
        "35-3" => "#66ccff",
        "6-2" => "0",
        "6-3" => "#66ccff",
        "21-2" => "0",
        "21-3" => "#66ccff",
        "36-2" => "0",
        "36-3" => "#66ccff",
        "7-2" => "0",
        "7-3" => "#66ccff",
        "22-2" => "0",
        "22-3" => "#66ccff",
        "37-2" => "0",
        "37-3" => "#66ccff",
        "8-2" => "0",
        "8-3" => "#66ccff",
        "23-2" => "0",
        "23-3" => "#66ccff",
        "38-2" => "0",
        "38-3" => "#66ccff",
        "9-2" => "0",
        "9-3" => "#66ccff",
        "24-2" => "0",
        "24-3" => "#66ccff",
        "39-2" => "0",
        "39-3" => "#66ccff",
        "10-2" => "0",
        "10-3" => "#66ccff",
        "25-2" => "0",
        "25-3" => "#66ccff",
        "40-2" => "0",
        "40-3" => "#66ccff",
        "11-2" => "0",
        "11-3" => "#66ccff",
        "26-2" => "0",
        "26-3" => "#66ccff",
        "41-2" => "0",
        "41-3" => "#66ccff",
        "12-2" => "0",
        "12-3" => "#66ccff",
        "27-2" => "0",
        "27-3" => "#66ccff",
        "13-2" => "0",
        "13-3" => "#66ccff",
        "28-2" => "0",
        "28-3" => "#66ccff",
        "14-2" => "0",
        "14-3" => "#66ccff",
        "29-2" => "0",
        "29-3" => "#66ccff",
        "15-2" => "0",
        "15-3" => "#66ccff",
        "30-2" => "0",
        "30-3" => "#66ccff",
        "text_color" => "#000000"
    ];

    $image = null;//get_map($data, 104);
    if($image != null)
    {
        imageDestroy($image);
    }
        

    var_dump($image);

    /*
    header('Content-type: image/png');
    $filename = "test//" . date("d-m-Y-H-i-s") . ".png";
    imagepng($image, $filename);
    imageDestroy($image);
    */
?>