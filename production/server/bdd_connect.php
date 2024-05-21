<?php 
    try 
    {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $connect = new PDO('mysql:host=localhost;dbname=assaladz_gestion', 'root', '', $pdo_options);
        $result = $connect->query("SET NAMES 'utf8'");
        //mysql_query("SET CHARACTER SET 'utf8'");
    }
    catch (Exception $e) 
    {
        die('Erreur: ' . $e->getMessage());
    }
?>