<?php
session_start();
require_once('../db/index.php');
// Membuat Autentikasi dari data di database dengan input login.
if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pass = mysqli_real_escape_string($conn, $_POST['password']);
  $enc_method = $_POST['enc_method'];

  $password_hash;

  if ($enc_method == 'md5') {
    $password_hash = md5($pass);
  } else if ($enc_method == 'sha1') {
    $password_hash = sha1($pass);
  } else if ($enc_method == 'sha256') {
    $password_hash = hash('sha256', $pass);
  }

  $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password_hash'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $_SESSION['username'] = $username;
    $_SESSION['role'] = $row['role'];
    $_SESSION['enc_method'] = $enc_method;

    if ($row['role'] == 'admin') {
      header("Location: ../index.php");
    } else {
      header("Location: ../index.php");
    }
  } else {
    $_SESSION['error'] = "Username or password is incorrect";
    header("Location: ../login.php");
  }
}
