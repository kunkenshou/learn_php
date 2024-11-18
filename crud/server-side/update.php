<?php

do {

//[メニュー]表示
echo("家計簿（仮）\n内容の修正メニュー\n");

echo("新しい行を追加する：1番\n行内容を削除する：2番\n行内容を変更する：3番\nメニューに戻る：4番\n");

$line = readline("メニューの番号を入力して下さい：");
do {
  if  (1 > $line or 4 < $line) {
    $line = readline("もう一度番号を入力して下さい：");
  } if (0 < $line and $line < 5) {
    switch ($line){
    case 1:

    //[追加の処理]
    $day = readline("日付：");
    $paymoney = readline("払ったお金：");
    $item = readline("商品名：");
    //$store_neme = redline("購入店：");
    //$receipt_no = redline("レシート番号：");

    $data = array($day,$paymoney,$item);

    //[書き込むファイル]
    $file = "text.csv";

    //[ファイルを追記モードで開く]
    $fp = fopen($file, 'a+');

    //[値を書き込む]
    $list = ("$day,$paymoney,$item\n");
      
    fwrite($fp,$list);

    fclose($fp);

    $input = file_get_contents($file);

    print_r($input);
    break;

    //[削除の処理]
    case 2:
    $file = "text.csv";

    $input = file_get_contents($file);

    $array = preg_split("[\n]", $input);
    print_r($array);

      $dele_no = readline("削除したい行番号を入力してください");
  
      array_splice($array, $dele_no, (($dele_no)-(count($array)-1)));
  
      $fp = fopen($file, 'w');
  
      for($i = 0; $i < count($array); $i++) {
        $hoge = ("$array[$i]\n");
        fwrite($fp, $hoge);
      }

    fclose($fp);


    break;  
  //[変更の処理]
    case 3:
      echo("変更の処理作成中");
    break;
  //[メニューに戻る]
    case 4:
      echo("メニューに戻る処理作成中");
    break;
    }
  }
} while (1 > $line or 4 < $line);
} while (4 > $line or 4 < $line);
