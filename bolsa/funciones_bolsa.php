<?php


function leerarchi($fichero){
    $file = file($fichero);
    foreach ($file as $item ) {
        echo $item ;
        echo "<br>";
    }
}

function leerlinea($fichero,$emp){
    $fichero1 = file($fichero);
        //echo $fichero1[0]."<br>";
        foreach ($fichero1 as $value ) {
            if (strpos($value ,$emp) !== false) {
                echo $value;
            }
        }
}

function valores($fichero,$emp){
    $fichero1 = file($fichero);

    foreach ($fichero1 as $value ) {
        if (strpos($value ,$emp) !== false) {
            $cot = substr($value,24-1, 34-25);
            $max = substr($value,60, 70-61);
            $min = substr($value,69, 79-70);
        }
        
    }

    echo "<br>";
    echo "El valor <strong>Cotizacion</strong> de $emp es ".$cot."<br>";
    echo "<strong>Cotizacion Maxima</strong> de $emp es ".$max."<br>";
    echo "<strong>Cotizacion Minima</strong> de $emp es ".$min."<br>";


}

?>