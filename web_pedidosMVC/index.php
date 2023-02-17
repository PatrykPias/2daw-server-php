<!DOCTYPE html>
<html lang="es">
<?php
    require_once("controllers/sesion_login.php");
?>
<head>
    <meta charset="UTF-8">
    <title>LOGIN USUARIO</title>
</head>

<body>
    <H2>LOGIN USUARIO</H2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="user">Usuario</label>
    <input type="text" name="user">
    <br>
    <label for="pass">Contraseña/Clave</label>
    <input type="text" name="pass">
    <br>
    <br><br>
    <input type="submit" name="insert" value="Iniciar Sesion">
    <br><br>
    </form>

</body>
</html>

<?php 
    if (isset($_POST["insert"])) {

        $user = $_POST["user"];
        $pass =$_POST["pass"];

        $pass1 = strtolower($pass);

        require_once("db/db.php");

        require_once("controllers/login.php");

                
    }

?>
