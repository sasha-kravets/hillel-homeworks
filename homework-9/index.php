<?php

$vacancies = [
  0 => ['id' => 1, 'title' => 'PHP Programmer', 'salary' => 2500, 'sector_id' => 1],
  1 => ['id' => 2, 'title' => 'Designer', 'salary' => 3000, 'sector_id' => 1],
  2 => ['id' => 3, 'title' => 'Finance Manager', 'salary' => 3500, 'sector_id' => 2],
  3 => ['id' => 4, 'title' => 'Finance Director', 'salary' => 3500, 'sector_id' => 2],
];

$sectors = [
  0 => ['id' => 1, 'title' => 'IT'],
  1 => ['id' => 2, 'title' => 'Finance']
];

$fullVacancies = [];
foreach ($vacancies as $vacancy) {
  foreach ($sectors as $sector) {
    if ($vacancy['sector_id'] === $sector['id']) {
      $vacancy['sector_title'] = $sector['title'];
      $fullVacancies[] = $vacancy;
      continue 2;
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homework-9</title>
  <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
  <div class="container">
    <table>
      <tr class="title">
<!--        Для створення заголовків перебором-->
<!--        $vacancy з верхнього php-коду (16 рядок)-->
        <?php
//          foreach ( $vacancy as $key => $value ) {
//            echo "<td>$key</td>";
//          }
        ?>
        <td>ID</td>
        <td>Title</td>
        <td>Salary</td>
        <td>Sector ID</td>
        <td>Sector Title</td>
      </tr>
      <?php foreach ( $fullVacancies as $vacancy ): ?>
      <tr>
        <?php
          foreach ( $vacancy as $key => $value ) {
            echo "<td>$value</td>";
          }
        ?>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</body>
</html>