<HTML> <HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD> 
 
<BODY> 
 
<?php 
 
 $num="2";
 $num1 = $num;
 $bin = "";
 
 while($num1 >= 1){
     $bin .= $num1 % 2;
     $num1 = $num1 / 2;
 }
 if ($num1 == 0) {
    $bin = 0;
 }
 
 
 
 echo "Numero $num en binario = ".strrev($bin)

?>
 </BODY> </HTML> 