<?php 
error_reporting(0);

if(isset($_POST['submit_enkripsi'])) {
  // Ambil inputan dari form
  $kata = $_POST['kata'];
  $key = $_POST['key'];
  // Ubah inputan menjadi array
  $kata = str_split($kata);
  // Looping untuk setiap huruf
  foreach ($kata as $huruf) {
    // Ubah huruf menjadi ASCII
    $ascii = ord($huruf);
    // Jika huruf adalah huruf kecil
    if ($ascii >= 97 && $ascii <= 122) {
      // Jika ASCII + key melebihi 122
      if ($ascii + $key > 122) {
        // Kurangi ASCII + key dengan 26
        $ascii = $ascii + $key - 26;
      } else {
        // Jika tidak tambahkan ASCII + key dengan 26
        $ascii = $ascii + $key;
      }
    // Jika huruf adalah huruf besar
    } else if ($ascii >= 65 && $ascii <= 90) {
      // Jika ASCII + key melebihi 90
      if ($ascii + $key > 90) {
        // Kurangi ASCII + key dengan 26
        $ascii = $ascii + $key - 26;
      } else {
        // Jika tidak tambahkan ASCII + key dengan 26
        $ascii = $ascii + $key;
      }
    } else if ($ascii == 32) {
      // Jika huruf adalah spasi
      $ascii = $ascii + $key;
    }
    // Ubah ASCII menjadi huruf
    $huruf = chr($ascii);
    // Tampilkan hasil
    $hasil_enkripsi = $hasil_enkripsi . $huruf;
  }
  echo 'Kalimat Asli: '. $_POST['kata'];
  echo '<br>';
  echo 'Hasil Enkripsi: '. $hasil_enkripsi;
}

if(isset($_POST['submit_dekripsi'])) {
  // Ambil inputan dari form
  $kata = $_POST['kata'];
  $key = $_POST['key'];
  // Ubah inputan menjadi array
  $kata = str_split($kata);
  // Looping untuk setiap huruf
  foreach ($kata as $huruf) {
    // Ubah huruf menjadi ASCII
    $ascii = ord($huruf);
    // Jika huruf adalah huruf kecil
    if ($ascii >= 97 && $ascii <= 122) {
      // Jika ASCII + key melebihi 122
      if ($ascii - $key < 97) {
        // Kurangi ASCII + key dengan 26
        $ascii = $ascii - $key + 26;
      } else {
        // Jika tidak tambahkan ASCII + key dengan 26
        $ascii = $ascii - $key;
      }
    // Jika huruf adalah huruf besar
    } else if ($ascii >= 65 && $ascii <= 90) {
      // Jika ASCII + key melebihi 90
      if ($ascii - $key < 65) {
        // Kurangi ASCII + key dengan 26
        $ascii = $ascii - $key + 26;
      } else {
        // Jika tidak tambahkan ASCII + key dengan 26
        $ascii = $ascii - $key;
      }
    } else if ($ascii > 33 && $ascii <= 64) {
      // Jika huruf adalah tandat pagar
      $ascii = 32;
    }
    // Ubah ASCII menjadi huruf
    $huruf = chr($ascii);
    // Tampilkan hasil
    $hasil_dekripsi = $hasil_dekripsi . $huruf;
  }
  echo 'Kalimat Asli: '. $_POST['kata'];
  echo '<br>';
  echo 'Hasil Dekripsi: '. $hasil_dekripsi;
}
?>