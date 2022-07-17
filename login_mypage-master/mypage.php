<?php

error_reporting(E_ALL);
ini_set('display_errors','On');

require ('DB.php');
mb_internal_encoding("utf8");
session_start();

$DB = new DB();

if(empty($_SESSION['id'])){

  try{
    $pdo = $DB->connect();
   } catch (PDOException $e) {
    die('<p>申し訳ございません。エラーが発生しました。</p>');
  }
   //preparedステータスメントでSQL文の型をつくる
   $stmt = $pdo->prepare($DB->login());

   $stmt->bindValue(1,$_POST['mail']);
   $stmt->bindValue(2,$_POST['password']);

   //executeでクエリを続行
   $stmt->execute();

   //DB切断
   $pdo = NULL;

    //fetch・while文でデータを取得し、sessionを代入
    while($row = $stmt-> fetch()) {
      $_SESSION['id'] = $row['id'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['mail'] = $row['mail'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['picture'] = $row['picture'];
      $_SESSION['comments'] = $row['comments'];
    }
    //var_dump($row);

  //データが取得できずにsessionがなければリダイレクトでエラー画面へ
  if(empty($_SESSION['id'])) {
    header("Location:login_error.php");
  }
 }

 setcookie('mail', $_SESSION['mail'],time()+60*60*24*7, '/');
 setcookie('password', $_SESSION['password'], time()+60*60*24*7, '/');

?>

<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>会員情報</title>
 <link rel="stylesheet" href="css/mypage.css">
</head>
<body>

<header>
  <div class="header_wrapper">
   <img src="4eachblog_logo.jpg">
   <div class="header_btn"><a href="log_out.php">ログアウト</a></div>
  </div>
</header>

<main>

  <div class="mypage">
    <h2>会員情報</h2>
    <p>こんにちは、<?php echo $_SESSION['name']; ?>さん</p>

    <div class="mypage_container">
      <div class="mypage_pic">
        <img src="<?php if(!empty($_SESSION['picture'])) echo $_SESSION['picture']; ?>" class="prev-img">
      </div>
      <div class="mypage_info">
        <p>名前：<?php if(!empty($_SESSION['name'])) echo $_SESSION['name']; ?></p>
        <p>メールアドレス：<?php if(!empty($_SESSION['mail'])) echo $_SESSION['mail']; ?></p>
        <p>パスワード<?php if(!empty($_SESSION['password'])) echo $_SESSION['password']; ?></p>
      </div>
      
    </div>

    <p>コメント：<?php if(!empty($_SESSION['comments'])) echo $_SESSION['comments']; ?></p>
    
    <form action="mypage_hensyu.php" method="post">
      <input type="hidden" name="from_mypage" value="<?php echo rand(1,10); ?>">
      <div class="btn_container">
        <input type="submit" value="編集する" class="btn_mid">
      </div>
    </form>

  </div>

</main>

<footer>
  &copy; 2018 InterNous.inc. All rights reserved
</footer>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">
</script>

<script>

  //フッターを最下部に固定
  var $footer = $('footer');
   if(window.innerHeight > $footer.offset().top + $footer.outerHeight()){
     $footer.attr({'style': 'position:fixed; top:' + (window.innerHeight - $footer.outerHeight()) +'px;'});
   }

</script>


</body>
</html>