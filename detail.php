<?php
require_once('functions.php');
$id = filter_input(INPUT_GET,'id');
$sql = "SELECT * FROM `todo` WHERE id = $id";
$data = getList($host,$username,$passwd,$dbname,$sql);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <h1>詳細ページ</h1>
  <p><a href="./top.php">一覧に戻る</a></p>
<?php foreach($data as $val): ?>
  <p>ID:<?php echo $val['id'] ?></p>
  <p>タイトル：<?php echo $val['title'] ?></p>
  <p>説明：<?php echo $val['comment'] ?></p>
  <p>状態：<?php if( $val['task'] == 0){
              echo "未着手";
          }elseif( $val['task'] == 1){
              echo "着手中";
          }elseif( $val['task'] == 2){
              echo "完了";
          }
          ?></p>
  <p>完了予定時間：<?php echo $val['date'] ?></p>
<?php endforeach; ?>
</body>
</html>