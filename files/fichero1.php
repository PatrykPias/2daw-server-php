<?php

//Recibimos los valores y los pasamos por la funcion de validar
$nombre = val($_POST["nombre"]);
$apellido1 = val($_POST["apell1"]);
$apellido2 = val($_POST["apell2"]);
$Fech_Nac = val($_POST["fech_nac"]);
$Localidad = val($_POST["loc"]);

//Añadimos mlos espacion en blanco 

$nombre = str_pad($nombre,39," ",STR_PAD_RIGHT);
$apellido1 = str_pad($apellido1,41," ",STR_PAD_RIGHT);
$apellido2 = str_pad($apellido2,42," ",STR_PAD_RIGHT);
$Fech_Nac = str_pad($Fech_Nac,10," ",STR_PAD_RIGHT);
$Localidad = str_pad($Localidad,28," ",STR_PAD_RIGHT);

//Conmcatenamos todos los valor con los espacios en blanco 
$linea =$nombre.$apellido1.$apellido2.$Fech_Nac.$Localidad;


//creamos el nombre del fichero
$mifichero = "alumnos1.txt";

//abrimos el fichero creandolo con el nombre puesto anteriormente 
$fichero = fopen($mifichero,"a") or die("No existe fichero");
//Escribimos en el archivo  
fwrite($fichero, $linea . PHP_EOL);
//Ceramos el archivo
fclose($fichero);





function val($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}




?>