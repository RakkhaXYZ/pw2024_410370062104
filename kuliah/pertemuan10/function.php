<?php

// buat fungsi koneksi untuk koneksi ke database 
function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'pw_4103700621104');
}




// membuat fungsi queri kedatabase 

function query($query)
{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data 
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}





// MEMBUAT FUNGSI TAMBAH PRODUK
function tambah($data)
{
  $nama_produk = htmlspecialchars($data['nama_produk']);
  $harga_produk = $data['harga_produk'];
  $detail_produk = htmlspecialchars($data['detail_produk']);
  $namagambar = $_FILES['gambar']['name'];
  $lokasigambar = $_FILES['gambar']['tmp_name'];
  $gambarfiks = date('YmdHis') . $namagambar;
  move_uploaded_file($lokasigambar, "img/$gambarfiks");

  $conn = koneksi();
  $query = "INSERT INTO produk VALUES (null,'$gambarfiks', '$nama_produk', '$harga_produk', '$detail_produk')";
  mysqli_query($conn, $query);

  echo mysqli_error($conn);
  // akan mengembalikan nilai jikalau ada perubahan dalam database entah itu, ditambah, dihapus, atau di edit
  return mysqli_affected_rows($conn);
}
