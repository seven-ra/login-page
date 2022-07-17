<?php

//error_reporting(E_ALL);
//ini_set('display_errors','On');

mb_internal_encoding("utf8"); 

session_start();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>会員情報</title>
 <link rel="stylesheet" href="css/mypage_hensyu.css">
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

  <p class="mypage_hello">
   こんにちは！　<?php echo $_SESSION['name']; ?>さん
  </p>

  <form action="mypage_update.php" method="post" enctype="multipart/form-data">

   <div class="mypage_container">

    <div class="mypage_pic">
     <img src="<?php echo $_SESSION['picture']; ?>">
    </div>

    <div class="mypage_info">
     <p>氏名：<input type="text" name="name" value="<?php echo $_SESSION['name']; ?>" class="form_box"></p>
     <p>メール：<input type="text" name="mail" value="<?php echo $_SESSION['mail']; ?>" class="form_box"></p>
     <p>パスワード：<input type="password" name="password" value="<?php echo $_SESSION['password']; ?>" class="form_box">
     </p>
    </div>

   </div>

   <div class="mypage_comments">
    <textarea name="comments" cols="50" rows="10" class="form_box form_text"><?php echo $_SESSION['comments']; ?></textarea>
   </div>

   <div class="btn_container">
    <input type="submit" class="btn_mid" value="この内容に変更する">
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