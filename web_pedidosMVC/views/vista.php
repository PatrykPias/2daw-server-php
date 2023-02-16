<?php

if ($pag == true){
    header("Location:views/pe_inicio.php");
}else{
    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();

    echo"Inicio de sesion incorrecto";
}




?>