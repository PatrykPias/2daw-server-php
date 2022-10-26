<?php


function leerarchi($fichero){ //leemos el archivo y lo mostramos
    $file = file($fichero);
    foreach ($file as $item ) {
        echo $item ;
        echo "<br>";
    }
}

function leerlinea($fichero,$emp){ // leemeos la linea de la empresa pasada
    $fichero1 = file($fichero);
        //echo $fichero1[0]."<br>";
        foreach ($fichero1 as $value ) {
            if (strpos($value ,$emp) !== false) {
                echo $value;
            }
        }
}


function valores($fichero,$emp,$tipo){ //leemos la columna que le pasamos 
    $fichero1 = file($fichero);

    foreach ($fichero1 as $value ) {
        if (strpos($value ,$emp) !== false) {
            switch ($tipo) {
                case 'ulti':
                    $res = substr($value,24-1, 34-25);
                    break;
                case 'var':
                    $res = substr($value,33, 41-34);
                    break;
                case 'var1':
                    $res = substr($value,41,49-41 );
                    break;
                case 'ac':
                    $res = substr($value,49, 61-49);
                    break;
                case 'max':
                    $res = substr($value,60, 70-61);
                    break;
                case 'min':
                    $res = substr($value,69, 79-70);
                    break;
                case 'vol':
                    $res = substr($value,79, 92-79);
                    break;
                case 'capi':
                    $res = substr($value,92, 101-92);
                    break;
            }
        }
    }
    return $res;

}

function select($fichero){

    $fichero1 = file($fichero);

    foreach ($fichero1 as $value ) {
        $valor = substr($value,0, 24-1);
        echo "<option value=$valor>$valor</option>";
    }


}

?>