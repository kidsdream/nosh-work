# sort.php
クイックソートとバブルソートの課題

>問 以下の開発要件で実装してください。（言語不問）  
>・第一引数に数値(文字列)（例：'3,1,2,4'）  
>　第二引数にソートアルゴリズム(文字列)（例：'quickSort', 'bubbleSort'）  
>　 結果として、試行回数(int)と結果(array)を出力する。  
>　例: PHPで実行した場合  
>　php sort.php '4,1,2,3' 'quickSort'  

## Description
<font color="DeepPink">
  mbstringというモジュールを使用しているため、  
  php.iniでmbstringモジュールを有効化してください。  
  (XAMPPなどを使用している場合はデフォルトで有効化されている可能性もあります。)  
</font>

php sort.php 4,1,2,3 quickSort  
を入力した場合、  
試行回数と結果が返却されます。  
