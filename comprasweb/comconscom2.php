<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CONSULTA DE COMPRAS</title>
</head>
<?php
    if (isset($_COOKIE['user'])) {
        $nif = $_COOKIE['user'];
    }else{
        $nif = "";
    }
    ?>
<body>
    <H2>CONSULTA DE COMPRAS</H2>   
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="nif">NIF Cliente </label>
    <?php echo "<input type='Text' name='nif' value = '$nif' readonly>" ?>
    <br><br>
    <label for="desde">Fecha desde: </label>
    <input type="text" name="desde" value="aaaa-mm-dd">
    <br><br>
    <label for="hasta">Fecha hasta: </label>
    <input type="text" name="hasta" value="aaaa-mm-dd">
    <br><br>
    <input type="submit" name="insert" value="Mostrar stock">
    <br><br>
    <a href="welcome.php">Inicio</a>
    </form>
</body>
</html>

<?php 
    if (isset($_POST["insert"])) {
        $nif = $_POST["nif"];
        $desde = test_input($_POST["desde"]);
        $hasta = test_input($_POST["hasta"]);
        consulta_compra($nif, $desde, $hasta, $conn);
    }
?>