<?php

/* 
 * >_Created by robby on 11 April.
 * Time: 04:32
 * Copyright @ 2020
 *
 */
session_start();
require '../conn.php';
if(!$_SESSION["idIns"]){
    header('Location: login.php');
    exit;
}
if(!$_SESSION["logoIns"]){
    global $connect;
    $id_instansi = $_SESSION["idIns"];
    $query = "SELECT nama_instansi, logo_instansi, status_instansi FROM instansi WHERE instansi.id_instansi = '$id_instansi';";
    $result = mysqli_query($connect, $query);
    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $_SESSION["namaIns"] = $row["nama_instansi"];
            $_SESSION["logoIns"] = $row["logo_instansi"];
            $_SESSION["statIns"] = $row["status_instansi"];
        }
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
    mysqli_close($connect);
}
if($_SESSION["statIns"]=="tidak_aktif"){
    header('Location: ../aktivasi.php');
    exit;
}
