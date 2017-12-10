<?php
session_start();

array_push($_SESSION['cart'], array("id" => $_POST['id'], "name" => $_POST['name'], "description" => $_POST['description'], "price" => $_POST['price'], "image" => $_POST['image']));

foreach( $_SESSION['cart'] as $key => $value )
{
    echo $value["id"];
    echo $value["name"];
    echo $value["description"];
    echo $value["price"];
    echo $value["image"];
}
?>