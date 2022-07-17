<?php

  error_reporting(E_ALL);
  ini_set('display_errors','On');

  mb_internal_encoding("utf8");

  $temp_pic_name = $_FILES['picture']['tmp_name']; 
  $original_pic_name =$_FILES['picture']['name']; 
  $path_filename = './image/'.$original_pic_name;

  move_uploaded_file($temp_pic_name,$path_filename); 
  
?>

<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>会員登録 確認</title>
 <link rel="stylesheet" href="css/register_confirm.css">
</head>
<body>

<header>
  <div class="header_wrapper">
   <img src="4eachblog_logo.jpg">
   <div class="header_btn"><a href="login.php">ログイン</a></div>
  </div>
</header>
 
<main>

  <div class="form">
    <h2>会員登録 確認</h2> 
    <p>こちらの内容で登録しても宜しいでしょうか?</p> 
    
    <div class="form_info">
      氏名：<?php echo $_POST['name'];?> 
    </div>
    <div class="form_info">
      メール：<?php echo $_POST['mail'];?> 
    </div>
    <div class="form_info">
      パスワード：<?php echo $_POST['password'];?> 
    </div>
    <div class="form_info">
      プロフィール写真：<?php echo $original_pic_name;?> 
    </div>
    <div class="form_info">
      コメント：<?php echo $_POST['comments'];?> 
    </div>

    <div class="btn">

      <div class="btn_container">
        <button class="btn_mid btn_re"><a href="register.php">戻って修正する</a></button>
      </div>


      <form action="register_insert.php" method="post" class="btn_container">
        <input type="hidden" value="<?php echo $_POST['name']; ?>" name="name">
        <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
        <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password"> 
        <input type="hidden" value="<?php echo $path_filename; ?>" name="path_filename"> 
        <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="comments"> 
        <input type="submit" class="btn_mid" size="35" value="登録する">
      </form>

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

  //フッターを最下部に固定
  var $footer = $('footer');
   if(window.innerHeight > $footer.offset().top + $footer.outerHeight()){
     $footer.attr({'style': 'position:fixed; top:' + (window.innerHeight - $footer.outerHeight()) +'px;'});
   }

</script>


</body>
</html>