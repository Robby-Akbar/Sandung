<?php

/* 
 * >_Created by robby on 08 April.
 * Time: 03:18
 * Copyright @ 2020
 *
 */

session_start();
if($_SESSION["idIns"]){
    header('Location: adminganteng/index.php');
    exit;
}

$modal_text = "";
$type = "";

require 'conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    
    if($password1 == $password2){
        createInstansi();
    } else {
        $modal_text = "Your passwords did not match.";
    }
}

function createInstansi(){
    global $connect, $modal_text;
    $nama_instansi = $_POST["nama_instansi"];
    $alamat_instansi = $_POST["alamat_instansi"];
    $no_telp = $_POST["no_telp"];
    $logo_instansi = $_FILES['logo_instansi']['name'];
    $file_tmp = $_FILES['logo_instansi']['tmp_name'];
    $extension = pathinfo($logo_instansi, PATHINFO_EXTENSION);
    if($extension=='jpg' || $extension=='jpeg' || $extension=='png'){
        $sql = "INSERT INTO instansi_seq VALUES (NULL)";
        $last_id = 0;
        if (mysqli_query($connect, $sql)) {$last_id = mysqli_insert_id($connect);}
        $id_instansi = "i".str_pad($last_id,3,0,STR_PAD_LEFT);
        $logo_instansi = $id_instansi.$logo_instansi;
        move_uploaded_file($file_tmp, 'logo_instansi/'.$logo_instansi);
        $query = "INSERT INTO instansi (id_instansi, nama_instansi, alamat_instansi, no_telp, logo_instansi) VALUES ('$id_instansi','$nama_instansi','$alamat_instansi','$no_telp','$logo_instansi')";
        if (mysqli_query($connect, $query)) {
            createAkun($id_instansi);
        } else { $modal_text = "Error SQL: " . $query . "<br>" . mysqli_error($connect); }
    } else { $modal_text = "File is not image"; }
    mysqli_close($connect);
}

function createAkun($id_instansi){
    global $connect, $modal_text, $type;
    $nama_direksi = $_POST["nama_direksi"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $no_hp = $_POST["no_hp"];
    $jabatan = $_POST["jabatan"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password1"], PASSWORD_DEFAULT);
    $query = "INSERT INTO direksi (nama_direksi, jenis_kelamin, no_hp, jabatan, id_instansi, username, password) VALUES ('$nama_direksi','$jenis_kelamin','$no_hp','$jabatan','$id_instansi','$username','$password')";
        if (mysqli_query($connect, $query)) {
            $type = "sukses";
            $modal_text = "Akun berhasil dibuat, silahkan login!";
        } else { $modal_text = "Error: " . $query . "<br>" . mysqli_error($connect); }
    mysqli_close($connect);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Akun - Sandung</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body id="bg-satu">

<div class="container">
    <!-- The Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
              <h4 class="modal-title">
                  <?php if($type=="sukses"){
                      echo "Sukses";
                  } else { echo "Error"; }?>
              </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <?php echo $modal_text; ?>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
              <?php if($type=="sukses"){
                  echo "<button type=\"button\" class=\"btn btn-success\" onclick=\"window.location.href = 'adminganteng/login.php';\">Login</button>";
              }?>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 mb-4">Daftarkan Instansi Anda!</h1>
                                </div>
                                <form action="signup.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="namaInstansi">Nama Instansi</label>
                                        <input type="text" class="form-control" id="namaInstansi" placeholder="Masukkan Nama Instansi" name="nama_instansi">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamatInstansi">Alamat Instansi</label>
                                        <textarea class="form-control" id="alamatInstansi" placeholder="Masukkan Alamat Instansi" name="alamat_instansi"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="noTelp">No Telp</label>
                                        <input type="number" class="form-control" id="noTelp" placeholder="Masukkan Nomor Telp | contoh.622xx" name="no_telp">
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="form-control custom-file-input" id="logoInstansi" accept="image/*" name="logo_instansi" required>
                                        <label class="custom-file-label" for="logoInstansi"><small>Pilih Logo Instansi...</small></label>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="namaDireksi">Nama Direksi</label>
                                        <input type="text" class="form-control" id="namaDireksi" placeholder="Masukkan Nama Direksi" name="nama_direksi">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenisKelamin">Jenis Kelamin</label>
                                        <select id="jenisKelamin" class="custom-select" name="jenis_kelamin">
                                            <option disabled selected value>Pilih Jenis Kelamin</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="noHp">No Hp</label>
                                        <input type="number" class="form-control" id="noHp" placeholder="Masukkan Nomor Hp | contoh.628xx" name="no_hp">
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control" id="jabatan" placeholder="Masukkan Jabatan" name="jabatan">
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
                                    <button type="submit" class="btn btn-success btn-block">Daftar Akun</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a href="adminganteng/login.php">Sudah punya akun? Silahkan masuk!</a>
                                </div><br>
                                <div class="text-center">
                                    <span class="small">Copyright &copy; Sandung 2020</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    <?php
        if($modal_text != ""){
            echo "$('#myModal').modal('show');";
        }
    ?>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</body>
</html>
