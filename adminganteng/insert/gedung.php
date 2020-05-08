<?php

/* 
 * >_Created by robby on 10 April.
 * Time: 02:59
 * Copyright @ 2020
 *
 */
require '../../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $connect;
    $nama_gedung = $_POST["nama_gedung"];
    $id_instansi = $_POST["id_instansi"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    $jumlah_lantai = $_POST["jumlah_lantai"];
    $jumlah_ruangan = $_POST["jumlah_ruangan"];
    
    $gambar_gedung = $_FILES['gambar_gedung']['name'];
    $file_tmp = $_FILES['gambar_gedung']['tmp_name'];
    $extension = pathinfo($gambar_gedung, PATHINFO_EXTENSION);
    
    if($extension=='jpg' || $extension=='jpeg' || $extension=='png'){
        $gambar_gedung = $id_instansi.$gambar_gedung;
        move_uploaded_file($file_tmp, '../gambar_gedung/'.$gambar_gedung);
        $query = "INSERT INTO gedung (nama_gedung, id_instansi, latitude, longitude, gambar_gedung, jumlah_lantai, jumlah_ruangan) VALUES ('$nama_gedung','$id_instansi','$latitude','$longitude','$gambar_gedung','$jumlah_lantai','$jumlah_ruangan')";
        if (mysqli_query($connect, $query)) {
            header('Location: ../gedung.php');
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($connect);
        }
    } else { echo "File is not image"; }
    mysqli_close($connect);
} else {
    header('Location: ../gedung.php');
}
