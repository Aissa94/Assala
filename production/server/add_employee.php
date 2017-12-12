<?php
      require "bdd_connect.php";
      $employee = $connect->prepare('INSERT INTO `members`(`firstname`, `lastname`, `birthday`, `gender`, `phone`, `email`, `adress`, `idcard`, `level`, `job`, `salary`, `username`, `password`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');
      $employee->execute(array($_POST['firstname'], $_POST['lastname'], $_POST['birthday'], $_POST['gender'], $_POST['phone'], $_POST['email'], $_POST['adress'], $_POST['idcard'], $_POST['level'], $_POST['job'], $_POST['salary'], $_POST['username'], md5($_POST['password'])));
      unset($connect);
      session_start();
      $_SESSION['logged'] = true;
      header('Location: ../staff_management.php');
?>