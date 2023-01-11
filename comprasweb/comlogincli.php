<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LOGIN USUARIO</title>
</head>
<?php
$cookie_name ="user";
$cookie_nif = "00000000X";
setcookie($cookie_name,$cookie_nif,time() + (86400 * 30), "/");
?>
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
    <input type="submit" name="insert" value="Dar de alta">
    </form>

</body>
</html>

<?php 
    require "compras_fun.php";

    if (isset($_POST["insert"])) {

        $user = test_input($_POST["user"]);
        $pass = test_input($_POST["pass"]);

        $conn = connect();
                
        login($user,$pass,$conn,$cookie_name);
        

                
    }

?>