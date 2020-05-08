<?php

/* 
 * >_Created by robby on 12 April.
 * Time: 11:07
 * Copyright @ 2020
 *
 */
require '../../conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    if($password1 == $password2){
        createAkun();
    } else {
        echo "Your passwords did not match.";
    }
} else {
    header('Location: ../user.php');
}

function createAkun(){
    global $connect;
    $id_kelas = $_POST["id_kelas"];
    $nama_user = $_POST["nama_user"];
    $username = $_POST["username"];
    
    $password = $_POST["password1"];
    $ciphering = "AES-128-CTR";
    $encryption_key = "SandungProject";
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption = openssl_encrypt($password, $ciphering, 
            $encryption_key, $options, $encryption_iv);
    
    $id_instansi = $_POST["id_instansi"];
    $query = "INSERT INTO user (nama_user, username, password, id_kelas, id_instansi) VALUES ('$nama_user','$username','$encryption','$id_kelas','$id_instansi')";
    if (mysqli_query($connect, $query)) {
        header('Location: ../user.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
    mysqli_close($connect);
}
