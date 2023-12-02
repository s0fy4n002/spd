<?php
//date_default_timezone_set('Asia/Makassar');
 
$databaseHost = 'localhost';
$databaseName = 'eschedule';
$databaseUsername = 'root';
$databasePassword = '';
// date_default_timezone_set('Asia/Makassar');
 
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 


$tglhariini=date('d/m/Y');
$pesan = mysqli_query(
    $mysqli, "SELECT * FROM jadwal 
    INNER JOIN user ON jadwal.id_user = user.usr_id
    INNER JOIN shift ON jadwal.id_shift = shift.shf_id
    
     where tgl_jadwal='$tglhariini'");


$hasil="<b></b> \n\n";
while($tampilpesan = mysqli_fetch_array($pesan)) 
{
    $hasil.="<b>⚠️ Reminder ⚠️ </b> \n\n";
    $hasil.= $tampilpesan['pesan'];

    $hasil.="\nTengkyu 😊";

    $hasilku = urlencode($hasil);

    foreach ($pesan as $pesann) {
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot5887430440:AAFqbva_eROshYjtRXqiEnlScCoaZPhZh94/sendmessage?chat_id=".$pesann['chat_id']."&parse_mode=HTML&text=".$hasilku);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
    curl_exec($ch);

    echo "sukses";

    }
}

?>