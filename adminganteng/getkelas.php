<?php

/* 
 * >_Created by robby on 15 April.
 * Time: 06:42
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
mysqli_close($connect);
