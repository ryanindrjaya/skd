<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

  <body class="bg-gray-50">
    <!-- Container -->
    <div class="container  mx-auto">
      <div class="flex justify-center items-center h-auto py-10 px-6">
        <!-- Row -->
        <div class="w-full xl:w-3/4 lg:w-11/12 flex justify-center">
          <!-- Col -->
          <div class="w-full lg:w-7/12 bg-gray-100 p-5 rounded-2xl shadow-lg">
            <h3 class="pt-4 text-2xl font-bold text-[#002D74] text-center">Buat Akun anda!</h3>
            <form method="POST" action='./handler/register_handler.php' class="px-8 pt-6 pb-8 mb-4 bg-gray-100 rounded">
              <div class="mb-4 px-3">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                  Nama Lengkap
                </label>
                <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="email" name="name" type="text" placeholder="Nama Lengkap" />
              </div>
              <div class="mb-4 px-3">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                  Username
                </label>
                <input onkeypress="return event.charCode != 32" class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="email" name="username" type="text" placeholder="Username" />
              </div>
              <div class="mb-4 px-3">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                  Email
                </label>
                <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Email" />
              </div>
              <div class="mb-4 px-3">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                  Alamat
                </label>
                <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="email" name="alamat" type="text" placeholder="Alamat" />
              </div>
              <div class="mb-4 flex flex-wrap md:mb-0">
                <div class="w-6/12 px-3 ">
                  <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                    Password
                  </label>
                  <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="******************" />
                  <p id="complexity" class="text-xs italic mb-2"></p>
                </div>
                <div class="w-6/12 px-3">
                  <label class="block mb-2 text-sm font-bold text-gray-700" for="c_password">
                    Confirm Password
                  </label>
                  <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="c_password" name="c_password" type="password" placeholder="******************" />
                </div>
              </div>
              <div class="mb-4 px-3">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                  Password encryption method
                </label>
                <select class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="enc_method" name="enc_method" type="text">
                  <option value="" selected disabled hidden>Pilih method...</option>
                  <option value="md5">MD5</option>
                  <option value="sha1">SHA1</option>
                  <option value="sha256">SHA256</option>
                </select>
              </div>
              <ul class="px-3">
                <li class="text-xs italic text-blue-600">&bull; Minimal 8 karakter</li>
                <li class="text-xs italic text-blue-600">&bull; Harus mengandung setidaknya 1 huruf kecil dan 1 huruf besar</li>
                <li class="text-xs italic text-blue-600">&bull; Harus mengandung setidaknya 1 angka</li>
                <li class="text-xs italic text-blue-600">&bull; Harus mengandung setidaknya 1 simbol ($#&%)</li>
              </ul>
              <?php
              if (isset($_SESSION['error'])) {

                echo "<div class='text-red-600 text-sm'>
                        <p>{$_SESSION['error']}</p>
                      </div>";

                unset($_SESSION['error']);
              }
              ?>
              <div class="mb-6 mt-6 text-center">
                <button type="submit" id='submit' name="submit" class="w-full px-4 py-2 font-bold text-white bg-[#002D74] rounded-full hover:bg-blue-700 focus:outline-none duration-150 focus:shadow-outline" type="button">
                  Register Account
                </button>
              </div>
              <hr class="mb-6 border-t" />
              <div class="text-center">
                <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="login.php">
                  Sudah punya akun? Login!
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src='./js/script.js'></script>
  </body>
</body>

</html>