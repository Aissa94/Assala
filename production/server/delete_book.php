<?php
      require "bdd_connect.php";
      $book = $connect->prepare('DELETE FROM `bookstore` WHERE `bookId`=:bookId');
      $book->execute(array(
          ':bookId' => $_POST['bookId']
      ));

      $book = $connect->prepare('UPDATE `bookstore` SET `active`= 0 WHERE `bookId` = :bookId');
      $book->execute(array(':bookId' => $_POST['bookId']));
      unset($connect);
      /*session_start();
      $_SESSION['logged'] = true;*/
      header('Location: ../books_store_not_in.php?delete');
?>