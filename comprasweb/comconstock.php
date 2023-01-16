<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CONSULTA DE STOCK</title>
</head>
<body>
    <H2>CONSULTA DE STOCK</H2>   
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="producto">Producto </label>
    <?php
        require "compras_fun.php";
        $conn = connect();
        $res = select("producto" , $conn);
        mostrarselect($res, "producto");
    ?>
    <br><br>
    <input type="submit" name="insert" value="Mostrar stock">
    <br><br>
    <a href="index.php">Inicio</a>
    </form>
</body>
</html>

<?php 
    if (isset($_POST["insert"])) {
        $prod = $_POST["producto"];
        consulta_stock($prod, $conn);
    }
?>