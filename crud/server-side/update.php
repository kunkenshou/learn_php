<?php
//echo "hogehoge";


$file = 'hoge.txt';

$current = file_get_contents($file);

$current .= "John Smith\n";

file_put_contents($file, $current);
