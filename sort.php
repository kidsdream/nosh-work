<?php

// 引数の数チェック
// if条件内、3としているのは1つ目にファイル名、2つ目に第1引数、3つ目に第2引数が入るため
if ( $argc != 3) {
  echo "\n-----エラー-----\n";
  echo "引数を2つ指定してください。\n";
  echo "第1引数はソート対象の値\n";
  echo "第2引数は'quickSort'もしくは'bubbleSort'\n";
  echo "入力例  php sort.php 4,1,2,3 quickSort\n";
  exit(0);
}

// 第1引数・第2引数、どちらも文字列型で受け取る
$input_number_group = (string)$argv[1];
$sort_mode = (string)$argv[2];

// 全角数字が入力された場合は半角数字に変換します。
// mb_convert_kanaはmbstringのモジュールを使用しています。
$input_number_group = mb_convert_kana($input_number_group, "n");
// 第1引数をカンマ区切りで配列に格納
$input_numbers = preg_split('/(,|、|，)/', $input_number_group);

// モード選択(quickSort もしくは bubbleSort)
if ($sort_mode === "quickSort") {
  $input_numbers_count = count($input_numbers);
  $count_try_change = 0;
  list($count_try_change, $input_numbers) = quickSort($input_numbers, 0, $input_numbers_count-1, $count_try_change);
} else if ($sort_mode === "bubbleSort") {
  list($count_try_change, $input_numbers) = bubbleSort($input_numbers);
} else {
  echo "\n-----エラー-----\n";
  echo "第2引数は'quickSort'もしくは'bubbleSort'を入力してください。\n";
  echo "綴りに間違いながないかもう一度ご確認ください。\n";
  echo "入力例  php sort.php 4,1,2,3 quickSort\n";
  exit(0);
}

// 結果の出力
print("試行回数は${count_try_change}回です\n");
print_r($input_numbers);
exit(0);



/*
クイックソート
戻り値は試行回数(int)と結果(array)
(PHPのsort関数は内部的にはQuicksortなので楽に実装できる)
*/
function quickSort(&$input_numbers, $first, $last, &$count_try_change) {
  $first_pointer = $first;
  $last_pointer  = $last;
  // ピボットを決める。配列の中央値を使用
  $pivot  = $input_numbers[intVal(($first_pointer + $last_pointer) / 2)];

  // 並び替えができなくなるまで繰り返し
  do {
    // ピボットよりも左側で値が小さい場合はポインターは正の方向へ進める
    while ($input_numbers[$first_pointer] < $pivot) {
      $first_pointer++;
    }
    // ピボットよりも右側で値が大きい場合はポインターを負の方向へ進める
    while ($input_numbers[$last_pointer] > $pivot) {
      $last_pointer--;
    }
    $count_try_change++;
    // 要素を交換する
    if ($first_pointer <= $last_pointer) {

      $tmp = $input_numbers[$last_pointer];
      $input_numbers[$last_pointer]  = $input_numbers[$first_pointer];
      $input_numbers[$first_pointer] = $tmp;
      // ポインターをそれぞれ進める
      $first_pointer++;
      $last_pointer--;
    }
  } while ($first_pointer <= $last_pointer);

  // 左側が比較可能の時、再帰的に関数を呼び出す
  if ($first < $last_pointer) {
    quickSort($input_numbers, $first, $last_pointer, $count_try_change);
  }
  // 右側が比較可能の時、再帰的に関数を呼び出す
  if ($first_pointer < $last) {
    quickSort($input_numbers, $first_pointer, $last, $count_try_change);
  }

  return [$count_try_change, $input_numbers];
}



/*
バブルソート
戻り値は試行回数(int)と結果(array)
*/
function bubbleSort($input_numbers) {
  $count_try_change = 0;
  // 要素の数だけ繰り返し
  for($i = 0; $i < count($input_numbers); $i++) {
    // 要素の数-1回の繰り返し
    for($v = 1; $v < count($input_numbers); $v++) {
      $count_try_change++;
      // 隣同士の比較。もし左の要素が大きい場合に入れ替え処理の実行
      if($input_numbers[$v-1] > $input_numbers[$v]) {
        $tmp = $input_numbers[$v];
        $input_numbers[$v] = $input_numbers[$v-1];
        $input_numbers[$v-1] = $tmp;
      }
    }
  }
  return [$count_try_change, $input_numbers];
}
