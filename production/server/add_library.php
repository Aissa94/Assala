<?php
      require "bdd_connect.php";
      $library = $connect->prepare('INSERT INTO `librarystore`(`name`, `state`, `adress`, `email`, `phone`) VALUES (?,?,?,?,?)');
      $library->execute(array($_POST['name'], $_POST['state'], $_POST['adress'], $_POST['email'], $_POST['phone']));
      unset($connect);
      /*session_start();
      $_SESSION['logged'] = true;*/
      header('Location: ../libraries_store.php');
?>