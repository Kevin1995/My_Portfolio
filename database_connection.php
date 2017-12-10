<?php

try {

    $DB_CONNECT = new PDO("mysql:host=localhost;dbname=assignment_2_shopping_cart", 'root', '');
    $DB_CONNECT->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $ex){
    echo $ex->getMessage();
}

include_once 'CRUD.php';
$crud = new CRUD($DB_CONNECT);
?>