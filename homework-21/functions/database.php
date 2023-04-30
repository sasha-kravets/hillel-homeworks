<?php

require_once __DIR__ . '/../config.php';

/**
 * @param PDO $conncet
 * @return int
 */
function checkUserExist(PDO $connect) : int
{
  $querySelect = "SELECT COUNT(*) FROM `users` WHERE `email` = :email";
  $st = $connect->prepare($querySelect);
  $st->bindParam(':email', $_POST['email']);
  $st->execute();
  return $count = $st->fetchColumn();
}

/**
 * @param PDO $connect
 * @param array $data
 * @return bool
 */
function registrationUser(PDO $connect, array $data)
{
  $queryInsert = "INSERT INTO `users` (`name`, `role_id`, `email`, `password`) VALUES (:name, :role_id, :email, :password)";
  $st = $connect->prepare($queryInsert);
  return $st->execute($data);
}