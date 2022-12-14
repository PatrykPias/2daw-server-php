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
        $stmt = $conn->prepare("SELECT * FROM almacena WHERE ID_PRODUCTO=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_NUM);
        foreach($result as $key => $value){
            $almacen = $value[0];
            $stock = $value[2];
        }

        echo "$almacen - Stock disponible: $stock";
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
}

function consulta_compra($nif, $desde, $hasta, $conn){
    try{
        $stmt = $conn->prepare("SELECT producto.NOMBRE, producto.ID_PRODUCTO, producto.PRECIO, compra.UNIDADES FROM producto, compra 
        WHERE compra.ID_PRODUCTO=producto.ID_PRODUCTO AND compra.FECHA_COMPRA<:hasta AND compra.FECHA_COMPRA>:desde AND compra.NIF=:nif");
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

        $stmt = $conn->prepare("INSERT INTO almacena (ID_PRODUCTO, NUM_ALMACEN,CANTIDAD) VALUES (:id_prod,:alma,:cant)");

        $stmt->bindParam(':id_prod', $id);
        $stmt->bindParam(':cant', $cantidad);
        $stmt->bindParam(':alma', $almacen);

        $stmt->execute();
            echo "Aprovisionar Productos correcta<br>";

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


?>
