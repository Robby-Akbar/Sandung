<?php

/* 
 * >_Created by robby on 15 April.
 * Time: 02:50
 * Copyright @ 2020
 *
 */
require './check.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Dosen - Sandung</title>
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
          <a class="list-group-item list-group-item-action list-satu list-group-item-success active" data-toggle="collapse" href="#collapseOne">
            <i class="fas fa-book-reader"></i> Akademik
          </a>
          <div id="collapseOne" class="collapse" data-parent="#accordion" style="width: 80%; margin: auto;">
            <div class="list-group">
                <a href="organisasi.php" class="list-group-item list-group-item-action list-dua">Organisasi</a>
                <a href="#" class="list-group-item list-group-item-action list-dua list-group-item-success active">Dosen</a>
                <a href="matkul.php" class="list-group-item list-group-item-action list-dua">Mata Kuliah</a>
                <a href="kelas.php" class="list-group-item list-group-item-action list-dua">Kelas</a>
            </div>
          </div>
        </div>
        <a href="gedung.php" class="list-group-item list-group-item-action list-satu"><i class="fas fa-building"></i> Gedung</a>
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
              <a class="nav-link disabled" href="#">Daftar Dosen <span class="sr-only">(current)</span></a>
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
                <li class="breadcrumb-item"><a href="#">Akademik</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dosen</li>
            </ol>
        </nav>
        <!-- DataTales Example -->
        <div class="card shadow mb-4" style="background-color: rgb(255, 255, 255, 0.7);">
            <div class="card-header py-3 text-right" id="cardHeader">
                <h6 class="m-0 font-weight-bold">
                    <a href="#" onclick="javascript:addForm()"><i class="fas fa-plus-circle fa-sm"> Tambah Dosen</i></a>
                </h6>
            </div>
            <div class="card-body" id="cardBody">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Dosen</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Jurusan</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php getDosen();?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Dosen</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Jurusan</th>
                                <th>Jenis Kelamin</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dosen</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody">
                    <form id="addForm" action="insert/dosen.php" method="post">
                        <input type="hidden" name="id_instansi" value="<?php echo $_SESSION["idIns"]; ?>">
                        <div class="form-group">
                            <label for="namaDosen">Nama Dosen</label>
                            <input type="text" class="form-control" id="namaDosen" placeholder="Masukkan Nama Dosen.." name="nama_dosen" required>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="custom-select" id="jurusan" name="id_jurusan" required>
                                <?php getJurusan() ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenisKelamin">Jenis Kelamin</label>
                            <select id="jenisKelamin" class="custom-select" name="jenis_kelamin">
                                <option disabled selected value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="userName">Username</label>
                            <input type="text" class="form-control" id="userName" placeholder="Masukkan Username" name="username">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="passwordSatu">Password</label>
                                <input type="password" class="form-control" id="passwordSatu" placeholder="Masukkan Password" name="password1">
                            </div>
                            <div class="col-sm-6">
                                <label for="passwordDua">Password (lagi)</label>
                                <input type="password" class="form-control" id="passwordDua" placeholder="Ulangi Masukkan Password" name="password2">
                            </div>
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
function getJurusan(){
    global $connect;
    $id_instansi = $_SESSION["idIns"];
    $jurusan = "SELECT id_jurusan, nama_jurusan FROM jurusan WHERE id_instansi='$id_instansi' AND type='jurusan' ORDER BY nama_jurusan";
    $result = mysqli_query($connect, $jurusan);

    if ($result->num_rows > 0) {
        // output data of each row
        echo "<option disabled selected value=\"\">Pilih Jurusan</option>";
        while($row = $result->fetch_assoc()) { ?>
            <option value="<?php echo $row["id_jurusan"] ?>"><?php echo $row["nama_jurusan"] ?></option>
        <?php }
    } else {
        echo "<option disabled selected value>Data jurusan tidak ada!</option>";
    }
    mysqli_close($connect);
}
function getDosen(){
    global $connect;
    $id_instansi = $_SESSION["idIns"];
    $dosen = "SELECT dosen.nama_dosen, dosen.username, dosen.password, dosen.jenis_kelamin, jurusan.nama_jurusan FROM dosen INNER JOIN jurusan ON dosen.id_jurusan = jurusan.id_jurusan WHERE dosen.id_instansi='$id_instansi'";
    $result = mysqli_query($connect, $dosen);
    if ($result->num_rows > 0) { $no=1;
        $ciphering = "AES-128-CTR";
        $decryption_key = "SandungProject";
        $options = 0;
        $decryption_iv = '1234567891011121';
        while($row = $result->fetch_assoc()) { ?>
            <tr>
                <th><?php echo $no++ ?></th>
                <td><?php echo $row["nama_dosen"] ?></td>
                <td><?php echo $row["username"] ?></td>
                <td><?php
                    $password = $row["password"];
                    //$decryption = openssl_decrypt ($password, $ciphering, $decryption_key, $options, $decryption_iv);
                    echo $password;  
                ?></td>
                <td><?php echo $row["nama_jurusan"] ?></td>
                <td><?php
                    if($row["jenis_kelamin"]=="L") echo "Laki-laki";
                    else if($row["jenis_kelamin"]=="P") echo "Perempuan";
                ?></td>
                <td><a href="" class="btn btn-small text-info"><i class="fas fa-edit"></i> Ubah</a>
                <a onclick="deleteConfirm('')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a></td>
            </tr>
        <?php }
    }
}
