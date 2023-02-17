<?php

    include_once("../db/db.php");
    include_once("../models/productos.php");

    $result = select("products",$conn);

?>