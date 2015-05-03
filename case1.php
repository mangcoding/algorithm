<?PHP
$angka = isset($_GET["angka"]) ? $_GET["angka"] : 7;
$kuadrat = $angka*$angka;
$a=$kuadrat-$angka;
$z = 1;
$keatas = 1;
while ($z <= $kuadrat) {
	$array[$a] = $z++;
	if ($keatas == 1 && !isset($array[$a-$angka])) {
		$a -= $angka;
		if (isset($array[$a-$angka]) || $a==0 ) {$keatas=0; $kekanan = 1;}
	}
	else if ($kekanan == 1 && !isset($array[$a+1])) {
		$a += 1;
		if (isset($array[$a+1])) {$kekanan=0; $kebawah = 1;}
	}
	else if ($kebawah == 1 && !isset($array[$a+$angka])) {
		$a += $angka;
		if (isset($array[$a+$angka]) || $a==$kuadrat-1) {$kebawah=0; $kekiri = 1;}
	}
	else if ($kekiri == 1 && !isset($array[$a-1])) {
		$a -= 1;
		if (isset($array[$a-1])) {$kekiri=0; $keatas = 1;}
	}
}
	
for ($i=0; $i<$kuadrat; $i++) {
	$cetak = ($array[$i]<10) ? "0".$array[$i] : $array[$i];
	echo $cetak." ";
	if ($i%$angka==($angka-1)) echo "\n\n";
}
?>