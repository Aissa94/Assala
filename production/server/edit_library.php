<?php
      require "bdd_connect.php";
        $phone2 = (empty($_POST['phone2']))? "": $_POST['phone2'];
        $phone3 = (empty($_POST['phone3']))? "": $_POST['phone3'];
        $library = $connect->prepare('UPDATE `librarystore` SET `name`= :name, `state`= :state, `adress`= :adress, `email`= :email, `phone`= :phone, `phone2`= :phone2, `phone3`= :phone3 WHERE `libraryId` = :libraryId');
        $library->execute(array(
            ':name' => $_POST['name'],
            ':state' => $_POST['state'],
            ':adress' => $_POST['adress'],
            ':email' => $_POST['email'],
            ':phone' => $_POST['phone1'],
            ':phone2' => $phone2,
            ':phone3' => $phone3,
            ':libraryId' => $_POST['libraryId']
        ));
        unset($connect);
        /*session_start();
        $_SESSION['logged'] = true;*/
        header('Location: ../libraries_store.php?edit');
?>