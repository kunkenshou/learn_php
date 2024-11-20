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
    $store_neme = readline("購入店：");
    $receipt_no = readline("レシート番号：");

    $data = array($day,$paymoney,$item,$store_neme,$receipt_no);

    //[書き込むファイル]
    $file = "text.csv";

    //[ファイルを追記モードで開く]
    $fp = fopen($file, 'a+');

    //[値を書き込む]
    $list = ("$day,$paymoney,$item,$store_neme,$receipt_no\n");
      
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
    
    for ($i = 0; $i < count($array); $i++) {
      print_r("[$i]$array[$i]\n");
    }

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
      echo("変更の処理作成中\n");

      $fp = "text.csv";

      $data = file_get_contents($fp);

      $array = preg_split("[\n]",$data);

      //print_r($array);

      for ($i = 0; $i < count($array); $i++) {
        print_r("[$i]$array[$i]\n");
      }

      $is_number = readline("変更する行番号を入力してください：");
      $is_day = readline("変更する日付を入力してください：");
      $is_paymoney = readline("変更する金額を入力してください：");
      $is_itemname = readline("変更する商品名：");
      $is_storename = readline("変更する個入店：");
      $is_receiptno = readline("変更するレシート番号：");
      $is_value = ("$is_day,$is_paymoney,$is_itemname,$is_storename,$is_receiptno\n");
      $replacements = array($is_number => $is_value);
      $arraynew = array_replace($array, $replacements);

      print_r($arraynew);

      $fp = fopen($fp,"w");
      
      for ($i = 0; $i < count($arraynew); $i++) {
          $hoge = ($arraynew[$i]);
          fwrite($fp,$hoge);
        }

    fclose($fp);

    break;
  //[メニューに戻る]
    case 4:
      echo("メニューに戻る処理作成中\n");
    break;
    }
  }
} while (1 > $line or 4 < $line);
} while (4 > $line or 4 < $line);