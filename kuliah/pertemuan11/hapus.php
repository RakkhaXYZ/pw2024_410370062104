<?php
require 'function.php';

// jika tidak ada id di url maka akan di alihkan halaman
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

$id = $_GET['id'];

if (hapus($id) > 0) {
  echo "
  <script>
  alert('Data Berhasil Dihapus'); 
  location='index.php';
  
  </script>
  ";
} else {
  echo "
  <script>
  alert('Data Gagal Dihapus'); 
  location='detail.php'; 
  </script>
  ";
}
