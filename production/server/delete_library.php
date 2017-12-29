<?php
      require "bdd_connect.php";
      $book = $connect->prepare('DELETE FROM `librarystore` WHERE `libraryId`=:libraryId');
      $book->execute(array(
          ':libraryId' => $_POST['libraryId']
      ));
      unset($connect);
      /*session_start();
      $_SESSION['logged'] = true;*/
      header('Location: ../libraries_store.php?delete');
?>