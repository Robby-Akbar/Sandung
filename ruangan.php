<?php

/* 
 * >_Created by robby on 18 April.
 * Time: 07:15
 * Copyright @ 2020
 *
 */
session_start();
require 'conn.php';
if(!$_SESSION["idUse"]){
    header('Location: landing.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Daftar Ruangan - Sandung</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="css/my.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  </head>
  <body id="bg-empat" class="container">
      <table height="100%" width="100%">
          <tr height="10%">
              <td valign="middle" style="padding: 15px;"><img src="assets/sandung.png" alt="logo sandung" width="250dp"></td>
              <td valign="middle" align="right" style="padding: 15px;"><a href="gedung.php"><img class="filter" src="assets/reply.png" alt="logo keluar" width="55dp"></a></td>
          </tr>
          <tr height="90%"><td valign="top" align="center" style="color: white" colspan="2">
                  <h1>Ruangan</h1><br>
                  <div class="row justify-content-center example-1 scrollbar-deep-purple bordered-deep-purple thin" style="background-color: rgb(240, 240, 240, 0.5); margin: 15px; padding: 25px;">
                      <?php getRuangan(); ?>
                  </div>
          </td></tr>
      </table>     
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
function getRuangan(){
    global $connect;
    $id_instansi = $_SESSION["idInstan"];
    $id_gedung = $_GET["ged"];
    $ruangan = "SELECT ruangan.id_ruangan, ruangan.nama_ruangan, ruangan.gambar_ruangan FROM ruangan
                INNER JOIN gedung ON ruangan.id_gedung = gedung.id_gedung WHERE ruangan.id_gedung = '$id_gedung' AND gedung.id_instansi = '$id_instansi'";
    $result = mysqli_query($connect, $ruangan);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { ?>
            <div class="col-auto mb-3">
                <div class="card border-success" style="width: 18rem; border-radius: 25px 25px 25px 25px; background: transparent">
                    <img src="gambar_ruangan/<?php echo $row["gambar_ruangan"]; ?>" class="card-img-top" alt="gambar gedung" style="border-radius: 25px 25px 25px 25px;object-fit: cover;width: auto;height: 200px;">
                </div>
                <form method="get" action="#" style="margin-top: 10px;">
                    <input type="hidden" name="ged" value="<?php echo $row["id_ruangan"]; ?>">
                    <button type="submit" class="btn btn-success"><?php echo $row["nama_ruangan"]; ?></button>
                </form>
            </div>
        <?php }
    } else { echo "Belum ada data Ruangan!"; }
    mysqli_close($connect);
}