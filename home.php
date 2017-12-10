<?php

session_start();

include_once 'database_connection.php';

if(!isset($_COOKIE["user"])){
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/home.css">
<head>
    <title>Welcome - <?php if(!isset($_SESSION['user'])){ echo $_COOKIE['user']; } else { echo $_SESSION['user']; } ?></title>
</head>
<body>

<h2 id="login">Welcome <?php if(!isset($_SESSION['user'])){ echo $_COOKIE['user']; } else { echo $_SESSION['user']; } ?></h2>

<div id="logout">
    <?php echo " " . "<button><a href='logout.php'>Logout</a></button>"?>
</div>

<div id="cartHeader">
    <h1>Your Shopping Cart</h1>
    <a href='purchase.php'><button>Purchase Items</button></a>
</div>

<div id="cart">
    <?php $crud->shoppingCartItems(); ?>
</div>

<div id="productsHeader">
    <h1>Products</h1>
</div>

<div id="products">
    <?php $crud->outputProducts(); ?>
</div>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    function addToCart(item){
        var item_id = $(item).parent().attr("id");
        var name = $(item).parent().children("#name").text();
        var description = $(item).parent().children("#description").text();
        var price = $(item).parent().children("#price").text();
        var image = $(item).parent().find('img').attr('src');
        $.ajax({
            type:"POST",
            url:"addToCart.php",
            data:{id:item_id, name:name, description:description, price:price, image:image},
            success:function(result){
                location.reload();
                console.log(result);
            }
        });
    }

    function deleteCartItem(cart){
        var cart_item_id = $(cart).parent().attr("id");
        console.log(cart_item_id);
        $.ajax({
            type:"POST",
            url:"deleteCartItem.php",
            data:{id:cart_item_id},
            success:function(result){
                location.reload();
                console.log(result);
            }
        });
    }
</script>
</body>
</html>