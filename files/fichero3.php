<?php

//creamos el nombre del fichero
$mifichero = "alumnos1.txt";
echo"<table border='1'>";
//abrimos el fichero creandolo con el nombre puesto anteriormente 
$fichero = fopen($mifichero,"r") or die("No existe fichero");
$count = 0;
while (!feof($fichero)){   
    $count++;
    $data = fgets($fichero); 
    echo "<tr><td>".$data. "</td></tr>";
}
echo '</table>';
echo"<br><br>";
echo $count;
fclose($fichero);

?>