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
$keys = array_keys($fullVacancies[0]);
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
        <?php foreach ( $keys as $key ) { ?>
          <td><?= $key ?></td>
        <?php } ?>
      </tr>
      <?php foreach ( $fullVacancies as $vacancy ) { ?>
      <tr>
        <td><?= $vacancy['id'] ?></td>
        <td><?= $vacancy['title'] ?></td>
        <td><?= $vacancy['salary'] ?></td>
        <td><?= $vacancy['sector_id'] ?></td>
        <td><?= $vacancy['sector_title'] ?></td>
      </tr>
      <?php } ?>
    </table>
  </div>
</body>
</html>