<?php
class CRUD
{
    private $Db;

    function __construct($DB_CONNECT)
    {
        $this->Db = $DB_CONNECT;
    }

    public function registerUser($username, $password, $email) {

        filter_var($email, FILTER_SANITIZE_EMAIL);
        filter_var($username, FILTER_SANITIZE_STRING);

        if(!empty($_POST["password"])) {
            $password = ($_POST["password"]);
            if (strlen($password) <= '8') {
                echo "Your Password Must Contain At Least 8 Characters!";
                return false;
            }
            elseif(!preg_match("#[0-9]+#",$password)) {
                echo "Your Password Must Contain At Least 1 Number!";
                return false;
            }
            elseif(!preg_match("#[A-Z]+#",$password)) {
                echo "Your Password Must Contain At Least 1 Capital Letter!";
                return false;
            }
            elseif(!preg_match("#[a-z]+#",$password)) {
                echo "Your Password Must Contain At Least 1 Lowercase Letter!";
                return false;
            }
            elseif(!preg_match("[\W]",$password)) {
                echo "Your Password Must Contain At Least 1 Special Character!";
                return false;
            }
        }

        if(filter_var($email, FILTER_VALIDATE_EMAIL) && (preg_match('/^[a-z0-9]{8,20}$/', $username)))
        {
            try{
                $id = 0;

                $statement = $this->Db->prepare("INSERT INTO users(user_id, username, password, email) VALUES (:user_id, :username, :password, :email)");
                $statement->bindparam(":user_id", $id);
                $statement->bindparam(":username", $username);
                $statement->bindparam(":password", $password);
                $statement->bindparam(":email", $email);

                $statement->execute();

                return true;

            } catch (PDOException $ex){
                echo $ex->getMessage();
                return false;
            }
        }
    }

    public function getUser($email){

        try{

            $statement = $this->Db->prepare("SELECT * FROM users WHERE email=:email");
            $statement->execute(array(":email"=>$email));
            $dataRows = $statement->fetch(PDO::FETCH_ASSOC);

            return $dataRows;

        } catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function getProducts(){

        try{

            $statement = $this->Db->prepare("SELECT * FROM items");
            $statement->execute();
            $dataRows = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $dataRows;

        } catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function shoppingCartItems(){
        foreach($_SESSION['cart'] as $index => $value) {
            echo "<div id='$index' class='cartItem'>";
            echo '<img src='.$value["image"].' alt='.$value['description'].' />';
            echo "<h2>" . $value['name'] . "</h2>";
            echo "<h3>" . $value['description'] . "</h3>";
            echo "<h3>" . $value['price'] . "</h3>";
            echo "<button onclick='deleteCartItem(this)'>" . "Delete Item" . "</button>";
            echo "</div>";
        }
    }

    public function outputProducts(){
        $crud = $this->getProducts();
        $products = [];
        require('Item.php');

        for ($i = 0; $i < $crud[$i]; $i++){
            ${'item'.$i} = new Item($crud[$i]['product_id'], $crud[$i]['product_name'], $crud[$i]['product_description'], $crud[$i]['price'], $crud[$i]['image']);
            ${'e'.$i} = json_encode(${'item'.$i}, JSON_PRETTY_PRINT);
            ${'d'.$i} = json_decode(${'e'.$i}, true);
            array_push($products, ${'d'.$i});
        }

        for ($x = 0; $x < $products[$x]; $x++){
            echo "<div id=".$x." class='productsItems'>";
            echo '<img src="' . $products[$x]["image"] .'" alt="'. $products[$x]['description'] . '"/>';
            echo "<h2 id='name'>" . $products[$x]['name'] . "</h2>";
            echo "<h3 id='description'>" . $products[$x]['description'] . "</h3>";
            echo "<h3 id='price'>€ " . $products[$x]['price'] . "</h3>";
            echo "<button onclick='addToCart(this)'>" . "Add Item" . "</button>";
            echo "</div>";
            echo "<br/>";
        }
    }
}