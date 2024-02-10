<?php 


include "proses/proses.php";
$conn = koneksi();


$judul_buku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$tanggal_liris = $_POST['tanggal_liris'];
$tahun_terbit = $_POST['tahun_terbit'];
$jumlah_halaman = $_POST['jumlah_halaman'];

$sql = "INSERT INTO buku (judul_buku, pengarang, tanggal_liris, tahun_terbit, jumlah_halaman)
        VALUES ('$judul_buku', '$pengarang', '$tanggal_liris', '$tahun_terbit', '$jumlah_halaman')";

$result = $conn->query($sql);

if ($result) {
    $data['message'] = "Data Berhasil ditambah";
}else {
    $data['message'] = "Data gagal ditambah";
}


echo json_encode($data);


?>