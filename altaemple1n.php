<?php


$cod_dpto = $_POST["cod_dpto"];
$nom_emple = $_POST["nombre"];
$dni_emple = $_POST["dni"];
$salario_emple = $_POST["salario"];
$fecha_nac_emple = $_POST["fecha_nac"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname="empleados1n";


//PDO

try {
    
    //Preparacion de sentencia
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); //crea conexion
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // captura error / excepcion
    $stmt = $conn->prepare("INSERT INTO EMPLE (DNI,NOMBRE,SALARIO,FECHA_NAC,COD_DPTO) 
                                    VALUES (:dni,:nombre,:salario,:fech_nac,:cod_dpto)");

    $stmt->bindParam(':dni', $dni_emple);
    $stmt->bindParam(':nombre', $nom_emple);
    $stmt->bindParam(':salario', $salario_emple);
    $stmt->bindParam(':fech_nac', $fecha_nac_emple);
    $stmt->bindParam(':cod_dpto', $cod_dpto);


    //ejecucion de sentencia
    $stmt->execute();

    echo "Alta Empleado correcta";



} catch(PDOException $e) {

        $err = $stmt->errorInfo();
        $error = $e->getMessage();

        if ($err[1] == "1062") {
            echo "Empleado duplicado";
        }elseif($err[1] == "1452") {
            echo "El departamento no existe";
        }else{
            echo $error;
        }
        

    //recoje errores 

    //echo $e->getMessage();

//     $error = $e->getMessage();

//      $err = substr($error , 49 , 4);

// //    $error = $e->getCode();

//      if ($err == "1062") {
//          echo "Empleado duplicado";
//      }elseif($err == "1452") {
//          echo "El departamento no existe";
//      }else{
//         echo $error;
//      }
    
}

    $conn = null;


?>