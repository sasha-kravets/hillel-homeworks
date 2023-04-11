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