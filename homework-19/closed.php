<?php

session_start();
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions/functions.php';

if (!checkAuth()) {
  header('Location: ' . SITE_URL);
}

?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Closed content</title>
</head>
<body>

<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="mt-5">
      <h1>Closed content</h1>
    </div>
  </div>
</div>
</body>
</html>