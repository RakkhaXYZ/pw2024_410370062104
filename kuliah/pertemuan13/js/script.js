const tombolCari = document.querySelector('.tombol-cari');
const keyword = document.querySelector('.keyword');
const tabel = document.querySelector('.cont');

// hilangkan tombol cari 

tombolCari.style.display = 'none';

// event ketika user menuliskan keyword 

keyword.addEventListener('keyup',  function(){

// //   // membuat objek ajac

// //   const xhr = new XMLHttpRequest();

// //   xhr.onreadystatechange = function(){
// //     if(xhr.readyState== 4 && xhr.status== 200){
// //       // apapun respon yang dikirimkan oleh halaman ajax_cari.php
// //       tabel.innerHTML = xhr.responseText;
// //     }
// //   }
// //   // buka ajaxnya 
// //   xhr.open('get', 'ajax/ajax_cari.php?keyword='+ keyword.value);
// //   // kirim ajak nya 
// //   xhr.send();
// menggunakan fetch untuk mengirim respon ke ajax

fetch('ajax/ajax_cari.php?keyword='+ keyword.value)
// dapatkan response
.then((response)=> response.text())
// panggil response nya
.then((response)=> (tabel.innerHTML= response));
});

// Preview Image untuk Tambah dan Ubah

function previewImage(){
  const gambar = document.querySelector('.gambar');
  const imgPreview = document.querySelector('.img-preview');

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);
  
  oFReader.onload = function (oFREvent){
    imgPreview.src = oFREvent.target.result;

  };
}
