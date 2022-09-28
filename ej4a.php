<HTML> <HEAD><TITLE> EJ4A-Ejercicios Arrays Unidimensionales </TITLE></HEAD> 
 
<BODY> 
 
<?php 



$numbi = array(); //creamos el array vacio
$bin = array();


echo "<table border='1'><th>Indice</th><th>Binario</th><th>Octal</th>";  //creamos una tabla la cual se mostrara por pantalla
for ($i=0; $i < 20; $i++) {  //añadimos valores al array con este bucle 
    $numbi[$i] = $i; 
    $bin[$i] = decbin($i);

    echo "<tr><td>";  // cramos la columna y las filas
    echo $i;               // en esta celda aparezera el indice
    echo "</td><td>"; // cerramos y abrimos otra fila
    echo $bin[$i];
    echo "</td><td>"; // cerramos y abrimos otra fila
    echo decoct($numbi[$i]);  // en esta celda aparezera el octal
    echo "</td></tr>"; // cerramos la columna y las filas

}

echo "</table>"; //cerramos la tabla

print_r(array_reverse($bin));



?>
 </BODY> </HTML> 