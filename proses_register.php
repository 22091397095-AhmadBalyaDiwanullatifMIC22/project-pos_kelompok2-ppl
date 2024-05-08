<?php
include 'koneksi.php'; // Menghubungkan ke file koneksi.php

// Ambil data yang dikirimkan dari form
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']); // Gunakan md5 untuk mengenkripsi password
$role = $_POST['sebagai'];

// Query untuk menambahkan user ke dalam tabel yang sesuai
if ($role == 'administrator') {
    $table = 'user';
} elseif ($role == 'kasir') {
    $table = 'kasir';
} elseif ($role == 'pimpinan') {
    $table = 'pimpinan';
}

// Query untuk memasukkan data ke dalam tabel
$query = "INSERT INTO $table ({$table}_nama, {$table}_username, {$table}_password) VALUES ('$nama', '$username', '$password')";

// Jalankan query
$result = mysqli_query($koneksi, $query);

if ($result) {
    // Registrasi berhasil
    header("Location: index.php?alert=registrasi_sukses");
} else {
    // Registrasi gagal
    header("Location: register.php?alert=gagal");
}

// Tutup koneksi database
mysqli_close($koneksi);
?>