<?php

/* 
 * >_Created by robby on 08 April.
 * Time: 21:30
 * Copyright @ 2020
 *
 */
session_start();
if($_SESSION["idUse"]){
    header('Location: index.php');
    exit;
} else if($_SESSION["idIns"]){
    header('Location: adminganteng/index.php');
    exit;
}
$modal_text = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('connect.php');
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM user WHERE username = :user_name";
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
            if($decryption==$password){
                $_SESSION["idInstan"] = $row["id_instansi"];
                $_SESSION["idUse"] = $row["id_user"];
                $_SESSION["namaUse"] = $row["nama_user"];
                $_SESSION["stat"] = $row["status_user"];
                header('Location: welcome.php');
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
<html>
  <head>
    <meta charset="utf-8">
    <title>Login - Sandung</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  </head>
  <body id="bg-empat" class="container">
      <table height="100%" width="100%">
          <tr height="10%"><td style="padding: 15px;"><img src="assets/sandung.png" alt="logo sandung" width="250dp"></td></tr>
          <tr height="90%"><td align="center">
                  <form action="login.php" method="post">
                      <input type="text" class="button button-satu mx-auto" placeholder="Masukan Username" name="username"></br></br>
                      <input type="password" class="button button-satu mx-auto" placeholder="Masukan Password" name="password"></br></br>
                      <button class="button button-dua mx-auto" type="submit">Masuk</button>
                  </form>
          </td></tr>
      </table>
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
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script>
          <?php
            if($modal_text != ""){
                echo "$('#myModal').modal('show');";
            }?>
      </script>
  </body>
</html>
