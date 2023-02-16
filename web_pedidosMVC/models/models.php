<?php 

function compro($user , $pass1){
    try {

        global $conn;

        $stmt = $conn->prepare("SELECT CUSTOMERNUMBER,CONTACTLASTNAME FROM CUSTOMERS where CUSTOMERNUMBER=:user && CONTACTLASTNAME = :pass");

        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':pass', $pass1);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_NUM);

        return $result;

    } catch (PDOException $e) {
        echo "Error al comprobar".$e->getMessage();
        return null;
    }
}



?>