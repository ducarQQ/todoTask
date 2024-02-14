<?php
require_once('functions.php');
$method = $_SERVER["REQUEST_METHOD"];
$data = array();

if($method === 'GET'){
  //変更するデータの取得
  $id = filter_input(INPUT_GET, 'id');
  if($id){
    $sql = "SELECT * FROM `todo` WHERE `id` = $id";
    $data = getList($host,$username,$passwd,$dbname,$sql);
  }

}elseif($method === 'POST'){
  //データの更新
  $id = filter_input(INPUT_GET,'id');
  $title = filter_input(INPUT_POST,'title');
  $com = filter_input(INPUT_POST,'comment');
  $task = filter_input(INPUT_POST,'task');
  $date = filter_input(INPUT_POST,'date');
  if($id){
    $sql ="
UPDATE `todo` SET
`title`='$title',
`comment`='$com',
`task`='$task',
`date`='$date' 
WHERE `id` = $id
    ";
    setDB($host,$username,$passwd,$dbname,$sql);
  }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <h1>編集</h1>
  <a href="./top.php">戻る</a>
  <form method="post">
  <?php foreach($data as $val):?>
    タイトル：<input type="text" name="title" value="<?php echo $val['title']?>"><br>
    説明：<textarea name="comment"><?php echo $val['comment']?></textarea><br>
    状態：
     <select name="task">
      <option value="0">未着手</option>
      <option value="1">着手中</option>
      <option value="2">完了</option>
    </select><br>
    完了日時：<input name="date" type="datetime-local" value= "<?php echo date('Y-m-d\Th:i:s',  strtotime($val['date']))?>"><br>
    <button>送信</button>
    <?php endforeach; ?>
  </form>
</body>
</html>