<?php
if (isset($_POST["deleteCart"])) {
    setcookie("myCart", "[]", time() + (86400 * 30), "/");
} else {

    $cart = array();
    if (isset($_COOKIE["myCart"])) {
        $cart = json_decode($_COOKIE["myCart"]);
    }

    $newItem = "";
    if (isset($_POST["itemToCart"])) {
        $newItem = $_POST["itemToCart"];
    }

    if ($newItem != "") {
        array_push($cart, $newItem);
    }
    setcookie("myCart", json_encode($cart), time() + (86400 * 30), "/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../.css/week03/assign03-items.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Shopping Site</title>
</head>

<body>
    <header class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container">
            <a class="navbar-brand mb-0 h1 text-dark" href="assign03.php">myClothes</a>
            <ul class="navbar-nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="assign03-tshirts.php">T-shirt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="assign03-shirts.php">Button-up Shirt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="assign03-pants.php">Pants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="assign03-ties.php">Ties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="assign03-shoes.php">Shoes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="assign03-hoodies.php">Hoodies</a>
                </li>
            </ul>
            <form class="form-inline" action="cart.php" method="POST">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">myCart</button>
            </form>
        </div>
    </header>

    <div class="container">
        <br><br>
        Your Cart: <br>
        <?php
        if (isset($cart) && !empty($cart)) {
            echo "<div class='row mx-auto'>";
            foreach ($cart as $item) {
                $itemName = "";
                $itemPictureLink = "";
                switch ($item) {
                    case ("ts1"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    case ("ts2"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt2.jpg";
                        break;
                    case ("ts3"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt3.jpg";
                        break;
                    case ("ts4"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt4.jpg";
                        break;
                    case ("s1"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    case ("s2"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    case ("s3"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    case ("s4"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    case ("s5"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    case ("p1"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    case ("p2"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    case ("ss1"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    case ("ss2"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    case ("ss3"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    case ("ss4"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    case ("ss5"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    case ("hd1"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    case ("hd2"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    case ("ti1"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    case ("ti2"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    case ("ti3"):
                        $itemName = "Red Ivanti Shirt";
                        $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                        break;
                    default;
                        break;
                }
                echo '<div class="item-container col-md-3 mx-2 my-2">
                           <img class="item" src="' . $itemPictureLink . '" alt="">
                           <form action="cart.php" method="POST">
                                ' . $itemName . ' - $9.99<br>
                                <input type="hidden" value="' . $item . '" name="itemToCart">
                                <button type="submit" class="btn btn-danger btn-sm">Remove from cart</button>
                           </form>
                      </div>';
            }
            echo "</div>";
        } else {
            echo "Your cart is empty!";
        }
        ?>
        <br>
        <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="hidden" value="yes" name="deleteCart">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">empty cart</button>
        </form>
    </div>

    <!--Bootstrap javascript files-->
    <script src="js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>