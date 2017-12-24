<?php
    require "bdd_connect.php";
    $dates =  [];
    $timeIns =  [];
    $timeOuts = [];
    $absent = 0;
    $uncountable = 0;
    $absenceRate = 50;
    $presenceRate = 50;
    $TotalHours = date("H:i", 0);
    $start_date = substr($_POST["date"], 0, 10);
    $end_date = substr($_POST["date"], -10, 10);
    $start_date_formatted = date('Y-m-d', strtotime($start_date));
    $end_date_formatted = date('Y-m-d', strtotime($end_date));
    $start_time = strtotime($start_date);
    $end_time = strtotime($end_date);
    for($i=$start_time; $i<=$end_time; $i+=86400)
    {
        $list[] = date('d-m-Y', $i);
    } 
    $presenceTable = $connect->query('SELECT * FROM presence WHERE idEmployee ='.$_POST["idEmployee"].' AND date BETWEEN "'.$start_date_formatted.'" AND "'.$end_date_formatted.'"');
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
        <?php if (($key = array_search($list[$i], $dates)) !== false) { ?>
        <td class="present"><?php echo $list[$i]; ?></td>
        <td class="present"><?php echo $timeIns[$key]; ?></td>
        <td class="present"><?php echo $timeOuts[$key]; ?></td>
        <td class="present"><?php echo date("H:i", strtotime($timeOuts[$key]) - strtotime($timeIns[$key])); $TotalHours = date("H:i", (strtotime($timeOuts[$key]) - strtotime($timeIns[$key])) + strtotime($TotalHours)); ?></td>
        <?php } else { if ((date('w', strtotime($list[$i])) == 5) || (date('w', strtotime($list[$i])) == 6)) { ?>
            <td class="strikeout"><?php echo $list[$i]; ?></td>
            <td class="strikeout"><?php echo ""; ?></td>
            <td class="strikeout"><?php echo ""; ?></td>
            <td class="strikeout"><?php echo "";$uncountable++; ?></td>
        <?php } else { ?>
            <td class="absent"><?php echo $list[$i]; ?></td>
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
    echo "<script>$('#rowspan').html('".$TotalHours."');";
    echo "$('#presenceRate').css('width', ".$presenceRate." + '%').text(".number_format($presenceRate, 2)." + '%');";
    echo "$('#absenceRate').css('width', ".$absenceRate." + '%').text(".number_format($absenceRate, 2)." + '%');</script>";
?>