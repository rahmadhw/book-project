<?php 

include "proses/proses.php";

$conn = koneksi();

$id = $_POST['id'];
$sqlDelete = "DELETE FROM buku WHERE id_buku='$id'";
$result = $conn->query($sqlDelete);
echo json_encode($result);

?>