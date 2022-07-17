<?php

 session_start();

 //ログイン時にアクセスした時は、マイページにリダイレクト
 if(isset($_SESSION['id'])) {
  header("Location:mypage.php");
 }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>会員情報</title>
 <link rel="stylesheet" href="login_error.css">
</head>
<body>

<header>
  <div class="header_wrapper">
   <img src="4eachblog_logo.jpg">
   <div class="header_btn"><a href="login.php">ログイン</a></div>
  </div>
</header>

<main>

 <div class="login">
  <div class="err_msg">メールアドレスまたはパスワードが間違っています。</div>

  <form action="mypage.php" method="post" class="form">

   <div class="login_info">
    <label>メールアドレス</label> 
    <input type="text" name="mail" class="form_box" value="<?php if(!empty($_COOKIE['mail'])) echo $_COOKIE['mail']; ?>">
   </div>

   <div class="login_info">
    <label>パスワード</label> <br>
    <input type="password" name="password" class="form_box" value="<?php if(!empty($_COOKIE['passsword'])) echo $_COOKIE['password']; ?>">
   </div>

   <div class="btn_container">
    <input type="submit" class="btn_mid" value="ログイン">
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

  //パスワードチェック
  function ConfirmPassword(confirm) {
   var input1 = password.value;
   var input2 = confirm.value;
   if(input1 != input2) {
    confirm.setCustomValidity("パスワードが一致しません。");
   } else {
    confirm.setCustomValidity('');
   }
  }

  //フッターを最下部に固定
  var $footer = $('footer');
   if(window.innerHeight > $footer.offset().top + $footer.outerHeight()){
     $footer.attr({'style': 'position:fixed; top:' + (window.innerHeight - $footer.outerHeight()) +'px;'});
   }

</script>


</body>
</html>