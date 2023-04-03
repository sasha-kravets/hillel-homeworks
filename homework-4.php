<?php
// ДЗ 4. Розгалуження 2

$lang = 'en';
//$lang = 'ua';

if ($lang === 'en') {
  echo 'Sasha Kravets';
} elseif ($lang === 'ua') {
  echo 'Саша Кравець';
}

echo "<br><br>";

$var = -2;

echo ($var > 0 && $var < 6) ? 'true' : 'false';