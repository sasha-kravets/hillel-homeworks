<?php
// ДЗ 5. Вкладені Foreach

$vacancies = [
  0 => ['id' => 1, 'title' => 'PHP Programmer', 'salary' => 2500, 'sector_id' => 1],
  1 => ['id' => 2, 'title' => 'Designer', 'salary' => 3000, 'sector_id' => 1],
  2 => ['id' => 3, 'title' => 'Finance Manager', 'salary' => 3500, 'sector_id' => 2],
  3 => ['id' => 4, 'title' => 'Finance Director', 'salary' => 3500, 'sector_id' => 2]
];

$sectors = [
  0 => ['id' => 1, 'title' => 'IT'],
  1 => ['id' => 2, 'title' => 'Finance']
];

$fullVacancies = [];

foreach ($vacancies as $vacancy) {
  foreach ($sectors as $sector) {
    if (isset($vacancy['sector_id']) && $vacancy['sector_id'] === $sector['id']) {
      $vacancy['sector_name'] = $sector['title'];
      $fullVacancies[] = $vacancy;
      continue 2;
    }
  }
}

echo '<pre>';
print_r($fullVacancies);
echo '<pre>';