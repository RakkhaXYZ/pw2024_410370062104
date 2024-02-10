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
