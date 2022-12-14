<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ALTA ALMACEN</title>
</head>
<body>
    <H2>ALTA ALMACEN</H2>   
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="loc">Localidad</label>
    <input type="text" name="loc">
    <br><br>
    <input type="submit" name="insert" value="Dar de alta">
    </form>
</body>
</html>

<?php 
    require "compras_fun.php";

    if (isset($_POST["insert"])) {
        $loc = test_input($_POST["loc"]);
        $conn = connect();
        alta_alm($loc, $conn);
    }

?>