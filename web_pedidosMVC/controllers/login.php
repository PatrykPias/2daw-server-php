<?php

    require_once("models/models.php");


        $result = compro($user,$pass1);

        if (count($result)==0) {
            $pag = false;
        }else{
            foreach ($result as $key => $value) {
                $usr = $value[0];
            }
            $_SESSION["user"] = $usr;
            $pag = true;
        }

        if ($pag == true){
            
        require_once("views/vista.php");

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
            require_once("views/vistamal.php");
        }

?>