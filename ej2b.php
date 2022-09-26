<HTML> <HEAD><TITLE> EJ2B – Conversor Decimal a base n </TITLE></HEAD> 
 
<BODY> 
 
<?php 
 
$num="48";    
$base="8"; 
$num1 = $num;
$res = "";
 
 while($num1 >= 1){   // En este paso entramos al bucle cuando el num sea mayor o igual a 1
     $res .= $num1 % $base; //Sacamos el resto
     $num1 = $num1 / $base; //Sacamos el divisor y lo cambiamos automaticamente 
 }
 if ($num1 == 0) {  //Si es 0 entra al if 
    $res = 0;    //Pondremos en el resultado 0 
 }

 echo "Numero $num en base $base = ".strrev($res); //strrev es para dar la buelta al string


?> 
</BODY> </HTML>