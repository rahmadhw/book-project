<?php include "proses/proses.php"; ?>
<?php include "templates/header.php"; ?>
<?php 
$id = $_GET['id'];
$pecah = viewData("SELECT * FROM buku WHERE id_buku='$id'");


?>

<div class="container">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col">
            <h3>Edit Book</h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="editBook.php" method="POST">
                <div class="form-group">
                    <label for="judul_buku">Judul Buku</label>
                    <input type="text" class="form-control" name="judul_buku" id="judul_buku" value="<?= $pecah[0]['judul_buku']; ?>">
                </div>
                <div class="form-group">
                    <label for="pengarang">Pengarang Buku</label>
                    <input type="text" class="form-control" name="pengarang" id="pengarang" value="<?= $pecah[0]['pengarang']; ?>">
                </div>
                <div class="form-group">
                    <label for="tanggal_liris">Tanggal Liris Buku</label>
                    <input type="date" class="form-control" name="tanggal_liris" id="tanggal_liris" value="<?= $pecah[0]['tanggal_liris']; ?>">
                </div>
                <div class="form-group">
                    <label for="tahun_terbit">Tahun Terbit Buku</label>
                    <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" value="<?= $pecah[0]['tahun_terbit']; ?>">
                </div>
                <div class="form-group">
                    <label for="jumlah_halaman">Jumlah Halaman Buku</label>
                    <input type="text" class="form-control" name="jumlah_halaman" id="jumlah_halaman" value="<?= $pecah[0]['jumlah_halaman']; ?>">
                </div>
                <div class="form-group">
                    <button type="submit" id="<?= $pecah[0]['id_buku']; ?>" class="btn btn-primary btn-sm update">Save</button>
                    <a href="index.php" class="btn btn-default btn-sm">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>




<?php include "templates/footer.php" ?>
<script>
    $(document).ready(function() {
        $(".update").click(function(event) {
            let id = $(this).attr('id');
            $.ajax({
                url: "editBook.php",
                type: "POST",
                data: {
                    id: id,
                    judul_buku: $("#judul_buku").val(),
                    pengarang: $("#pengarang").val(),
                    tanggal_liris: $("#tanggal_liris").val(),
                    tahun_terbit: $("#tahun_terbit").val(),
                    jumlah_halaman: $("#jumlah_halaman").val() 
                },
                success: function(response){
                    console.log(response.message);
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
        event.preventDefault();
        })
    })
</script>
