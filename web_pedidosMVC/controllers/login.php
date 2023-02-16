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


        require_once("views/vista.php");

?>
