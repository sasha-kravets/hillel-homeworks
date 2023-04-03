<?php
// ДЗ 6. Цикли

$numbers = [];
while (count($numbers) !== 30) {
  $numbers[] = rand(0, 50);
}

$sum = 0;
$prod = 1;
$total = 0;
$intDiv = [];

foreach ($numbers as $number) {
  $sum += $number;
  $prod *= $number;
  if ($number === 5) {
    $total++;
  }
  if ($number % 3 === 0) {
    $intDiv[] = $number;
  }
}

$min = null;
$max = null;

for ($i = 0; $i < count($numbers); $i++) {
  $min = $numbers[$i];
  $max = $numbers[$i];
  foreach ($numbers as $number) {
    if ($max < $number) {
      $max = $number;
    }
    if ($min > $number) {
      $min = $number;
    }
  }
}

echo '<pre>';
print_r($numbers);
echo '</pre>';
echo "sum = $sum <br>";
echo "prod = $prod <br>";
echo "total 5 = $total <br>";
echo '<pre>';
print_r($intDiv);
echo '</pre>';
echo "min = $min, max = $max";