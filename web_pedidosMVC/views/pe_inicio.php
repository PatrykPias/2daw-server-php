<!DOCTYPE html>
<html lang="es">
    <?php
        session_start();
   if (isset($_SESSION['user'])) {
       $nif = $_SESSION['user'];
   }else{
    // echo "<SCRIPT>window.location='comlogincli.php';</SCRIPT>";
    header("Location:pe_login.php");
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
    <title>Web Pedidos</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <br>

    <?php 
    
    var_dump($_SESSION);
    ?>


    <br><br>
    <input type="submit" name="close" value="Cerrar Sesion">
    <br>
    </form> 
</body>
</html>

<?php 
    if (isset($_POST["close"])) {

        header("Location:../index.php");
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