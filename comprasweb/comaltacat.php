<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ALTA CATEGORIA</title>
</head>
<body>
    <H2>ALTA CATEGORIA</H2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre">
    <br><br>
    <input type="submit" name="insert" value="Dar de alta">
    </form>

</body>
</html>

<?php 
    require "compras_fun.php";

    if (isset($_POST["insert"])) {
        $nombre = test_input($_POST["nombre"]);
        $conn = connect();
        alta_cat($nombre, $conn);
    }

?>