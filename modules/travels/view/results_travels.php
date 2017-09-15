<?php

	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	
	//echo "<pre>";
	//print_r($_POST);
	//echo "</pre>";
	debugPHP($_POST);
		
		
	//echo "<pre>";
	//print_r($_SESSION);
	//echo "</pre>";
	debugPHP($_SESSION);
	//die();

		foreach ($_SESSION as $indice => $valor){
			if($indice==="tipo"){
				echo "<br>Tipo:<br>";
				$gustos = $_SESSION["tipo"];
				foreach ($gustos as $indice => $valor) 
					echo "$indice: $valor<br>";
			}else{
				echo "$indice: $valor<br>";
			}
		}
		