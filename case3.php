<?PHP
$startTime = microtime(true);
$angka = isset($_GET["angka"]) ? $_GET["angka"] : 9;
$start = isset($_GET["start"]) ? $_GET["start"] : 5;
$kuadrat = $angka*$angka;
$a=$kuadrat-$angka;
$z = $start;
$finish = $kuadrat+$start-1;
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

echo "<table border='0' cellpadding='5'><tr>";
for ($i=0; $i<$kuadrat; $i++) {
	$y = $array[$i];
	if ($y == $start) echo "<td style='background:red; color:#FFF;'>".$y."</td>";
	else if ($y == $finish) echo "<td style='background:green; color:#FFF;'>".$y."</td>";
	else echo "<td>".$y."</td>";
	if ($i%$angka==($angka-1)) echo "</tr><tr>";
}
echo "</tr></table><p>Time:  " . number_format(( microtime(true) - $startTime), 4) . " Seconds</p>";
?>