<?php
session_start();
include_once 'koneksi.php';
include_once 'models/Person.php';

// Tangkap request form (dari name2 element form)
$idagama = $_POST['idagama']; 
$nama = $_POST['nama']; 
$gender = $_POST['gender']; 
$tempat_lahir = $_POST['tempat_lahir']; 
$tgl_lahir = $_POST['tgl_lahir']; 
$no_hp = $_POST['no_hp']; 
$email = $_POST['email']; 
$media_sosial = $_POST['media_sosial']; 
$prodi = $_POST['prodi']; 
$kampus = $_POST['kampus'];
$mentor = $_POST['mentor']; 
$foto = $_POST['foto']; 

$tombol = $_POST['proses']; // Untuk keperluan eksekusi sebuah tombol di form

// Simpan ke sebuah array
$data = [
    $idagama, // ? 1
    $nama, // ? 4
    $gender, // ? 5
    $tempat_lahir, // ? 6
    $tgl_lahir, // ? 7
    $no_hp, // ? 8
    $email, // ? 9
    $media_sosial,
    $prodi,
    $kampus,
    $mentor, 
    $foto// ? 9
];

// Eksekusi tombol
$obj_person = new Person();
switch ($tombol) {
    case 'simpan': $obj_person->simpan($data); break;
    case 'ubah': 
        $data[] = $_POST['idx']; // Tambahkan array ? ke-11 dari hidden field idx
        $obj_person->ubah($data); break;
    case 'hapus': $obj_person->hapus($_POST['id']); break; // $_POST['id'] dari hidden field di tombol hapus
    default: header('location:index.php?hal=Person_list'); break;
}
//4. setelah selasai arahkan ke hal produk
header('location:index.php?hal=Person_list');

//----------proses pencarian data---------------
$tombol_cari = $_GET['proses_cari']; // untuk keperluan eksekusi sebuah tombol di form

if(isset($tombol_cari)){
    //print_r('###########################'.$_GET['keyword']); 
    $obj_person->cari($_GET['keyword']); 
    header('location:index.php?hal=Person_cari');
}
