<?php 
    echo $_POST['receiver']."<br>";
    echo $_POST['t_price']."<br>";
    echo $_POST['paying']."<br>";
    $kk = $_POST['title'];
    $aa = $_POST['quantity'];
    for ($i=0; $i<count($kk); $i++) {
        echo $kk[$i]."<br>";
    }
    for ($i=0; $i<count($aa); $i++) {
        echo $aa[$i]."<br>";
    }
?>