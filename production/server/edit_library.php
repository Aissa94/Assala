<?php
      require "bdd_connect.php";
        $phone2 = (empty($_POST['phone2']))? "": $_POST['phone2'];
        $phone3 = (empty($_POST['phone3']))? "": $_POST['phone3'];
        $library = $connect->prepare('UPDATE `librarystore` SET `name`= :name, `type`= :type, `state`= :state, `adress`= :adress, `rc`= :rc, `fisc`= :fisc, `artimp`= :artimp, `rib`= :rib, `nis`= :nis, `email`= :email, `phone`= :phone, `phone2`= :phone2, `phone3`= :phone3 WHERE `libraryId` = :libraryId');
        $library->execute(array(
            ':name' => $_POST['name'],
            ':type' => $_POST['type'],
            ':state' => $_POST['state'],
            ':adress' => $_POST['adress'],
            ':rc' => $_POST['rc'],
            ':fisc' => $_POST['fisc'],
            ':artimp' => $_POST['artimp'],
            ':rib' => $_POST['rib'],
            ':nis' => $_POST['nis'],
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