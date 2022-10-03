<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='https://cdn.tailwindcss.com' ></script>
  <title>Enkripsi Caesar</title>
</head>
<body>
  <div class='bg-blue-500 h-screen w-full flex justify-center items-center'>
    <!-- Form input plaintext dan key -->
    <form action="enkcaesar.php" method="post" class="w-1/4 shadow-xl p-8 bg-white rounded-lg border flex flex-col">
      <h1 class='text-3xl font-bold text-center mb-6 text-gray-600'>Caesar Cipher</h1>
      <label class='text-lg mb-3' for="plain_text">Teks</label>
      <input type="text" class='mb-5 border focus:outline-none py-2 px-2' name='kata' id="plain_text">
      <label class='text-lg mb-3' for="key">Key</label>
      <input type="number" class='mb-5 border focus:outline-none py-2 px-2' maxlength="5" name='key' id="key">
      <input type="submit" name='submit_enkripsi' class='cursor-pointer bg-blue-400 py-3 px-4 rounded-lg text-white' value='Enkripsi'>
      <input type="submit" name='submit_dekripsi' class='cursor-pointer bg-blue-400 py-3 mt-5 px-4 rounded-lg text-white' value='Dekripsi'>
    </form>
  </div>
</body>
</html>