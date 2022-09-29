<HTML> <HEAD><TITLE> EJ7A-Ejercicios Arrays Unidimensionales </TITLE></HEAD>

<BODY>

<?php

$alumnos = array("Juan"=>9,"Pepe"=>4,"Maria"=>7,"Isaac"=>6,"Paula"=>2);

$notamax = array_search(max($alumnos),$alumnos);

echo "La nota maxima es de : ".$notamax."<br>";

$notamin  = array_search(min($alumnos),$alumnos);

echo "La nota minima es de : ".$notamin."<br>";

$sum = array_sum($alumnos);
$media = $sum/count($alumnos);

echo "La nota media de la clase es de : ".$media."<br>";


?>
 </BODY> </HTML>