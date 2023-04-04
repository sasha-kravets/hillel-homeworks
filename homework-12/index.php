<?php

// 1.
$isOdd = fn (int|float $n) : bool => $n % 2 === 0;

function arrFilter(array $arr, callable $isOdd ) : array
{
  $filteredArr = [];
  foreach ($arr as $num) {
    if ($isOdd($num)) {
      $filteredArr[] = $num;
    }
  }
  return $filteredArr;
}

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];
echo '<pre>';
print_r(arrFilter($numbers, $isOdd));
echo '</pre>';

// 2. ===================================================================

$subtract = fn (int|float $a, int|float $b) : int|float => $a - $b;
echo $subtract(5, 2);

// 3. ==================================================================

$getSum = function(array $arr) : int|float {
  $sum = 0;
  foreach ($arr as $num) {
    if ($num > 10) {
      $sum += $num;
    }
  }
  return $sum;
};

echo '<br>' . $getSum($numbers). '<br>';

// 4. ==================================================================

$names = ['kendrick', 'malcom', 'tyler', 'frank'];
$firstLetter = fn (string $string) : string => ucfirst($string);
$newNames = array_map($firstLetter, $names);
echo '<pre>';
print_r($newNames);
echo '</pre>';

// 5. ==================================================================

$numbers = [2, 4, 6, 8, 9];
function multiply(array &$numbers, int|float $n) : void
{
  foreach ($numbers as &$number) {
    $number *= $n;
  }
}
multiply($numbers, 3);
echo '<pre>';
print_r($numbers);
echo '</pre>';

// 6. ==================================================================
$words = ['Japan', 'Canada', 'USA', 'Ukraine', 'Spain'];
function lessThanNumber(array &$words, int $maxLength) : array
{
  $res = [];
  foreach ($words as $word) {
    if (strlen($word) < $maxLength) {
      $res[] = $word;
    }
  }
  $words = $res;
  return $res;
}

lessThanNumber($words, 6);
echo '<pre>';
print_r($words);
echo '</pre>';