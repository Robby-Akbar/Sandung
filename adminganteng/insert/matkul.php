<?php

/* 
 * >_Created by robby on 31 March.
 * Time: 19:23
 * Copyright @ 2020
 *
 */
require '../../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $connect;
    $nama_matkul = $_POST["nama_matkul"];
    $id_jurusan = $_POST["id_jurusan"];
    $id_dosen = $_POST["id_dosen"];
    $jumlah_sks = $_POST["jumlah_sks"];
    
    $query = "INSERT INTO mata_kuliah (nama_matkul, id_jurusan, id_dosen, jumlah_sks) VALUES ('$nama_matkul','$id_jurusan','$id_dosen','$jumlah_sks')";
    if (mysqli_query($connect, $query)) {
        header('Location: ../matkul.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
    mysqli_close($connect);
} else {
    header('Location: ../matkul.php');
}
