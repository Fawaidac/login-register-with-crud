<?php

header("Acces-Control-Allow-Origin: *");
include 'koneksi.php';

if (isset($_POST['id_akun'])) {
    $id_akun = $_POST['id_akun'];

    $sql = "DELETE FROM akun WHERE id_akun = '$id_akun'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $data = [
            'success' => true,
            'message' => 'Delete account succesful'
        ];
    } else {
        $data = [
            'success' => false,
            'message' => 'Delete account failed'
        ];
    }

     echo json_encode($data);
} else {
    $data = [
        'success' => false,
        'message' => 'Please fill all the fields'
    ];

    echo json_encode($data);
}
