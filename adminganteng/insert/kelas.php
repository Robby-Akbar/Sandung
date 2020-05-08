<?php

/* 
 * >_Created by robby on 15 April.
 * Time: 06:12
 * Copyright @ 2020
 *
 */
require '../../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $connect;
    $nama_kelas = $_POST["nama_kelas"];
    $angkatan = $_POST["angkatan"];
    $id_jurusan = $_POST["id_jurusan"];
    
    $query = "INSERT INTO kelas (nama_kelas, angkatan, id_jurusan) VALUES ('$nama_kelas','$angkatan','$id_jurusan')";
    if (mysqli_query($connect, $query)) {
        header('Location: ../kelas.php');
    } else {
        echo "Error SQL: " . $query . "<br>" . mysqli_error($connect);
    }
    mysqli_close($connect);
} else {
    header('Location: ../kelas.php');
}
