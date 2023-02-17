<?php


function select($name,$conn){ #en esta funcion pedimos un select de una tabla

    $sth = $conn->prepare("SELECT * FROM $name");
    $sth->execute();

    /* Fetch all of the values of the first column*/
    $result = $sth->fetchAll(\PDO::FETCH_NUM);
    return $result;
}

?>