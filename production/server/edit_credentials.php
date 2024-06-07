<?php
      require "bdd_connect.php";
        $employee = $connect->prepare('UPDATE `members` SET `username`= :username, `password`= :newpassword WHERE `memberId` = :memberId');
        $employee->execute(array(
            ':username' => $_POST['username'],
            ':newpassword' => md5($_POST['password']),
            ':memberId' => $_POST['employeeId']
        ));
        unset($connect);
        /*session_start();
        $_SESSION['logged'] = true;*/
        header('Location: ../profile.php?success&id='.$_POST['employeeId']);

?>