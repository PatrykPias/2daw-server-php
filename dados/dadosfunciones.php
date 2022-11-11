<?php
function jugar(){
    $arrjug = array();
    foreach ($_POST as $key => $value) {
        if ($key != "tirar" && $value != "" && $key != "numdados") {
                array_push($arrjug , val($value));
        }
    }
    $dados = val($_POST["numdados"]);   
    for ($i=0; $i < count($arrjug); $i++) { 
        if ($arrjug[$i] == "") {
            unset($arrjug[$i]);
        }
    }
    if (count($arrjug) < 2) {
        echo "Minimo 2 jugadores";
    }else{
        if ($dados<1 || $dados>10) {
            echo"Error maximo o minimo de dados ";  
        }else{
           dados($dados , $arrjug);
    }
    }
}

function dados($dados , $array){
    $arr = [];
    $arrfin = [];
    for ($i=0; $i < count($array); $i++) { 
        for ($j=0; $j < $dados; $j++) { 
            $arr[$j] = rand(1,6);
        }
        $arrfin += [$array[$i] => $arr];
    }
    tab($arrfin);
}

function tab($array){
    echo "<table border ='1'>";
    foreach ($array as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        for ($j=0; $j <count($value); $j++) { 
            echo "<td>";
            $numero = $value[$j];
            echo  "<img src='./images/$numero.PNG' width='60' height='60'>"; //sacamos la imagen del dado 
            echo "</td>";
        }
        echo"</tr>";
    }  
    echo"</table>";
    echo"<br>";

    puntuacion($array);

}

function puntuacion($array){
    $arr = [];
    foreach ($array as $key => $value) {
        $num = 0;
        $cont = 0;
        for ($j=0; $j <count($value); $j++) { 
            if (count($value)>1) {
                if ($value[0] == $value[$j]) {
                    $cont++;
                }
            }
            $num += $value[$j];
        }
        if ($cont == count($value) && $cont >= 2) {
            $num = 100;
        }
        $arr += [$key => $num];
    }  
    foreach ($arr as $key => $value) {
        echo " $key = $value <br>";
    }
    ganador($arr);
}

function ganador($array){
    $ganador = max($array);
    $count = 0;
    foreach ($array as $key => $value) {
        if ($value == $ganador) {
            echo "El ganador es ".$key."<br>";
            $count++;
        }
    }
    echo "Numeros de Ganadores : ".$count;
}

function val($data) { //Funcion que nos valida los datos
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>