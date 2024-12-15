<?php

//MySQLサーバーに接続するための変数
$host = "db";
$username = "book_log";
$password = "pass";
$database = "book_log";

//MySQLサーバーに接続する
$conn = new mysqli($host, $username, $password, $database);
// Check connection
//接続に失敗した時の処理
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//接続に成功した時の処理
echo "Connected successfully";

/*
//サーバーに同じテーブルが有ったら削除する
$conn->query("DROP TABLE IF EXISTS kakeibo");
//新しいテーブルを作成する
$conn->query("CREATE TABLE kakeibo(id INT, purchase TEXT, receipt TEXT, store TEXT, items TEXT, buy TEXT)");
*/
//プリペアードステートメントで使用するパラメータを作成
$stmt = $conn->prepare("INSERT INTO kakeibo(id, purchase, receipt, store, items, buy) VALUES (?, ?, ?, ?, ?, ?)");

//フロントエンドから受け取った値を変数に代入
$id = 1;
$purchase = $_POST['day'];
$receipt = $_POST['receipt'];
$store = $_POST['store'];
$items = $_POST['items'];
$buy = $_POST['money'];

//プリペアのパラメータに変数を代入
$stmt->bind_param("isssss", $id, $purchase, $receipt, $store, $items, $buy);

//プリペアのパラメータをデーターベースに値を代入
$stmt->execute();

//データベースとの接続を切断する
$conn->query("exit");

?>