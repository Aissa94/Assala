<?php
      require "bdd_connect.php";
        $phone2 = (empty($_POST['phone2']))? "": $_POST['phone2'];
        $phone3 = (empty($_POST['phone3']))? "": $_POST['phone3'];
        $employee = $connect->prepare('UPDATE `members` SET `firstname`= :firstname, `lastname`= :lastname, `birthday`= :birthday, `gender`= :gender, `phone`= :phone, `phone2`= :phone2, `phone3`= :phone3, `email`= :email, `adress`= :adress, `idcard`= :idcard, `position`= :position, `level`= :level, `job`= :job, `salary`= :salary WHERE `memberId` = :memberId');
        $employee->execute(array(
            ':firstname' => $_POST['firstname'],
            ':lastname' => $_POST['lastname'],
            ':birthday' => $_POST['birthday'],
            ':gender' => $_POST['gender'],
            ':phone' => $_POST['phone1'],
            ':phone2' => $phone2,
            ':phone3' => $phone3,
            ':email' => $_POST['email'],
            ':adress' => $_POST['adress'],
            ':idcard' => $_POST['idcard'],
            ':position' => $_POST['position'],
            ':level' => $_POST['level'],
            ':job' => $_POST['job'],
            ':salary' => $_POST['salary'],
            ':memberId' => $_POST['memberId']
        ));
        unset($connect);
        /*session_start();
        $_SESSION['logged'] = true;*/
        header('Location: ../profile.php?id='.$_POST['memberId']);
?>