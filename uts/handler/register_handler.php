<?php
require_once("./email_handler.php");
require_once("../db/index.php");

session_start();

if (isset($_POST["name"], $_POST["username"], $_POST["email"], $_POST["password"], $_POST["c_password"], $_POST["alamat"])) {
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $c_password = $_POST["c_password"];
  $alamat = $_POST["alamat"];
  $enc_method = $_POST["enc_method"];

  if ($password !== $c_password) {
    $_SESSION["error"] = "Password tidak sama!";
    header("Location: ../register.php");
    exit();
  }

  $pattern = "/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/";
  if (!preg_match($pattern, $password)) {
    $_SESSION["error"] = "Password kurang kuat";
    header("Location: ../register.php");
    exit();
  }

  $name = $conn->escape_string($name);
  $username = $conn->escape_string($username);
  $email = $conn->escape_string($email);
  $alamat = $conn->escape_string($alamat);
  $token = bin2hex(random_bytes(36));

  $password_hash;
  if ($enc_method == "md5") {
    $password_hash = md5($password);
  } else if ($enc_method == "sha1") {
    $password_hash = sha1($password);
  } else if ($enc_method == "sha256") {
    $password_hash = hash("sha256", $password);
  }

  $sql = "INSERT INTO user (nama, username, password, email, status, role, token, alamat) VALUES ('$name', '$username', '$password_hash', '$email', 0 , 'user', '$token', '$alamat')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    $sendEmail = sendEmailConfirmation($email, $token);
    if ($sendEmail) {
      $_SESSION["error"] = "Registrasi berhasil, harap cek email anda untuk melakukan konfirmasi";
      header("Location: ../confirm.php");
    } else {
      $_SESSION["error"] = "Gagal mengirim email konfirmasi";
      header("Location: ../register.php");
    }
  } else {
    $_SESSION["error"] = "Register failed";
    header("Location: ../register.php");
  }
} else {
  $_SESSION["error"] = "Username or password is not set";
  header("Location: ../register.php");
}
