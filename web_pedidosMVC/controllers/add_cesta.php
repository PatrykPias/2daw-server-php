<?php
include_once("../db/db.php");
include_once("../models/cesta.php");

$result = precio($conn , $prod);
$stock = productos($conn,$prod);

       
        if ($stock[0][2] >= $unid) {
                    if(isset($_SESSION["cesta"])){
                    $valor_sesion = [];
                    $valor_sesion = $_SESSION["cesta"];
                    $unserialized = unserialize($valor_sesion);
                    $repetido = false;
                    $arr = [];

                    $cant = 0;
                    $precio = 0;
                    $total = 0;
            
                    foreach ($result as $key => $value) {
                        $precio_unidad = $value[0];
                    }

                    foreach($unserialized as $key => $value) {
                        if ($unserialized[$key][0] == $prod) {
                            $cant = $value[1];
                            $precio = $value[2];
                            $repetido = true;
                            $total = $precio_unidad * $unid + $precio;
                            $cantidad = $unid + $cant;
                            if($stock[0][2] >= $cantidad){
                                $unserialized[$key][1] = $cantidad;
                                $unserialized[$key][2] = $total;
                            }else{
                                include("../views/no_stock.php");
                            }

            
                        }
                    }
            
                    $total = $precio_unidad * $unid;
            
                    if (!$repetido) {
                        $arr = [$prod , $unid , $total];
                        array_push($unserialized , $arr);
                    }
                    
                    
                    
                    
                    foreach($unserialized as $key => $value){
                        include("../views/cesta_view.php");
                    }
            
                    $serialized = serialize($unserialized);
                    $_SESSION["cesta"] = $serialized;
                        }else{

                    $array = [];
                    $total = 0;
            
                    foreach ($result as $key => $value) {
                        $precio_unidad = $value[0];
                    }
                    $total = $precio_unidad *$unid;
            
                    $arr = [$prod , $unid , $total];
            
                    array_push($array , $arr);
            
                    foreach($array as $key => $value){
                        include("../views/cesta_view.php");
                    }
                    $serialized = serialize($array);
                    $_SESSION["cesta"]=$serialized;
                
                    }
                }
                else{
                foreach ($stock as $key => $value) {
                    include("../views/no_stock.php");
                }
    
                }

?>