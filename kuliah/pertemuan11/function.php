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


// fungsi hapus produk
function hapus($id)
{

  $conn = koneksi();
  $query = "DELETE FROM produk WHERE id_produk=$id";

  mysqli_query($conn, $query) or die(mysqli_error($conn));



  return mysqli_affected_rows($conn);
}


// fungsi edit produk 

function edit($data)
{
  $id = $data['id'];
  $nama_produk = htmlspecialchars($data['nama_produk']);
  $harga_produk = $data['harga_produk'];
  $detail_produk = htmlspecialchars($data['detail_produk']);
  $gambarlama = $data['gambarlama'];


  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarlama;
  } else {
    $gambar = upload();
  }

  $conn = koneksi();
  $query = "UPDATE produk SET
  gambar = '$gambar',
  nama_produk='$nama_produk',
  harga_produk='$harga_produk',
  detail_produk = '$detail_produk' WHERE id_produk=$id
  
  ";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function upload()
{
  $namagambar = $_FILES['gambar']['name'];
  $lokasigambar = $_FILES['gambar']['tmp_name'];
  $gambarfiks = date('YmdHis') . $namagambar;
  move_uploaded_file($lokasigambar, "img/$gambarfiks");

  return $gambarfiks;
}
