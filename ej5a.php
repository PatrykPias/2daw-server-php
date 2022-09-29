<HTML> <HEAD><TITLE> EJ5A-Ejercicios Arrays Unidimensionales </TITLE></HEAD>

<BODY>

<?php

$arr1 = array("Bases Datos", "Entornos Desarrollo", "Programación");
$arr2 = array("Sistemas Informáticos","FOL","Mecanizado");
$arr3 = array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés");


echo "Array unida sin funciones<br><br>";
$j = 0;  //Creamos e inicializamos variable en 0
$arr4 = array(); //creamos el array vacio
for ($i=0; $i < count($arr1); $i++) {  //creamos un bucle para añadir el primer array al creado anteriormente 
    $arr4[$i]=$arr1[$i]; //añadimos a las psoiciones cada valor 
}
$cuenta = count($arr4); // hacemos la cuenta 
$sum = $cuenta+count($arr2); //y sumamos a la cuenta cuantas posiciones tiene el siguente array 
for ($i=$cuenta; $i < $sum; $i++) { //creamos otro bucle para añadir el segundo array al anterior 
                                    //en este bucle pondremos que i empieze en la cuenta del primero y termine en la suma de los dos 
 
    $arr4[$i]=$arr2[$j];            // Array 4 empieza en i y el arr2 empieza en 0 por que queremos poner en la posicion i la posicion 0 del array 2
    $j++;                           //añadimos 1 a j por cada vuelta que da 
}
$j = 0;                             //reiniciamos la variable 
$cuenta = count($arr4);             //reiniciamos la cuenta
$sum = $cuenta+count($arr3);            // reiniciamos la suma 
for ($i=$cuenta; $i < $sum; $i++) {   //volvemos ha hacer el mismo bucle anterior 
    $arr4[$i]=$arr3[$j];
    $j++;
}


print_r($arr4);             //aqui imprimimos el arr unido
echo"<br><br>";
echo "Array con funcion merge<br><br>";
$arr5 = array_merge($arr1,$arr2,$arr3);  //aqui utilizamos la funcion merge que nos lo une automaticamente 

print_r($arr5);  //imprimios arr5 
echo"<br><br>";

$arr6 = array();

echo "Array con funcion push <br><br>";
array_push($arr6, ...$arr1,...$arr2,...$arr3); //aqui utilizamos la funcion push 
print_r($arr6);

//otra forma de utilizar funcion push
// for ($i=0; $i < count($arr1); $i++) { 
//     array_push($arr6,$arr1[$i]);
// }
// for ($i=0; $i < count($arr2); $i++) { 
//     array_push($arr6,$arr2[$i]);
// }
// for ($i=0; $i < count($arr3); $i++) { 
//     array_push($arr6,$arr3[$i]);
// }

?>
 </BODY> </HTML>