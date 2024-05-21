<?php
      require "bdd_connect.php";
      $user = $connect->prepare('SELECT * FROM members WHERE username = :username AND password = md5(:password)');
      $user->execute(array(
        ':username' => $_POST['username'],
        ':password' => $_POST['password']
      ));
      $row = $user->fetch(PDO::FETCH_ASSOC);
      if(!empty($row['memberId'])){
          $alreadysignin = $connect->prepare('SELECT * FROM `presence` WHERE idEmployee = :idEmployee AND date = :daydate');
          $alreadysignin->execute(array(
            ':idEmployee' => $row['memberId'],
            ':daydate' => date("Y-m-d")
          ));
          $loginexist = $alreadysignin->fetch(PDO::FETCH_ASSOC);
          if (isset($_POST["timeclockinput"])) {
            if(empty($loginexist['idEmployee'])){
              if ($_POST["timeclockinput"] == 'login') {
                $presence = $connect->prepare('INSERT INTO `presence`(`idEmployee`, `date`, `timeIn`) VALUES (?,?,?)');
                $presence->execute(array($row['memberId'], date("Y-m-d"), date("H:i",time() + 3600)));
                header('Location: ../login.php?successlogin');
              } else {
                $presence = $connect->prepare('INSERT INTO `presence`(`idEmployee`, `date`, `timeIn`, `timeOut`) VALUES (?,?,?,?)');
                $presence->execute(array($row['memberId'], date("Y-m-d"), date("H:i",time() + 3600), date("H:i",time() + 3600)));
                header('Location: ../login.php?successlogout');
              }
            }
            if(!empty($loginexist['idEmployee'])){
              if ($_POST["timeclockinput"] == 'login') {
                header('Location: ../login.php?errorlogin');
              } else {
                $presence = $connect->prepare('UPDATE presence SET `timeOut`="'.date("H:i",time() + 3600).'" WHERE idEmployee = :idEmployee AND date = :daydate');
                $presence->execute(array(
                  ':idEmployee' => $row['memberId'],
                  ':daydate' => date("Y-m-d")
                ));
                header('Location: ../login.php?successlogout');
              }
            }
          } else {
            if(empty($loginexist['idEmployee'])){
              $presence = $connect->prepare('INSERT INTO `presence`(`idEmployee`, `date`, `timeIn`) VALUES (?,?,?)');
              $presence->execute(array($row['memberId'], date("Y-m-d"), date("H:i",time() + 3600)));
            }
            session_start();
            $_SESSION['id'] = $connect->lastInsertId();
            $_SESSION['memberId'] = $row["memberId"];
            $_SESSION['lastname'] = $row["lastname"];
            $_SESSION['firstname'] = $row["firstname"];
            $_SESSION['access'] = $row["access"];
            /*if ($row['idChercheur'] == 1) $_SESSION['admin'] = true;*/
            header('Location: ../index.php?success');
          }
      } else {
          header('Location: ../login.php?error');
      }
      unset($connect);
?>