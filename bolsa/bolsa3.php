<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Bolsa2</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

</head>
<body>
     
    <form name="formulario" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

        <h2>Consulta Operaciones Bolsa</h2>

        <label for = "Valores">Valores</label>
        <select name="valores">

        </select>
        <br>
        <br>

        <input type="submit" value="Visualizar"  name="submit">
        <input type="reset" value="borrar">

    </form>

    <?php
    
    if(isset($_POST["submit"]))
	{




        $empresa = $_POST["valores"];

        $con = valores($fichero,$empresa,"ulti");
        $max = valores($fichero,$empresa,"max");
        $min = valores($fichero,$empresa,"min");


        echo "<br>";
        echo "El valor <strong>Cotizacion</strong> de $empresa es ".$con."<br>";
        echo "<strong>Cotizacion Maxima</strong> de $empresa es ".$max."<br>";
        echo "<strong>Cotizacion Minima</strong> de $empresa es ".$min."<br>";


    }
    
    
    ?>


</body>
</html>