<?php

function test_input($data){ #limpiamos los input
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function connect(){ #conexion a la base de datos
    #credenciales conexion a la bd
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "comprasweb";

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

function alta_cat($nombre, $conn){  #recibe la conexion y el nombre de la categoria e inserta en la tabla categoria una nueva fila autoincrementando el id por php
    try {
        #$conn = connect();
        $stmt = $conn->prepare("INSERT INTO categoria (ID_CATEGORIA, NOMBRE) VALUES (:id, :nombre)");
        $stmt2 = $conn->prepare("SELECT * FROM categoria");
        $stmt2->execute();
        $num = $stmt2->rowCount(); 
        $id = "C-".str_pad($num+1, 3, "0", STR_PAD_LEFT); #C-xxx
        
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    

        echo "Alta Categoria correcta";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

function alta_alm($loc, $conn){ #recibe la conexion y la localidad e inserta en la tabla almacen una localidad con id autoincrementado por mysql
    try {
        $stmt = $conn->prepare("INSERT INTO almacen (LOCALIDAD) VALUES (:localidad)");
        $stmt->bindParam(':localidad', $loc);
        $stmt->execute();
    
        echo "Alta Almacén correcta";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


function consulta_stock($id, $conn){    #recibe id del producto seleccionado y la conexion a la BD y devuelve el stock disponible de dicho producto en cada uno de los almacenes
    try{
        $stmt = $conn->prepare("SELECT * FROM almacena , almacen WHERE almacena.num_almacen = almacen.num_almacen AND ID_PRODUCTO=:id ");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_NUM);
        // echo "Producto : $id <br>";
        foreach($result as $key => $value){
            $almacen = $value[4];
            $stock = $value[2];
            echo "Almacen: $almacen - Stock disponible: $stock <br>";
        }
        
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
}

function consulta_compra($nif, $desde, $hasta, $conn){
    try{
        $stmt = $conn->prepare("SELECT producto.NOMBRE, producto.ID_PRODUCTO, producto.PRECIO, compra.UNIDADES FROM producto, compra WHERE compra.ID_PRODUCTO=producto.ID_PRODUCTO AND compra.FECHA_COMPRA<:hasta AND compra.FECHA_COMPRA>:desde AND compra.NIF=:nif");
        $stmt->bindParam(':nif', $nif);
        $stmt->bindParam(':desde', $desde);
        $stmt->bindParam(':hasta', $hasta);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_NUM);
        $total = null;
        foreach($result as $key => $value){
            $total += $value[3]*$value[2]; 
            echo "Producto: ".$value[1]." | Nombre del producto: ".$value[0]." | Precio: ".$value[2]." | Cantidad: ". $value[3]."<br>";
            echo "El gasto total es de : $total €<br>";
        }
 


    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }


}

function compra_prod($prod, $cant, $nif, $conn){
    try{
        $stmt = $conn->prepare("SELECT * FROM ALMACENA WHERE ID_PRODUCTO = :prod");
        $stmt->bindParam(':prod', $prod);
        $stmt->execute();
        $cant2 = $cant;

        $stock = $stmt->fetchAll(\PDO::FETCH_NUM);
        var_dump($stock);
        $fecha = date("Y-m-d");
        foreach($stock as $key => $value){
            $unid = $value[2];
            $almacen = $value[0];
            if($cant2 > 0){
                if($unid >= $cant2){
                $unid = $unid - $cant2;
                $cant2 = 0;
                $stmt = $conn->prepare("UPDATE ALMACENA SET CANTIDAD = :cant WHERE NUM_ALMACEN = :alma AND ID_PRODUCTO = :prod");
                $stmt->bindParam(':alma', $almacen);
                $stmt->bindParam(':cant', $unid);
                $stmt->bindParam(':prod', $prod);
                $stmt->execute();
                $stmt = $conn->prepare("INSERT INTO COMPRA (NIF, ID_PRODUCTO, FECHA_COMPRA, UNIDADES) VALUES (:nif, :prod, :fecha, :cant)");
                $stmt->bindParam(':nif', $nif);
                $stmt->bindParam(':cant', $cant);
                $stmt->bindParam(':prod', $prod);
                $stmt->bindParam(':fecha', $fecha);
                $stmt->execute();
                
            }else{
                echo "Stock insuficiente";
            }
        }
            
        }
            

  

    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
}

//  <!---------------- Patryk ----------------!>

function alta_prod($nombre,$precio,$id_cat,$conn ){

    try {
        

        $sth = $conn->prepare("SELECT * FROM producto");
        $sth->execute();

        $result = $sth->fetchAll();

        $cont = count($result)+1;

        $idpro = "P".str_pad($cont,4,"0",STR_PAD_LEFT);

        $stmt = $conn->prepare("INSERT INTO producto (ID_PRODUCTO, NOMBRE, PRECIO, ID_CATEGORIA) VALUES (:id_prod,:nombre,:precio,:id_cate)");

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':id_cate', $id_cat);
        $stmt->bindParam(':id_prod', $idpro);

        $stmt->execute();
            echo "Alta Producto correcta<br>";

    } catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
}

function select($name = "",$conn){

    $sth = $conn->prepare("SELECT * FROM $name");
    $sth->execute();

    /* Fetch all of the values of the first column*/
    $result = $sth->fetchAll(\PDO::FETCH_NUM);
    return $result;
}

function mostrarselect($result,$name = ""){

    echo '<select name="'.$name.'">';
     foreach ($result as $key => $value) {
        echo "<option value='".$value[0]."'>".$value[1]."</option>";
     }
    echo '</select>';

}

function mostrarselectpos0($result,$name = ""){

    echo '<select name="'.$name.'">';
     foreach ($result as $key => $value) {
        echo "<option value='".$value[0]."'>".$value[0]."</option>";
     }
    echo '</select>';

}

function aprpro($id,$almacen,$cantidad,$conn){
    try {
        
        $stmt = $conn->prepare("SELECT * FROM almacena where id_producto=:id && num_almacen = :almacen");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':almacen', $almacen);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_NUM);

        $cont = count($result);

        foreach ($result as $key => $value) {
            $sum = $value[2];
        }


        if ($cont == 1) {

        $sum1 = $sum + $cantidad;

        $stmt = $conn->prepare("UPDATE almacena SET cantidad = :cant where id_producto = :id_prod && num_almacen = :alma");

        $stmt->bindParam(':id_prod', $id);
        $stmt->bindParam(':cant', $sum1);
        $stmt->bindParam(':alma', $almacen);

        $stmt->execute();
            echo "Aprovisionar Productos correcta<br>";

        }else{
            $stmt = $conn->prepare("INSERT INTO almacena (ID_PRODUCTO, NUM_ALMACEN,CANTIDAD) VALUES (:id_prod,:alma,:cant)");

            $stmt->bindParam(':id_prod', $id);
            $stmt->bindParam(':cant', $cantidad);
            $stmt->bindParam(':alma', $almacen);
    
            $stmt->execute();
                echo "Aprovisionar Productos correcta<br>";
        }

    } catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }


}

function almacen($alma,$conn){
    try {

        $sth = $conn->prepare("SELECT * FROM almacena where NUM_ALMACEN=$alma");
        $sth->execute();

        $result = $sth->fetchAll(\PDO::FETCH_NUM);
        
        foreach ($result as $key => $value) {
            echo "Numero almacen = ".$value[0]."<br>";
            echo "ID Producto = ".$value[1]."<br>";
            echo "Cantidad = ".$value[2]."<br>";
        }


    } catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }



}

function alta_cliente($nif,$nombre,$apellido,$cp,$direccion,$ciudad,$conn){

    try {

        $stmt = $conn->prepare("INSERT INTO cliente (NIF,NOMBRE,APELLIDO,CP,DIRECCION,CIUDAD) VALUES (:nif,:nombre,:apellido,:cp,:direccion,:ciudad)");

        $stmt->bindParam(':nif', $nif);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':cp', $cp);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':ciudad', $ciudad);
        $stmt->execute();

        echo "Alta Cliente correcta";
        
        
    } catch (PDOException $e) {

        echo "Error: " . $e->getMessage();

    }


}

function register_user($nif,$nombre,$apellido,$cp,$direccion,$ciudad,$conn){

    $pass = strrev(strtolower($apellido));

    try {

        $stmt = $conn->prepare("INSERT INTO cliente (NIF,NOMBRE,APELLIDO,CONTRASENA,CP,DIRECCION,CIUDAD) VALUES (:nif,:nombre,:apellido,:pass,:cp,:direccion,:ciudad)");

        $stmt->bindParam(':nif', $nif);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':cp', $cp);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':ciudad', $ciudad);
        $stmt->execute();

        echo "Registro correcto";
        echo "<br> Usuario = $nombre <br> Contraseña = $pass";
        
        
    } catch (PDOException $e) {

        echo "Error: " . $e->getMessage();

    }

}

function login($user,$pass,$conn,$cookie_name){
    $pass1 = strtolower($pass);
    try {
        $stmt = $conn->prepare("SELECT * FROM cliente where nombre=:user && contrasena = :pass");

        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':pass', $pass1);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_NUM);

        foreach ($result as $key => $value) {
            $nif = $value[0];
        }

        if (count($result)==0) {
            echo"El usuario no existe o se ha introducido parametros incorrectos";
            $pag = false;
        }else{
            setcookie($cookie_name,$nif,time() + (86400 * 30), "/");
            echo "Sesion correctamente iniciada";
            echo "<br><br>";
            echo "<a href='comconscom.php'>CONSULTA DE COMPRAS</a><br>";
            echo "";
            $pag = true;
        }
        

    }catch (PDOException $e) {

        echo "Error: " . $e->getMessage();
        
    }

    return $pag;

}

function validarNIF($nif){
    $valido = true;
    $letra = substr(strtoupper($nif), -1);
    $numeros = substr($nif, 0, -1);
    $arrletras = ["Q","W","E","R","T","Y","U","I","O","P","A","S","D","F","G","H","J","K","L","Z","X","C","V","B","N","M"];

    if($nif == ""){
        echo "<br>El nif no puede estar vacio";
    }else{
        for($i = 0; $i < count($arrletras); $i++){
            if($letra != $arrletras[$i]){
                $valido = false;
            }
            }
            if(strlen($numeros) == 8 && is_numeric($numeros) == true){
                $valido = true; 
            }else{
                echo "El nif tiene que tener una longitud de 9 caracteres: 8 números y 1 letra";
                $valido = false;            
        } 
    }
    return $valido;
}

function cesta($prod, $unid){
    if(isset($_COOKIE["cesta"])){
        $valor_cookie = [];
        $valor_cookie = $_COOKIE["cesta"];
        $unserialized = unserialize($valor_cookie);
        array_push($unserialized, [$prod=>$unid]);
        var_dump($unserialized);
        $serialized = serialize($unserialized);
        setcookie("cesta",$serialized, time() + (86400 * 30), "/");
    }else{
        $array = [];
        array_push($array, [$prod=>$unid]);
        $serialized = serialize($array);
        setcookie("cesta", $serialized, time() + (86400 * 30), "/");
    }
}

function compra_cesta($nif,$conn){
    
}

?>
