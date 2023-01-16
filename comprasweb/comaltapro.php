<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alta de Producto</title>
</head>
<body>
    <H2>Alta de Producto</H2>
   
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre">
    <label for="precio">Precio</label>
    <input type="number" name="precio">
    <?php
    require "compras_fun.php";
    $conn = connect();
    $res = select("categoria",$conn);
    mostrarselect($res,"categoria");
    ?>
    <input type="submit" name="alta" value="Dar de Alta Producto">
    <br><br>
    <a href="index.php">Inicio</a>

    </form>

</body>
</html>

<?php 

    if (isset($_POST["alta"])) {

        $nombre = test_input($_POST["nombre"]);
        $precio = test_input($_POST["precio"]);
        $idcat = test_input($_POST["categoria"]);

        alta_prod($nombre,$precio,$idcat,$conn);
                
    }

?>