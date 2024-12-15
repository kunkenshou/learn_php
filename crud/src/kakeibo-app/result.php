<!DOCTYPE html>
<html lang="ja">
<link rel="stylesheet" href="css/styles.css">
<head>
<meta charset="utf-8">
</head>
  <body>
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
  echo "Connected successfully<br/>";

  $result = $conn->query("SELECT * FROM kakeibo;");

  while ($row = $result->fetch_row()) {

    printf("<table><tr><td>(%s)</td><td>(%s)</td><td>(%s)</td><td>(%s)</td><td>(%s)</td><td>(%s)</td></tr></table>", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
  }
  ?>
</body>

</html>