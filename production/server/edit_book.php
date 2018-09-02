<?php
      require "bdd_connect.php";
        $book = $connect->prepare('UPDATE `bookstore` SET `title`= :title, `author`= :author, `publicationYear`= :publicationYear, `isbn`= :isbn, `pages`= :pages, `quantity`= :quantity, `speciality`= :speciality, `price`= :price, `isAssala`= :isAssala WHERE `bookId` = :bookId');
        $book->execute(array(
            ':title' => $_POST['title'],
            ':author' => $_POST['author'],
            ':publicationYear' => $_POST['publicationYear'],
            ':isbn' => $_POST['isbn'],
            ':pages' => $_POST['pages'],
            ':quantity' => $_POST['quantity'],
            ':speciality' => $_POST['speciality'],
            ':price' => $_POST['price'],
            ':isAssala' => $_POST['type'],
            ':bookId' => $_POST['bookId']
        ));
        $isAssala = $connect->prepare('SELECT `isAssala` FROM `bookstore` WHERE `bookId` = :bookId');
        $isAssala->execute(array(':bookId' => $_POST['bookId']));
        $isAssala_data = $isAssala->fetch();
        unset($connect);
        /*session_start();
        $_SESSION['logged'] = true;*/

        if ($isAssala_data['isAssala']) header('Location: ../books_store.php?edit');
        else header('Location: ../books_store_not_in.php?edit');
?>