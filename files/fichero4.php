<?php

//creamos el nombre del fichero
$mifichero = "alumnos2.txt";
echo"<table border='1'>";
echo"<th>Nombre</th><th>Apellido1</th><th>Apellido2</th><th>Fecha Nacimiento</th><th>Localidad</th>";
//abrimos el fichero creandolo con el nombre puesto anteriormente 
$fichero = fopen($mifichero,"r") or die("No existe fichero");
$count = 0;
while (!feof($fichero)){   

    echo "<tr>";
    $data = fgets($fichero); 
    $deli = "##";

    $sepa = explode($deli,$data);
    for ($i=0; $i <count($sepa) ; $i++) { 
        echo "<td>".$sepa[$i]."</td>";
    }

    echo "</tr>";
    $count++;
}

echo '</table>';
echo"<br><br>";

echo "El numero de filas es :".$count;

fclose($fichero);




?>