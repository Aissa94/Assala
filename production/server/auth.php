<?php
  try 
  {
      $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
      $connect = new PDO('mysql:host=localhost;dbname=assala', 'root', '', $pdo_options);
      $user = $connect->prepare('SELECT * FROM members WHERE username = :username AND password = md5(:password)');
      $user->execute(array(
        ':username' => $_POST['username'],
        ':password' => $_POST['password']
      ));
      $row = $user->fetch(PDO::FETCH_ASSOC);
      if(!empty($row['memberId'])){
        session_start();
        $_SESSION['logged'] = true;
        $presence = $connect->prepare('INSERT INTO `presence`(`idEmployee`, `date`, `timeIn`) VALUES (?,?,?)');
        $presence->execute(array($row['memberId'], date("d-m-Y"), date("H:i",time() + 3600)));
        /*if ($row['idChercheur'] == 1) $_SESSION['admin'] = true;*/
        header('Location: ../index.php');
      }
      else {
        header('Location: ../login.html');
      }
      unset($connect);
  } 
  catch (Exception $e) 
  {
      die("Erreur: " . $e->getMessage());
  }
?>