<?php
  require('vendor/autoload.php');

  use MiladRahimi\PhpCrypt\Exceptions\MethodNotSupportedException;
  use MiladRahimi\PhpCrypt\Symmetric;

  // get POST JSON data
  $data = json_decode(file_get_contents('php://input'), true);

  $plaintext = $data["text"];
  $method = $data["method"];

  try {
    $key = '12345678901234561234567890123456';
    $symmetric = new Symmetric($key);
    $symmetric->setMethod($method);

    $encryptedData = $symmetric->encrypt($plaintext);
    
    // return JSON data
    echo json_encode(array(
      "status" => "success",
      "cipherText" => $encryptedData
    ));

  } catch (MethodNotSupportedException $e) {
    // The method is not supported.
    echo json_encode(array(
      "status" => "error",
      "message" => $e->getMessage()
    ));
  }
?>