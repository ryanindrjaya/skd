<?php
require_once('../db/index.php');

session_start();

if (isset($_POST['submitRegister'])) {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST["password"];
  $c_password = $_POST["c_password"];
  $alamat = $_POST['alamat'];
  $enc_method = $_POST['enc_method'];
  $token = bin2hex(random_bytes(36));

  if ($password !== $c_password) {
    $_SESSION["error"] = "Password tidak sama!";
    header("Location: ../register.php");
    exit();
  }

  if (!$enc_method) {
    $_SESSION["error"] = "Harap pilih metode enkripsi!";
    header("Location: ../register.php");
    exit();
  }

  $pattern = "/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/";
  if (!preg_match($pattern, $password)) {
    $_SESSION["error"] = "Password kurang kuat";
    header("Location: ../register.php");
    exit();
  }

  $password_hash;
  if ($enc_method == "md5") {
    $password_hash = md5($password);
  } else if ($enc_method == "sha1") {
    $password_hash = sha1($password);
  } else if ($enc_method == "sha256") {
    $password_hash = hash('sha256', $password);
  }

  $sql = "INSERT INTO user (nama, username, password, email, status, role, token, alamat) VALUES ('$name', '$username', '$password_hash', '$email', 0 , 'user', '$token', '$alamat')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    $_SESSION['success'] = "Registrasi berhasil, harap login";
    header("Location: ../login.php");
  } else {
    $_SESSION['error'] = "Registrasi gagal";
    header("Location: ../register.php");
  }
} else {
  $_SESSION["error"] = "Username or password is not set";
  header("Location: ../register.php");
}
