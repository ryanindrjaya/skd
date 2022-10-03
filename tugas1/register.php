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
      <div class="flex justify-center items-center h-screen px-6">
        <!-- Row -->
        <div class="w-full xl:w-3/4 lg:w-11/12 flex justify-center">
          <!-- Col -->
          <div class="w-full lg:w-7/12 bg-gray-100 p-5 rounded-2xl shadow-lg">
            <h3 class="pt-4 text-2xl font-bold text-[#002D74] text-center">Buat Akun anda!</h3>
            <form method="POST" action='' class="px-8 pt-6 pb-8 mb-4 bg-gray-100 rounded">
              <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                  Nama Lengkap
                </label>
                <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="nama" name="nama" type="text" placeholder="Nama Lengkap" />
              </div>
              <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                  Username
                </label>
                <input onkeypress="return event.charCode != 32" class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Username" />
              </div>
              <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                  Email
                </label>
                <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="budi@example.com" />
              </div>
              <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                  Alamat
                </label>
                <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="alamat" name="alamat" type="text" placeholder="Alamat" />
              </div>
              <div class="mb-4 md:grid md:grid-cols-2 md:gap-x-6">
                <div class="mb-4 md:col-span-1 md:mb-0">
                  <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                    Password
                  </label>
                  <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="******************" />
                  <p id='complexity' class="text-xs italic"></p>
                </div>
                <div class="md:col-span-1">
                  <label class="block mb-2 text-sm font-bold text-gray-700" for="c_password">
                    Confirm Password
                  </label>
                  <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="c_password" name="c_password" type="password" placeholder="******************" />
                </div>
              </div>
              <div class="mb-6 text-center">
                <button type="submit" disabled name="submit" id='submit' class="w-full px-4 py-2 font-bold text-white bg-[#002D74]/50 rounded-full focus:outline-none focus:shadow-outline" type="button">
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

<?php
include('db.php');
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = MD5($_POST['password']);
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];
  $nama = $_POST['nama'];
  $c_password = MD5($_POST['c_password']);
  if ($password == $c_password) {
    $query = mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password', '$email', '$alamat', '$nama','user')");
    if ($query) {
      echo "<script>alert('Berhasil Register!');window.location.href='login.php';</script>";
    } else {
      echo "<script>alert('Gagal Register!');window.location.href='register.php';</script>";
    }
  } else {
    echo "<script>alert('Password tidak sama!');window.location.href='register.php';</script>";
  }
}
?>