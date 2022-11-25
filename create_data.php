<?php

header("Acces-Control-Allow-Origin: *");
include 'koneksi.php';

if (isset($_POST['id_akun']) && isset($_POST['nama_lengkap']) && isset($_POST['password']) && isset($_POST['no_hp'])) {
    $id_akun = $_POST['id_akun'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $no_hp = $_POST['no_hp'];

    $sql = "INSERT INTO akun (id_akun, nama_lengkap, password, no_hp) VALUES ('$id_akun', '$nama_lengkap', '$password', '$no_hp')";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        $data = [
            'success' => true,
            'message' => 'Add account succesful'
        ];
    } else {
        $data = [
            'success' => false,
            'message' => 'Add account failed'
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
