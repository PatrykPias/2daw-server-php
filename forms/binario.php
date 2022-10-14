<?php

function binario($numbin){

$bin = decbin($numbin);

return $bin;

}
function val($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


$numbin=val($_POST["numerodec"]);
$bin=binario($numbin);

echo "<h1>Conversor Binario</h1>";
echo"<br><br>";
echo"Numero Decimal : <input type=\"text\" name=\"decimal\" value=\"".$numbin."\"><br><br><br>";
echo"Numero Binario : <input type=\"text\" name=\"binario\" value=\"".$bin."\">";




?>