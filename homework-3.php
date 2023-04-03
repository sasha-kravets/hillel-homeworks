<?php
// ДЗ 3. Розгалуження

if (isset($color)) {
  echo $color;
} else {
  echo 'NULL';
}

echo "<br><br>";

$color = 'green';
echo isset($color) ? $color : 'NULL';