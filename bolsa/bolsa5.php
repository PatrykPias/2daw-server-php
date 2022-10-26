<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Bolsa</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

</head>
<body>
     
    <form name="formulario" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

        <h2>Consulta Operaciones Bolsa</h2>
        <label for = "mostrar">Mostrar</label>
        <select name="mostrar">
        <option value=totvol>Total Volumen</option>
        <option value=totcap>Total Capitalizacion</option>

        </select>
        <br>
        <br>

        <input type="submit" value="Visualizar"  name="submit">
        <input type="reset" value="borrar">

    </form>

    <?php
    
    if(isset($_POST["submit"]))
	{

        require "funciones_bolsa.php";
        $fichero = "ibex35.txt";

        $mostrar = $_POST["mostrar"];

        $res = total($fichero,$mostrar);
        echo"<br>";
        if ($mostrar == "totvol") {
            echo "<strong>Total Volumen</strong> $res";
        }elseif ($mostrar == "totcap") {
            echo "<strong>Total Capitalizacion</strong> $res";
        } 


    }
    
    
    ?>


</body>
</html>