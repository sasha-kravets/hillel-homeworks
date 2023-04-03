<?php
// ДЗ 7. Цикл While.

// Виведіть на екран всі числа від 1 до 10 використовуючи цикл while
$numbers = [];
$i = 1;
while ($i <= 10) {
  $numbers[] = $i++;
}
echo '<pre>';
print_r($numbers);
echo '</pre>';

// Обчисліть факторіал числа 5 використовуючи цикл while.
$n = 5;
$res = 1;
while ($n !== 1) {
  $res *= $n--;
}
echo $res;

// Виведіть на екран всі парні числа від 1 до 20 використовуючи цикл while.
$evenNums = [];
$j = 1;
while ($j <= 20) {
  if ($j % 2 === 0) {
    $evenNums[] = $j;
  }
  $j++;
}
echo '<pre>';
print_r($evenNums);
echo '</pre>';