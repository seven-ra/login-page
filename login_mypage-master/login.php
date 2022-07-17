<?php
  error_reporting(E_ALL);
  ini_set('display_errors','On');

  session_start();
  if(isset($_SESSION['id'])) {
    header("Location:mypage.php");
  }

  //var_dump($_SESSION['id']);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>会員登録 確認</title>
 <link rel="stylesheet" href="css/login.css">
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
  
 <h2>ログイン</h2>

 <form action="mypage.php" method="post" class="login_form">

 <div class="login_info">
  <label>メールアドレス</label><br>
  <input type="text" class="form_box" name="mail" value="<?php if(!empty($_COOKIE['mail'])) echo $_COOKIE['mail']; ?>" required>
 </div>

  <div class="login_info">
   <label>パスワード(半角英数字6文字以上)</label><br>
   <input type="password" class="form_box" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" value="<?php if(!empty($_COOKIE['mail'])) echo $_COOKIE['password']; ?>" required>
  </div>

  <div class="btn_container">
   <input type="submit" class="btn_mid" value="ログイン">
</div> 

 </form>

 <div class="form_link">
   <a href="register.php">新規登録はこちら</a>
 </div>

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
