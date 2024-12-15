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

$result = $conn->query("SELECT * FROM kakeibo;");

while ($row = $result->fetch_row()) {

  printf("\n (%s)\n (%s)\n (%s)\n (%s)\n (%s)\n (%s)\n", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
}