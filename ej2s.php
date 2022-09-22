<HTML> <HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD> 
 
<BODY> 
 
<?php 
 
$ip="192.18.16.204"; 
 

$pripun = strpos($ip,"." ,0);
$segpun = strpos($ip,".",($pripun+1));
$terpun = strpos($ip,".",($segpun+1));

$ip1=decbin(substr($ip,0,$pripun));
$ip2=decbin(substr($ip,($pripun+1),($segpun-$pripun)-1));
$ip3=decbin(substr($ip,($segpun+1),($terpun-$segpun)-1));
$ip4=decbin(substr($ip,($terpun+1)));


$ip1 = substr("00000000",0,8 - strlen($ip1)).$ip1;
$ip2 = substr("00000000",0,8 - strlen($ip2)).$ip2;
$ip3 = substr("00000000",0,8 - strlen($ip3)).$ip3;
$ip4 = substr("00000000",0,8 - strlen($ip4)).$ip4;

//echo"IP $ip en binario es ".decbin($ip1).".".decbin($ip2).".".decbin($ip3).".".decbin($ip4);

$ip0= $ip1.".".$ip2.".".$ip3.".".$ip4;

echo ("IP $ip en binario es ".$ip0);

?> 
</BODY> </HTML>