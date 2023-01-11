<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CONSULTA DE COMPRAS</title>
</head>
<body>
    <H2>CONSULTA DE COMPRAS</H2>   
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="cliente">NIF CLIENTE </label>
    <?php
        require "compras_fun.php";
        $conn = connect();
        $res = select("cliente",$conn);
        mostrarselectpos0($res, "cliente");
    ?>
    <br><br>
    <label for="desde">Fecha desde: </label>
    <input type="text" name="desde" value="aaaa-mm-dd">
    <br><br>
    <label for="hasta">Fecha hasta: </label>
    <input type="text" name="hasta" value="aaaa-mm-dd">
    <br><br>
    <input type="submit" name="insert" value="Mostrar stock">
    </form>
</body>
</html>

<?php 
    if (isset($_POST["insert"])) {
        $nif = $_POST["cliente"];
        $desde = test_input($_POST["desde"]);
        $hasta = test_input($_POST["hasta"]);
        consulta_compra($nif, $desde, $hasta, $conn);
    }
?>