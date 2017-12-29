<?php
      require "bdd_connect.php";
      $book = $connect->prepare('DELETE FROM `bookstore` WHERE `bookId`=:bookId');
      $book->execute(array(
          ':bookId' => $_POST['bookId']
      ));
      unset($connect);
      /*session_start();
      $_SESSION['logged'] = true;*/
      header('Location: ../books_store.php?delete');
?>