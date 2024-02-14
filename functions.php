<?php
// データベースへの接続に必要な変数を指定
$host = 'localhost';
$username = 'root';
$passwd = '';
$dbname = 'php_todo';
//一覧情報の取得
function getList($host,$username,$passwd,$dbname,$sql){
  // データベースへ接続
  $db = mysqli_connect($host,$username,$passwd,$dbname);
  if(!$db){
    echo "DBの接続に失敗しました。";
  }
  //文字コード設定
  mysqli_set_charset($db, "utf8");
  //クエリの送信
  $query = $sql;
  $result = mysqli_query($db , $query);

  $data = array();
  if($result){
    //echo 'クエリ成功しました。';
    while ($row = mysqli_fetch_array($result)) {
        $data[] = $row;
    }
  }else{
    echo '失敗しました。';
  }
  
  //DB を 切断
  if( !mysqli_close($db) ){
    echo "切断に失敗";
  }
  // 取得したデータを 戻り値として渡す
  return $data;
};

//INSERT UPDATE DELETE 用
function setDB($host,$username,$passwd,$dbname,$sql){
  // データベースへ接続
  $db = mysqli_connect($host,$username,$passwd,$dbname);
  if(!$db){
    echo "DBの接続に失敗しました。";
  }
  //文字コード設定
  mysqli_set_charset($db, "utf8");

  //クエリの送信
  $query = $sql;
  $result = mysqli_query($db , $query);

  $data = array();
  if($result){
    //echo 'クエリ成功しました。';
  }else{
    echo '失敗しました。';
  }
  
  //DB を 切断
  if( !mysqli_close($db) ){
    echo "切断に失敗";
  }else{
      header('Location: top.php');
      exit;
  }
}