<?php

function test_input($data){ #limpiamos los input
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function connect(){
    #credenciales conexion a la bd
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "empleadosnn";

    #pdo php database object
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); #establecemos la captura de excepciones
        return $conn;
    }
    catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}

function selectDpto(){
    $conn = connect();
    $sth = $conn->prepare("SELECT * FROM dpto");
    $sth->execute();

    /* Fetch all of the values */
    $result = $sth->fetchAll();

    echo '<select name="dpto">';
    foreach ($result as $key => $value) {
        for ($i=0; $i < count($result); $i++) { 
            echo "<option value='".$value[0]."'>".$value[1]."</option>";
        }
    }
    echo '</select>';

}

function insert_dpto($nombre,$conn){

    try {
        $stmt = $conn->prepare("INSERT INTO DPTO (NOMBRE) 
                                    VALUES (:nombre)");
        $stmt->bindParam(':nombre', $nombre);

        $stmt->execute();

        echo "Alta Empleado correcta";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

function insert_emple($dni, $nombre, $salario, $fecha_nac, $conn){  #funcion que inserta en la tabla empleado
        #preparacion sentencia sql
        try{
            $stmt = $conn->prepare("INSERT INTO emple (dni,nombre,salario,fecha_nac) VALUES (:dni,:nombre,:salario,:fecha_nac)");
            $stmt->bindParam(':dni', $dni);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':salario', $salario);
            $stmt->bindParam(':fecha_nac', $fecha_nac);
            
        
            #ejecucion sentencia
            $stmt->execute();
            echo "Alta Empleado correcta<br>";
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }

}

function insert_emple_dpto($cod_dpto, $dni, $fecha_inic, $conn){ #funcion que inserta un empleado en la tabla emple_dpto
        #preparacion sentencia sql
        try{
            $stmt = $conn->prepare("INSERT INTO emple_dpto (cod_dpto,dni,fecha_inicio) VALUES (:cod_dpto,:dni,:fecha_inicio)");
            $stmt->bindParam(':dni', $dni);
            $stmt->bindParam(':cod_dpto', $cod_dpto);
            $stmt->bindParam(':fecha_inicio', $fecha_inic);
            
        
            #ejecucion sentencia
            $stmt->execute();
            echo "Alta Empleado correcta<br>";
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
}

function selectDni(){
    $conn = connect();
    $sth = $conn->prepare("SELECT * FROM emple");
    $sth->execute();

    /* Fetch all of the values of the first column*/
    $result = $sth->fetchAll(PDO::FETCH_COLUMN, 0);

    echo '<select name="emple">';
    foreach ($result as $key => $dni) {
        echo "<option value='".$dni."'>".$dni."</option>";
        
    }
    echo '</select>';

}

function update_dpto_nuevo($dni, $cod_dpto, $fecha_inic, $conn){
        #preparacion sentencia sql
        try{
            $stmt = $conn->prepare("UPDATE emple_dpto SET cod_dpto=:cod_dpto, fecha_inicio=:fecha_inicio WHERE dni=:dni");
            $stmt->bindParam(':dni', $dni);
            $stmt->bindParam(':fecha_inic', $fecha_inic);
            $stmt->bindParam(':cod_dpto', $cod_dpto);
            
        
            #ejecucion sentencia
            $stmt->execute();
            echo "Cambio departamento correcto";
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
}

function update_dpto_act($dni, $cod_dpto, $fecha_fin, $conn){
        #preparacion sentencia sql
        try{
            $stmt = $conn->prepare("UPDATE emple_dpto SET fecha_fin=:fecha_fin WHERE dni=:dni AND cod_dpto=:cod_dpto");
            $stmt->bindParam(':dni', $dni);
            $stmt->bindParam(':fecha_fin', $fecha_fin);
            $stmt->bindParam(':cod_dpto', $cod_dpto);
            
        
            #ejecucion sentencia
            $stmt->execute();
            echo "Cambio departamento correcto";
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
}
function salario_act($dni){
    $conn = connect();

    $sth = $conn->prepare("SELECT * FROM emple WHERE DNI=:dni ;");
    $sth->bindParam(':dni', $dni);
    $sth->execute();

    $salario = $sth->fetchAll(PDO::FETCH_COLUMN, 2);
    $salario1 = $salario[0];

    echo " <br>El salaro actual es : $salario1 €";

}

function salario_nuevo($salario_new , $dni){
    try {
        $conn = connect();

        $sth = $conn->prepare("Update emple set=:salario where dni=:dni");
        $sth->bindParam(':salario', $salario_new);
        $sth->bindParam(':dni', $dni);
        $sth->execute();

        echo "Cambio de Salario Realizado correctamente";

    }catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    

}

?>