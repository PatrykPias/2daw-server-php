<HTML> <HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD> 
 
<BODY> 
 
<?php 
 
 $num="2";
 $num1 = $num;
 $bin = "";
 
 while($num1 >= 1){   // En este paso entramos al bucle cuando el num sea mayor o igual a 1
     $bin .= $num1 % 2; //Sacamos el resto
     $num1 = $num1 / 2; //Sacamos el divisor y lo cambiamos automaticamente 
 }
 if ($num1 == 0) {  //Si es 0 entra al if 
    $bin = 0;    //Pondremos en el resultado 0 ya que 0 en binario son ocho ceros
 }
 
 
 
 echo "Numero $num en binario = ".strrev($bin); //strrev es para dar la buelta al string

?>
 </BODY> </HTML> 