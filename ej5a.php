<HTML> <HEAD><TITLE> EJ5A-Ejercicios Arrays Unidimensionales </TITLE></HEAD> 
 
<BODY> 
 
<?php 

$arr1 = array("Bases Datos", "Entornos Desarrollo", "Programación");
$arr2 = array("Sistemas Informáticos","FOL","Mecanizado");
$arr3 = array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés");


$arr4 = array($arr1,$arr2,$arr3);

print_r($arr4);
echo"<br><br>";

$arr5 = array_merge($arr1,$arr2,$arr3);

print_r($arr5);
echo"<br><br>";

$arr6 = array();
array_push($arr6,$arr1,$arr2,$arr3);

print_r($arr6);
echo"<br><br>";

?>
 </BODY> </HTML> 