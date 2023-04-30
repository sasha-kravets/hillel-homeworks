<?php

require_once __DIR__ . '/../config.php';

function validate(array $fields, array $rules)
{
  if (!$rules) {
    return false;
  }

  $rulesArray = processingRules($rules);

  foreach ($rulesArray as $fieldName => $arrayRules) {
    foreach ($arrayRules as $rule) {

      // REQUIRED RULE
      if ($rule === 'required') {
        if (!required($fields[$fieldName])) {
          setMessages("Field $fieldName is required!", $fieldName);
          header('Location: ' . SITE_URL . 'registration.php');
        }
      }

      // MIN LENGTH RULE
      if (mb_strpos($rule, 'min_length') !== false) {
        preg_match("/\[(\d+)\]/", $rule, $matches);
        $length = $matches[1];
        if (!minLength($fields[$fieldName], $length)) {
          setMessages("Field $fieldName must have more than $length characters!", $fieldName);
          header('Location: ' . SITE_URL . 'registration.php');
        }
      }

      // MAX LENGTH RULE
      if (mb_strpos($rule, 'max_length') !== false) {
        preg_match("/\[(\d+)\]/", $rule, $matches);
        $length = $matches[1];
        if (!maxLength($fields[$fieldName], $length)) {
          setMessages("Field $fieldName must be less than $length characters!", $fieldName);
          header('Location: ' . SITE_URL . 'registration.php');
        }
      }

      // EMAIL RULE
      if ($rule === 'email') {
        $pattern = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}|\.[a-zA-Z]{2,3}$/";
        if (!preg_match($pattern, $fields[$fieldName])) {
          setMessages("Field $fieldName should be email address", $fieldName);
          header('Location: ' . SITE_URL . 'registration.php');
        }
      }

      // PASSWORD RULE
      if ($rule === 'password') {
        // Містить хоча б одну малу літеру, велику літеру і цифру
        $pattern = "/^(?=.*[a-zа-яіїє])(?=.*[A-ZА-ЯІЇЄ])(?=.*\d).+$/u";
        if (!preg_match($pattern, $fields[$fieldName])) {
          setMessages(
            "The $fieldName must contain at least one lowercase, one uppercase letter, and one digit.",
            $fieldName
          );
          header('Location: ' . SITE_URL . 'registration.php');
        }
      }

      // PASSWORD CONFIRMATION RULE
      if ($rule === 'password_confirm') {
        if ($fields['password'] !== $fields['password_confirm']) {
          setMessages("Passwords must match", $fieldName);
          header('Location: ' . SITE_URL . 'registration.php');
        }
      }
    }
  }
}

/**
 * process array with rules
 * @param array $rules
 * @return array
 */
function processingRules(array $rules): array
{
  $rulesArray = [];
  foreach ($rules as $fieldName => $ruleString) {
    $rulesArray[$fieldName] = explode('|', $ruleString);
  }
  return $rulesArray;
}

/**
 * check if value exists
 * @param string $value
 * @return bool
 */
function required(string $value): bool
{
  if ($value) {
    return true;
  }
  return false;
}

/**
 * check min length
 * @param string $string
 * @param int $length
 * @return bool
 */
function minLength(string $string, int $length): bool
{
  return mb_strlen($string) > $length;
}

/**
 * check max length
 * @param string $string
 * @param int $length
 * @return bool
 */
function maxLength(string $string, int $length): bool
{
  return (mb_strlen($string) < $length);
}