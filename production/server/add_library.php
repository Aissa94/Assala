<?php
      require "bdd_connect.php";
      $phone2 = (empty($_POST['phone2']))? "": $_POST['phone2'];
      $phone3 = (empty($_POST['phone3']))? "": $_POST['phone3'];
      $library = $connect->prepare('INSERT INTO `librarystore`(`name`, `type`, `state`, `adress`, `rc`, `fisc`, `artimp`, `rib`, `nis`, `email`, `phone`, `phone2`, `phone3`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');
      $library->execute(array($_POST['name'], $_POST['type'], $_POST['state'], $_POST['adress'], $_POST['rc'], $_POST['fisc'], $_POST['artimp'], $_POST['rib'], $_POST['nis'], $_POST['email'], $_POST['phone1'], $phone2, $phone3));
      unset($connect);
      /*session_start();
      $_SESSION['logged'] = true;*/
      header('Location: ../libraries_store.php?add');
?>