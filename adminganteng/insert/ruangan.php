<?php

/* 
 * >_Created by robby on 12 April.
 * Time: 02:33
 * Copyright @ 2020
 *
 */
require '../../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $connect;
    $nama_ruangan = $_POST["nama_ruangan"];
    $id_gedung = $_POST["id_gedung"];
    $kapasitas = $_POST["kapasitas"];
    $lantai_ke = $_POST["lantai_ke"];
    
    $gambar_ruangan = $_FILES['gambar_ruangan']['name'];
    $file_tmp = $_FILES['gambar_ruangan']['tmp_name'];
    $extension = pathinfo($gambar_ruangan, PATHINFO_EXTENSION);
    
    if($extension=='jpg' || $extension=='jpeg' || $extension=='png'){
        $gambar_ruangan = $id_gedung.$gambar_ruangan;
        move_uploaded_file($file_tmp, '../gambar_ruangan/'.$gambar_ruangan);
        $query = "INSERT INTO ruangan (nama_ruangan, id_gedung, kapasitas, gambar_ruangan, lantai_ke) VALUES ('$nama_ruangan','$id_gedung','$kapasitas','$gambar_ruangan','$lantai_ke')";
        if (mysqli_query($connect, $query)) {
            header("Location: ../ruangan.php?ged=$id_gedung");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($connect);
        }
    } else { echo "File is not image"; }
    mysqli_close($connect);
} else {
    header('Location: ../gedung.php');
}
