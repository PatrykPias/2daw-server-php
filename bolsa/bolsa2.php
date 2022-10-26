<?php

require "funciones_bolsa.php";

$fichero = "ibex35.txt";


if(isset($_POST["submit"])){

    $linea = $_POST["name"];

    leerlinea($fichero,$linea);


}
	
    

?>