<?php

header("Acces-Control-Allow-Origin: *");
include 'koneksi.php';

if (isset($_POST['id_akun']) && isset($_POST['nama_lengkap']) && isset($_POST['password']) && isset($_POST['no_hp']) ) {
    $id_akun = $_POST['id_akun'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $no_hp = $_POST['no_hp'];

    $checkSql = "SELECT * FROM akun WHERE id_akun = '".$id_akun."'";
    $checkResult = mysqli_query($conn, $checkSql);

    if ($checkResult->num_rows > 0) {
        $data = [
            'succes' => false,
            'message' => 'username and password already used'
        ];
        echo json_encode($data);
    }else {
      

    $sql = "INSERT INTO akun (id_akun, nama_lengkap, password, no_hp) VALUES ('$id_akun', '$nama_lengkap', '$password', '$no_hp')";

    if (mysqli_query($conn, $sql)) {
        $data = [
            'succes' => true,
            'message' => 'User Created Succesfully'
        ];
    } else {
        $data = [
            'succes' => false,
            'message' => 'User Created failed'
        ];
    }
    
    echo json_encode($data);
    }
}else {
    $data = [
        'succes' => false,
        'message' => 'Please fill all the fields'
    ];

    echo json_encode($data);
}