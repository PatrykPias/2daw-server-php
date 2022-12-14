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
    echo '<label for="almacen">Almacen</label>';
    $res1 = select("almacen",$conn);
    mostrarselect($res1,"alma");
    echo"<br>";
    ?>
    <br>
    <input type="submit" name="alta" value="Aprovisionar Productos">

    </form>

</body>
</html>

<?php 

    if (isset($_POST["alta"])) {

        $alma = test_input($_POST["alma"]);

        almacen($alma,$conn);

                
    }

?>