<?php 
    session_start();
    require "bdd_connect.php";
    $user = $connect->prepare('UPDATE presence SET `timeOut`="'.date("H:i",time() + 3600).'" WHERE idPresence = :idPresence');
    $user->execute(array(
        ':idPresence' => intval($_SESSION['id'])
    ));
    session_destroy();
    unset($connect);
    header('Location: ../login.php?info');
?>