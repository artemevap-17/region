<?php
   require 'vendor/autoload.php';
   use PhpOffice\PhpSpreadsheet\Spreadsheet;
   use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
   use PhpOffice\PhpSpreadsheet\IOFactory;

   if(!empty($_FILES["import"]))
   {

      $file_array = explode('.', $_FILES["import"]["name"]);

      if($_FILES["import"]["error"] != UPLOAD_ERR_OK)
      {
         die("Ошибка загрузки с кодом ошибки " . $_FILES['import']['error']);
      }
      
      if($file_array[1] == "xlsx")
      {     
            $spreadsheet  = IOFactory::load($_FILES['import']['tmp_name']);
            $sheet = $spreadsheet->getSheet(0);
            $output = 
            "
            <form method='post' class='regions' id='regions'>
                  <table border='0' align='center'>
                     <tr>
                        <td align='center' width=200px><b>Наименование ГО/МР</b></td>
                        <td align='center' width=100px><b>Значение</b></td>
                        <td align='center' width=75px><b>Цвет</b></td>
                        <td align='center' width=25px><input class='checker' id='1' type='checkbox'</td>
                        <td width=50px></td>
                        <td align='center' width=200px><b>Наименование ГО/МР</b></td>
                        <td align='center' width=100px><b>Значение</b></td>
                        <td align='center' width=75px><b>Цвет</b></td>
                        <td align='center' width=25px><input class='checker' id='2' type='checkbox'</td>
                        <td width=50px></td>
                        <td align='center' width=200px><b>Наименование ГО/МР</b></td>
                        <td align='center' width=100px><b>Значение</b></td>
                        <td align='center' width=75px><b>Цвет</b></td>
                        <td align='center' width=25px><input class='checker' id='3' type='checkbox'</td>
                     </tr>
                     <tr>
                        <td>1. Агаповский МР</td>
                        <td align='center'><input id='1-2' name='1-2' type='text' size=3 value='" . $sheet->getCell("B2")->getValue() . "'></td>
                        <td align='center'><input id='1-3' name='1-3' type='color' value='#" . $sheet->getStyle('B2')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='1-4' type='checkbox'></td>
                        <td></td>
                        <td>16. Копейский ГО</td>
                        <td align='center'><input id='16-2' name='16-2' type='text' size='3' value='" . $sheet->getCell("B17")->getValue() . "'></td>
                        <td align='center'><input id='16-3' name='16-3' type='color' value='#" . $sheet->getStyle('B17')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='16-4' type='checkbox'></td>
                        <td width=50px></td>
                        <td>31. Снежинский ГО</td>
                        <td align='center'><input id='31-2' name='31-2' type='text' size='3' value='" . $sheet->getCell("B32")->getValue() . "'></td>
                        <td align='center'><input id='31-3' name='31-3' type='color' value='#" . $sheet->getStyle('B32')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='31-4' type='checkbox'></td>
                     </tr>
                     <tr>
                        <td>2. Аргаяшский МР</td>
                        <td align='center'><input id='2-2' name='2-2' type='text' size='3' value='" . $sheet->getCell("B3")->getValue() . "'></td>
                        <td align='center'><input id='2-3' name='2-3' type='color' value='#" . $sheet->getStyle('B3')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='2-4' type='checkbox'></td>
                        <td></td>
                        <td>17. Коркинский МР </td>
                        <td align='center'><input id='17-2' name='17-2' type='text' size='3' value='" . $sheet->getCell("B18")->getValue() . "'></td>
                        <td align='center'><input id='17-3' name='17-3' type='color' value='#" . $sheet->getStyle('B18')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='17-4' type='checkbox'></td>
                        <td width=50px></td>
                        <td>32. Сосновский МР</td>
                        <td align='center'><input id='32-2' name='32-2' type='text' size='3' value='" . $sheet->getCell("B33")->getValue() . "'></td>
                        <td align='center'><input id='32-3' name='32-3' type='color' value='#" . $sheet->getStyle('B33')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='32-4' type='checkbox'></td>
                     </tr>
                     <tr>
                        <td>3. Ашинский МР</td>
                        <td align='center'><input id='3-2' name='3-2' type='text' size=3 value='" . $sheet->getCell("B4")->getValue() . "'></td>
                        <td align='center'><input id='3-3' name='3-3' type='color' value='#" . $sheet->getStyle('B4')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='3-4' type='checkbox'></td>
                        <td></td>
                        <td>18. Красноармейский МР</td>
                        <td align='center'><input id='18-2' name='18-2' type='text' size='3' value='" . $sheet->getCell("B19")->getValue() . "'></td>
                        <td align='center'><input id='18-3' name='18-3' type='color' value='#" . $sheet->getStyle('B19')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='18-4' type='checkbox'></td>
                        <td width=50px></td>
                        <td>33. Трёхгорный ГО</td>
                        <td align='center'><input id='33-2' name='33-2' type='text' size='3' value='" . $sheet->getCell("B34")->getValue() . "'></td>
                        <td align='center'><input id='33-3' name='33-3' type='color' value='#" . $sheet->getStyle('B34')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='33-4' type='checkbox'></td>
                     </tr>
                     <tr>
                        <td>4. Брединский МР</td>
                        <td align='center'><input id='4-2' name='4-2' type='text' size=3 value='" . $sheet->getCell("B5")->getValue() . "'></td>
                        <td align='center'><input id='4-3' name='4-3' type='color' value='#" . $sheet->getStyle('B5')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='4-4' type='checkbox'></td>
                        <td></td>
                        <td>19. Кунашакский МР</td>
                        <td align='center'><input id='19-2' name='19-2' type='text' size='3' value='" . $sheet->getCell("B20")->getValue() . "'></td>
                        <td align='center'><input id='19-3' name='19-3' type='color' value='#" . $sheet->getStyle('B20')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='19-4' type='checkbox'></td>
                        <td width=50px></td>
                        <td>34. Троицкий ГО + МР</td>
                        <td align='center'><input id='34-2' name='34-2' type='text' size='3' value='" . $sheet->getCell("B35")->getValue() . "'></td>
                        <td align='center'><input id='34-3' name='34-3' type='color' value='#" . $sheet->getStyle('B35')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='34-4' type='checkbox'></td>
                     </tr>
                     <tr>
                        <td>5. Варненский МР</td>
                        <td align='center'><input id='5-2' name='5-2' type='text' size='3' value='" . $sheet->getCell("B6")->getValue() . "'></td>
                        <td align='center'><input id='5-3' name='5-3' type='color' value='#" . $sheet->getStyle('B6')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='5-4' type='checkbox'></td>
                        <td></td>
                        <td>20. Кусинский МР</td>
                        <td align='center'><input id='20-2' name='20-2' type='text' size='3' value='" . $sheet->getCell("B21")->getValue() . "'></td>
                        <td align='center'><input id='20-3' name='20-3' type='color' value='#" . $sheet->getStyle('B21')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='20-4' type='checkbox'></td>
                        <td width=50px></td>
                        <td>35. Увельский МР</td>
                        <td align='center'><input id='35-2' name='35-2' type='text' size='3' value='" . $sheet->getCell("B36")->getValue() . "'></td>
                        <td align='center'><input id='35-3' name='35-3' type='color' value='#" . $sheet->getStyle('B36')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='35-4' type='checkbox'></td>
                     </tr>
                     <tr>
                        <td>6. Верхнеуральский МР</td>
                        <td align='center'><input id='6-2' name='6-2' type='text' size='3' value='" . $sheet->getCell("B7")->getValue() . "'></td>
                        <td align='center'><input id='6-3' name='6-3' type='color' value='#" . $sheet->getStyle('B7')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='6-4' type='checkbox'></td>
                        <td></td>
                        <td>21. Кыштымский ГО</td>
                        <td align='center'><input id='21-2' name='21-2' type='text' size='3' value='" . $sheet->getCell("B22")->getValue() . "'></td>
                        <td align='center'><input id='21-3' name='21-3' type='color' value='#" . $sheet->getStyle('B22')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='21-4' type='checkbox'></td>
                        <td width=50px></td>
                        <td>36. Уйский МР</td>
                        <td align='center'><input id='36-2' name='36-2' type='text' size='3' value='" . $sheet->getCell("B37")->getValue() . "'></td>
                        <td align='center'><input id='36-3' name='36-3' type='color' value='#" . $sheet->getStyle('B37')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='36-4' type='checkbox'></td>
                     </tr>
                     <tr>
                        <td>7. Верхнеуфалейский ГО</td>
                        <td align='center'><input id='7-2' name='7-2' type='text' size='3' value='" . $sheet->getCell("B8")->getValue() . "'></td>
                        <td align='center'><input id='7-3' name='7-3' type='color' value='#" . $sheet->getStyle('B8')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='7-4' type='checkbox'></td>
                        <td></td>
                        <td>22. Локомотивный ГО</td>
                        <td align='center'><input id='22-2' name='22-2' type='text' size='3' value='" . $sheet->getCell("B23")->getValue() . "'></td>
                        <td align='center'><input id='22-3' name='22-3' type='color' value='#" . $sheet->getStyle('B23')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='22-4' type='checkbox'></td>
                        <td width=50px></td>
                        <td>37. Усть-Катавский ГО</td>
                        <td align='center'><input id='37-2' name='37-2' type='text' size='3' value='" . $sheet->getCell("B38")->getValue() . "'></td>
                        <td align='center'><input id='37-3' name='37-3' type='color' value='#" . $sheet->getStyle('B38')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='37-4' type='checkbox'></td>
                     </tr>
                     <tr>
                        <td>8. Еманжелинский МР</td>
                        <td align='center'><input id='8-2' name='8-2' type='text' size='3' value='" . $sheet->getCell("B9")->getValue() . "'></td>
                        <td align='center'><input id='8-3' name='8-3' type='color' value='#" . $sheet->getStyle('B9')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='8-4' type='checkbox'></td>
                        <td></td>
                        <td>23. Магнитогорский ГО</td>
                        <td align='center'><input id='23-2' name='23-2' type='text' size='3' value='" . $sheet->getCell("B24")->getValue() . "'></td>
                        <td align='center'><input id='23-3' name='23-3' type='color' value='#" . $sheet->getStyle('B24')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='23-4' type='checkbox'></td>
                        <td width=50px></td>
                        <td>38. Чебаркульский ГО + МР</td>
                        <td align='center'><input id='38-2' name='38-2' type='text' size='3' value='" . $sheet->getCell("B39")->getValue() . "'></td>
                        <td align='center'><input id='38-3' name='38-3' type='color' value='#" . $sheet->getStyle('B39')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='38-4' type='checkbox'></td>
                     </tr>
                     <tr>
                        <td>9. Еткульский МР</td>
                        <td align='center'><input id='9-2' name='9-2' type='text' size='3' value='" . $sheet->getCell("B10")->getValue() . "'></td>
                        <td align='center'><input id='9-3' name='9-3' type='color' value='#" . $sheet->getStyle('B10')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='9-4' type='checkbox'></td>
                        <td></td>
                        <td>24. Миасский ГО</td>
                        <td align='center'><input id='24-2' name='24-2' type='text' size='3' value='" . $sheet->getCell("B25")->getValue() . "'></td>
                        <td align='center'><input id='24-3' name='24-3' type='color' value='#" . $sheet->getStyle('B25')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='24-4' type='checkbox'></td>
                        <td width=50px></td>
                        <td>39. Челябинский ГО</td>
                        <td align='center'><input id='39-2' name='39-2' type='text' size='3' value='" . $sheet->getCell("B40")->getValue() . "'></td>
                        <td align='center'><input id='39-3' name='39-3' type='color' value='#" . $sheet->getStyle('B40')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='39-4' type='checkbox'></td>
                     </tr>
                     <tr>
                        <td>10. Златоустовский ГО</td>
                        <td align='center'><input id='10-2' name='10-2' type='text' size='3' value='" . $sheet->getCell("B11")->getValue() . "'></td>
                        <td align='center'><input id='10-3' name='10-3' type='color' value='#" . $sheet->getStyle('B11')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='10-4' type='checkbox'></td>
                        <td></td>
                        <td>25. Нагайбакский МР</td>
                        <td align='center'><input id='25-2' name='25-2' type='text' size='3' value='" . $sheet->getCell("B26")->getValue() . "'></td>
                        <td align='center'><input id='25-3' name='25-3' type='color' value='#" . $sheet->getStyle('B26')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='25-4' type='checkbox'></td>
                        <td width=50px></td>
                        <td>40. Чесменский МР</td>
                        <td align='center'><input id='40-2' name='40-2' type='text' size='3' value='" . $sheet->getCell("B41")->getValue() . "'></td>
                        <td align='center'><input id='40-3' name='40-3' type='color' value='#" . $sheet->getStyle('B41')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='40-4' type='checkbox'></td>
                     </tr>
                     <tr>
                        <td>11. Карабашский ГО</td>
                        <td align='center'><input id='11-2' name='11-2' type='text' size='3' value='" . $sheet->getCell("B12")->getValue() . "'></td>
                        <td align='center'><input id='11-3' name='11-3' type='color' value='#" . $sheet->getStyle('B12')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='11-4' type='checkbox'></td>
                        <td></td>
                        <td>26. Нязепетровский МР</td>
                        <td align='center'><input id='26-2' name='26-2' type='text' size='3' value='" . $sheet->getCell("B27")->getValue() . "'></td>
                        <td align='center'><input id='26-3' name='26-3' type='color' value='#" . $sheet->getStyle('B27')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='26-4' type='checkbox'></td>
                        <td width=50px></td>
                        <td>41. Южноуральский ГО</td>
                        <td align='center'><input id='41-2' name='41-2' type='text' size='3' value='" . $sheet->getCell("B42")->getValue() . "'></td>
                        <td align='center'><input id='41-3' name='41-3' type='color' value='#" . $sheet->getStyle('B42')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='41-4' type='checkbox'></td>
                     </tr>
                     <tr>
                        <td>12. Карталинский МР</td>
                        <td align='center'><input id='12-2' name='12-2' type='text' size='3' value='" . $sheet->getCell("B13")->getValue() . "'></td>
                        <td align='center'><input id='12-3' name='12-3' type='color' value='#" . $sheet->getStyle('B13')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='12-4' type='checkbox'></td>
                        <td></td>
                        <td>27. Озёрский ГО </td>
                        <td align='center'><input id='27-2' name='27-2' type='text' size='3' value='" . $sheet->getCell("B28")->getValue() . "'></td>
                        <td align='center'><input id='27-3' name='27-3' type='color' value='#" . $sheet->getStyle('B28')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='27-4' type='checkbox'></td>
                        <td></td>
                        <td></td>
                        <td ></td>
                        <td></td>
                        <td></td>
                     </tr>
                     <tr>
                        <td>13. Каслинский МР</td>
                        <td align='center'><input id='13-2' name='13-2' type='text' size='3' value='" . $sheet->getCell("B14")->getValue() . "'></td>
                        <td align='center'><input id='13-3' name='13-3' type='color' value='#" . $sheet->getStyle('B14')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='13-4' type='checkbox'></td>
                        <td></td>
                        <td>28. Октябрьский МР</td>
                        <td align='center'><input id='28-2' name='28-2' type='text' size='3' value='" . $sheet->getCell("B29")->getValue() . "'></td>
                        <td align='center'><input id='28-3' name='28-3' type='color' value='#" . $sheet->getStyle('B29')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='28-4' type='checkbox'></td>
                        <td></td>
                        <td></td>
                        <td ></td>
                        <td></td>
                        <td></td>
                     </tr>
                     <tr>
                        <td>14. Катав-Ивановский МР</td>
                        <td align='center'><input id='14-2' name='14-2' type='text' size='3' value='" . $sheet->getCell("B15")->getValue() . "'></td>
                        <td align='center'><input id='14-3' name='14-3' type='color' value='#" . $sheet->getStyle('B15')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='14-4' type='checkbox'></td>
                        <td></td>
                        <td>29. Пластовский МР</td>
                        <td align='center'><input id='29-2' name='29-2' type='text' size='3' value='" . $sheet->getCell("B30")->getValue() . "'></td>
                        <td align='center'><input id='29-3' name='29-3' type='color' value='#" . $sheet->getStyle('B30')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='29-4' type='checkbox'></td>
                        <td></td>
                        <td></td>
                        <td ></td>
                        <td></td>
                        <td></td>
                     </tr>
                     <tr>
                        <td>15. Кизильский МР</td>
                        <td align='center'><input id='15-2' name='15-2' type='text' size='3' value='" . $sheet->getCell("B16")->getValue() . "'></td>
                        <td align='center'><input id='15-3' name='15-3' type='color' value='#" . $sheet->getStyle('B16')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='15-4' type='checkbox'></td>
                        <td></td>
                        <td>30. Саткинский МР</td>
                        <td align='center'><input id='30-2' name='30-2' type='text' size='3' value='" . $sheet->getCell("B31")->getValue() . "'></td>
                        <td align='center'><input id='30-3' name='30-3' type='color' value='#" . $sheet->getStyle('B31')->getFill()->getStartColor()->getRGB() . "'></td>
                        <td align='center'><input id='30-4' type='checkbox'></td>
                        <td></td>
                        <td></td>
                        <td ></td>
                        <td></td>
                        <td></td>
                     </tr>
                     <tr>
                        <td colspan='14' align='right'><input class='get_map' id='get_map' name='get_map' type='button' value='Построить карту'></td>
                     </tr>
                  </table>
         </form>
         ";

         echo($output);

      }else{

      }
   }else{

   }
?>