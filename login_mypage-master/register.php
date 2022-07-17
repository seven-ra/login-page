<?php

error_reporting(E_ALL);
ini_set('display_errors','On');

?>

<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>会員登録</title>
 <link rel="stylesheet" href="css/register.css">
</head>
<body>

<header>
  <div class="header_wrapper">
   <img src="4eachblog_logo.jpg">
   <div class="header_btn"><a href="login.php">ログイン</a></div>
  </div>
</header>
 
 <main>
  <form action="register_confirm.php" method="post" enctype="multipart/form-data" class="form">

   <div class="form_contents">

    <h2>会社登録</h2>
    
    <div class="name">
     <span class="form_label">必須</span><label>氏名</label><br>
     <input type="text" class="form_area form_box" size="40" name="name" required>
    </div>

    <div class="mail">
     <span class="form_label">必須</span><label>メールアドレス</label><br>
     <input type="text" class="form_area form_box" size="40" name="mail" pattern="^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required>
    </div>

    <div class="password">
     <span class="form_label">必須</span><label>パスワード(半角英数字6文字以上)</label><br>
     <input type="password" class="form_area form_box" size="40" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" required>
    </div>

    <div class="password">
     <span class="form_label">必須</span><label>パスワード確認</label><br>
     <input type="password" class="form_area form_box" size="40" name="re_pass" id="re_pass" oninput="ConfirmPassword(this)" required>
    </div>

    <div class="picture">
     <span class="form_label">必須</span><label>プロフィール写真</label><br>
     <input type="hidden" name="max_file_size" value="1000000">
     <input type="file" name="picture" size="40" class="form_area form_pic">
    </div>

    <div class="comments">
     <label>コメント</label><br>
     <textarea name="comments" cols="45" rows="5" class="form_area form_text"></textarea>
    </div>

    <div class="btn_container">
     <input type="submit" class="btn_mid" size=35 value="登録する">
   </div>

  </form>
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