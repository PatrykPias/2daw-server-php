<HTML> <HEAD><TITLE> EJ5A-Ejercicios Arrays Unidimensionales </TITLE></HEAD>

<BODY>

<?php

$arr1 = array("Bases Datos", "Entornos Desarrollo", "Programación");
$arr2 = array("Sistemas Informáticos","FOL","Mecanizado");
$arr3 = array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés");

$arr4 = array_merge($arr1,$arr2,$arr3);  //aqui utilizamos la funcion merge que nos lo une automaticamente 

//unset($arr4[5]); //eliminamos del array con la funcion usnet sabiendo la posicion 


$key = array_search("Mecanizado", $arr4) ; //eliminamos del array con la funcion usnet sabiendo buscando la posicion 
unset($arr4[$key]);

$arrrev = array_reverse($arr4); //le damos la vuelta al array 



print_r($arrrev); //imprimimos el array por pantalla



?>
 </BODY> </HTML>