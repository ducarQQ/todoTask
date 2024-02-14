<?php
require_once('functions.php');
$data = array();
$sql = "SELECT * FROM `todo`";
$id = filter_input(INPUT_GET,'id');
//データの取得
$data = getList($host,$username,$passwd,$dbname,$sql);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <h1>TODO タスク</h1>
  <a href="create.php">新規追加</a>
  <table border="1">
    <tr>
      <td>タイトル</td>
      <td>状態</td>
      <td>終了時間</td>
      <td>-</td>
    </tr>
    <?php foreach($data as $val): ?>
  
    <tr>
      <td><?php echo $val['title']?></td>
      <td><?php if( $val['task'] == 0){
          echo "未着手";
      }elseif( $val['task'] == 1){
          echo "着手中";
      }elseif( $val['task'] == 2){
          echo "完了";
      }
          ?></td>
      <td><?php echo $val['date']?></td>
      <td>
        <a href="detail.php?id=<?php echo $val['id'] ?>">詳細</a>
        <a href="update.php?id=<?php echo $val['id'] ?>">編集</a>
        <a href="delete.php?id=<?php echo $val['id'] ?>">削除</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>