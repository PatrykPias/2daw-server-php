<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ALTA DEPARTAMENTO</title>
</head>
<body>
    <H2>ALTA DEPARTAMENTO</H2>
   
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre">
    <br>
    <br>
    <input type="submit" name="insert" value="Inscribir">

    </form>

</body>
</html>

<?php 

    require "bd_fun.php";

    if (isset($_POST["insert"])) {
        $nombre = test_input($_POST["nombre"]);

        $conn = connect() ;

        insert_dpto($nombre,$conn);
    }

    



?>