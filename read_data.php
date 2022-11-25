<?php

header("Acces-Control-Allow-Origin: *");
include 'koneksi.php';

if (isset($_POST['id_akun'])) {
    $id_akun = $_POST['id_akun'];

    $sql = "SELECT * FROM akun WHERE id_akun = '$id_akun'";
    $result = mysqli_query($conn, $sql);
    $data = [];

    while ($row[] = mysqli_fetch_assoc($result)) {
        $data = $row;
    }
     echo json_encode($data);
} else {
    $data = [
        'success' => false,
        'message' => 'Please fill all the fields'
    ];

    echo json_encode($data);
}
