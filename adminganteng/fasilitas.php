<?php

/* 
 * >_Created by robby on 18 April.
 * Time: 07:43
 * Copyright @ 2020
 *
 */
require './check.php';
if(!$_GET["rng"]||!$_GET["ged"]||!$_GET["kap"]){
    header('Location: gedung.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fasilitas Ruangan - Sandung</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
    <link href="../css/my.css" rel="stylesheet">
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
        <a href="#" class="list-group-item list-group-item-action list-satu list-group-item-success active"><i class="fas fa-building"></i> Gedung</a>
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
              <a class="nav-link disabled" href="#">Fasilitas Ruangan <span class="sr-only">(current)</span></a>
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
      <div class="container-fluid" style="padding: 15px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="gedung.php">Gedung</a></li>
                <li class="breadcrumb-item"><a href="ruangan.php?ged=<?php echo $_GET["ged"]; ?>">Ruangan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Fasilitas</li>
                <li class="ml-auto">Kapasitas : <?php echo $_GET["kap"]; ?> orang</li>
            </ol>
        </nav>
        <!-- DataTales Example -->
        <div class="card shadow mb-4" style="background-color: rgb(255, 255, 255, 0.7);">
            <div class="card-header py-3 text-right" id="cardHeader">
                <h6 class="m-0 font-weight-bold">
                    <a href="#" onclick="javascript:addForm()"><i class="fas fa-plus-circle fa-sm"> Tambah Fasilitas</i></a>
                </h6>
            </div>
            <div class="card-body" id="cardBody">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Fasilitas</th>
                                <th>Jumlah Fasilitas</th>
                                <th>Deskripsi Fasilitas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php getFasilitas();?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Fasilitas</th>
                                <th>Jumlah Fasilitas</th>
                                <th>Deskripsi Fasilitas</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
	</div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
    
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Fasilitas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody">
                    <form id="addForm" action="insert/fasilitas.php" method="post">
                        <input type="hidden" name="id_ruangan" value="<?php echo $_GET["rng"]; ?>">
                        <input type="hidden" name="id_gedung" value="<?php echo $_GET["ged"]; ?>">
                        <input type="hidden" name="kapasitas" value="<?php echo $_GET["kap"]; ?>">
                        <div class="form-group">
                            <label for="namaFasilitas">Nama Fasilitas</label>
                            <input type="text" class="form-control" id="namaFasilitas" placeholder="Masukkan Nama Fasilitas.." name="nama_fasilitas" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" placeholder="Masukkan Jumlah.." name="jumlah" required>
                        </div>
                        <div class="form-group">
                            <label for="desFasilitas">Deskripsi Fasilitas (opsional)</label>
                            <textarea class="form-control" id="desFasilitas" placeholder="Masukkan Deskripsi Fasilitas.." name="des_fasilitas"></textarea>
                        </div>
                        <div class="text-right">
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
  <!-- Page level plugins -->
  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
    
    var kembali = '<a href="#" onclick="javascript:removeForm()"><i class="fas fa-arrow-left fa-sm"> Kembali</i></a>';
    var tambah, tabel, form;
    function addForm(){
        tambah = document.getElementById("cardHeader").innerHTML;
        $('#cardHeader').removeClass('text-right');
        document.getElementById("cardHeader").innerHTML = kembali;
        
        tabel = document.getElementById("cardBody").innerHTML;
        form = document.getElementById("modalBody").innerHTML;
        document.getElementById("cardBody").innerHTML = form;
    }
    function removeForm(){
        $('#cardHeader').addClass('text-right');
        document.getElementById("cardHeader").innerHTML = tambah;
        
        document.getElementById("cardBody").innerHTML = tabel;
    }
    
  </script>
</body>
</html>
<?php
function getFasilitas(){
    global $connect;
    $id_instansi = $_SESSION["idIns"];
    $id_gedung = $_GET["ged"];
    $id_ruangan = $_GET["rng"];
    $fasilitas = "SELECT fasilitas_ruangan.id_fasilitas, fasilitas_ruangan.nama_fasilitas, fasilitas_ruangan.jumlah, fasilitas_ruangan.des_fasilitas FROM fasilitas_ruangan INNER JOIN ruangan ON fasilitas_ruangan.id_ruangan = ruangan.id_ruangan
                INNER JOIN gedung ON ruangan.id_gedung = gedung.id_gedung WHERE fasilitas_ruangan.id_ruangan = '$id_ruangan' AND ruangan.id_gedung = '$id_gedung' AND gedung.id_instansi = '$id_instansi'";
    $result = mysqli_query($connect, $fasilitas);
    if ($result->num_rows > 0) {
        $no=1;
        while($row = $result->fetch_assoc()) { ?>
            <tr><th><?php echo $no++ ?></th>
                <td><?php echo $row["nama_fasilitas"] ?></td>
                <td><?php echo $row["jumlah"] ?></td>
                <td><?php echo $row["des_fasilitas"] ?></td>
                <td>
                    <a href="" class="btn btn-small text-info"><i class="fas fa-edit"></i> Ubah</a>
                    <a onclick="deleteConfirm('')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                </td></tr><?php }
    }
    mysqli_close($connect);
}
