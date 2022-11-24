<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MODIFICAR SALARIO</title>
</head>
<body>
    <H2>MODIFICAR SALARIO</H2>
   
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

    <label for="dni">DNI</label>
    <?php
    require "bd_fun.php";
    selectDni();
    ?>
    <br>
    <label for="sal_act">Salario Actual</label>
    <input type="submit" name ="salario" value="Ver salario">
    <?php
        if(isset($_POST["salario"])){
            $dni = $_POST['emple'];
            salario_act($dni);
        }
    ?>
    <br>
    <label for="sal_new">Salario Nuevo</label>
    <input type="number" name="nuevo">
    <br>
    <br>
    <input type="submit" value="Cambiar" name="cambio">
    </form>

</body>
</html>

<?php 

    // if (isset($_POST["cambio"])) {

    //     $dni = $_POST['emple'];
    //     $salario_new = $_POST['nuevo'];
    //     salario_nuevo($salario_new,$dni);

    // }


    
?>

