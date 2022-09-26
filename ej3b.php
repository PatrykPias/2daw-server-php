<HTML> <HEAD><TITLE> EJ3B – Conversor Decimal a base 16</TITLE></HEAD> 
 
<BODY> 
 
<?php 
 
$num="48";    
$base="16"; 
$num1=$num;

$hex = "0123456789ABCDEF"; // Creamos una variable y  nos guardamos los digitos hexadecimales
$res = "";

while ($num1 >= 1) {  // En este paso entramos al bucle cuando el num sea mayor o igual a 1
    $div = $num1%$base; //Sacamos el resto
    $num1 = $num1/$base; //Sacamos el divisor y lo cambiamos automaticamente 
    $res .= substr($hex, $div, 1); //Aqui cogeremos la posicion acorde al resultado y lo pondremos en el string
}
if ($num == 0) { //Si es 0 entra al if 
    $res = 0;   //Pondremos en el resultado 0 ya que 0 en binario son ocho ceros
}

echo "Numero $num en base $base =".strrev($res); //strrev es para dar la buelta al string

?>

</BODY> </HTML> 