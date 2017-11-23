<?php
  session_start();
  $_SESSION['logged'] = false;
  if (isset($_SESSION['admin'])) $_SESSION['admin'] = false;
  header('Location: ../index.php');
?>