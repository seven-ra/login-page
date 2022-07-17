<?php



require ('DB.php');

mb_internal_encoding("utf8");

session_start();

$DB = new DB();

//データベース接続エラー
try{
 $pdo = $DB->connect();
} catch (PDOException $e) {
 die("<p>申し訳ございません。エラーが発生しました。</p>");
}

//SQLアプデ
$stmt = $pdo->prepare($DB->update());


//bindvalue
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['comments']);
$stmt->bindValue(5,$_SESSION['id']);

//executeでクエリを続行
$stmt->execute();

//preparedステートメントでSQLをセット（更新された情報をselect文から取得）
$stmt = $pdo->prepare($DB->getUser());


//bindvalue
$stmt->bindValue(1,$_SESSION['id']);

//クエリ
$stmt->execute();

//代入
while($row = $stmt->fetch()) {
 $_SESSION['id'] = $row['id'];
 $_SESSION['name'] = $row['name'];
 $_SESSION['mail'] = $row['mail'];
 $_SESSION['password'] = $row['password'];
 $_SESSION['comments'] = $row['comments'];
 $_SESSION['picture'] = $row['picture'];
}

//マイページ
header("Location:mypage.php");

?>