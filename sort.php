<?php

// 引数の数チェック
if ( $argc != 3) {
  echo "\n-----エラー-----\n";
  echo "引数を2つ指定してください。\n";
  echo "第1引数はソート対象の値\n";
  echo "第2引数は'quickSort'もしくは'bubbleSort'\n";
  echo "例  php sort.php 4,1,2,3 quickSort\n";
  exit(0);
}

// 引数受け取り
$input_number_group = (string)$argv[1];
$sort_mode = (string)$argv[2];
// 第1引数をカンマ区切りで配列に格納
$input_numbers = explode(",", $input_number_group);
var_dump($input_numbers[0]);
var_dump($sort_mode);

// モード選択
if ($sort_mode === "quickSort") {
  quickSortMode($input_numbers);
} else if ($sort_mode === "bubbleSort") {
  bubbleSortMode($input_numbers);
} else {
  echo "\n-----エラー-----\n";
  echo "第2引数は'quickSort'もしくは'bubbleSort'を入力してください。\n";
  echo "綴りに間違いながないかもう一度ご確認ください。\n";
  echo "例  php sort.php 4,1,2,3 quickSort\n";
  exit(0);
}

/*
クイックソート
(PHPのsort関数は内部的にはQuicksortなので楽)
*/
function quickSortMode() {
  echo "quickSortMode";
}

/*
バブルソート
*/
function bubbleSortMode() {
  echo "bubbleSortMode";
}
