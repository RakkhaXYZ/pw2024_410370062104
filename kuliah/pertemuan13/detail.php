<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'function.php';



$id = $_GET['id'];
$p = query("SELECT * FROM produk WHERE id_produk=$id");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



</head>

<body>

  <div class="container">
    <div class="row justify-content-center">

      <div class="col-md-4">
        <h1 class="mb-3 text-center">Detail Produk </h1>
        <div class="card mb-3 text-center" style="width: 18rem;">
          <img src="img/<?= $p['gambar']; ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $p['nama_produk']; ?></h5>
            <p>Rp.<?= $p['harga_produk']; ?></p>
            <p class="card-text"><?= $p['detail_produk']; ?></p>
            <a href="edit.php?id=<?= $p['id_produk']; ?>" class="btn btn-warning mb-3">Edit</a>
            <a href="hapus.php?id=<?= $p['id_produk']; ?>" class="btn btn-success mb-3" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">Hapus</a>

          </div>
        </div>
      </div>
      <div class="row justify-content-left text-left" style="right:auto;">
        <div class="col-md-4">

          <a href="index.php" class="btn btn-primary">Kembali</a>

        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>