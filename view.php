<?php
#データベースに接続
$dsn = 'mysql:host=localhost; dbname=dev3; charset=utf8';
$user = 'testuser';
$pass = 'testpass';

try{
  $dbh = new PDO($dsn, $user, $pass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if ($dbh == null){
    echo "接続に失敗しました。";
  }else{
    # プレースホルダーの利用
    $SQL = "SELECT * FROM dev3_user";
    # プリペアードステートメント
    $stmt = $dbh->prepare($SQL);

    // 表の内容を入れる変数$contentsを用意
    $contents = "";

    # SQL文の実行
    if($stmt->execute()){
      while($row = $stmt->fetch()){
        // echo "<pre>";
        // var_dump($row);
        // echo "</pre>";

        // 表の内容を代入
        $contents .= "<tr><td>{$row["user_id"]}</td><td>{$row["name"]}</td>";
        $contents .= "<td><form action='delete.php' method='get'><input type='hidden' name='id' value={$row["user_id"]}><input type='submit' value='削除'></form></td>";
        $contents .= "<td><form action='update1.php' method='get'><input type='hidden' name='id' value={$row["user_id"]}><input type='submit' value='更新'></form></td></tr>\n";
      }
    }
    // テーブルのHTMLの末尾部分を出力
    echo "</table>";

  }
}catch (PDOException $e){
  echo('エラー内容：'.$e->getMessage());
  die();
}
$dbh = null;

// テンプレート読み込み
$file = fopen("view_template.html", "r") or die;
$size = filesize("view_template.html");
$html = fread($file, $size);
fclose($file);

// 文字列置き換え
$html = str_replace("★置き換え★", $contents, $html);

// 画面に出力
echo $html;
?>
