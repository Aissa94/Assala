<?php
      require "bdd_connect.php";
      $book = $connect->prepare('UPDATE `bookstore` SET `active`= 0 WHERE `bookId` = :bookId');
      $book->execute(array(':bookId' => $_POST['bookId']));

      $isAssala = $connect->prepare('SELECT `isAssala` FROM `bookstore` WHERE `bookId` = :bookId');
      $isAssala->execute(array(':bookId' => $_POST['bookId']));
      $isAssala_data = $isAssala->fetch();
      unset($connect);
      /*session_start();
      $_SESSION['logged'] = true;*/
      if ($isAssala_data['isAssala']) header('Location: ../books_store.php?delete');
      else header('Location: ../books_store_not_in.php?delete');
?>