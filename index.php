<?php

/* 
 * >_Created by robby on 18 April.
 * Time: 04:35
 * Copyright @ 2020
 *
 */
session_start();
if(!$_SESSION["idUse"]){
    header('Location: landing.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dashboard - Sandung</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  </head>
  <body id="bg-empat" class="container">
      <table height="100%" width="100%">
          <tr height="10%">
              <td valign="middle" style="padding: 15px;"><img src="assets/sandung.png" alt="logo sandung" width="250dp"></td>
              <td valign="middle" align="right" style="padding: 15px;"><a href="logout.php"><img class="filter" src="assets/door.png" alt="logo keluar" width="55dp"></a></td>
          </tr>
          <tr height="90%"><td valign="top" align="center" style="color: white" colspan="2">
                  <h1>Ayo diliat-liat dulu !</h1><br>
                  <div class="row">
                      <div class="col-sm-4">
                          <a href="gedung.php" class="filter" style="color: greenyellow">
                              <img src="assets/gedung.png" alt="logo gedung" height="150dp">
                              <h2>Gedung</h2>
                          </a>
                      </div>
                      <div class="col-sm-4">
                          <a href="jadwal.php" class="filter" style="color: greenyellow">
                              <img src="assets/calendar.png" alt="logo jadwal" height="150dp">
                              <h2>Jadwal</h2>
                          </a>
                      </div>
                      <div class="col-sm-4">
                          <a href="status.php" class="filter" style="color: greenyellow">
                              <img src="assets/file.png" alt="logo status" height="150dp">
                              <h2>Status</h2>
                          </a>
                      </div>
                  </div>
          </td></tr>
      </table>      
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
  </body>
</html>
