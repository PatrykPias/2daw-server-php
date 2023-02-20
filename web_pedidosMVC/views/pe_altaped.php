<!DOCTYPE html>
<?php

    include_once("../controllers/sesion.php");
    include_once("../controllers/alta_pedido.php");

?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedidos</title>
    </head>
<body>
    <H2>Pedidos</H2>   
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="user">Numero de Cliente</label>
    <?php echo "<input type='Text' name='user' value = '$usr' readonly>" ?>
    <br><br>
    <label for="producto">Producto </label>
    <select name="products">
    <?php
            foreach ($result as $key => $value) {
               echo "<option value='".$value[0]."'>".$value[1]."</option>";
            }

    ?>
    </select>
    <br><br>
    <label for="unid">Unidades </label>
    <input type="number" name="unid">
    <br><br>
    <label for="chek">Número de pago</label>
    <input type="text" name="chek">
    <br><br>
    <input type="submit" name="compra" value="Comprar">
    <input type="submit" name="add_cest" value="Añadir A Cesta">
    <input type="submit" name="ver_cest" value="Ver Cesta">
    <br><br>
    <a href="pe_inicio.php">Inicio</a>
    </form>
</body>
</html>
<?php 

    if(isset($_POST["add_cest"])){
        $prod = $_POST["products"];
        $unid = $_POST["unid"];
        if ($unid != 0 && $unid != NULL) {
            echo "Cesta: <br>";
            include_once("../controllers/add_cesta.php");

            //$total = total_cesta();
            // echo "<br> El Precio total es : $total <br>";
        }else{
            echo "El campo de unidades no puede estar vacío ni a 0";
        }


    }
    // if (isset($_POST["compra"])) {

    //     $good = Npago($_POST["chek"]);

    //     if ($good == true) {
    //         $user = test_input($_POST["user"]);
    //         $prod = $_POST["products"];
    //         $unid = test_input($_POST["unid"]);
    //         $chek = $_POST["chek"];
    //         $_SESSION["chek"] = $chek;
    //         $cesta = compr_cesta();
    //         if($cesta){
    //             //compra_cesta($user,$conn,$chek);
    //             //header("Location:ejemploGenerarPet.php") ;
    //            echo "<SCRIPT>window.location='ejemploGeneraPet.php';</SCRIPT>";
    //         }else{
    //             echo "La cesta estsa vacia";
    //         }

    //     } else {
    //        echo "El Numero de Pago es incorrecto";
    //     }
        
            
    // if(isset($_POST["ver_cest"])){
    //     $cesta = compr_cesta();
    //     if($cesta){
    //         ver_cesta();
    //     }else{
    //         echo "La cesta estsa vacia";
    //     }
    // }
?>