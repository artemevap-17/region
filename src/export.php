<?php
    require 'vendor/autoload.php';
    include("mylib.php");
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use \PhpOffice\PhpSpreadsheet\Style\Border;
    use \PhpOffice\PhpSpreadsheet\Style\Alignment;
    use \PhpOffice\PhpSpreadsheet\Style\Fill;
    
    $array = array(
        1 => "1. Агаповский МР",
        2 => "2. Аргаяшский МР",
        3 => "3. Ашинский МР",
        4 => "4. Брединский МР",
        5 => "5. Варненский МР",
        6 => "6. Верхнеуральский МР",
        7 => "7. Верхнеуфалейский ГО",
        8 => "8. Еманжелинский МР",
        9 => "9. Еткульский МР ",
        10 => "10. Златоустовский ГО",
        11 => "11. Карабашский ГО",
        12 => "12. Карталинский МР",
        13 => "13. Каслинский МР",
        14 => "14. Катав-Ивановский МР",
        15 => "15. Кизильский МР",
        16 => "16. Копейский ГО",
        17 => "17. Коркинский МР",
        18 => "18. Красноармейский МР",
        19 => "19. Кунашакский МР",
        20 => "20. Кусинский МР",
        21 => "21. Кыштымский ГО",
        22 => "22. Локомотивный ГО",
        23 => "23. Магнитогорский ГО",
        24 => "24. Миасский ГО",
        25 => "25. Нагайбакский МР",
        26 => "26. Нязепетровский МР",
        27 => "27. Озёрский ГО",
        28 => "28. Октябрьский МР",
        29 => "29. Пластовский МР",
        30 => "30. Саткинский МР",
        31 => "31. Снежинский ГО",
        32 => "32. Сосновский МР",
        33 => "33. Трёхгорный ГО",
        34 => "34. Троицкий ГО + МР",
        35 => "35. Увельский МР",
        36 => "36. Уйский МР",
        37 => "37. Усть-Катавский ГО",
        38 => "38. Чебаркульский ГО + МР",
        39 => "39. Челябинский ГО",
        40 => "40. Чесменский МР",
        41 => "41. Южноуральский ГО"
    );

    $spreadsheet = new Spreadsheet();
    $spreadsheet->setActiveSheetIndex(0);
	$sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setTitle('Территории');
    $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
	$spreadsheet->getDefaultStyle()->getFont()->setSize(10);

    $sheet->getColumnDimension("A")->setWidth(35.83);
	$sheet->getColumnDimension("B")->setWidth(15.12);

    $border = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['rgb' => '000000'],
            ],
        ],
    ];

    $sheet->setCellValue("A1", "Наименование МР/ГО");
	$sheet->getStyle("A1")->getAlignment()->setWrapText(true);
	$sheet->getStyle('A1')->getFont()->setName('Times New Roman');
	$sheet->getStyle("A1")->getFont()->setBold(true);
	$sheet->getStyle("A1")->getFont()->setSize(10);
	$sheet->getStyle("A1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
	$sheet->getStyle("A1")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
	$sheet->getStyle("A1")->applyFromArray($border);

    $sheet->setCellValue("B1", "Значение, цвет");
	$sheet->getStyle("B1")->getAlignment()->setWrapText(true);
	$sheet->getStyle("B1")->getFont()->setName('Times New Roman');
	$sheet->getStyle("B1")->getFont()->setBold(true);
	$sheet->getStyle("B1")->getFont()->setSize(10);
	$sheet->getStyle("B1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
	$sheet->getStyle("B1")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
	$sheet->getStyle("B1")->applyFromArray($border);

    $output = "";

    foreach($array as $key => $value)
    {
        $sheet->setCellValue("A" . ($key + 1), $value);
		$sheet->getStyle("A" . ($key + 1))->getAlignment()->setWrapText(true);
		$sheet->getStyle("A" . ($key + 1))->getFont()->setName('Times New Roman');
		$sheet->getStyle("A" . ($key + 1))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
		$sheet->getStyle("A" . ($key + 1))->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$sheet->getStyle("A" . ($key + 1))->applyFromArray($border);

        $sheet->setCellValue("B" . ($key + 1), $_POST[$key."-2"]);
        $sheet->getStyle("B" . ($key + 1))->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB(str_replace("#", "", $_POST[$key . "-3"]));
		$sheet->getStyle("B" . ($key + 1))->getAlignment()->setWrapText(true);
		$sheet->getStyle("B" . ($key + 1))->getFont()->setName('Times New Roman');
		$sheet->getStyle("B" . ($key + 1))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle("B" . ($key + 1))->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$sheet->getStyle("B" . ($key + 1))->applyFromArray($border);

    }

    $filename = "excels//" . date("d-m-Y-H-i-s") . ".xlsx";
    $writer = new Xlsx($spreadsheet);
	$writer->save($filename);

    echo $filename;

    delete_files_folder("excels", "xlsx");
?>