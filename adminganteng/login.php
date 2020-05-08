<?php
/* 
 * >_Created by robby on 08 April.
 * Time: 03:11
 * Copyright @ 2020
 *
 */
session_start();
if($_SESSION["idIns"]){
    header('Location: index.php');
    exit;
}
$modal_text = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('../connect.php');
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM direksi WHERE username = :user_name";
    $statement = $conn->prepare($sql);
    $statement->execute(
        array(
            ':user_name' => $username
        )
    );
    
    $ciphering = "AES-128-CTR";
    $decryption_key = "SandungProject";
    $options = 0;
    $decryption_iv = '1234567891011121';
    
    $count = $statement->rowCount();
    if($count > 0) {
        $result = $statement->fetchAll();
        foreach($result as $row) {
            $decryption = openssl_decrypt ($row["password"], $ciphering, $decryption_key, $options, $decryption_iv);
            if(password_verify($password, $row["password"])) {
                $_SESSION["idIns"] = $row["id_instansi"];
                $_SESSION["idAdm"] = $row["id_direksi"];
                $_SESSION["namaAdm"] = $row["nama_direksi"];
                $_SESSION["typeAdm"] = $row["type"];
                header('Location: index.php');
                exit;
            } else if($decryption==$password){
                $_SESSION["idIns"] = $row["id_instansi"];
                $_SESSION["idAdm"] = $row["id_direksi"];
                $_SESSION["namaAdm"] = $row["nama_direksi"];
                $_SESSION["typeAdm"] = $row["type"];
                header('Location: index.php');
                exit;
            } else {
                $modal_text = "Password yang dimasukkan salah!";
            }
        }
    } else {
        $modal_text = "Username tidak terdaftar!";
    }
    $conn = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Admin - Sandung</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container-fluid h-100">
    <!-- The Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
              <h4 class="modal-title">Error</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <?php echo $modal_text; ?>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center h-100">
      <div class="col-sm-5 vertical-center justify-content-center" id="bg-dua">
          <table width="100%" height="100%">
              <tr height="25%" class="bg-tiga">
                  <td>
<h1 class="text-center">Selamat Datang</h1>
<h6 class="text-center"><?php echo date("l, d F Y") ?></h6>
                  </td>
              </tr>
              <tr height="75%">
                  <td>
<img class="mx-auto d-block" style="max-width: 10%; height: auto;" src="../assets/gembok.png" alt="icon gembok">
<h5 class="text-center">Silahkan Login</h5> 
<form action="login.php" class="needs-validation mx-auto d-block" style="width: 75%;" method="post" novalidate>
  <div class="form-group">
    <label for="uname">Username:</label>
    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="username" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <button type="submit" class="button btn-success mx-auto d-block">Login</button>
</form>
<hr>
<div class="text-center">
    <a class="small" href="../index.php">Kembali ke Beranda</a>
</div>
<div class="text-center">
    <a class="small" href="../signup.php">Buat Akun Baru!</a>
</div>
                  </td>
              </tr>
          </table>
      </div>
      <div class="col-sm-7 vertical-center" id="bg-satu">
        <img class="mx-auto d-block" style="max-width: 50%; height: auto;" src="../assets/sandung.png" alt="logo sandung">
      </div>
    </div>
  </div>
<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
    <?php
        if($modal_text != ""){
            echo "$('#myModal').modal('show');";
        }
    ?>
</script>
</body>
</html>
