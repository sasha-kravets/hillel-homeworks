<?php
session_start();

require_once __DIR__ . '/../functions/functions.php';

//1. Перевірити метод HTTP
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  setMessages('Metgod is not allowed', 'warnings');
  header('Location: ../index.php');
}