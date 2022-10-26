<?php
define('FILE_ENCRYPTION_BLOCKS', 10000);
/**
 * @param string $source
 * @param string $key
 * @param string $dest
 * @return string|false
 */
function encryptFile($source, $key, $dest)
{
  $key = substr(sha1($key, true), 0, 16);
  $iv = openssl_random_pseudo_bytes(16);
  $error = false;
  if ($fpOut = fopen($dest, 'w')) {
    fwrite($fpOut, $iv);
    if ($fpIn = fopen($source, 'rb')) {
      while (!feof($fpIn)) {
        $plaintext = fread($fpIn, 16 *
          FILE_ENCRYPTION_BLOCKS);
        $ciphertext = openssl_encrypt($plaintext, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
        $iv = substr($ciphertext, 0, 16);
        fwrite($fpOut, $ciphertext);
      }
      fclose($fpIn);
    } else {
      $error = true;
    }
    fclose($fpOut);
  } else {
    $error = true;
  }
  return $error ? false : $dest;
}

/**
 *
 * @param string $source
 * @param string $key
 * @param string $dest
 * @return string|false*/
function decryptFile($source, $key, $dest)
{
  $key = substr(sha1($key, true), 0, 16);
  $error = false;
  if ($fpOut = fopen($dest, 'w')) {
    if ($fpIn = fopen($source, 'rb')) {
      $iv = fread($fpIn, 16);
      while (!feof($fpIn)) {
        $ciphertext = fread($fpIn, 16 *
          (FILE_ENCRYPTION_BLOCKS + 1));
        $plaintext = openssl_decrypt($ciphertext, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
        $iv = substr($ciphertext, 0, 16);
        fwrite($fpOut, $plaintext);
      }
      fclose($fpIn);
    } else {
      $error = true;
    }
    fclose($fpOut);
  } else {
    $error = true;
  }
  return $error ? false : $dest;
}

$fileName = __DIR__ . '/testfile.txt';
$key = 'kelompok1d3tic';
file_put_contents($fileName, 'Kelompok 1 TIC 2021.');
encryptFile($fileName, $key, $fileName . '.enc');
decryptFile($fileName . '.enc', $key, $fileName . '.dec');
