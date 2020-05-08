<?php

/* 
 * >_Created by robby on 15 April.
 * Time: 07:31
 * Copyright @ 2020
 *
 */
require '../../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $connect;
    $jam_mulai = $_POST["jam_mulai"];
    $jam_selesai = $_POST["jam_selesai"];
    $id_ruangan = $_POST["id_ruangan"];
    $id_matkul = $_POST["id_matkul"];
    $id_kelas = $_POST["id_kelas"];
    $hari = $_POST["hari"];
    
    $query = "INSERT INTO jadwal (jam_mulai, jam_selesai, id_ruangan, id_matkul, id_kelas, hari) VALUES ('$jam_mulai','$jam_selesai','$id_ruangan','$id_matkul','$id_kelas','$hari')";
    if (mysqli_query($connect, $query)) {
        header('Location: ../jadwal_kuliah.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
    mysqli_close($connect);
} else {
    header('Location: ../jadwal_kuliah.php');
}
