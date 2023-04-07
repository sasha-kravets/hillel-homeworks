<?php

function setAlerts(): void
{
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['alerts']['method'] = 'Method not allowed!';
    header('Location: ../index.php');
  }
}

function getAlerts(): void
{
  if (isset($_SESSION['alerts'])) {
    print_r($_SESSION['alerts']);
    unset($_SESSION['alerts']);
  }
}

function debug($arr): void
{
  "<pre>";
  print_r($arr);
  "</pre>";
  exit();
}