<?php
$cart = json_decode($_COOKIE["myCart"]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../.css/week03/assign03-items.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Checkout</title>
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
        Checkout:
        <?php
        $totalAmount = 0;
        echo "<div class='row mx-auto'>";
        foreach ($cart as $item) {
            $itemName = "";
            $itemPictureLink = "";
            switch ($item) {
                    //T-Shirts
                case ("ts1"):
                    $itemName = "Red Ivanti Shirt";
                    $itemPictureLink = "../resource/assign03/tshirt/tshirt1.jpg";
                    break;
                case ("ts2"):
                    $itemName = "Blue Lucid Shirt";
                    $itemPictureLink = "../resource/assign03/tshirt/tshirt2.jpg";
                    break;
                case ("ts3"):
                    $itemName = "Grey 39 Shirt";
                    $itemPictureLink = "../resource/assign03/tshirt/tshirt3.jpg";
                    break;
                case ("ts4"):
                    $itemName = "Grey Shirt";
                    $itemPictureLink = "../resource/assign03/tshirt/tshirt4.jpg";
                    break;

                    //Shirts
                case ("s1"):
                    $itemName = "Long Sleeves White Shirt";
                    $itemPictureLink = "../resource/assign03/buttonupshirt/button1.jpg";
                    break;
                case ("s2"):
                    $itemName = "Long Sleeves Green Shirt";
                    $itemPictureLink = "../resource/assign03/buttonupshirt/button2.jpg";
                    break;
                case ("s3"):
                    $itemName = "Green Plaid Shirt";
                    $itemPictureLink = "../resource/assign03/buttonupshirt/button3.jpg";
                    break;
                case ("s4"):
                    $itemName = "Black Long Sleeves Shirt";
                    $itemPictureLink = "../resource/assign03/buttonupshirt/button4.jpg";
                    break;
                case ("s5"):
                    $itemName = "White/Blue Plaid Shirt";
                    $itemPictureLink = "../resource/assign03/buttonupshirt/button5.jpg";
                    break;

                    //Pants
                case ("p1"):
                    $itemName = "Slack";
                    $itemPictureLink = "../resource/assign03/pants/pants1.jpg";
                    break;
                case ("p2"):
                    $itemName = "Black Jeans";
                    $itemPictureLink = "../resource/assign03/pants/pants2.jpg";
                    break;

                    //Shoes
                case ("ss1"):
                    $itemName = "Snow Boots";
                    $itemPictureLink = "../resource/assign03/shoes/shoes1.jpg";
                    break;
                case ("ss2"):
                    $itemName = "Black Church Shoes";
                    $itemPictureLink = "../resource/assign03/shoes/shoes2.jpg";
                    break;
                case ("ss3"):
                    $itemName = "Brown Church Shoes";
                    $itemPictureLink = "../resource/assign03/shoes/shoes3.jpg";
                    break;
                case ("ss4"):
                    $itemName = "Tall Black Church Shoes";
                    $itemPictureLink = "../resource/assign03/shoes/shoes4.jpg";
                    break;
                case ("ss5"):
                    $itemName = "Black Nike Sport Shoes";
                    $itemPictureLink = "../resource/assign03/shoes/shoes5.jpg";
                    break;

                    //Hoodies
                case ("hd1"):
                    $itemName = "Heron Hoodie";
                    $itemPictureLink = "../resource/assign03/hoodie/hoodie1.jpg";
                    break;
                case ("hd2"):
                    $itemName = "Grey Hoodie";
                    $itemPictureLink = "../resource/assign03/hoodie/hoodie2.jpg";
                    break;

                    //Ties:
                case ("ti1"):
                    $itemName = "Paisley Tie";
                    $itemPictureLink = "../resource/assign03/tie/tie1.jpg";
                    break;
                case ("ti2"):
                    $itemName = "Red-X Tie";
                    $itemPictureLink = "../resource/assign03/tie/tie2.jpg";
                    break;
                case ("ti3"):
                    $itemName = "White/Blue Floral Tie";
                    $itemPictureLink = "../resource/assign03/tie/tie3.jpg";
                    break;
                default;
                    break;
            }
            echo '<div class="item-container col-md-3 mx-2 my-2">
                           <img class="item" src="' . $itemPictureLink . '" alt="">
                                ' . $itemName . ' - $9.99<br>
                      </div>';
            $totalAmount += 9.99;
        }
        echo "</div>";
        ?>
        <hr>
        <div class='float-right'>
            <br>
            <h2>Your total is: $ <?php echo $totalAmount; ?></h2>
        </div>


        <form action="confirmation.php" method="POST">
            <h2>Payment: </h2>
            <div class="form-group">
                <label>Street Address:</label>
                <input type="text" class="form-control" name="streetAddress" required>
            </div>

            <div class="form-group">
                <label>City:</label>
                <input type="text" class="form-control" name="city" required>
            </div>

            <div class="form-group">
                <label>State:</label>
                <input type="text" class="form-control" name="state" required>
            </div>

            <div class="form-group">
                <label>Zip code:</label>
                <input type="text" class="form-control" name="zip" required>
            </div>

            <button type="submit" class="btn btn-success float-right">Checkout</button>
            <button type="button" class="btn btn-light float-right" onclick="window.location.href='cart.php'">Back to Cart</button>
        </form>
    </div>

    <div class="container"  id="pageFooter">
        <footer>
            <p>Copyright ©2020</p>
        </footer>
    </div>

</body>