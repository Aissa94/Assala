<?php
      require "bdd_connect.php";
      $book = $connect->prepare('UPDATE `bookstore` SET `quantity`= `quantity` + :quantity WHERE `bookId`=:bookId');
      $book->execute(array(
          ':quantity' => $_POST['quantity'],
          ':bookId' => $_POST['bookId']
      ));
      unset($connect);
      /*session_start();
      $_SESSION['logged'] = true;*/
      header('Location: ../books_store.php?success');
?>