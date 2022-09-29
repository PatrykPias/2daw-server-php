<HTML> <HEAD><TITLE> EJ2-Direccion Red – Broadcast y Rango</TITLE></HEAD> 
 
<BODY> 
 
<?php 
 
$ip="192.168.16.100/21"; 

//dividimos la ip de la mascara gracias a la /
$dir = strpos($ip,"/",0);
//Sacamos el numero de la mascara 
$masc = substr($ip,$dir+1);


 
//Aqui sacaremos la posicion de los puntos
$pripun = strpos($ip,"." ,0);
$segpun = strpos($ip,".",($pripun+1));
$terpun = strpos($ip,".",($segpun+1));


//Aqui los decimales los pasamos a binario
$ip1=decbin(substr($ip,0,$pripun));
$ip2=decbin(substr($ip,($pripun+1),($segpun-$pripun)-1));
$ip3=decbin(substr($ip,($segpun+1),($terpun-$segpun)-1));
$ip4=decbin(substr($ip,($terpun+1),($dir-$terpun)-1));

//En este paso añadiremos lo 0 a los binarios a la izquierda hasta llegar a 8 bits
$ip0 = (str_pad($ip1,8,"0",STR_PAD_LEFT).
str_pad($ip2,8,"0",STR_PAD_LEFT).
str_pad($ip3,8,"0",STR_PAD_LEFT).
str_pad($ip4,8,"0",STR_PAD_LEFT));

//Cortamos donde la mascara
$dirip = substr($ip0,0,$masc);

// //Añadimos 0 despues de donde llega la mascara hasta 32 para sacar la direccion red

$dirip1 = str_pad($dirip,32,"0",STR_PAD_RIGHT);
// //Cambiamos el binario a decimal 
$dirip2 = bindec(substr($dirip1,0,8)).".".bindec(substr($dirip1,8,8)).".".bindec(substr($dirip1,16,8)).".".bindec(substr($dirip1,24,8));

//Sacamos la direccion broadcast añadiendo 1 desde la mascara hasta 32
$dirip3 = str_pad($dirip,32,"1",STR_PAD_RIGHT);

//Cambiamos el binario a decimal y nos saldra el broadcast
$dirip4 = bindec(substr($dirip3,0,8)).".".bindec(substr($dirip3,8,8)).".".bindec(substr($dirip3,16,8)).".".bindec(substr($dirip3,24,8));

//En este sacamos el rango mas bajo para ello pasaremos la dirreccion red a decimal y sumar uno al ultimo octeto
$diriprang1 = bindec(substr($dirip,0,8)).".".bindec(substr($dirip,8,8)).".".bindec(substr($dirip,16,8)).".".bindec(substr($dirip,24,8)+1);
//En este sacamos el rango mas alto para ello  pasaremos la direccion broadcast y restaremos uno al ultimo octeto
$diriprang2 = bindec(substr($dirip3,0,8)).".".bindec(substr($dirip3,8,8)).".".bindec(substr($dirip3,16,8)).".".bindec(substr($dirip3,24,8)-1);


//Aqui mostraremos por pantalla la ip
echo "IP $ip <br>";

//Aqui mostraremos por pantalla la mascara
echo "Mascara $masc <br>";

//Aqui mostraremos por pantalla la direccion red
echo "Direccion red : $dirip2 <br>";

//Aqui mostraremos por pantalla la direccion broadcast
echo "Direccion Broadcast : $dirip4 <br>";

//Aqui mostraremos por pantalla el rango 
echo "Rango $diriprang1 a $diriprang2 <br>";


?> 
</BODY> </HTML>