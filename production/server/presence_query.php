<?php
    require "bdd_connect.php";
    $dates =  [];
    $timeIns =  [];
    $timeOuts = [];
    $absent = 0;
    $dateDay = "";
    $uncountable = 0;
    $absenceRate = 50;
    $presenceRate = 50;
    $TotalHours = 0;
    $TotalMinutes = 0;
    $start_date = (empty($_POST["date"]))? date('Y-m-d') : substr($_POST["date"], 0, 10);
    $end_date = (empty($_POST["date"]))? date('Y-m-d') : substr($_POST["date"], -10, 10);
    if (!empty($start_date) && !empty($end_date)) {
        $start_date_formatted = date('Y-m-d', strtotime($start_date));
        $end_date_formatted = date('Y-m-d', strtotime($end_date));
        $start_time = strtotime($start_date);
        $end_time = strtotime($end_date);
        for($i=$start_time; $i<=$end_time; $i+=86400)
        {
            $list[] = date('d-m-Y', $i);
        } 
        function convertToHoursMins($time, $format = '%02d:%02d') {
            if ($time < 1) {
                return "00:00";
            }
            $hours = floor($time / 60);
            $minutes = ($time % 60);
            return sprintf($format, $hours, $minutes);
        }
        $presenceTable = $connect->query('SELECT * FROM presence WHERE idEmployee ='.$_POST["idEmployee"].' AND date BETWEEN "'.$start_date_formatted.'" AND "'.$end_date_formatted.'" ORDER BY date');
        while ($row = $presenceTable->fetch()) {
            $dates[] = date('d-m-Y', strtotime($row["date"]));; 
            $timeIns[] = $row["timeIn"];
            $timeOuts[] = $row["timeOut"];
        }
        $presenceTable->closeCursor();
        unset($connect);
        for ($i=0; $i<count($list); $i++) {
    ?>
        <tr>
            <?php 
                switch (date('w', strtotime($list[$i]))) {
                    case 0:
                        $dateDay = "الأحد ".$list[$i];
                        break;
                    case 1:
                        $dateDay = "الاثنين ".$list[$i];
                        break;
                    case 2:
                        $dateDay = "الثلاثاء ".$list[$i];
                        break;
                    case 3:
                        $dateDay = "الأربعاء ".$list[$i];
                        break;
                    case 4:
                        $dateDay = "الخميس ".$list[$i];
                        break;
                    case 5:
                        $dateDay = "الجمعة ".$list[$i];
                        break;
                    case 6:
                        $dateDay = "السبت ".$list[$i];
                        break;
                }
                if (($key = array_search($list[$i], $dates)) !== false) { 
            ?>
            <td class="present"><?php echo $dateDay; ?></td>
            <td class="present"><?php echo $timeIns[$key]; ?></td>
            <td class="present"><?php echo $timeOuts[$key]; ?></td>
            <td class="present">
            <?php 
                echo date("H:i", strtotime($timeOuts[$key]) - strtotime($timeIns[$key]));
                $TotalHours += (new DateTime($timeOuts[$key]))->diff(new DateTime($timeIns[$key]))->format('%h');
                $TotalMinutes += (new DateTime($timeOuts[$key]))->diff(new DateTime($timeIns[$key]))->format('%i');
            ?></td>
            <?php } else { if ((date('w', strtotime($list[$i])) == 5) || (date('w', strtotime($list[$i])) == 6)) { ?>
                <td class="strikeout"><?php echo $dateDay; ?></td>
                <td class="strikeout"><?php echo ""; ?></td>
                <td class="strikeout"><?php echo ""; ?></td>
                <td class="strikeout"><?php echo "";$uncountable++; ?></td>
            <?php } else { ?>
                <td class="absent"><?php echo $dateDay; ?></td>
                <td class="absent"><?php echo ""; ?></td>
                <td class="absent"><?php echo ""; ?></td>
                <td class="absent"><?php echo "";$absent ++; ?></td>
            <?php }} ?>
            <?php if ($i==0) { ?><td id="rowspan" rowspan="<?php echo count($list); ?>"></td> <?php } ?>
        </tr>
    <?php 
        }
        if (count($list)!=$uncountable) {
            $absenceRate = 100*$absent / (count($list)-$uncountable);
        }
        $presenceRate = 100 - $absenceRate;
        echo "<script>$('#rowspan').html('".convertToHoursMins($TotalHours * 60 + $TotalMinutes, '%02d:%02d')."');";
        echo "$('#presenceRate').css('width', ".$presenceRate." + '%').text(".number_format($presenceRate, 2)." + '%');";
        echo "$('#absenceRate').css('width', ".$absenceRate." + '%').text(".number_format($absenceRate, 2)." + '%');</script>";
    }
?>