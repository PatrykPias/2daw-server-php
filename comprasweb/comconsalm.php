<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consulta de almacenes</title>
</head>
<body>
    <H2>Consulta de Almacenes</H2>
   
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

    <?php
    require "compras_fun.php";
    $conn = connect();
    echo '<label for="almacen">Almacen</label>';
    $res1 = select("almacen",$conn);
    mostrarselect($res1,"alma");
    echo"<br>";
    ?>
    <br>
    <input type="submit" name="alta" value="Consultar">
    <br><br>
    <a href="index.php">Inicio</a>

    </form>

</body>
</html>

<?php 

    if (isset($_POST["alta"])) {

        $alma = test_input($_POST["alma"]);

        almacen($alma,$conn);

                
    }

?>