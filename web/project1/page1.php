<?php
session_start();
//if an user_name is given to the page, set user_name session variable
if (isset($_POST["user_name"])) {
    $_SESSION["user_name"] = $_POST["user_name"];
}
//if the log_out signal is given, unset the user_name variable
if (isset($_POST["log_out"]) && isset($_SESSION["user_name"])) {
    unset($_SESSION["user_name"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Shopping Site</title>
</head>

<body>

    <header class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container">
            <a class="navbar-brand mb-0 h1 text-dark" href="main.php">myScriptures</a>
            <ul class="navbar-nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="page1.php">page1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page2.php">page2</a>
                </li>
            </ul>
            <form class="form-inline" action="main.php" method="POST">
                Hello, <?php echo $_SESSION["user_name"]; ?>! <br>
                <input type="hidden" name="log_out" value="true">
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Log Out</button>
            </form>
        </div>
    </header>

    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <img src="../resource/avatar3.jpg" alt="" width="300" height="433">
            </div>
            <div class="col-sm-8 col-md-8">
                <h2>Welcome to myClothes!</h2>
                <p>This is where I sell my high quality used clothes :)</p>
                <p>
                    User name: <?php echo "page 1: "; ?>
                </p>
            </div>
        </div>
    </div>

    <div class="container" id="pageFooter">
        <footer>
            <p>Copyright ©2020</p>
        </footer>
    </div>

    <!--Bootstrap javascript files-->
    <script src="js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>