<?php

/* 
 * >_Created by robby on 15 April.
 * Time: 10:51
 * Copyright @ 2020
 *
 */
require '../conn.php';
global $connect;
$id_gedung = filter_input(INPUT_GET, "ged");
$ruangan = "SELECT id_ruangan, nama_ruangan FROM ruangan WHERE id_gedung='$id_gedung' ORDER BY nama_ruangan";
$result = mysqli_query($connect, $ruangan);
if ($result->num_rows > 0) {
    // output data of each row
    echo "<option disabled selected value=\"\">Pilih Ruangan</option>";
    while($row = $result->fetch_assoc()) { ?>
        <option value="<?php echo $row["id_ruangan"] ?>"><?php echo $row["nama_ruangan"] ?></option>
    <?php }
} else {
    echo "<option disabled selected value>Data ruangan tidak ada!</option>";
}
mysqli_close($connect);
