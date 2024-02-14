<?php
require_once('functions.php');
$method = $_SERVER["REQUEST_METHOD"];
if($method === 'POST'){
  $title = filter_input(INPUT_POST,'title');
  $com = filter_input(INPUT_POST,'comment');
  $task = filter_input(INPUT_POST,'task');
  $date = date("Y-m-d H:i:s");//現在時間
  
  if($title && $com && $task && $date){
  $sql ="
INSERT 
INTO `todo` (`title`, `comment`,`task`, `date`) 
VALUES ('$title','$com','$task','$date')
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
  <h1>新規追加</h1>
  <a href="./top.php">戻る</a>
  <form method="post">
    タイトル：<input type="text" name="title" value=""><br>
    説明：<textarea name="comment"></textarea><br>
    状態：
     <select name="task">
      <option value="0" >未着手</option>
      <option value="1" >着手中</option>
      <option value="2" >完了</option>
    </select><br>
    完了日時：<input name="date" type="datetime-local" value=""><br>
    <button type="submit">送信</button>
  </form>
</body>
</html>