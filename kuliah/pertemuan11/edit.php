<?php
require 'function.php';
// jika tidak ada id di url maka akan di alihkan halaman
if (!isset($_GET['id'])) {
  header("Location : index.php");
  exit;
}
// panggil query sesuai id produk
$id = $_GET['id'];

$p = query("SELECT * FROM produk WHERE id_produk =$id");
// apakah tombol tambah sudah ditekan

if (isset($_POST['submit'])) {
  if (edit($_POST) > 0) {
    echo "
    <script>alert('data produk telah di edit');</script>
    <script>location='index.php'</script>
    ";
  } else {
    echo "
    <script>alert('data produk gagal di edit');</script>
    <script>location='edit.php'</script>
    ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    .container {
      padding-top: 5rem;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">

      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $p['id_produk']; ?>">
        <input type="hidden" name="gambarlama" value="<?= $p['gambar']; ?>">

        <legend class="mb-3 fw-bold">
          Edit Produk Toko
        </legend>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Produk</label>
          <input type="text" id="nama" name="nama_produk" class="form-control" value="<?= $p['nama_produk']; ?>" autofocus>
        </div>
        <div class="mb-3">
          <label for="harga" class="form-label">Harga Produk</label>
          <input type="number" id="harga" name="harga_produk" class="form-control" value="<?= $p['harga_produk']; ?>" min="1">
        </div>
        <div class="mb-3">
          <label for="detail" class="form-label">Detail Produk</label>
          <textarea class="form-control" name="detail_produk" id="detail">
          <?= $p['detail_produk']; ?>
          </textarea>
        </div>
        <div class="mb-3">

          <label for="gambar" class="form-label">Ubah Foto Produk</label><br>
          <img src="img/<?= $p['gambar']; ?>" width="100">
          <input type="file" id="gambar" name="gambar" class="form-control" min="1">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>