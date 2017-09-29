<?php
class travel_dao {
    static $_instance;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function create_travel_DAO($db, $arrArgument) {

        $idviaje = $arrArgument['idviaje'];
        $destino = $arrArgument['destino'];
        $precio = $arrArgument['precio'];
        $oferta = $arrArgument['oferta'];
        $tipo = $arrArgument['tipo'];
        $f_sal = $arrArgument['f_sal'];
        $f_lleg = $arrArgument['f_lleg'];
        $avatar = $arrArgument['avatar'];

        $crucero = 0;
        $tour = 0;
        $visita = 0;

        foreach ($tipo as $indice) {
            if ($indice === 'Crucero')
                $crucero = 1;
            if ($indice === 'Tour')
                $tour = 1;
            if ($indice === 'Visita')
                $visita = 1;
        }
 
        $sql = "INSERT INTO travels (idviaje, destino, precio, oferta,"
                . " tipo, f_sal, f_lleg, avatar"
                . " ) VALUES ('$idviaje', '$destino', '$precio',"
                . " '$oferta', '$tipo', '$f_sal', '$f_lleg', '$avatar')";

               
                
   /*     
        $sql = "INSERT INTO travels (idviaje, destino, precio, oferta,tipo, f_sal, f_lleg, avatar) VALUES ('$idviaje', '$destino', '$precio','$oferta', '$tipo', '$f_sal', '$f_lleg', '$avatar')";

*/

/*                INSERT INTO `travels` (idviaje, destino, precio, oferta, tipo, f_sal, f_lleg, avatar ) 
                VALUES ('A100', 'Portugal', '1111', 'No', 'Array', '09-27-2017', '09-30-2017', 'avatar');*/


                /*echo json_encode($sql);
                exit;*/

               /*echo json_encode($db->ejecutar($sql));
                exit;*/
               

        return $db->ejecutar($sql);
        
    }
}
