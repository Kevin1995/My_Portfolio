<?php
session_start();
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/home.css\">";
echo "<h2 style='text-align: center'>". "Purchase Succesful" . "</h2> ";
echo "<div id='logout'>";
echo "<button><a href='home.php'>Back to Cart</a></button>";
echo "</div>";

$msg = "<h3>". "Your Purchased Item" . "</h3>";
$msg .="<br/>";
$msg .="<div id='purchases'>";
foreach($_SESSION['cart'] as $index => $value) {
    $msg .= "<div id='$index'>";
    $msg .= '<img src='.$value["image"].' alt='.$value['description'].' />';
    $msg .= "<h2>" . $value['name'] . "</h2>";
    $msg .= "<h3>" . $value['description'] . "</h3>";
    $msg .= "<h3>" . $value['price'] . "</h3>";
    $msg .= "</div>";
    $msg .= "<br/>";
}
$msg .= "</div>";

print strip_tags($msg, '<h2> <h3>');

mail("someone@example.com","Thank you for your purchase",$msg);
?>