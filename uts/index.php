<?php
session_start();
require('vendor/autoload.php');

use MiladRahimi\PhpCrypt\Symmetric;

$methods = Symmetric::supportedMethods();

if (!isset($_SESSION['username'])) {
  // redirect to login
  header("Location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/f540826c4d.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <style>
    :focus {
      outline: none;
    }
  </style>
  <title>SKD UTS | KELOMPOK 1 TIC</title>
</head>

<body class='bg-gradient-to-r from-cyan-200 to-cyan-400'>
  <!-- navbar -->
  <?php require('components/navbar.php') ?>

  <main class="px-2">
    <div class="
          flex
          flex-col
          justify-center
          items-center
          bg-white
          mx-auto
          max-w-7xl
          rounded-lg
          my-7
          mx-auto
          p-10
        ">
      <h1 class="text-2xl font-medium">Enkripsi dan Dekripsi Sistem Keamanan Data Kelompok 1 TIC</h1>

      <div class='w-1/2 mt-6 flex flex-col items-center'>
        <p class='text-md text-gray-500'>Method Enkripsi/Dekripsi</p>
        <div class='select-wrapper'>
          <select name="method" id="method" class='mt-2 px-3 py-2 bg-gray-200 rounded-lg outline-none focus:border-none'>
            <option class='text-gray-400' selected disabled hidden>
              Silahkan pilih method...
            </option>
            <?php
            foreach ($methods as $method) {
              echo "<option value='$method'>$method</option>";
            }
            ?>
          </select>
        </div>
      </div>
    </div>

    <div class='w-full max-w-7xl mx-auto py-2'>
      <div class='flex justify-center lg:justify-start gap-x-7'>
        <button onclick='changeStyle("encrypt")' id='encryptBtn' class='py-2 text-xl px-8 rounded-md bg-[#002D74]/50 hover:bg-blue-600 text-white font-bold duration-150'>Enkripsi</button>
        <button onclick='changeStyle("decrypt")' id='decryptBtn' class='py-2 text-xl px-8 rounded-md bg-[#002D74]/50 hover:bg-blue-600 text-white font-bold duration-150'>Dekripsi</button>
      </div>
    </div>

    <div id='encrypt' class="app max-w-7xl mx-auto hidden min-h-screen min-v-screen py-3 bg-grey-lightest font-sans">
      <div class="row sm:flex">
        <div class="col sm:w-1/2">
          <div class="box border rounded flex flex-col shadow bg-white">
            <div class="box__title bg-grey-lighter px-3 py-2 border-b">
              <h3 class="text-sm text-grey-darker font-medium">Plaintext</h3>
            </div>
            <textarea id='plaintext' placeholder="Masukkan teks yang ingin anda enkripsi" rows='10' class="text-grey-darkest flex-1 p-2 bg-transparent" name="tt"></textarea>
          </div>
        </div>

        <div class="col mt-8 sm:ml-8 sm:mt-0 sm:w-1/2">
          <div class="box border rounded flex flex-col shadow bg-white">
            <div class="box__title w-full flex justify-between bg-grey-lighter px-3 py-2 border-b">
              <h3 class="text-sm text-grey-darker font-medium">Encrypted</h3><i onclick="copyToClipboard('encrypt')" title='Copy to clipboard' class="fa-regular fa-copy cursor-pointer"></i>
            </div>
            <textarea id='output' class="text-grey-darkest flex-1 p-2 bg-gray-200/70" rows='10' disabled name="tt"></textarea>
          </div>
        </div>

      </div>
    </div>

    <div id='decrypt' class="app max-w-7xl mx-auto hidden min-h-screen min-v-screen py-3 bg-grey-lightest font-sans">
      <div class="row sm:flex">
        <div class="col sm:w-1/2">
          <div class="box border rounded flex flex-col shadow bg-white">
            <div class="box__title bg-grey-lighter px-3 py-2 border-b">
              <h3 class="text-sm text-grey-darker font-medium">Encrypted Text</h3>
            </div>
            <textarea id='plaintextDec' placeholder="Masukkan teks yang ingin anda dekripsi" rows='10' class="text-grey-darkest flex-1 p-2 bg-transparent" name="td"></textarea>
          </div>
        </div>

        <div class="col mt-8 sm:ml-8 sm:mt-0 sm:w-1/2">
          <div class="box border rounded flex flex-col shadow bg-white">
            <div class="box__title bg-grey-lighter px-3 py-2 border-b">
              <h3 class="text-sm text-grey-darker font-medium">Decrypted Text</h3>
            </div>
            <textarea id='outputDec' class="text-grey-darkest flex-1 p-2 bg-gray-200/70" rows='10' disabled name="td"></textarea>
          </div>
        </div>

      </div>
    </div>
  </main>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="script.js"></script>
  <script src="conditionalStyling.js"></script>
</body>

</html>