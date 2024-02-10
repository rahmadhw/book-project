<?php 


function koneksi() {
    return mysqli_connect("localhost", "root", "", "book");
}


function valiData() {

}

function viewData($sql) {
    $conn = koneksi();
    $select = $sql;
    $result = $conn->query($select);
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}



?>