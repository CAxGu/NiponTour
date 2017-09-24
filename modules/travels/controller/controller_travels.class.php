<?php
session_start();
//include  with absolute route
include ($_SERVER["DOCUMENT_ROOT"] . "/2ndoDAW/NiponTour/modules/travels/utils/functions_travels.inc.php");
include ($_SERVER["DOCUMENT_ROOT"] . "/2ndoDAW/NiponTour/utils/upload.php");

//////////////////////////////////////////////////////////////// upload
if ((isset($_GET["upload"])) && ($_GET["upload"] == true)) {
    $result_avatar = upload_files();
    $_SESSION["result_avatar"] = $result_avatar;
    //echo debug($_SESSION["result_avatar"]); //se mostraría en alert(response); de dropzone.js
}

//////////////////////////////////////////////////////////////// alta_users_json
if ((isset($_POST["alta_travels_json"]))) {
    alta_travels();
}

function alta_travels() {
    $jsondata = array();
    $travelsJSON = json_decode($_POST["alta_travels_json"], true);
    $result = validate_travel($travelsJSON);
    
    if (empty($_SESSION["result_avatar"])) {
        $_SESSION["result_avatar"] = array("resultado" => true, "error" => "", "datos" => "media/default-avatar.png");
    }
    $result_avatar = $_SESSION["result_avatar"];

    if (($result["resultado"]) && ($result_avatar["resultado"])) {
        $arrArgument = array(
            "idviaje" => ucfirst($result["datos"]["idviaje"]),
            "destino" => strtoupper($result["datos"]["destino"]),
            "precio" => $result["datos"]["precio"],
            "oferta" => $result["datos"]["oferta"],
            "tipo" => $result["datos"]["tipo"],
            "f_sal" => $result["datos"]["f_sal"],
            "f_lleg" => $result["datos"]["f_lleg"],
            "avatar" => $result_avatar["datos"]
        );

        $mensaje = "Travel has been successfully registered";

        //redirigir a otra p�gina con los datos de $arrArgument y $mensaje
        $_SESSION["travel"] = $arrArgument;
        $_SESSION["msje"] = $mensaje;
        $callback = "index.php?module=travels&view=results_travels";

        $jsondata["success"] = true;
        $jsondata["redirect"] = $callback;
        echo json_encode($jsondata);
        exit;
    } else {
        //$error = $result["error"];
        //$error_avatar = $result_avatar["error"];
        $jsondata["success"] = false;
        $jsondata["error"] = $result["error"];
        $jsondata["error_avatar"] = $result_avatar["error"];

        $jsondata["success1"] = false;
        if ($result_avatar["resultado"]) {
            $jsondata["success1"] = true;
            $jsondata["img_avatar"] = $result_avatar["datos"];
        }
        header("HTTP/1.0 400 Bad error");
        echo json_encode($jsondata);
        //exit;
    }
}

//////////////////////////////////////////////////////////////// delete
if (isset($_GET["delete"]) && $_GET["delete"] == true) {
    $_SESSION["result_avatar"] = array();
    $result = remove_files();
    if ($result === true) {
        echo json_encode(array("res" => true));
    } else {
        echo json_encode(array("res" => false));
    }
}

//////////////////////////////////////////////////////////////// load
if (isset($_GET["load"]) && $_GET["load"] == true) {
    $jsondata = array();
    if (isset($_SESSION["travel"])) {
        //echo debug($_SESSION["user"]);
        $jsondata["travel"] = $_SESSION["travel"];
    }
    if (isset($_SESSION["msje"])) {
        //echo $_SESSION["msje"];
        $jsondata["msje"] = $_SESSION["msje"];
    }
    close_session();
    echo json_encode($jsondata);
    exit;
}

function close_session() {
    unset($_SESSION["travel"]);
    unset($_SESSION["msje"]);
    $_SESSION = array(); // Destruye todas las variables de la sesión
    session_destroy(); // Destruye la sesión
}

/////////////////////////////////////////////////// load_data
if ((isset($_GET["load_data"])) && ($_GET["load_data"] == true)) {
    $jsondata = array();
    if (isset($_SESSION["travel"])) {
        $jsondata["travel"] = $_SESSION["travel"];
        echo json_encode($jsondata);
        exit;
    } else {
        $jsondata["travel"] = "";
        echo json_encode($jsondata);
        exit;
    }
}