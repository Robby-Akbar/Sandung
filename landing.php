<?php

/* 
 * >_Created by robby on 08 April.
 * Time: 20:04
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
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Landing Page - Sandung</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  </head>
  <body id="bg-empat" class="container">
      <table height="100%">
          <tr height="50%"><td valign="middle"><img class="img-center" src="assets/sandung.png" alt="logo sandung"></td></tr>
          <tr height="50%"><td valign="top" align="center">
                  <button class="button button-satu mx-auto" onclick="window.location.href = 'login.php';">Masuk User</button><br><br>
                  <button class="button button-satu mx-auto" onclick="window.location.href = 'adminganteng/login.php';">Masuk Admin</button><br><br>
                  <button class="button button-satu mx-auto" onclick="window.location.href = 'signup.php';">Daftarkan Instansi</button>
          </td></tr>
      </table>
  </body>
</html>
