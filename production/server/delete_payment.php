<?php
      require "bdd_connect.php";


      $book = $connect->prepare('DELETE FROM `payments` WHERE `paymentId`=:paymentId');
      $book->execute(array(
          ':paymentId' => $_POST['paymentId']
      ));
      
      
      unset($connect);
      header("Location: " . $_SERVER["HTTP_REFERER"] . "&deletep");
?>