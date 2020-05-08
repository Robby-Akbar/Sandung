<?php

/* 
 * >_Created by robby on 17 April.
 * Time: 05:42
 * Copyright @ 2020
 *
 */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Aktivasi - Sandung</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
</head>
<body id="bg-satu">
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" style="background-color: #6B696A;">
        <div class="sidebar-heading text-center">
            <img src="logo_instansi/<?php echo $_SESSION["logoIns"]; ?>" class="rounded-circle mx-auto d-block" alt="logo instansi" width="100" height="100">
            <small style="color: lightgrey"><?php echo date("l, d F Y") ?></small>
        </div><hr class="style-three">
      <div id="accordion" class="list-group list-group-flush" style="padding-left: 25px; padding-right: 25px;">
        <a href="#" class="list-group-item list-group-item-action list-satu list-group-item-success active"><i class="fas fa-columns"></i> Dashboard</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2D6C3B;">
          <a class="navbar-brand" href="#" id="menu-toggle">
              <img src="assets/sandung.png" alt="logo sandung" style="width:200px;">
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container-fluid" style="padding: 15px">
        <div class="card" style="background-color: rgb(240, 240, 240, 0.5); padding: 50px;">
            <h4>Halo, <?php echo $_SESSION["namaAdm"]; ?></h4>
            <p style="text-align: justify">Sandung adalah aplikasi Software as a Service (SaaS) yang memberikan layanan untuk pengelolaan peminjaman ruangan di sebuah universitas berbasis cloud. Sandung dilengkapi dengan fitur untuk menampilkan jadwal yang ada di universitas anda. Anda perlu berlangganan Sandung untuk mendapatkan pengalaman penuh dalam mengelola peminjaman ruangan di universitas anda.</p>
            <p style="text-align: justify">1. Universitas mendapatkan gratis langganan selama 3 bulan pertama, selanjutnya akan dikenakan biaya.<br> 2. Universitas dapat berlangganan Sandung untuk jangka waktu 6 (enam) bulan, atau 1 (satu) tahun.</p>
            <p style="text-align: justify">Untuk dapat berlangganan silahkan klik link berikut ini via WhatsApp <a href="<?php echo "https://wa.me/+6289666549850/?text=Halo,%20saya%20".$_SESSION["namaAdm"]."%20ingin%20berlanggan%20Sandung"; ?>">+6289666549850</a> atau Email <a href="mailto:robbyakbar@upi.edu">robbyakbar@upi.edu</a></p>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>
