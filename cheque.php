<?php
	// Cheque php version 1.0
	//$chiffreInput = 5;
if (isset($_REQUEST['convertir'])){	
	$chiffreInput = $_REQUEST['chiffre'];
	if ($chiffreInput == 0) 
		print 'zero';
	if ($chiffreInput <20)
		print de_1_a_19($chiffreInput);
	if ($chiffreInput>19 && $chiffreInput <100)
		print de_20_a_99($chiffreInput);
	if ($chiffreInput>99 && $chiffreInput < 1000)
		print centaines($chiffreInput);
	if ($chiffreInput>999 && $chiffreInput < 1000000)
		print mille($chiffreInput);
	if ($chiffreInput>999999 && $chiffreInput < 1000000000)
		print million($chiffreInput);
}

	function de_1_a_19($chiffre){
		switch($chiffre):
			case 1 : return 'un';break;
			case 2 : return 'deux';break;
			case 3 : return 'trois';break;
			case 4 : return 'Quatre';break;
			case 5 : return 'cinq';break;
			case 6 : return 'six';break;
			case 7 : return 'sept';break;
			case 8 : return 'huit';break;
			case 9 : return 'neuf';break;
			case 10 : return 'dix';break;
			case 11 : return 'onze';break;
			case 12 : return 'douze';break;
			case 13 : return 'treize';break;
			case 14 : return 'quatorze';break;
			case 15 : return 'quinze';break;
			case 16 : return 'seize';break;
			case 17 : return 'dix-sept';break;
			case 18 : return 'dix-huit';break;
			case 19 : return 'dix-neuf';break;
		endswitch;
	}
	function de_20_a_99($chiffre){
		if ($chiffre<20)
			return de_1_a_19($chiffre);
		
		if ($chiffre<30){
			if ($chiffre%20==1)
				return 'Vignt et '.de_1_a_19($chiffre%20);
			else
				return 'Vignt '.de_1_a_19($chiffre%20);
		}

		if ($chiffre<40){
			if ($chiffre%30==1)
				return 'trente et '.de_1_a_19($chiffre%30);
			else
				return 'trente '.de_1_a_19($chiffre%30);
		}
		if ($chiffre<50){
			if ($chiffre%40==1)
				return 'quarante et '.de_1_a_19($chiffre%40);
			else
				return 'quarante '.de_1_a_19($chiffre%40);
		}
		if ($chiffre<60){
			if ($chiffre%50==1)
				return 'cinquante et '.de_1_a_19($chiffre%50);
			else
				return 'cinquante '.de_1_a_19($chiffre%50);
		}
		if ($chiffre<80){
			if ($chiffre%60==1 || $chiffre%60==11){
				return 'soixante et '.de_1_a_19($chiffre%60);
			}else{
				return 'soixante '.de_1_a_19($chiffre%60);
			}
		}
		if ($chiffre<100){
			if ($chiffre%80==1 || $chiffre%80==11)
				return 'quatre-vignt et '.de_1_a_19($chiffre%80);
			else
				return 'quatre-vignt '.de_1_a_19($chiffre%80);
		}
	}
	function centaines($chiffre){
		if($chiffre < 100)
			return de_20_a_99($chiffre);
		$r = (int)($chiffre / 100);
		$q = $chiffre % 100;
		if ($r==1)
			return ' cent '.de_20_a_99($q);
		else{
			return de_1_a_19($r).' cents '.de_20_a_99($q);
		}
	}

	function mille($chiffre){
		if($chiffre<1000)
			return centaines($chiffre);
		$r = (int)($chiffre / 1000);
		$q = $chiffre % 1000;
		if ($r==1)
			return ' mille '.centaines($q);
		else{
			return centaines($r).' mille '.centaines($q);
		}
	}
	function million($chiffre){
		$r = (int)($chiffre / 1000000);
		$q = $chiffre % 1000000;
		if ($r==1)
			return ' un million '.mille($q);
		else{
			return centaines($r).' million '.mille($q);
		}
	}

?>

<form action="" method="post">
	<p>
		<label for="">Chiffre : </label>
		<input type="text" name="chiffre" id="chiffre" />
	</p>
	<p>
		<input type="submit" value="Convertir" name="convertir" id="convertir"/>
	</p>
</form>