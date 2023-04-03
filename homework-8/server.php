<?php

$formData = $_POST;
$filePath = './file';

function moveFiles($files): void {
  foreach ($files as $file) {
    $fileName = $file['name'];
    $tmpName = $file['tmp_name'];
    global $filePath;
    move_uploaded_file($tmpName, "$filePath/$fileName");
  }
}

if (!file_exists($filePath)) {
  mkdir($filePath);
}
moveFiles($_FILES);

echo "<pre>";
print_r($formData);
echo "</pre>";