<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aprovisionar Productos</title>
</head>
<body>
    <H2>Aprovisionar Productos</H2>
   
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

    <?php
    require "compras_fun.php";
    $conn = connect();
    echo '<label for="proname">Nombre Producto</label>';
    $res1 = select("producto",$conn);
    mostrarselect($res1,"prod");
    echo"<br>";
    echo '<label for="numal">Numero Almacenes</label>';
    $res1 = select("almacen",$conn);
    mostrarselectpos0($res1,"alma");
    echo"<br>";
    ?>
    <label for="Cantidad">Cantidad</label>
    <input type="number" name="cantidad">
    <br>
    <input type="submit" name="alta" value="Aprovisionar Productos">

    </form>

</body>
</html>

<?php 

    if (isset($_POST["alta"])) {

        $nombre = test_input($_POST["prod"]);
        $alma = test_input($_POST["alma"]);
        $cant = test_input($_POST["cantidad"]);

        aprpro($nombre,$alma,$cant,$conn);

                
    }

?>