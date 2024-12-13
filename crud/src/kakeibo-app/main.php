<?php

$host = "db";
$username = "book_log";
$password = "pass";
$database = "book_log";

$conn = new mysqli($host, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$conn->query("DROP TABLE IF EXISTS kakeibo");
$conn->query("CREATE TABLE kakeibo(id INT, purchase TEXT, receipt TEXT, store TEXT, items TEXT, buy TEXT)");

$stmt = $conn->prepare("INSERT INTO kakeibo(id, purchase, receipt, store, items, buy) VALUES (?, ?, ?, ?, ?, ?)");
$id = 1;
$purchase = $_POST['day'];
$receipt = $_POST['receipt'];
$store = $_POST['store'];
$items = $_POST['items'];
$buy = $_POST['money'];

$stmt->bind_param("isssss", $id, $purchase, $receipt, $store, $items, $buy); 
$stmt->execute();
$conn->query("exit");

?>