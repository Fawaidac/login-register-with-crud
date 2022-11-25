<?php

header("Acces-Control-Allow-Origin: *");
include 'koneksi.php';

if (isset($_POST['id_akun']) && isset($_POST['password'])) {
    $id_akun = $_POST['id_akun'];
    $password = $_POST['password'];

    $checkSql = "SELECT * FROM akun WHERE id_akun = '$id_akun'";
    $checkResult = mysqli_query($conn, $checkSql);

    if ($checkResult->num_rows > 0) {
        $row = $checkResult->fetch_assoc();
        
        if (password_verify($password, $row['password']) ) {
            $data = [
                'succes' => true,
                'message' => 'Login Succesfully',
                'akun' => $row
            ];
        } else {
            $data = [
                'succes' => false,
                'message' => 'Invalid Password'
            ];
        }
        
    } else {
        $data = [
            'succes' => false,
            'message' => 'Invalid id_akun'
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

