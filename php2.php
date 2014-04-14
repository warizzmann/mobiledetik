<?php
include 'ui.php';
head('lihatdata');
if ($_SERVER['REQUEST_METHOD']=='GET') {
function grabbing($url){
     $data = curl_init();
     curl_setopt($data, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($data, CURLOPT_URL, $url);
     $output = curl_exec($data);
     curl_close($data);
     return $output;
}
$id = $_GET['id'];
$ambilhtml = grabbing($id);
if (!($ambilhtml)){
header('Refresh: 1');
}

$pecah1 = explode('<title>',$ambilhtml,2);
//var_dump($pecah1);
$text = $pecah1[1];

//judul berita
$isiberita_awal = strpos($text, '<h1 class="');// strpos mengetahui posisi suatu karakter
$isiberita_akhir = strpos(substr($text, $isiberita_awal), '<div class="clearfix">');

//gambar
$text2 = substr($text, $isiberita_awal);
//isi
$isi_awal = strpos($text2, '</a></div></div>');
$isi_akhir = strpos(substr($text2, $isi_awal), '<div class="articleshare2">');
echo substr($text2, $isi_awal,$isi_akhir);
}
?>