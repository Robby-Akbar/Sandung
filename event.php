<?php
session_start();
require 'conn.php';
global $connect;
$id_ruangan = $_GET["rng"];
$id_instansi = $_SESSION["idInstan"];
$jadwal = "SELECT booking.id_booking, booking.penanggung_jawab, booking.keterangan, booking.jam_mulai, booking.jam_berakhir, booking.tgl_penggunaan FROM booking
           INNER JOIN ruangan ON booking.id_ruangan = ruangan.id_ruangan
           INNER JOIN gedung ON ruangan.id_gedung = gedung.id_gedung WHERE gedung.id_instansi='$id_instansi' AND booking.id_ruangan='$id_ruangan' AND booking.status_booking='acc'";
$resultset = mysqli_query($connect,$jadwal);

$calendar = array();

while( $rows = mysqli_fetch_assoc($resultset) ) {	
	// convert  date to milliseconds
	$start = strtotime($rows['tgl_penggunaan']." ".$rows['jam_mulai']) * 1000;
	$end = strtotime($rows['tgl_penggunaan']." ".$rows['jam_berakhir']) * 1000;	
	$calendar[] = array(
        'id' =>$rows['id_booking'],
        'title' => $rows['keterangan']." (".$rows['penanggung_jawab'].")",
        'url' => "#",
            "class" => 'event-important',
        'start' => "$start",
        'end' => "$end"
    );
}
$calendarData = array(
    "success" => 1,	
    "result"=>$calendar);
echo json_encode($calendarData);

mysqli_close($connect);

exit;
