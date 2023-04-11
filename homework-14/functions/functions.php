<?php

/**
 * Set my messages into SESSIONS
 * @param string|array $message
 * @param string $type
 * @return void
 */
function setMessages(string|array $message, string $type = 'alerts'): void
{
  $_SESSION[$type][] = $message;
}

/**
 * Get my messages from SESSIONS
 * @param string $type
 * @return array
 */
function getMessages(string $type): array
{
  $messages = $_SESSION[$type] ?? [];
  unset($_SESSION[$type]);
  return $messages;
}

/**
 * check if session for this type exists
 * @param string $type
 * @return bool
 */
function existsMessages(string $type): bool
{
  return isset($_SESSION[$type]);
}

/**
 * Just for debug arrays
 * @param $arr
 * @return void
 */
function debug($arr): void
{
  echo "<pre>";
  print_r($arr);
  echo "</pre>";
//  exit();
}

/**
 * Display messages in index.html
 * @param string $msg
 * @return void
 */
function displayMessages(string $msg) : void
{
  if (existsMessages($msg)) {
    echo '<div class="alert alert-danger" role="alert">';
    foreach (getMessages($msg) as $warning) {
      echo "$warning<br>";
    }
    echo '</div>';
  }
}
