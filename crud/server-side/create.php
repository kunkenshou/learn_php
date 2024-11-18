<?php
$file = "temp.csv";
$line = readline("作成するファイル名を入力してください: ");

$Is_boolan = file_exists($line);

if ($Is_boolan == true) {
print_r("ファイルが存在します");

$Is_overwrite = readline("上書きしますか？：y/n");
readline_add_history($Is_overwrite);

switch ($Is_overwrite) {
  case "y":

    copy($file,$line);

    $handle = fopen("$line", "w");

    $Is_contents = readline("Cloud You Text Writing:");

    fwrite($handle, $Is_contents);

    fclose($handle);

  break;
  case "n":

    print_r("ファイル名を入力し直してください");

  break;
  default:

    print_r("yかnで入力してください。");
  
  }

} else {
readline_add_history($line);

  print_r($line);

  copy($file,$line);

  $handle = fopen("$line", "w");

  $Is_contents = readline("Cloud You Text Writing:");

  fwrite($handle, $Is_contents);

  fclose($handle);
  
}

?>
