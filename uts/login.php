<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>SKD</title>
</head>

<body>
  <section class="bg-gray-50 min-h-screen flex items-center justify-center">
    <!-- login container -->
    <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
      <!-- form -->
      <div class="md:w-1/2 px-8 md:px-16">
        <h2 class="font-bold text-2xl text-[#002D74]">Login</h2>

        <form action="./handler/login_handler.php" method="POST" class="flex flex-col gap-4">
          <input class="p-2 mt-8 rounded-xl border" type="text" name="username" placeholder="Username">
          <div class="relative">
            <input class="p-2 rounded-xl border w-full" type="password" name="password" placeholder="Password">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
            </svg>
          </div>
          <div class="mb-4 px-3">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
              Password encryption method
            </label>
            <select class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="enc_method" name="enc_method" type="enc_method" placeholder="enc_method">
              <option value="" selected disabled hidden>Pilih method...</option>
              <option value="md5">MD5</option>
              <option value="sha1">SHA1</option>
              <option value="sha256">SHA256</option>
            </select>
          </div>
          <?php
          if (isset($_SESSION['error'])) {

            echo "<div class='text-red-600 text-sm'>
                        <p>{$_SESSION['error']}</p>
                      </div>";

            unset($_SESSION['error']);
          }

          if (isset($_SESSION['success'])) {

            echo "<div class='text-green-600 text-sm'>
                        <p>{$_SESSION['success']}</p>
                      </div>";

            unset($_SESSION['success']);
          }
          ?>
          <button type="submit" name="submit" class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Login</button>
        </form>

        <div class="mt-3 text-xs flex justify-between items-center text-[#002D74]">
          <p>Tidak punya akun?</p>
          <a href="register.php" class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300">Daftar</a>
        </div>
      </div>

      <!-- image -->
      <div class="md:block hidden w-1/2">
        <img class="rounded-2xl" src="https://uns.ac.id/id/wp-content/uploads/Logo-UNS-New-04.png">
      </div>
    </div>
  </section>
</body>

</html>