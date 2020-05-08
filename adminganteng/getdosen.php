<?php

/* 
 * >_Created by robby on 15 April.
 * Time: 04:00
 * Copyright @ 2020
 *
 */
session_start();
require '../conn.php';
global $connect;
$id_instansi = $_SESSION["idIns"];
$id_jurusan = filter_input(INPUT_GET, "jur");
$dosen = "SELECT id_dosen, nama_dosen FROM dosen WHERE id_instansi='$id_instansi' AND id_jurusan='$id_jurusan' ORDER BY nama_dosen";
$result = mysqli_query($connect, $dosen);
if ($result->num_rows > 0) {
    // output data of each row
    echo "<option disabled selected value=\"\">Pilih Dosen</option>";
    while($row = $result->fetch_assoc()) { ?>
        <option value="<?php echo $row["id_dosen"] ?>"><?php echo $row["nama_dosen"] ?></option>
    <?php }
} else {
    echo "<option disabled selected value>Data dosen tidak ada!</option>";
}
mysqli_close($connect);
