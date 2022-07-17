<?php

error_reporting(E_ALL);
ini_set('display_errors','On');


class DB{

 public function connect(){
  $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
 return $pdo;
 }

 public function register() {
  return 'INSERT INTO login_mypage (name, mail, password, picture, comments) VALUES (?,?,?,?,?)'; 
 }

 public function login() {
  return 'SELECT * FROM login_mypage WHERE mail = ? && password = ?';
 }

 public function update() {
  return 'UPDATE login_mypage SET name=?, mail=?, password=?, comments=? WHERE id=?';
 }

 public function getUser() {
  return 'SELECT * FROM login_mypage WHERE id = ?';
 }
}

?>
