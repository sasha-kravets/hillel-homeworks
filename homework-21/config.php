<?php

define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'homework-20');
define('SITE_URL', 'http://hillel-homeworks/homework-21/');

try {
  $connect = new PDO('mysql:host=127.0.0.1;dbname=' . DB_NAME . ';charset=utf8mb4',
    DB_USER, DB_PASSWORD, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $exception) {
  echo $exception->getMessage();
}