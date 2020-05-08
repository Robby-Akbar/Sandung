<?php

/* 
 * >_Created by robby on 17 April.
 * Time: 01:52
 * Copyright @ 2020
 *
 */
require '../../conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    if($password1 == $password2){
        createAdmin();
    } else {
        echo "Your passwords did not match.";
    }
} else {
    header('Location: ../admin.php');
}

function createAdmin(){
    global $connect;
    $nama_direksi = $_POST["nama_direksi"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $jabatan = $_POST["jabatan"];
    $no_hp = $_POST["no_hp"];
    $username = $_POST["username"];
    
    $password = $_POST["password1"];
    $ciphering = "AES-128-CTR";
    $encryption_key = "SandungProject";
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption = openssl_encrypt($password, $ciphering, 
            $encryption_key, $options, $encryption_iv);
    
    $id_instansi = $_POST["id_instansi"];
    $query = "INSERT INTO direksi (nama_direksi, username, password, jenis_kelamin, jabatan, no_hp, id_instansi, type) VALUES ('$nama_direksi','$username','$encryption','$jenis_kelamin','$jabatan','$no_hp','$id_instansi','staff')";
    if (mysqli_query($connect, $query)) {
        header('Location: ../admin.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
    mysqli_close($connect);
}
