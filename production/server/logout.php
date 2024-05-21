<?php 
    session_start();
    require "bdd_connect.php";
    $user = $connect->prepare('UPDATE presence SET `timeOut`="'.date("H:i",time() + 3600).'" WHERE idEmployee = :idEmployee AND date = :daydate');
    $user->execute(array(
        ':idEmployee' => intval($_SESSION['memberId']),
        ':daydate' => date("Y-m-d")
      ));
    session_destroy();
    unset($connect);
    header('Location: ../login.php?info');
?>