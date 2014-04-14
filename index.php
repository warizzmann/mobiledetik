<?php
	include 'ui.php';
	head('berita');
	function grabbing1($url){
		$data = curl_init();
		curl_setopt($data, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($data, CURLOPT_URL, $url);
		$output = curl_exec($data);
		curl_close($data);
		return $output;
	}
	//headline kompas
	$ambilhtml =  grabbing1('http://www.detik.com/');
	$pecah1 = explode('<ul id="beritautama">', $ambilhtml);
	$pecah2 = explode('</ul>', $pecah1[1]);//memisahkan sebuah String menjadi elemet -element array***
	$pecah3 = explode('</li>', $pecah2[0]);
	if (!($ambilhtml)){
		header('Refresh: 1');
	}
?>
	<div class="content-primary">	    
	<ul data-role="listview" data-filter="true" data-filter-placeholder="masukan nama " data-inset="true" >
<?php
			$i=-1;
			foreach ($pecah3 as $value) {
				$i=$i+1;
					$text = $pecah3[$i];
					//ambil alamat
					$alamat_awal = strpos($text, 'href="');
					$alamat_akhir = strpos(substr($text, $alamat_awal), '" onClick');
					$alamat=substr($text, $alamat_awal+6,$alamat_akhir-10);
					$cek=substr($alamat, 5,20);
					if ((!(strpos($cek, 'entertainment'))) 
					and (!(strpos($cek, 'indonesiasatu'))) 
					and (!(strpos($cek, 'bola')))
					and (!(strpos($cek, 'tekno')))){
						
						if ($alamat_awal){//jika alamat tidak ada maka tidak di cetak
?>
						<li><a href="php2.php?id=<?php echo $alamat?>">
							
						</a></li>
<?php
					}
				}
			}

?>
		</ul>
	</div>