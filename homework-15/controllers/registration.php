<?php
session_start();

require_once __DIR__ . '/../functions/functions.php';
require_once __DIR__ . '/../functions/validator.php';

//1. Перевірити метод HTTP
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  setMessages('Method is not allowed', 'warnings');
  header('Location: ../index.php');
}

//2. Валідація даних
$errors = validate($_POST,
  [
    'name' => 'required|min_length[5]|max_length[20]',
    'email' => 'required|min_length[6]|email',
    'password' => 'required|min_length[7]|password',
    'password_confirm' => 'required|password_confirm'
  ]
);

//3. Реєстрація користувача
setcookie('auth', true, time() + (3600 + 24 * 7), '/');


?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Registration</title>
</head>
<body>
<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="mt-5">
      <a href="../closed.php">Link to closed page</a>
    </div>
  </div>
</div>
</body>
</html>