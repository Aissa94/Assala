<?php
      require "bdd_connect.php";
      $library = $connect->prepare('INSERT INTO `librarystore`(`title`, `author`, `publicationYear`, `isbn`, `pages`, `quantity`, `speciality`, `price`) VALUES (?,?,?,?,?,?,?,?)');
      $library->execute(array($_POST['title'], $_POST['author'], $_POST['publicationYear'], $_POST['isbn'], $_POST['pages'], $_POST['quantity'], $_POST['speciality'], $_POST['price']));
      unset($connect);
      session_start();
      $_SESSION['logged'] = true;
      header('Location: ../libraries_store.php');
?>