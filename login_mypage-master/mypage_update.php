<?php

//error_reporting(E_ALL);
//ini_set('display_errors','On');

require ('DB.php');

mb_internal_encoding("utf8");

session_start();

$DB = new DB();

//DB接続・try catch
try{
 $pdo = $DB->connect();
} catch (PDOException $e) {
 die("<p>申し訳ございません。エラーが発生しました。</p>");
}

//preparedステータスメント(update)でSQLセット
$stmt = $pdo->prepare($DB->update());
//echo $stmt->rowCount();

//bindValueメソッドでパラメータセット
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['comments']);
$stmt->bindValue(5,$_SESSION['id']);

//executeでクエリを続行
$stmt->execute();

//preparedステートメントでSQLをセット（更新された情報をselect文から取得）
$stmt = $pdo->prepare($DB->getUser());


//bindValueメソッドでパラメータセット
$stmt->bindValue(1,$_SESSION['id']);

//executeでクエリを続行
$stmt->execute();

//fetch・whileで取得し、sessionに代入
while($row = $stmt->fetch()) {
 $_SESSION['id'] = $row['id'];
 $_SESSION['name'] = $row['name'];
 $_SESSION['mail'] = $row['mail'];
 $_SESSION['password'] = $row['password'];
 $_SESSION['comments'] = $row['comments'];
 $_SESSION['picture'] = $row['picture'];
}

//マイページへリダイレクト
header("Location:mypage.php");

?>