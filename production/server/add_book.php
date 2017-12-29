<?php
      require "bdd_connect.php";
      $book = $connect->prepare('INSERT INTO `bookstore`(`title`, `author`, `publicationYear`, `isbn`, `pages`, `quantity`, `speciality`, `price`) VALUES (?,?,?,?,?,?,?,?)');
      $book->execute(array($_POST['title'], $_POST['author'], $_POST['publicationYear'], $_POST['isbn'], $_POST['pages'], $_POST['quantity'], $_POST['speciality'], $_POST['price']));
      unset($connect);
      /*session_start();
      $_SESSION['logged'] = true;*/
      header('Location: ../books_store.php?add');
?>