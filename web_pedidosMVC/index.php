<!DOCTYPE html>
<html lang="es">
<?php
if (isset($_POST["insert"])) {
    session_start();
    
}
if (isset($_SESSION["user"])) {
    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();
}
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
