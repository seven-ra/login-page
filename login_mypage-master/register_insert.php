<?php 

    error_reporting(E_ALL);
    ini_set('display_errors','On');

    require ('DB.php');
    mb_internal_encoding("utf8");

    $DB = new DB();

    $pdo = $DB->connect();

    $stmt = $pdo->prepare($DB->register());

    //$register = new Register($this->name, $this->mail, $_POST['password'], $_POST['path_filename'], $_POST['comments']);
  //   $stmt = $pdo->prepare('INSERT INTO login_mypage (name, mail, password, picture, comments) VALUES (?,?,?,?,?)'); 

    $stmt->bindValue(1,$_POST['name']); 
    $stmt->bindValue(2,$_POST['mail']); 
    $stmt->bindValue(3,$_POST['password']); 
    $stmt->bindValue(4,$_POST['path_filename']); 
    $stmt->bindValue(5,$_POST['comments']);

    $stmt->execute(); 
    $pdo = NULL;
    
  header('Location:after_register.html'); 

?>
 