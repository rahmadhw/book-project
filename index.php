<?php include "proses/proses.php"; ?>
<?php include "templates/header.php"; ?>
<?php 

$pecah = viewData("SELECT * FROM buku");


?>

<div class="container">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col">
            <h3>Data Buku</h3>
            <hr>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Tanggal Liris</th>
                        <th>Tahun Terbit</th>
                        <th>Jumlah Halaman</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $nomor = 1;
                foreach ($pecah as $pch): ?>
                    <tr>
                        <td><?= $nomor++; ?></td>
                        <td><?= $pch['judul_buku']; ?></td>
                        <td><?= $pch['pengarang']; ?></td>
                        <td><?= $pch['tanggal_liris']; ?></td>
                        <td><?= $pch['tahun_terbit']; ?></td>
                        <td><?= $pch['jumlah_halaman']; ?></td>
                        <td>
                            <button class="btn btn-danger btn-sm delete" id="<?= $pch['id_buku']; ?>">Hapus</button>
                            <a href="formEdit.php?id=<?= $pch['id_buku']; ?>" class="btn btn-success btn-sm">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tr align="right">
                    <td colspan="7">
                        <a href="formBook.php" class="btn btn-primary btn-sm">Add Data</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>




<?php include "templates/footer.php" ?>

<script>
     $(document).ready(function() {
        $(".delete").click(function(event) {
            let id = $(this).attr('id');
            Swal.fire({
                title: "Apakah Anda yakin menghapus data ini ?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Save",
                denyButtonText: `Don't save`
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "hapusBook.php",
                        type: "POST",
                        data: {
                            id: id,
                        },
                        success: function(response){
                            Swal.fire({
                                title: "Yeee",
                                text: response.message,
                                icon: "success"
                            }).then((result) => {
                                location.href='index.php'
                            });
                        },
                        error: function(error){
                            // console.log(error)
                        }
                    })
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
            
        event.preventDefault();
        })
    })
</script>
