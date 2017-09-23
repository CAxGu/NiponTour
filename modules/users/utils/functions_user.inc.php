<?php
	function validate_user($value){
        $error= array();
        $valido = true;
		$filtro = array(
			'idviaje' => array(
				'filter'=>FILTER_VALIDATE_REGEXP,
				'options'=>array('regexp'=>'/^([A-Z]{1}[0-9]{1,4})*$/')
			),

			'precio' => array(
				'filter'=>FILTER_VALIDATE_REGEXP,
				'options'=>array('regexp'=>'/^[0-9]{2,4}$/')
			),


			'f_sal' => array(
				'filter'=>FILTER_VALIDATE_REGEXP,
				'options' => array('regexp' => '/^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d$/')
			),


			'f_lleg' => array(
				'filter' => FILTER_VALIDATE_REGEXP,
				'options' => array('regexp' => '/^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d$/')
            ),
            
            'tipo' => array(
				'filter' => FILTER_CALLBACK,
				'options' => 'validate_tipo'
			)
					
		);
		
        $resultado=filter_var_array($value,$filtro);
 
    
        if ($resultado['f_sal'] && $resultado['f_lleg']) {
            $dates = valida_dates($_POST['f_sal'], $_POST['f_lleg']);
    
            if (!$dates) {
                $error['f_lleg'] = 'La fecha de llegada debe ser posterior a la de salida.';
                $valido = false;
            }
        }
        
        $resultado['oferta'] = $_POST['oferta'];
        $resultado['destino'] = $_POST['destino'];

        if ($_POST['destino'] === '') {
            $error['destino'] = "Debes elegir un destino";
            $valido = false;
        }

        if (!$resultado['tipo']) {
            $error['tipo'] = 'Debes seleccionar 1 tipo como minimo';
            $valido = false;
        }

        if ($resultado != null && $resultado) {

            if (!$resultado['idviaje']) {
                $error['idviaje'] = 'El ID debe tener 1 letra y entre 1 y 4 caracteres';
                $valido = false;
            }

            if (!$resultado['precio']) {
                $error['precio'] = 'El precio debe tener entre 2 y 4 cifras';
                $valido = false;
            }
    
            if (!$resultado['precio']) {
                $error['precio'] = 'El precio debe tener entre 2 y 4 cifras';
                $valido = false;
            }
            
           
            if (!$resultado['f_sal']) {
                if($_POST['f_sal'] == ""){
                    $error['f_sal'] = "Este campo no puede estar vacio";
                    $valido = false;  
             }else{
                    $error['f_sal'] = 'Error en el formato de la fecha (mmm/dd/yyyy)';
                    $valido = false;
                }
            }

            if (!$resultado['f_lleg']) {
                if($_POST['f_lleg'] == ""){
                    $error['f_lleg'] = "Este campo no puede estar vacio";
                    $valido = false;  
                }else{
                    $error['f_lleg'] = 'Error en el formato de la fecha (mm/dd/yyyy)';
                    $valido = false;
                }
            }

        } else {
        $valido = false;
    };
    return $return = array('resultado' => $valido, 'error' => $error, 'datos' => $resultado);
}

	 function validate_tipo($texto){
        if(!isset($texto) || empty($texto)){
            return false;
        }else{
            return true;
        }
    }
    
    //Funcion para comparar 2 fechas
    function valida_dates($start_days, $dayslight) {
        
            $start_day = date("m/d/Y", strtotime($start_days));
            $daylight = date("m/d/Y", strtotime($dayslight));
        
            list($mes_one, $dia_one, $anio_one) = split('/', $start_day);
            list($mes_two, $dia_two, $anio_two) = split('/', $daylight);
        
            $dateOne = new DateTime($anio_one . "-" . $mes_one . "-" . $dia_one);
            $dateTwo = new DateTime($anio_two . "-" . $mes_two . "-" . $dia_two);
        
            if ($dateOne <= $dateTwo) {
                return true;
            }
            return false;
        }
        
?>
