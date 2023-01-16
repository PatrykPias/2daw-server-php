<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ALTA CLIENTE</title>
</head>
<body>
    <H2>ALTA CLIENTE</H2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="nif">NIF</label>
    <input type="text" name="nif">
    <br>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre">
    <br>
    <label for="Apellido">Apellido</label>
    <input type="text" name="apellido">
    <br>
    <label for="cp">Codigo Postal</label>
    <input type="number" name="cp">
    <br>
    <label for="Direccion">Direccion</label>
    <input type="text" name="direccion">
    <br>
    <label for="ciudad">Ciudad</label>
    <input type="text" name="ciudad">
    <br>
    <br><br>
    <input type="submit" name="insert" value="Dar de alta">
    <br><br>
    <a href="index.php">Inicio</a>
    </form>

</body>
</html>

<?php 
    require "compras_fun.php";

    if (isset($_POST["insert"])) {

        $nif = test_input($_POST["nif"]);
        $nombre = test_input($_POST["nombre"]);
        $apellido = test_input($_POST["apellido"]);
        $cp = test_input($_POST["cp"]);
        $dir = test_input($_POST["direccion"]);
        $ciudad = test_input($_POST["ciudad"]);

        $conn = connect();

        $valido = validarNIF($nif);

        if ($valido == true) {
            alta_cliente($nif,$nombre,$apellido,$cp,$dir,$ciudad,$conn);
        }

        }

?>