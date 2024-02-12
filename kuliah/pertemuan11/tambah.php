<?php
require 'function.php';


// apakah tombol tambah sudah ditekan

if (isset($_POST['submit'])) {
  if (tambah($_POST) > 0) {
    echo "
    <script>alert('data produk telah ditambahkan');</script>
    <script>location='index.php'</script>
    ";
  } else {
    echo "
    <script>alert('data produk gagal ditambahkan');</script>
    <script>location='tambah.php'</script>
    ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    .container {
      padding-top: 7rem;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">

      <form action="" method="post" enctype="multipart/form-data">

        <legend class="mb-3 fw-bold">
          Tambah Produk Toko
        </legend>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Produk</label>
          <input type="text" id="nama" name="nama_produk" class="form-control" autofocus required>
        </div>
        <div class="mb-3">
          <label for="harga" class="form-label">Harga Produk</label>
          <input type="number" id="harga" name="harga_produk" class="form-control" min="1" required>
        </div>
        <div class="mb-3">
          <label for="detail" class="form-label">Detail Produk</label>
          <textarea class="form-control" name="detail_produk" id="detail" required></textarea>
        </div>
        <div class="mb-3">
          <label for="gambar" class="form-label">Upload Foto Produk</label>
          <input type="file" id="gambar" name="gambarbaru" class="form-control" min="1" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>