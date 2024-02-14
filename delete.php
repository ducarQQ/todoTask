<?php
require_once('functions.php');
$id = filter_input(INPUT_GET,'id');
if($id){
  $sql ="DELETE FROM `todo` WHERE id = $id";
  setDB($host,$username,$passwd,$dbname,$sql);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <h1>削除</h1>
</body>
</html>