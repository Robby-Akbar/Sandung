<?php

/* 
 * >_Created by robby on 18 April.
 * Time: 09:50
 * Copyright @ 2020
 *
 */
require '../../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $connect;
    $jumlah = $_POST["jumlah"];
    $nama_fasilitas = $_POST["nama_fasilitas"];
    $id_ruangan = $_POST["id_ruangan"];
    $id_gedung = $_POST["id_gedung"];
    $kapasitas = $_POST["kapasitas"];
    $des_fasilitas = $_POST["des_fasilitas"];
    
    $query = "INSERT INTO fasilitas_ruangan (jumlah, nama_fasilitas, id_ruangan, des_fasilitas) VALUES ('$jumlah','$nama_fasilitas','$id_ruangan','$des_fasilitas')";
    if (mysqli_query($connect, $query)) {
        header("Location: ../fasilitas.php?rng=$id_ruangan&kap=$kapasitas&ged=$id_gedung");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
    mysqli_close($connect);
} else {
    header('Location: ../gedung.php');
}
