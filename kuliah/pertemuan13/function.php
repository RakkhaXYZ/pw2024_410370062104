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
  $gambar = upload();

  // jika tidak ada gambar yang di upload 
  if (!$gambar) {
    return false;
  }
  $conn = koneksi();
  $query = "INSERT INTO produk VALUES (null,'$gambar', '$nama_produk', '$harga_produk', '$detail_produk')";
  mysqli_query($conn, $query);

  echo mysqli_error($conn);
  // akan mengembalikan nilai jikalau ada perubahan dalam database entah itu, ditambah, dihapus, atau di edit
  return mysqli_affected_rows($conn);
}


// fungsi hapus produk
function hapus($id)
{

  $conn = koneksi();

  // menghapus di folder img
  $p = query("SELECT * FROM produk WHERE id_produk = $id");
  if ($p['gambar'] != 'nophoto.png') {
    unlink('img/' . $p['gambar']);
  }


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


// fungsi upload produk

function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $lokasi_file = $_FILES['gambar']['tmp_name'];

  // jika gambar tidak diisikan 

  if ($error == 4) {
    // echo "
    // <script>
    // alert('Gambar Tidak Boleh Kosong, Upload Gambar Terlebih dahulu'); 
    // </script>
    // ";
    // ketika tidak ada gambar yang di pilih maka akan menyimpan gambar defaulnya
    return 'nophoto.png';
  }
  // mengambil ekstensi file dari file yang di upload
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));

  // mengecek ekstensi gambar dengan menggunakan inarray
  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "
    <script>
    alert('Gambar Yang Anda Pilih Buka jpg/jpeg/png'); 
    </script>
    ";

    return false;
  }

  // cek type file 

  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "
    <script>
    alert('File Yang Anda Pilih Bukan Gambar'); 
    </script>
    ";

    return false;
  }

  // cek  ukuran gambar 
  // maksimal 5mb

  if ($ukuran_file > 5000000) {
    echo "
    <script>
    alert('Ukuran Gambar Terlalu Besar'); 
    </script>
    ";

    return false;
  }

  // lolos pengecekan 
  // mengenkripsi file yang di upload agar tidak terjadi tertimpaan file pada database 
  $nama_file_baru = uniqid();
  $nama_file_baru .= ".";
  $nama_file_baru .= $ekstensi_file;

  move_uploaded_file($lokasi_file, "img/" . $nama_file_baru);

  return $nama_file_baru;
}


// membuat fungsi searching 
function cari($keyword)
{
  $conn = koneksi();
  $query = "SELECT * FROM produk WHERE 
  nama_produk LIKE '%$keyword%' OR
  harga_produk LIKE '%$keyword%' OR 
  detail_produk LIKE '%$keyword%'
  ";
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }


  return $rows;
}



// membuat fungsi login 

function login($data)
{

  $email = htmlspecialchars($data['email']);
  $password = htmlspecialchars($data['password']);
  $conn = koneksi();

  if ($user = query("SELECT * FROM admin WHERE email='$email'")) {
    if (password_verify($password, $user["password"])) {

      $_SESSION['login'] = $user;
      header("Location: index.php");
      exit;
    }
  }

  return [
    'error' => true,
    'pesan' => 'email dan password salah'
  ];
}




// Membuat fungsi registrasi 

function registrasi($data)
{
  $conn = koneksi();
  $nama = htmlspecialchars($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $username = strtolower(stripcslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  // jika form pendaftaran kosong 
  if (empty($nama) || empty($email) || empty($username) || empty($password) || empty($password2)) {
    echo "
    <script> 
    alert('Form Pendaftaran Tidak Boleh Kosong'); 
    location='registrasi.php';
    
    </script>

    
    ";

    return false;
  }

  // jika password dan passoword2 tidak sesuai
  if ($password != $password2) {
    echo "
    <script> 
    alert('konfirmasi Password Tidak Sesuai'); 
    location='registrasi.php';
    
    </script>

    
    ";

    return false;
  }

  // jika username email sudah ada tidak boleh daftar
  if (query("SELECT * FROM admin WHERE email='$email'")) {
    echo "
    <script> 
    alert('email Sudah Terdaftar'); 
    location='registrasi.php';
    
    </script>

    
    ";

    return false;
  }

  // jika password < 4 
  if (strlen($password) < 4) {
    echo "
    <script> 
    alert('password Tidak Boleh Kurang dari 4'); 
    location='registrasi.php';
    
    </script>

    
    ";

    return false;
  }

  $password = password_hash($password, PASSWORD_DEFAULT);

  $query = "INSERT INTO admin VALUES(null, '$nama', '$email', '$username', '$password')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}
