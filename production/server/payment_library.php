<?php
      require "bdd_connect.php";
      $payment = $connect->prepare('INSERT INTO `payments`(`libraryId`, `deserved`, `paid`, `typeAmount`) VALUES (?,?,?,?)');
      $payment->execute(array($_POST['libraryId'], $_POST['deserved'], $_POST['paid'], $_POST['typeAmount']));
      unset($connect);
      header('Location: ../libraries_store.php?success');
?>