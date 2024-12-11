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

$query = "SELECT * FROM test";

$result = $conn->query($query);

/* オブジェクトの配列を取得します */
while ($row = $result->fetch_row()) {
  printf("%s (%s)\n", $row[0], $row[1]);
}