<?php
session_start();
if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}
require 'function.php';

// ketika tombol login di pencet

if (isset($_POST['login'])) {
  $login = login($_POST);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Halaman Login</title>
  <!-- Bootstrap style -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- mystyle -->
  <style>
    .container {
      padding-top: 5rem;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <form action="" method="post">
        <h2 class="mb-3 text-center">Login Admin Toko</h2>
        <!-- jika ada error dalam login maka ini ditampilkan -->
        <?php if (isset($login['error'])) : ?>
          <p style="font-style: italic; color: red;"><?= $login['pesan']; ?></p>
        <?php endif; ?>
        <div class="input-group mb-4">
          <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
          <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" autofocus autocomplete="off" required>
        </div>
        <div class="input-group mb-4">
          <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Passoword" aria-label="Passoword" aria-describedby="basic-addon1" autocomplete="off" required>
        </div>

        <button type="submit" name="login" class="btn btn-info">Login</button>


      </form>

      <a href="registrasi.php" class="link-underline-light text-center" style="font-size: 20px;">If you have not acountt!! click here</a>
    </div>
  </div>
</body>

</html>