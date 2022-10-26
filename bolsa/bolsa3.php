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
        <input type="text" name="valores">
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


        $empresa = $_POST["valores"];

        valores($fichero,$empresa);


    }
    
    
    ?>


</body>
</html>