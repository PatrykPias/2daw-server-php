<?php

function val($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

function suma($op1,$op2){
    $result = $op1+$op2;
    echo "Resultado operación : ".$op1."+".$op2."=".$result;
}


function resta($op1,$op2){
    $result = $op1-$op2;
    echo "Resultado operación : ".$op1."-".$op2."=".$result;
}


function producto($op1,$op2){
    $result = $op1*$op2;
    echo "Resultado operación : ".$op1."x".$op2."=".$result;
}

function division($op1,$op2){
    $result = $op1/$op2;
    echo "Resultado operación : ".$op1."/".$op2."=".$result;
}


echo"<br><h1>Calculadora</h1>";

$op1 = val($_POST["operando1"]);
$op2 = val($_POST["operando2"]);

$oper = $_POST["operacion"];

echo"<br><br><br><br>";

if ($oper == "suma") {
    suma($op1,$op2);
}elseif ($oper == "resta") {
    resta($op1,$op2);
}elseif ($oper == "producto") {
    producto($op1,$op2);
}elseif ($oper == "division") {
    division($op1,$op2);
}

?>

