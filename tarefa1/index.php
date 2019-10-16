<?php 

include_once 'ClassAgrouparPorDonos.php';

$Array = [
			"Gestão.pdf" 		=> "Faria", 
			"Planejamento.pdf" 	=> "Rebouças", 
			"Contabilidade.pdf" => "Faria"
		];

/*
Usei para testar, invés de alterar o Array Original
$Array2 = [
			"Administração.pdf" => "Faria", 
			"Obras.pdf" 	 	=> "Rebouças", 
			"Tecnologia.pdf" 	=> "Faria",
			"Algoritmos.pdf" 	=> "Faria",
			"Cultura.pdf" 	 	=> "Rebouças", 
			"Matemática.pdf" 	=> "Faria",
			"Economia.pdf" 	 	=> "Rebouças"
		];
$Array = array_merge($Array, $Array2);
*/

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrupar por Donos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body><br>
	<div class="container">
		<div class="form-group">
			<?php
				echo "<pre>";
				echo "<h3>Vetor Associativo Original:</h3>";
				print_r($Array);
				echo "</pre>";
				 
				$agroupar = new ClassAgrouparPorDonos($Array);
				$res_agroupados = $agroupar->agrouparPorDonos();

				echo "<hr>";
				echo "<pre>";
				echo "<h3>Vetor Agrupado por Donos:</h3>";
				print_r($res_agroupados);
				echo "</pre>";
			?>
		</div>
	</div>
</body>
</html>
