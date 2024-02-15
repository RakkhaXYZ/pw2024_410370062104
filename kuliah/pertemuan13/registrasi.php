<?php
require 'function.php';

if (isset($_POST['register'])) {

  if (registrasi($_POST) > 0) {
    echo "
    <script> 
    alert('Anda Sudah Terdaftar Silahkan Login');
    location='login.php';
    </script>
    ";
  } else {
    echo "
    <script> 
    alert('Anda gagal Terdaftar');
    location='register.php';
    </script>
    ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Admin</title>
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
      <h2 class="text-center mb-3">Isikan Form Untuk Mendaftar</h2>


      <form action="" method="post">
        <div class="input-group mb-4">
          <span class="input-group-text" id="bassic-addon1"><i class="bi bi-person"></i></span>
          <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" autofocus="off" required>
        </div>
        <div class="input-group mb-4">
          <span class="input-group-text" id="bassic-addon1"><i class="bi bi-envelope-at-fill"></i></span>
          <input type="email" class="form-control" name="email" placeholder="E-mail" required>
        </div>
        <div class="input-group mb-4">
          <span class="input-group-text" id="bassic-addon1"><i class="bi bi-person-check"></i></span>
          <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>
        <div class="input-group mb-4">
          <span class="input-group-text" id="bassic-addon1"><i class="bi bi-key-fill"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <div class="input-group mb-4">
          <span class="input-group-text" id="bassic-addon1"><i class="bi bi-key-fill"></i></span>
          <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Passoword" required>
        </div>

        <button type="submit" class="btn btn-info" name="register">Kirim</button>

      </form>
    </div>
  </div>
</body>

</html>