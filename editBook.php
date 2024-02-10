<?php 

include "proses/proses.php";
$conn = koneksi();

$id = $_POST['id'];
$judul_buku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$tanggal_liris = $_POST['tanggal_liris'];
$tahun_terbit = $_POST['tahun_terbit'];
$jumlah_halaman = $_POST['jumlah_halaman'];


$sqlUpdate = "UPDATE buku 
                SET judul_buku = '$judul_buku',
                pengarang = '$pengarang',
                tanggal_liris = '$tanggal_liris',
                tahun_terbit = '$tahun_terbit',
                jumlah_halaman = '$jumlah_halaman'
                WHERE id_buku = '$id'";

$result = $conn->query($sqlUpdate);

$data = [];
if ($result) {
  $data['message'] = "Data Berhasil diupdate";
}else {
  $data['message'] = "Data gagal diupdate";
}


echo json_encode($data);



?>