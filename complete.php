<?php
$name = $_POST["name"];
$psn = $_POST["psn"];
$date = $_POST["date"];
$time = $_POST["time"];


# データベースに接続
$dsn = 'mysql:host=localhost; dbname=dev; charset=utf8';
$user = 'testuser';
$pass = 'testpass';

try{
  $dbh = new PDO($dsn, $user, $pass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if ($dbh == null){
    echo "接続に失敗しました。";
  }else{
    #INSERT文の定義
    $sql = "INSERT INTO dev_user (name,psn,date,time) VALUES ($name,$psn,$date,$time)";
    # プリペアードステートメント
    $stmt = $dbh->prepare($sql);

  }
    #INSERTの実行
    $stmt->execute($params);
}catch (PDOException $e){
  echo('エラー内容：'.$e->getMessage());
  die();
}
$dbh = null;

?>

<!DOCTYPE html>
<html lang="ja">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>完了ページ</title>
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
<main>
       <h1>完了ページ</h1>
       <p>予約完了しました</p>
       <p>お名前【<span><?php echo $name?></span>】</p>
       <p>ご来店人数【<span><?php echo $psn?></span>】</p>
       <p> ご予約日【<span><?php echo $date?></span>】</p>
       <p>ご予約時刻【<span><?php echo $time?></span>】</p>
</main>
</body>
</html>
