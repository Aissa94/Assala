<?php
  try 
  {
      $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
      $connect = new PDO('mysql:host=localhost;dbname=ptdw', 'root', '', $pdo_options);
      $product = $connect->prepare('INSERT INTO `chercheur`(`nom`, `prenom`, `pays`, `continent`, `domaine`, `publication`, `username`, `password`, `adresse`, `telephone`, `travail`, `grade`, `biographie`, `affiliation`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
      $product->execute(array($_POST['nom'], $_POST['prenom'], $_POST['pays'], $_POST['continent'], $_POST['domaine'], $_POST['publication'], $_POST['username'], md5($_POST['password']), $_POST['adresse'], $_POST['telephone'], $_POST['travail'], $_POST['grade'], $_POST['biographie'], $_POST['affiliation'] ));
      unset($connect);
      /*session_start();
      $_SESSION['logged'] = true;*/
      header('Location: ../index.php');
  } 
  catch (Exception $e) 
  {
      die("Erreur: " . $e->getMessage());
  }
?>