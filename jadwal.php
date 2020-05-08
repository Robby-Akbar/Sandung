<?php

/* 
 * >_Created by robby on 18 April.
 * Time: 07:36
 * Copyright @ 2020
 *
 */
session_start();
require 'conn.php';
if(!$_SESSION["idUse"]){
    header('Location: landing.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Jadwal Ruangan - Sandung</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="css/my.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/calendar.css">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  </head>
  <body id="bg-empat">
      <div class="container">
        <table height="10%" width="100%">
            <tr>
                <td valign="middle" style="padding: 15px;"><img src="assets/sandung.png" alt="logo sandung" width="250dp"></td>
                <td valign="middle" align="right" style="padding: 15px;"><a href="index.php"><img class="filter" src="assets/reply.png" alt="logo keluar" width="55dp"></a></td>
            </tr>
        </table>
          <div class="panel panel-success">
              <div class="panel-heading">
                  <div class="page-header">
                    <div class="pull-right form-inline">
                        <div class="btn-group">
                            <button class="btn btn-info" data-calendar-nav="prev"><< Sebelumnya</button>
                            <button class="btn btn-default" data-calendar-nav="today">Hari Ini</button>
                            <button class="btn btn-info" data-calendar-nav="next">Selanjutnya >></button>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-success" data-calendar-view="year">Tahun</button>
                            <button class="btn btn-success active" data-calendar-view="month">Bulan</button>
                            <button class="btn btn-success" data-calendar-view="week">Minggu</button>
                            <button class="btn btn-success" data-calendar-view="day">Hari</button>
                        </div>
                    </div>
                    <h3></h3>
                  </div>
              </div>
              <div class="panel-body">
                <h1 class="text-center">Jadwal Ruangan</h1>
                <div class="row" style="margin: 15px; padding: 25px;">
                    <div class="col-md-9">
                        <div id="showEventCalendar"></div>
                    </div>
                    <div class="col-md-3">
                        <h4>Daftar Jadwal Peminjaman</h4>
                        <ul id="eventlist" class="nav nav-list"></ul>
                    </div>
                </div>
              </div>
          </div>
      </div>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
      <script type="text/javascript">
          var target = "event.php?rng=<?php echo "r000001"; ?>";
      </script>
      <script type="text/javascript" src="js/language/id-ID.js"></script>
      <script type="text/javascript" src="js/calendar.js"></script>
      <script type="text/javascript" src="js/events.js"></script>
  </body>
</html>
