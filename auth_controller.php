<?php
session_start();
include_once 'koneksi.php';
include_once 'models/Member.php';
//1. tangkap request form (dari name2 element form)
$username = $_POST['username']; 
$password = $_POST['password']; 
//2. simpan ke sebuah array
$data = [
    $username, // ? 1
    $password, // ? 2
];
//3. eksekusi tombol
$obj_member = new Member();
$rs = $obj_member->auth($data);
if (isset($rs)) { //----------sukses login-----------
    //setelah sukses login diarahkan ke hal produk
    $_SESSION['MEMBER'] = $rs; //data user dikenal oleh session
    header('location:index.php?hal=Person_list');
} else {  //----------gagal login-----------
    echo '<script>alert("Username/Password Anda Salah!!!");history.go(-1);</script>';
}
