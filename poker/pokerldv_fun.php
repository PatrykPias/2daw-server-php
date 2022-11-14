<?php

function jugar(){

    $arrjug = array();

    $arracart = array();
    $arrayjugar = array();

    $arraygan = array();



    foreach ($_POST as $key => $value) {
        if ($key != "submit" && $value != "" && $key != "bote") {
                array_push($arrjug , val($value));
        }
    }

    $bote = val($_POST["bote"]);

    if (count($arrjug)< 4) {
        echo "Numero minimo de jugadores incorrecto";
    }else{
        $arrcart = cartas();
        $arrayjugar = repartir($arrjug , $arrcart);
        pantalla($arrayjugar);
        $arraygan = poker($arrayjugar , $arraygan);
        $arraygan = trio($arrayjugar , $arraygan);
        $arraygan = doblepar($arrayjugar , $arraygan);
        $arraygan = parej($arrayjugar , $arraygan);

        ganador($arraygan,  $bote);

    }
}


function cartas(){

    $arrcart = array("1C1","1C2","1D","1D2","1P1","1P2","1T1","1T2","JC1","JC2","JD1","JD2","JP1","JP2","JT1","JT2","KC1","KC2","KD1","KD2","KP1","KP2","KT1","KT2","QC1","QC2","QD1","QD2","QP1","QP2","QT1","QT2");

    shuffle($arrcart);

    return $arrcart;


}

function repartir($arrayjug , $arraycart){
    $arrayjugar = array();

    $cart = array();

    $cont = 0 ;


    for ($i=0; $i < count($arrayjug); $i++) { 
        if ($cont > count($arraycart)) {
            echo "Error";
        }else{
            for ($j=0; $j < 4; $j++) { 
                $cart[$j] = $arraycart[$cont];
                $cont++;
            }
        $arrayjugar += [$arrayjug[$i] => $cart];  
        }
    }

    return $arrayjugar;
}

function pantalla($arrayjugar){
    echo "<table border='1'>";

    foreach ($arrayjugar as $key => $value) {
        echo"<tr>";
        echo"<td>";
        echo $key;
        echo"</td>";
        for($i=0; $i <count($value); $i++) { 
            echo"<td>";
            echo  "<img src='./images/".$value[$i].".PNG' width='60' height='60'>";
            echo"</td>";
        }
        echo"</tr>";

    }

    echo "</table>";
    echo "<br>";
}

function poker($arr,$arrgan){
    foreach ($arr as $key => $value) {
        $cont = 0;
        for ($i=0; $i < count($value); $i++) { 
            $cart = substr($value[0] , 0 , 1);
            if ($cart == substr($value[$i] , 0 , 1)){
                $cont++;
            }
        }
        if ($cont == 4) {
            $arrgan += [$key => "poker"];
        }   
    }
    return $arrgan;


}

function trio($arrcart , $arrgan){

    foreach ($arrcart as $key => $value) {
        $cont1 = 0;
        $cont2 = 0;
        for ($i=0; $i < count($value); $i++) { 
            $cart1 = substr($value[0] , 0 , 1);
            $cart2 = substr($value[1] , 0 , 1);

            if ($cart1 == substr($value[$i] , 0 , 1)) {
                $cont1++;
            }  
            if ($cart2 == substr($value[$i] , 0 , 1)) {
                $cont2++;
            }            
        }
        
    
        if ($cont1 == 3 || $cont2 == 3) {
            $arrgan += [$key => "trio"];
        }  
    }

    return $arrgan;


}

function doblePar($arrcart, $arrgan){

    foreach ($arrcart as $key => $value) {
        $cont1 = 0;
        $cont2 = 0;
        for ($i=0; $i < count($value); $i++) { 
            $cart1 = substr($value[0] , 0 , 1);
            $cart2 = substr($value[2] , 0 , 1);
            if ($cart1 == $cart2) {
                $cart2 = substr($value[1] , 0 , 1);
            }

            if ($cart1 == substr($value[$i] , 0 , 1)) {
                $cont1++;

            }  
            if ($cart2 == substr($value[$i] , 0 , 1)) {
                $cont2++;
            }            
        }
        
    
        if ($cont1 == 2 && $cont2 == 2) {
            $arrgan += [$key => "doble pareja"];
        }  
    }

    return $arrgan;


}

function parej($arrcart , $arrgan){

    foreach ($arrcart as $key => $value) {
        $cont1 = 0;
        $cont2 = 0;
        $cont3 = 0;
        $cart1 = substr($value[0],0,1);
        $cart2 = substr($value[1],0,1);
        $cart3 = substr($value[2],0,1);

        if ($cart1 == $cart2) {
            $cart2 = substr($value[2],0,1);
            $cart3 = substr($value[3],0,1);
        }
        if ($cart1 == $cart3) {
            $cart3 = substr($value[3],0,1);
        }

        for ($i=0; $i < count($value); $i++) { 
            if ($cart1 == substr($value[$i],0,1)) {
                $cont1++;
            }
            if ($cart2 == substr($value[$i],0,1)) {
                $cont2++;
            }
            if ($cart3 == substr($value[$i],0,1)) {
                $cont3++;
            }

            if ($cont1 == 2 || $cont2 == 2 || $cont3 == 2) {
                $arrgan += [$key => "pareja"];
            }  

        }


    }        

    // foreach ($arrcart as $key => $value) {
    //     $cont1 = 0;
    //     $cont2 = 0;
    //     $cart1 = substr($value[0],0,1);
    //     $cart2 = substr($value[1],0,1);
    //     echo "La primera carta de ".$key. " es ".$cart1."<br>";
    //     echo "La segunda carta de ".$key. " es ".$cart2."<br>";
    //     echo "<br>";
    //     if ($cart1 == $cart2) {
    //         $cart2 = substr($value[1],0,1);
    //         echo "La segunda carta cambiada de ".$key. " es ".$cart2."<br>";
    //     }
    //     echo "La primera carta de ".$key. " es ".$cart1."<br>";
    //     echo "La segunda carta de ".$key. " es ".$cart2."<br>";
    //     echo "<br>";
    //     if ($cart1 == $cart2) {
    //         $cart2 = substr($value[3],0,1);
    //         echo "La segunda carta cambiada de ".$key. " es ".$cart2."<br>";
    //     }
    //     echo "La primera carta de ".$key. " es ".$cart1."<br>";
    //     echo "La segunda carta de ".$key. " es ".$cart2."<br>";
    //     echo "<br>";
        
    //     for ($i=0; $i < count($value); $i++) { 
    //         if ($cart1 == substr($value[$i],0,1)) {
    //             $cont1++;
    //         }
    //         if ($cart2 == substr($value[$i],0,1)) {
    //             $cont2++;
    //         }
    //     }


    //     echo "Contador 1 de ".$key." es ".$cont1."<br>";
    //     echo "Contador 2 de ".$key." es ".$cont2."<br>";
    //     echo "<br>";
    //     if ($cont1 == 2 || $cont2 == 2) {
    //         $arrgan += [$key => "pareja"];
    //     }  
    // }


    
        
    

    return $arrgan;

    
}

function ganador($arr ,$bote){

    print_r($arr);

    echo "<br>";
    $contpoker = 0;
    $conttrio = 0;
    $contdoble = 0;
    $contparej = 0;

    foreach ($arr as $key => $value) {
        if ($value == "poker") {
            $contpoker++;
        }
        if ($value == "trio") {
            $conttrio++;
        }
        if ($value == "doble pareja") {
            $contdoble++;
        }
        if ($value == "pareja") {
            $contparej++;
        }

    }
    if ($contpoker > 0) {
        $bote = $bote/$contpoker;
    }elseif ($contpoker == 0 && $conttrio > 0) {
        $bote = $bote*0.7/$conttrio;
    }

    



}


function val($data) { //Funcion que nos valida los datos
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>