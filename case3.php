<?PHP
$angka = isset($_GET["angka"]) ? $_GET["angka"] : 9;
$start = isset($_GET["start"]) ? $_GET["start"] : 5;
$kuadrat = $angka*$angka;
$a=$kuadrat-$angka;
$z = $start;
$finish = $kuadrat+$start;
$atas = 1; $bawah=0; $kanan=0; $kiri=0;
while ($z <= $finish) {
	$array[$a] = $z++;
	if ($atas == 1 && !isset($array[$a-$angka])) {
		$a -= $angka;
		if (isset($array[$a-$angka]) || $a==0 ) {$atas=0; $kanan = 1; $kiri = 1;}
	}
	else if ($bawah == 1 && !isset($array[$a+$angka])) {
		$a += $angka;
		if (isset($array[$a+$angka]) || $a>=$kuadrat-$angka) {$bawah=0; $kiri = 1; $kanan=1;}
	}
	else if ($kanan == 1 && !isset($array[$a+1]) && $a<$kuadrat-1) {
		$a += 1;
		if ($a>=$kuadrat-$angka) $atas = 1;
		else if (isset($array[$a+1])) {
			if ($a>=$kuadrat-$angka) {$kanan=0; $atas = 1;} else {$bawah = 1;}
		}
	}
	else if ($kiri == 1 && !isset($array[$a-1]) && $a<$kuadrat) {
		$a -= 1;
		if ($a>=$kuadrat-$angka) $atas = 1;
		else if (isset($array[$a-1])) $bawah = 1;
	}
}

for ($i=0; $i<$kuadrat; $i++) {
	$y = $array[$i];
	$cetak = ($y<10) ? "0".$y : $y;
	if ($y == $start) echo "<span style='background:red; color:#FFF; padding:10px'>".$cetak."</span>";
	else if ($y == $finish) echo "<span style='background:green; color:#FFF; padding:10px;'>".$cetak."</span>";
	else echo "<span style='padding:10px'>".$cetak."</span>";
	if ($i%$angka==($angka-1)) echo "<br /><br />";
}
?>