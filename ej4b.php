<HTML> <HEAD><TITLE> EJ4B – Tabla Multiplicar</TITLE></HEAD> 
 
<BODY> 
 
<?php 
 
$num="8"; 

for ($i=0; $i < 11; $i++) { //hacemos un un bucle de 0 hasta 10
    $mult = $num*$i;  //Aqui sacaremos la multiplicacion
    echo "$num x $i = $mult <br>"; // Y aqui mostraremos por pantalla 
}
 
 
?>
</BODY> 
</HTML>