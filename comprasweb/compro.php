<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>COMPRA DE PRODUCTOS</title>
</head>
<body>
    <H2>COMPRA DE PRODUCTOS</H2>   
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="nif">NIF CLIENTE</label>
    <?php
        require "compras_fun.php";
        $conn = connect();
        $res = select("cliente",$conn);
        mostrarselectpos0($res, "cliente");
    ?>
    <br><br>
    <label for="producto">Producto </label>
    <?php
        
        $conn = connect();
        $res = select("producto", $conn);
        mostrarselect($res, "producto");
    ?>
    <br><br>
    <label for="unid">Unidades </label>
    <input type="number" name="unid">
    <br><br>
    <input type="submit" name="compra" value="Comprar">
    <br><br>
    <a href="index.php">Inicio</a>
    </form>
</body>
</html>

<?php 
    if (isset($_POST["compra"])) {
        $nif = $_POST["nif"];
        $prod = $_POST["producto"];
        $unid = test_input($_POST["unid"]);
        compra_prod($prod, $unid, $nif, $conn);
    }
?>