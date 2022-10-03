<?php
session_start();
require_once('../db/index.php');
// Membuat Autentikasi dari data di database dengan input login.
if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pass = mysqli_real_escape_string($conn, $_POST['password']);

  $auth = mysqli_query($conn, "SELECT * FROM user WHERE username = '" . $username . "' AND password = '" . $pass . "' ");
  if (mysqli_num_rows($auth) > 0) {
    $d = mysqli_fetch_object($auth);
    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = $d->username;
    $_SESSION['role'] = $d->role;
    if ($d->role == 'admin') {
      header("Location: ../pages/admin/admin_dashboard.php");
    } else {
      header("Location: ../pages/user/user_dashboard.php");
    }
  } else {
    $_SESSION['error'] = "Username / password salah";
    echo "<script>window.location = '../login.php'</script>";
  }
}
