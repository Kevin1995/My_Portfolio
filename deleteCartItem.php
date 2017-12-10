<?php
session_start();

unset($_SESSION['cart'][$_POST['id']]);
$_SESSION['cart'] = array_values($_SESSION['cart']);

foreach( $_SESSION['cart'] as $key => $value )
{
    echo $value;
}
?>