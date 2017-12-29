<?php
      require "bdd_connect.php";
        $employee = $connect->prepare('UPDATE `bookstore` SET `title`= :title, `author`= :author, `publicationYear`= :publicationYear, `isbn`= :isbn, `pages`= :pages, `quantity`= :quantity, `speciality`= :speciality, `price`= :price WHERE `bookId` = :bookId');
        $employee->execute(array(
            ':title' => $_POST['title'],
            ':author' => $_POST['author'],
            ':publicationYear' => $_POST['publicationYear'],
            ':isbn' => $_POST['isbn'],
            ':pages' => $_POST['pages'],
            ':quantity' => $_POST['quantity'],
            ':speciality' => $_POST['speciality'],
            ':price' => $_POST['price'],
            ':bookId' => $_POST['bookId']
        ));
        unset($connect);
        /*session_start();
        $_SESSION['logged'] = true;*/
        header('Location: ../books_store.php?edit');
?>