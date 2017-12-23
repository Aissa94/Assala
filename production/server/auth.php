<?php
      require "bdd_connect.php";
      $user = $connect->prepare('SELECT * FROM members WHERE username = :username AND password = md5(:password)');
      $user->execute(array(
        ':username' => $_POST['username'],
        ':password' => $_POST['password']
      ));
      $row = $user->fetch(PDO::FETCH_ASSOC);
      if(!empty($row['memberId'])){
          $presence = $connect->prepare('INSERT INTO `presence`(`idEmployee`, `date`, `timeIn`) VALUES (?,?,?)');
          $presence->execute(array($row['memberId'], date("d-m-Y"), date("H:i",time() + 3600)));
          session_start();
          $_SESSION['id'] = $connect->lastInsertId();
          $_SESSION['lastname'] = $row["lastname"];
          $_SESSION['firstname'] = $row["firstname"];
          /*if ($row['idChercheur'] == 1) $_SESSION['admin'] = true;*/
          header('Location: ../index.php');
      } else {
          header('Location: ../login.html');
      }
      unset($connect);
?>