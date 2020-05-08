<?php
require '../conn.php';
global $connect;
$query = "SELECT jadwal.id_jadwal, jadwal.hari, jadwal.jam_mulai, jadwal.jam_selesai, mata_kuliah.nama_matkul FROM jadwal INNER JOIN mata_kuliah ON jadwal.id_matkul = mata_kuliah.id_matkul INNER JOIN ruangan ON jadwal.id_ruangan = ruangan.id_ruangan INNER JOIN gedung ON ruangan.id_gedung = gedung.id_gedung WHERE gedung.id_instansi='i001' AND jadwal.hari='rabu' AND ruangan.id_ruangan='r000001' ORDER BY jadwal.jam_mulai";
$resultset = mysqli_query($connect,$query);

$calendar = array();

while( $rows = mysqli_fetch_assoc($resultset) ) {	
	// convert  date to milliseconds
	$start = strtotime($rows['jam_mulai']) * 1000;
	$end = strtotime($rows['jam_selesai']) * 1000;	
	$calendar[] = array(
        'id' =>$rows['id_jadwal'],
        'title' => $rows['nama_matkul'],
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
