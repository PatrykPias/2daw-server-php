<?php

//creamos el nombre del fichero
$mifichero = "alumnos1.txt";
echo"<table border='1'>";
echo"<th>Nombre</th><th>Apellido1</th><th>Apellido2</th><th>Fecha Nacimiento</th><th>Localidad</th>";
//abrimos el fichero creandolo con el nombre puesto anteriormente 
$fichero = fopen($mifichero,"r") or die("No existe fichero");
$count = 0;
while (!feof($fichero)){   
    $count++;

    $data = fgets($fichero);
    $nombre = substr($data,0,(40-1));
    $apellido1 = substr($data,(40-1),(81-41));
    $apellido2 = substr($data,80,(123-82));
    $Fech_Nac = substr($data,122,(133-124)+1);
    $Localidad = substr($data,132,(160-134));
 
    echo "<tr><td>".$nombre. "</td>"."<td>".$apellido1. "</td>"."<td>".$apellido2. "</td>"."<td>".$Fech_Nac. "</td>"."<td>".$Localidad. "</td>"."</tr>";
    //.$apellido1."</td>".$$apellido2."</td>".$Fech_Nac."</td>".$Localidad.
}
echo '</table>';
echo"<br><br>";
echo $count;
fclose($fichero);

?>