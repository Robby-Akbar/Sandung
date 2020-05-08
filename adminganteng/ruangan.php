<?php

/* 
 * >_Created by robby on 11 April.
 * Time: 04:17
 * Copyright @ 2020
 *
 */
require './check.php';
if(!$_GET["ged"]){
    header('Location: gedung.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Ruangan - Sandung</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
    <link href="../css/my.css" rel="stylesheet">
</head>
<body id="bg-satu">
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" style="background-color: #6B696A;">
        <div class="sidebar-heading text-center">
            <img src="../logo_instansi/<?php echo $_SESSION["logoIns"]; ?>" class="rounded-circle mx-auto d-block" alt="logo instansi" width="100" height="100">
            <small style="color: lightgrey"><?php echo date("l, d F Y") ?></small>
        </div><hr class="style-three">
      <div id="accordion" class="list-group list-group-flush" style="padding-left: 25px; padding-right: 25px;">
        <a href="index.php" class="list-group-item list-group-item-action list-satu"><i class="fas fa-columns"></i> Dashboard</a>
        <div>
          <a class="list-group-item list-group-item-action list-satu" data-toggle="collapse" href="#collapseOne">
            <i class="fas fa-book-reader"></i> Akademik
          </a>
          <div id="collapseOne" class="collapse" data-parent="#accordion" style="width: 80%; margin: auto;">
            <div class="list-group">
                <a href="organisasi.php" class="list-group-item list-group-item-action list-dua">Organisasi</a>
                <a href="dosen.php" class="list-group-item list-group-item-action list-dua">Dosen</a>
                <a href="matkul.php" class="list-group-item list-group-item-action list-dua">Mata Kuliah</a>
                <a href="kelas.php" class="list-group-item list-group-item-action list-dua">Kelas</a>
            </div>
          </div>
        </div>
        <a href="gedung.php" class="list-group-item list-group-item-action list-satu list-group-item-success active"><i class="fas fa-building"></i> Gedung</a>
        <div>
          <a class="list-group-item list-group-item-action list-satu" data-toggle="collapse" href="#collapseTwo">
            <i class="fas fa-calendar-check"></i> Jadwal
          </a>
          <div id="collapseTwo" class="collapse" data-parent="#accordion" style="width: 80%; margin: auto;">
            <div class="list-group">
                <a href="jadwal_kuliah.php" class="list-group-item list-group-item-action list-dua">Kuliah</a>
                <a href="ruangan_kosong.php" class="list-group-item list-group-item-action list-dua">Ruangan Kosong</a>
            </div>
          </div>
        </div>
        <div>
          <a class="list-group-item list-group-item-action list-satu" data-toggle="collapse" href="#collapseThree">
            <i class="fas fa-user-friends"></i> Kelola Akun
          </a>
          <div id="collapseThree" class="collapse" data-parent="#accordion" style="width: 80%; margin: auto;">
            <div class="list-group">
                <a href="user.php" class="list-group-item list-group-item-action list-dua">User</a>
                <a href="admin.php" class="list-group-item list-group-item-action list-dua">Admin</a>
            </div>
          </div>
        </div>
        <a href="booking.php" class="list-group-item list-group-item-action list-satu"><i class="fas fa-exchange-alt"></i> Booking</a>
        <a href="laporan.php" class="list-group-item list-group-item-action list-satu"><i class="fas fa-file-alt"></i> Laporan</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2D6C3B;">
          <a class="navbar-brand" href="#" id="menu-toggle">
              <img src="../assets/sandung.png" alt="logo sandung" style="width:200px;">
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link disabled" href="#">Daftar Ruangan <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active"><a class="nav-link disabled"><i class="fas fa-desktop"></i></a></li>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Selamat datang, <?php echo $_SESSION["namaAdm"]; ?>
              </a>
              <div class="dropdown-menu">
                  <a class="dropdown-item" href="profile.php"><i class="fas fa-user-circle"></i> Profile</a>
                  <a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container-fluid" style="padding: 15px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="gedung.php">Gedung</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ruangan</li>
                <li class="ml-auto"><a href="#" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus-circle fa-sm"> Tambah Ruangan</i></a></li>
            </ol>
        </nav>
        <div class="row justify-content-center example-1 scrollbar-deep-purple bordered-deep-purple thin" style="background-color: rgb(240, 240, 240, 0.5); margin: 15px; padding: 25px;">
            <?php getRuangan(); ?>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
    
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Ruangan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="myForm" id="addForm" action="insert/ruangan.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                        <input type="hidden" name="id_gedung" value="<?php echo $_GET["ged"]; ?>">
                        <div class="form-group">
                            <label for="namaRuangan">Nama Ruangan</label>
                            <input type="text" class="form-control" id="namaRuangan" placeholder="Masukkan Nama Ruangan.." name="nama_ruangan" required>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for=kapasitasRuangan"">Kapasitas Ruangan</label>
                                <input type="number" class="form-control" id="kapasitasRuangan" placeholder="xx orang.." name="kapasitas">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for=posisiRuangan"">Letak Ruangan</label>
                                <input type="number" class="form-control" id="posisiRuangan" placeholder="Lantai ke-x.." name="lantai_ke">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="form-control custom-file-input" id="gambarRuangan" accept="image/*" name="gambar_ruangan" required>
                                <label class="custom-file-label" for="gambarRuangan"><small>Foto Ruangan...</small></label>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary ml-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  <!-- /#wrapper -->
  <!-- Bootstrap core JavaScript -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    function validateForm() {
        /*var lantai_ke = document.forms["myForm"]["lantai_ke"].value;
        if (lantai_ke><?php //echo $_POST["jumlah_lantai"]; ?>) {
            alert("Name must be filled out");
            return false;
        } else if (){
            return false;
        }*/
    }
  </script>
</body>
</html>
<?php
function getRuangan(){
    global $connect;
    $id_instansi = $_SESSION["idIns"];
    $id_gedung = $_GET["ged"];
    $ruangan = "SELECT ruangan.id_ruangan, ruangan.nama_ruangan, ruangan.gambar_ruangan, ruangan.lantai_ke, ruangan.kapasitas FROM ruangan
                INNER JOIN gedung ON ruangan.id_gedung = gedung.id_gedung WHERE ruangan.id_gedung = '$id_gedung' AND gedung.id_instansi = '$id_instansi'";
    $result = mysqli_query($connect, $ruangan);
    if ($result->num_rows > 0) {
        $no=1;
        while($row = $result->fetch_assoc()) { ?>
            <div class="col-auto mb-3">
                <div class="card border-success" style="width: 18rem; border-radius: 65px 65px 0px 0px; background: transparent">
                    <img src="../gambar_ruangan/<?php echo $row["gambar_ruangan"]; ?>" class="card-img-top" alt="gambar gedung" style="border-radius: 65px 65px 0px 0px;object-fit: cover;width: auto;height: 200px;">
                    <div style="position: absolute; background-color: rgb(255, 255, 255, 0.9); text-align: center; padding: 10px 0; font-size: 20px; color: darkblue; width: 50px; height: 50px">
                        <?php echo $no++ ?>
                    </div>
                    <div class="card-footer text-center">
                        <h5 class="card-title text-muted">
                            <form method="get" action="fasilitas.php" class="inline">
                                <input type="hidden" name="rng" value="<?php echo $row["id_ruangan"]; ?>">
                                <input type="hidden" name="kap" value="<?php echo $row["kapasitas"]; ?>">
                                <input type="hidden" name="ged" value="<?php echo $id_gedung; ?>">
                                <button type="submit" class="link-button"><?php echo $row["nama_ruangan"]; ?></button>
                            <br><small>Lantai Ke-<?php echo $row["lantai_ke"]; ?></small>
                            </form>
                        </h5>
                        <a href="" class="btn btn-small text-info"><i class="fas fa-edit"></i> Ubah</a>
                        <a onclick="deleteConfirm('')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </div>
                </div>
            </div>
        <?php }
    } else { echo "Belum ada data Ruangan!"; }
    mysqli_close($connect);
}