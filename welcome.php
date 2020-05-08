<?php

/* 
 * >_Created by robby on 08 April.
 * Time: 19:55
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
    <title>Welcome - Sandung</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  </head>
  <body id="bg-empat" class="container">
      <table height="100%" width="100%">
          <tr height="20%"><td valign="top" style="padding: 15px;"><img src="assets/sandung.png" alt="logo sandung" width="250dp"></td></tr>
          <tr height="80%"><td valign="top" align="center" style="color: white">
                  <h1>Selamat Datang di Sandung<br><a href="index.php" style="color: greenyellow">Ayo Jelajah !</a></h1>
                  <img id="aa" src="assets/rocket.png" alt="logo roket" width="50dp" class="bounce">
          </td></tr>
      </table>      
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script>
          $("#aa").click(function() {
              $('#aa').removeClass('bounce');
              $('#aa').addClass('rocket');
          });
      </script>
  </body>
</html>
