<?php

$formData = $_POST;
$files = $_FILES;
$filePath = './file';

// Вирішив зробити незалежну функцію
// Не важливо чи виникне помилка в $_FILES, інформація з $_POST все одно виведеться на екран
function errorHandler($files): void {
  $errors = [
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
  ];
  foreach ($files as $file) {
    if (!is_array($file['error'])) {
      // Якщо я вірно зрозумів, то таке перетворення не впливає на подальшу роботу з $files
      // Типи елементів в $files після виклику цієї функції залишились такими ж як і до errorHandler()
      $file['name'] = array($file['name']);
      $file['error'] = array($file['error']);
    }
    $length = count($file['error']);
    for ($i = 0; $i < $length; $i++) {
      foreach ($errors as $key => $value) {
        if ($file['error'][$i] === $key) {
          echo  $file['name'][$i] . 'Error: ' . $value . '<br>';
          break;
        }
      }
    }
  }
}

function moveFiles($files, $filePath): void {
  errorHandler($files);
  foreach ($files as $file) {
    if (!is_array($file['name'])) {
      $file['name'] = array($file['name']);
      $file['tmp_name'] = array($file['tmp_name']);
    }
    $length = count($file['name']);
    for ($i = 0; $i < $length; $i++) {
      $fileTmp = $file['tmp_name'][$i];
      $fileName = $file['name'][$i];
      move_uploaded_file($fileTmp, "$filePath/$fileName");
    }
  }
}

// Папка з файлами створюється тільки тоді, коли використовується хоча б одна з форм
// через if ($files) { ... } не працює
if ($files['pictures']['name'][0] || $files['picture']['name']) {
  if (!file_exists($filePath)) {
    mkdir($filePath);
  }
}
moveFiles($files, $filePath);

echo "<pre>";
print_r($formData);
echo "</pre>";