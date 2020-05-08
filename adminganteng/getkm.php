<?php

/* 
 * >_Created by robby on 15 April.
 * Time: 10:12
 * Copyright @ 2020
 *
 */
require '../conn.php';
global $connect;
$id_jurusan = filter_input(INPUT_GET, "jur");
$kelas = "SELECT id_kelas, nama_kelas, angkatan FROM kelas WHERE id_jurusan='$id_jurusan' ORDER BY nama_kelas";
$result = mysqli_query($connect, $kelas);
if ($result->num_rows > 0) {
    // output data of each row
    echo "<option disabled selected value=\"\">Pilih Kelas</option>";
    while($row = $result->fetch_assoc()) { ?>
        <option value="<?php echo $row["id_kelas"] ?>"><?php echo $row["nama_kelas"]." ".$row["angkatan"] ?></option>
    <?php }
} else {
    echo "<option disabled selected value>Data kelas tidak ada!</option>";
}
echo "|$|";
$matkul = "SELECT id_matkul, nama_matkul, jumlah_sks FROM mata_kuliah WHERE id_jurusan='$id_jurusan' ORDER BY nama_matkul";
$result1 = mysqli_query($connect, $matkul);
if ($result1->num_rows > 0) {
    // output data of each row
    echo "<option disabled selected value=\"\">Pilih Mata Kuliah</option>";
    while($row = $result1->fetch_assoc()) { ?>
        <option data-sks="<?php echo $row["jumlah_sks"] ?>" value="<?php echo $row["id_matkul"] ?>"><?php echo $row["nama_matkul"] ?></option>
    <?php }
} else {
    echo "<option disabled selected value>Data mata kuliah tidak ada!</option>";
}
mysqli_close($connect);
