<?php

header("Acces-Control-Allow-Origin: *");
include 'koneksi.php';

if (isset($_POST['id_akun']) && isset($_POST['nama_lengkap']) && isset($_POST['password']) && isset($_POST['no_hp'])) {
    $id_akun = $_POST['id_akun'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $no_hp = $_POST['no_hp'];

    $sql = "UPDATE akun SET nama_lengkap = '$nama_lengkap' , password = '$password' , no_hp = '$no_hp' WHERE id_akun = '$id_akun'";

    $result = mysqli_query($conn,$sql);
    if ($result) {
        $data = [
            'success' => true,
            'message' => 'Edit account succesful'
        ];
    } else {
        $data = [
            'success' => false,
            'message' => 'Edit account failed'
        ];
    }
    echo json_encode($data);
} else {
    $data = [
        'succes' => false,
        'message' => 'Please fill all the fields'
    ];

    echo json_encode($data);
}
