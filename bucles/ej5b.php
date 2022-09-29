

<HTML> <HEAD><TITLE> EJ5B – Tabla multiplicar con TD</TITLE></HEAD> 
 
<BODY> 
 
<?php 
 
$num="8";
    echo"<table border = '1'>"; //creammos la tabla con borde
    for ($i = 0; $i < 11; $i++) { //hacemos un bucle 
    echo"<tr>"; 
        $res = $num*$i; //multiplicamos el numero por la posicion del bucle 
    echo"<td>$num x $i</td>"; //creamos que muestre por pantalla la multiplicacion 
    echo"<td>$res</td>";}  // y aqui nos muestra el resultado de la multiplicacion 
    echo"</table>";     // cerramos la tabla 

    
 
?> </BODY> </HTML> 