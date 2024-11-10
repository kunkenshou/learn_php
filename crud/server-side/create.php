<?php
$islooped = "write";
$file = "hoge.txt";
$newfile = "hoge2.txt";
$line = readline("Commad: ");

readline_add_history($line);

if ($line == 0) {
  print_r($line);
  copy($file,$newfile);

  $Is_contents = readline("Cloud You Text Writing:");

  $handle = fopen("hoge2.txt", "w");

  fwrite($handle, $Is_contents);

  fclose($handle);
}





//ヒストリをダンプ
//print_r(readline_list_history());

//変数をダンプ
//print_r(readline_info());

/*
$file = 'hoge.txt';

$current = file_get_contents($file);

$current .= "John Smith\n";

file_put_contents($file, $current);
*/
?>
