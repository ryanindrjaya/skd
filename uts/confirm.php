<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konfirmasi Email</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

  <body class="bg-gray-50">
    <!-- Container -->
    <div class="container  mx-auto">
      <div class="flex justify-center items-center h-screen px-6">
        <!-- Row -->
        <div class="w-full xl:w-3/4 lg:w-11/12 flex justify-center">
          <!-- Col -->
          <div class="w-full lg:w-7/12 bg-gray-100 p-5 rounded-2xl shadow-lg">
            <h3 class="pt-4 text-2xl font-bold text-[#002D74] text-center">Konfirmasi Email</h3>
            <?php
            if (isset($_SESSION['error'])) {

              echo "<div class='text-center text-blue-600'>
                        <p>{$_SESSION['error']}</p>
                      </div>";

              unset($_SESSION['error']);
            }
            ?>
            <form method="POST" action='./handler/confirm_handler.php' class="px-8 pt-6 pb-8 mb-4 bg-gray-100 rounded">
              <div class="mb-4 px-3">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                  Token
                </label>
                <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="email" name="token" type="text" placeholder="Masukkan token" />
              </div>
              <div class="mb-6 mt-6 text-center">
                <button type="submit" name="submit" class="w-full px-4 py-2 font-bold text-white bg-[#002D74] rounded-full hover:bg-blue-700 focus:outline-none duration-150 focus:shadow-outline" type="button">
                  Verifikasi
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
  </body>
</body>

</html>