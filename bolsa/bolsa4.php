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

        <label for = "Valores">Valores</label>
        <select name="valores">
        <?php
        require "funciones_bolsa.php";
        $fichero = "ibex35.txt";
        select($fichero);
        ?>
        </select>
        <br>
        <label for = "mostrar">Mostrar</label>
        <select name="mostrar">
        <option value=ulti>Ultimo Valor</option>
        <option value=var>Variacion%</option>
        <option value=var1>Variacion</option>
        <option value=ac>Ac%Anual</option>
        <option value=max>Maximo</option>
        <option value=min>Minimo</option>
        <option value=vol>Volumen</option>
        <option value=capi>Capitalizacion</option>

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
        $mostrar = $_POST["mostrar"];

        $rest = valores($fichero,$empresa,$mostrar);


        if ($mostrar == "ulti") {
            echo "El valor Ultimo de $empresa es $rest";
        }elseif ($mostrar === "var") {
            echo "El valor Variacion% de $empresa es $rest";
        }elseif ($mostrar == "var1") {
            echo "El valor Variacion de $empresa es $rest";
        }elseif ($mostrar == "ac") {
            echo "El valor Ac%Anual de $empresa es $rest";
        }elseif ($mostrar == "max") {
            echo "El valor Maximo de $empresa es $rest";
        }elseif ($mostrar == "min") {
            echo "El valor Minimo de $empresa es $rest";
        }elseif ($mostrar == "vol") {
            echo "El valor Volumen de $empresa es $rest";
        }elseif ($mostrar == "capi") {
            echo "El valor Capitalizacion de $empresa es $rest";
        }

        


    }
    
    
    ?>


</body>
</html>