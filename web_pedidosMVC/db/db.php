<?php

    #credenciales conexion a la bd
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pedidos";

    #pdo php database object
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); #establecemos la captura de excepciones

    }
    catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


?>