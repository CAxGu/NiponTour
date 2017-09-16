<?php
echo "<br>";
echo "<br>";
echo "<br>";
include 'modules/travels/utils/functions_travels.inc.php';

if (isset($_POST['submit_travels'])) {
    $result = validate_travels();
    
    if ($result['resultado']) {
        $arrArgument = array(
            'idviaje' => ucfirst($result['datos']['idviaje']),
            'destino' => ucfirst($result['datos']['destino']),
            'precio' => $result['datos']['precio'],
            'oferta' => $result['datos']['oferta'],
            'tipo' => $result['datos']['tipo'],
            'f_sal' => $result['datos']['f_sal'],
            'f_lleg' => $result['datos']['f_lleg'],
        );

        $mensaje = "El viaje ha sido registrado correctamente";

        $_SESSION['viaje'] = $arrArgument;
        $_SESSION['msje'] = $mensaje;
        
        $callback = "index.php?module=travels&view=results_travels";
        redirect($callback);
    } else {
        $error = $result['error'];
    }
}
include 'modules/travels/view/create_travels.php';
