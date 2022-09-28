<HTML> <HEAD><TITLE> EJ1A-Ejercicios Arrays Unidimensionales </TITLE></HEAD> 
 
<BODY> 
 
<?php 

$num=1; 
$suma=0;

$numimp = array(); //creamos el array vacio

echo "<table border='1'><th>Indice</th><th>Valor</th><th>Suma</th>";  //creamos una tabla la cual se mostrara por pantalla
for ($i=0; $i < 20; $i++) {  //añadimos valores al array con este bucle 
    if ($num%2!=0) {    // si dividido entre 2 el resto es distinto 0 se añade al array y se suma 1
        $numimp[$i]=$num;
        $num++;
    }
    $num++;     // se suma uno porque no es impar
    echo "<tr><td>";  // cramos la columna y las filas
    echo $i;               // en esta celda aparezera el indice
    echo "</td><td>"; // cerramos y abrimos otra fila
    echo $numimp[$i];           // en esta celda aparezera el valor del indice
    echo "</td><td>"; // cerramos y abrimos otra fila
    echo $suma = $suma + $numimp[$i];  // aqui haremos la suma de los valores anteriores.
    echo "</td></tr>"; // cerramos la columna y las filas

}





echo "</table>"; //cerramos la tabla




?>
 </BODY> </HTML> 