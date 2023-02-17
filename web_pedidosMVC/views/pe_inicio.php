<!DOCTYPE html>
<html lang="es">
    <?php
        include_once("../controllers/sesion.php");
    ?>
<head>
    <meta charset="UTF-8">
    <title>Web Pedidos</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <br>

    <a href="pe_altaped.php">Compras</a>

    <br><br>
    <input type="submit" name="close" value="Cerrar Sesion">
    <br>
    </form> 
</body>
</html>

<?php 
    if (isset($_POST["close"])) {

    include_once("../controllers/cerrar_sesion.php");

    }

?>