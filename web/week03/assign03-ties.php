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
                    <a class="nav-link active" href="assign03-ties.php">Ties</a>
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
        Ties
        <div class="row mx-auto">
            <div class="item-container col-md-3 mx-2 my-2">
                <img class="item" src="../resource/assign03/tie/tie1.jpg" alt="">
                <form action="cart.php" method="POST">
                    Paisley Tie - $9:99<br>
                    <input type="hidden" value="ti1" name="itemToCart">
                    <button type="submit" class="btn btn-primary btn-sm">Add to cart</button>
                </form>
            </div>
            <div class="item-container col-md-3 mx-2 my-2">
                <img class="item" src="../resource/assign03/tie/tie2.jpg" alt="">
                <form action="cart.php" method="POST">
                    Red-X Tie - $9:99<br>
                    <input type="hidden" value="ti2" name="itemToCart">
                    <button type="submit" class="btn btn-primary btn-sm">Add to cart</button>
                </form>
            </div>
            <div class="item-container col-md-3 mx-2 my-2">
                <img class="item" src="../resource/assign03/tie/tie3.jpg" alt="">
                <form action="cart.php" method="POST">
                    White/Blue Floral Tie - $9:99<br>
                    <input type="hidden" value="ti3" name="itemToCart">
                    <button type="submit" class="btn btn-primary btn-sm">Add to cart</button>
                </form>
            </div>
        </div>
    </div>

    <!--Bootstrap javascript files-->
    <script src="js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>