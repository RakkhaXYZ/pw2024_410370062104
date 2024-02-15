<?php

require '../function.php';

$produk = cari($_GET['keyword']);

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Barang</title>
  <!-- Bootstrap style -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

  <table class="table" cellpadiing="10" cellspacing="">
    <thead>
      <tr class="text-center">
        <th>#</th>
        <th>Foto Produk</th>
        <th>Nama Produk</th>
        <th>Lainnya</th>
      </tr>
    </thead>
    <?php if (empty($produk)) : ?>
      <tbody>
        <td colspan="4" class="text-center">
          <h3>Data Produk Tidak Ditemukan</h3>
        </td>
      </tbody>
    <?php endif; ?>

    <?php
    $nomer = 1;
    ?>

    <?php foreach ($produk as $p) : ?>
      <tbody>

        <tr>
          <td><?= $nomer; ?></td>
          <td><img src="img/<?= $p['gambar']; ?>" width="100"></td>
          <td style="width: 500px; text-align: center;"><?= $p['nama_produk']; ?></td>
          <td style="width: 500px; text-align: center;">
            <a href="detail.php?id=<?= $p['id_produk']; ?>" class="btn btn-warning mb-3">Lihat Detail</a>
          </td>
        </tr>

      </tbody>
      <?php $nomer++ ?>
    <?php endforeach; ?>

  </table>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>

</html>