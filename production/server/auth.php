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
          $presence->execute(array($row['memberId'], date("Y-m-d"), date("H:i",time() + 3600)));
          session_start();
          $_SESSION['id'] = $connect->lastInsertId();
          $_SESSION['lastname'] = $row["lastname"];
          $_SESSION['firstname'] = $row["firstname"];
          $_SESSION['access'] = $row["access"];
          /*if ($row['idChercheur'] == 1) $_SESSION['admin'] = true;*/
          header('Location: ../index.php?success');
      } else {
          header('Location: ../login.php?error');
      }
      unset($connect);
?>