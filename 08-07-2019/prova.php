
<?php

define('PSW', 'password');

include_once("aesCrypt.php");
include_once("aesDecrypt.php");

$fileName = __DIR__.'/index.php';
$key = 'password';

$file = fopen($fileName, 'r');
$read = fread($file, filesize($fileName));

$fileW = fopen($fileName, 'w');
$write = fwrite($fileW, $read);

file_put_contents($fileName, $read);
fclose($file);

encryptFile($fileName, $key, $fileName . '.enc');

$key = " ";

$key === PSW or die("La Chiave Del File Non E' Corretta!\n");
   decryptFile($fileName . '.enc', $key, $fileName . '.dec');

?>
