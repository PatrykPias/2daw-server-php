<?php


    function precio($conn ,$prod){
        
        $stmt = $conn->prepare("SELECT buyPrice FROM products where productCode = :prod_code");
        $stmt->bindParam(':prod_code', $prod);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_NUM);

        return $result;
    }

    function productos($conn ,$prod){
        $stmt = $conn->prepare("SELECT productCode,productName,quantityInstock FROM PRODUCTS WHERE PRODUCTCODE = :prod");
        $stmt->bindParam(':prod', $prod);
        $stmt->execute();
    
        $stock = $stmt->fetchAll(\PDO::FETCH_NUM);

        return $stock;
    }






?>