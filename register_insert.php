<?php 

    error_reporting(E_ALL);
    ini_set('display_errors','On');

    require ('DB.php');
    mb_internal_encoding("utf8");

    $DB = new DB();

    $pdo = $DB->connect();

    $stmt = $pdo->prepare($DB->register());

    $count = (int)$pdo->prepare($DB->counter());



    $stmt->bindValue(1,$count + 1);   
    $stmt->bindValue(2,$_POST['name']); 
    $stmt->bindValue(3,$_POST['mail']); 
    $stmt->bindValue(4,$_POST['password']); 
    $stmt->bindValue(5,$_POST['path_filename']); 
    $stmt->bindValue(6,$_POST['comments']);

    $stmt->execute(); 
    $pdo = NULL;
    
  header('Location:after_register.html'); 

?>
 