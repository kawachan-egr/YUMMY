<?php
$name = $_POST["name"];
$psn = $_POST["psn"];
$date = $_POST["date"];
$time = $_POST["time"];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>確認フォーム</title>
       <link rel="stylesheet" href="common/style.css">
       <script src="common/jquery-3.6.0.js"></script>
       <script src="common/main.js"></script>
</head>
<body>
<header>

<div id="sns">
    <a href=""> <img src="images/btn-instagram.png" alt="INSTAGRAM" width="145"></a>
    <a href=""><img src="images/btn-facebook.png" alt="FACEBOOK" width="145"></a>
</div>         
<div id="logo">
    <img class="logo" src="images/cooltext425024103535974.png" href="./index.html" alt="YUMMY">
</div>
<div id="menu">
    <a class="flat border" href="form/form.html">ご予約</a>
    <button class="header__hamburger hamburger" id="js_ham">
        <span></span>
        <span></span>
        <span></span>
    </button>
</div>
  

</header>

       <h1>確認画面</h1>
       <p>ご入力いただき、ありがとうございます。</p>
       <p>お名前【<span><?php echo $name?></span>】</p>
       <p>ご来店人数【<span><?php echo $psn?></span>名 】</p>
       <p>ご予約日【<span><?php echo $date?></span>】</p>
       <p>ご予約時刻【<span><?php echo $time?></span>】</p>
       <p>こちらの情報でよろしいですか？</p>
       <form action="complete.php" method="post">
              <input type="hidden" name="name" value="<?php echo $name?>">
              <input type="hidden" name="psn" value="<?php echo $psn?>">
              <input type="hidden" name="date" value="<?php echo $date?>">
              <input type="hidden" name="time" value="<?php echo $time?>">
              <input type="submit" value="完了">
       </form>
</body>
</html>