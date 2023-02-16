<?php

    require_once("models/models.php");


        $result = compro($user,$pass1);

        foreach ($result as $key => $value) {
            $usr = $value[0];
        }

        if (count($result)==0) {
            $pag = false;
        }else{
            $_SESSION["user"] = $usr;
            $pag = true;
        }


        require_once("views/vista.php");

?>