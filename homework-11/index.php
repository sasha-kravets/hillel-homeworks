<?php

$colors = ['white', 'green', 'yellow', 'red', 'blue'];

function createList($arr, $type = 'ul'): string {
  return "<$type><li>" . implode('</li><li>', $arr) . "</li></$type>";
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Homework-11</title>
  <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
  <div class="container">
    <?= createList($colors, 'ol') ?>
  </div>
</body>
</html>
