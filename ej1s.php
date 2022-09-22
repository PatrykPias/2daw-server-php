<HTML> <HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>

<BODY>

<?php

$ip="192.18.16.204";


$pripun = strpos($ip,"." ,0);
$segpun = strpos($ip,".",($pripun+1));
$terpun = strpos($ip,".",($segpun+1));


$ip1=substr($ip,0,$pripun);
$ip2=substr($ip,($pripun+1),$segpun-1);
$ip3=substr($ip,($segpun+1),$terpun-1);
$ip4=substr($ip,($terpun+1));


//otra forma
/*$ip1=substr($ip,0,$pripun);
$ip2=substr($ip,($pripun+1),($segpun-$pripun)-1);
$ip3=substr($ip,($segpun+1),($terpun-$segpun)-1);
$ip4=substr($ip,($terpun+1));*/

//%08b te coje los 8 bits incluidos los ceros

printf("IP $ip en binario es  %08b",$ip1);
printf(".%08b",$ip2);
printf(".%08b",$ip3);
printf(".%08b <br>",$ip4);
//la linea de arriba transforma los numeros en binarios y los imprime pero no los 

//En cambio la de abajo si que te guarda el resultado 
$bin = sprintf("IP $ip en binario es  %08b.%08b.%08b.%08b",$ip1,$ip2,$ip3,$ip4);
echo $bin;
?>
</BODY> </HTML>
