<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>COMPRA DE PRODUCTOS</title>
</head>
<?php
    if (isset($_COOKIE['user'])) {
        $nif = $_COOKIE['user'];
    }else{
        $nif = "";
    }

    ?>
<body>
    <H2>COMPRA DE PRODUCTOS</H2>   
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="nif">NIF Cliente </label>
    <?php echo "<input type='Text' name='nif' value = '$nif' readonly>" ?>
    <br><br>
    <label for="producto">Producto </label>
    <?php
        require "compras_fun.php";
        $conn = connect();
        $res = select("producto", $conn);
        mostrarselect($res, "producto");
    ?>
    <br><br>
    <label for="unid">Unidades </label>
    <input type="number" name="unid">
    <br><br>
    <input type="submit" name="compra" value="Comprar">
    <input type="submit" name="add_cest" value="Añadir A Cesta">
    <br><br>
    <a href="welcome.php">Inicio</a>
    </form>
</body>
</html>
<?php 

    if(isset($_POST["add_cest"])){
        $prod = $_POST["producto"];
        $unid = test_input($_POST["unid"]);
        cesta($prod,$unid);

    }
    if (isset($_POST["compra"])) {
        $nif = test_input($_POST["nif"]);
        $prod = $_POST["producto"];
        $unid = test_input($_POST["unid"]);
        
    }
?>