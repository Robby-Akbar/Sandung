<?php

/* 
 * >_Created by robby on 09 April.
 * Time: 22:28
 * Copyright @ 2020
 *
 */
require '../../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $connect;
    $type = $_POST["type"];
    $nama_jurusan = $_POST["nama_jurusan"];
    $id_instansi = $_POST["id_instansi"];
    $des_jurusan = $_POST["des_jurusan"];
    
    $query = "INSERT INTO jurusan (type, nama_jurusan, id_instansi, des_jurusan) VALUES ('$type','$nama_jurusan','$id_instansi','$des_jurusan')";
    if (mysqli_query($connect, $query)) {
        header('Location: ../organisasi.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
    mysqli_close($connect);
} else {
    header('Location: ../organisasi.php');
}
