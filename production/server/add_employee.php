<?php
      require "bdd_connect.php";
      $user = $connect->prepare('SELECT * FROM members WHERE username = :username');
      $user->execute(array(
        ':username' => $_POST['username']
      ));
      $row = $user->fetch(PDO::FETCH_ASSOC);
      if(!empty($row['memberId'])){
            header('Location: ../staff_create.php?warning');
      } else {
            $phone2 = (empty($_POST['phone2']))? "": $_POST['phone2'];
            $phone3 = (empty($_POST['phone3']))? "": $_POST['phone3'];
            $employee = $connect->prepare('INSERT INTO `members`(`firstname`, `lastname`, `birthday`, `gender`, `phone`, `phone2`, `phone3`, `email`, `adress`, `idcard`, `position`, `level`, `job`, `salary`, `username`, `password`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
            $employee->execute(array($_POST['firstname'], $_POST['lastname'], $_POST['birthday'], $_POST['gender'], $_POST['phone1'], $phone2, $phone3, $_POST['email'], $_POST['adress'], $_POST['idcard'], $_POST['position'], $_POST['level'], $_POST['job'], $_POST['salary'], $_POST['username'], md5($_POST['password'])));
            unset($connect);
            /*session_start();
            $_SESSION['logged'] = true;*/
            header('Location: ../staff_management.php?success');
      }
?>