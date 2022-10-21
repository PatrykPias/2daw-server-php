<?php

function binario($num) {
    $bin = decbin($num);
    return $bin;
}


function val($data) {

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function octal($num) {

    $oct = decoct($num);
    return $oct;


}

function hexa($num) {

    $hex = dechex($num);
    return $hex;

}

function all($num){
    echo "<br><br> <table border=1px><tr><td>Binario</td><td>".binario($num)."</td></tr>";
    echo "<tr><td>Octal</td><td>".octal($num)."</td></tr>";
    echo "<tr><td>Hexadecimal</td><td>".hexa($num)."</td></tr></table>";
}


$num=val($_POST["numerodec"]);
$operacion=val($_POST["operacion"]);

echo "Número decimal: <input type=\"text\" name=\"decimal\" value=\"".$num."\" readonly><br>";

if ($operacion == "binario") {
    echo "Número binario: ".binario($num);
}elseif ($operacion == "octal") {
    echo "Número octal: ".octal($num);
}elseif ($operacion == "hex") {
    echo "Número hexadecimal: ".hexa($num);
}elseif ($operacion == "all") {
    all($num);
}




?>