<?php
//date_default_timezone_set('Asia/Makassar');
 
$databaseHost = 'localhost';
$databaseName = 'eschedule';
$databaseUsername = 'root';
$databasePassword = '';
// date_default_timezone_set('Asia/Makassar');
 
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 


$tglhariini=date('Y-m-d');


$pesan = mysqli_query($mysqli, "SELECT * FROM jadwal 
    INNER JOIN user ON user.usr_id  = jadwal.id_user
    INNER JOIN shift ON shift.shf_id  =  jadwal.id_shift

    where tgl_jadwal='$tglhariini' and user.unit='Store' and shift.shf_id=1");


$hasil="<b></b> \n\n";
while($tampilpesan = mysqli_fetch_array($pesan)) 
{
    $hasil.="<b>⚠️ Reminder ⚠️ </b> \n\n";

    $hasil.= $tampilpesan['pesan'];

    $hasil.="\nTengkyu 😊";

    $hasilku = urlencode($hasil);
	
	
    $loginpassw = 'Hadi-Darma:hdarma171018';
    $proxy_ip = 'proxy03.sat.co.id';
    $proxy_port = '8080';

    foreach ($pesan as $pesann) {
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot5887430440:AAFqbva_eROshYjtRXqiEnlScCoaZPhZh94/sendmessage?chat_id=".$pesann['chat_id']."&parse_mode=HTML&text=".$hasilku);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
    curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
    curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
    curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $loginpassw);

    curl_exec($ch);

    echo "sukses";

    }
}

?>
<script>
    // Powered by Quotable
// https://github.com/lukePeavey/quotable

document.addEventListener("DOMContentLoaded", () => {
  // DOM elements
  const button = document.querySelector("button");
  const quote = document.querySelector("blockquote p");
  const cite = document.querySelector("blockquote cite");

  async function updateQuote() {
    // Fetch a random quote from the Quotable API
    const response = await fetch("https://api.quotable.io/random");
    const data = await response.json();
    if (response.ok) {
      // Update DOM elements
      quote.textContent = data.content;
      cite.textContent = data.author;
    } else {
      quote.textContent = "An error occured";
      console.log(data);
    }
  }

  // Attach an event listener to the `button`
  button.addEventListener("click", updateQuote);

  // call updateQuote once when page loads
  updateQuote();
});

</script>

