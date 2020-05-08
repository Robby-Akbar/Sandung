<?php

/* 
 * >_Created by robby on 15 April.
 * Time: 03:15
 * Copyright @ 2020
 *
 */
require '../../conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    if($password1 == $password2){
        createDosen();
    } else {
        echo "Your passwords did not match.";
    }
} else {
    header('Location: ../dosen.php');
}

function createDosen(){
    global $connect;
    $nama_dosen = $_POST["nama_dosen"];
    $username = $_POST["username"];
    
    $password = $_POST["password1"];
    $ciphering = "AES-128-CTR";
    $encryption_key = "SandungProject";
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption = openssl_encrypt($password, $ciphering, 
            $encryption_key, $options, $encryption_iv);
    
    $id_jurusan = $_POST["id_jurusan"];
    $id_instansi = $_POST["id_instansi"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $query = "INSERT INTO dosen (nama_dosen, username, password, id_jurusan, id_instansi, jenis_kelamin) VALUES ('$nama_dosen','$username','$encryption','$id_jurusan','$id_instansi','$jenis_kelamin')";
    if (mysqli_query($connect, $query)) {
        header('Location: ../dosen.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
    mysqli_close($connect);
}
