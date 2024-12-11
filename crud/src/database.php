

<?php
/*
$host = "db";
$username = "book_log";
$password = "pass";
// Create connection
$conn = new mysqli($host, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
*/

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

?>