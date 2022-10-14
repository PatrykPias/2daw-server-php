<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Binario</title>
</head>
<body>

    <h1>Conversor Binario</h1>
    <form name="binario" action="<?php $_SERVER["PHP_SELF"];?>" method="post">
        
        <label for="numerodec">Numero Decimal:</label>
        <input type="text" name="numerodec">
        <br>
        <br>
        <br>       
        <input type="submit" value="enviar" name="submit">
        <input type="reset" value="borrar" name="reset">
    </form>

<?php

function binario($numbin){

$bin = decbin($numbin);

return $bin;

}
function val($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if (isset($_POST["submit"])) {
  echo "<h1>Convertido</h1>";

  $numdec =$_POST["numerodec"];
  $numbin=val($numdec);
  $bin=binario($numbin);

  echo"<br><br>";
  echo"Numero Decimal : <input type=\"text\" name=\"decimal\" value=\"".$numbin."\" readonly><br><br><br>";
  echo"Numero Binario : <input type=\"text\" name=\"binario\" value=\"".$bin."\" readonly>";
  
}


?>
    
</body>
</html>