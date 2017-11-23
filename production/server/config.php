<?php
  try 
  {
      $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
      $connect = new PDO('mysql:host=localhost;dbname=ptdw', 'root', '', $pdo_options);
      $menu=implode(",",$_POST['menu']);
      $user = $connect->query('UPDATE `config` SET `logo`="'.$_POST['logo'].'" , `color`="'.$_POST['color'].'" , `menu`="'.$menu.'" WHERE page="'.$_POST['page'].'"');
      header('Location: ../'.$_POST['page']);
      unset($connect);
  } 
  catch (Exception $e) 
  {
      die("Erreur: " . $e->getMessage());
  }
?>