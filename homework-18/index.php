<?php

/**
 * $connect variable
 */
include __DIR__ . '/database.php';

$users = [
  ['name' => 'Mike', 'gender' => 'male', 'email' => 'mike@email.com', 'password' => '12qwaszx'],
  ['name' => 'Olga', 'gender' => 'female', 'email' => 'olga@email.com', 'password' => '23qwaszx'],
  ['name' => 'Terry', 'gender' => 'male', 'email' => 'terry@email.com', 'password' => '23wesdxc'],
  ['name' => 'Anna', 'gender' => 'female', 'email' => 'anna@email.com', 'password' => '12345a'],
  ['name' => 'Victor', 'gender' => 'male', 'email' => 'victor@email.com', 'password' => '98765f'],
];

$sql = "INSERT INTO `users` (`name`, `gender`, `email`, `password`) VALUES ";

foreach ($users as $user) {
  $sql .= "('" . $user['name'] . "', '" . $user['gender'] . "', '" . $user['email'] . "', '" . $user['password'] . "'),";
}

$sql = rtrim($sql, ',');

$st = $connect->prepare($sql);
$st->execute();