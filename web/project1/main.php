<?php
session_start();

//some variables
$loginError = false;

//database loading
require "../db/database.php";
$db = getDB();

//log-in handling
//if an user_name and password is given to the page, set user_name session variable
if (isset($_POST["user_name"]) && isset($_POST["password"])) {
    $stmt1 = $db->prepare('SELECT * FROM users WHERE user_name=:un AND password=:pw');
    $stmt1->bindValue(":un", $_POST["user_name"], PDO::PARAM_STR);
    $stmt1->bindValue(":pw", $_POST["password"], PDO::PARAM_STR);
    $stmt1->execute();

    $users = $stmt1->fetchAll();

    if (empty($users)) {
        $loginError = true;
    } else {
        $_SESSION["user_name"] = $_POST["user_name"];
        $loginError = false;
    }
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
            <?php
            if (isset($_SESSION["user_name"])) {
                echo '<ul class="navbar-nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="page1.php">page1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page2.php">page2</a>
                </li>
            </ul>';
            }
            ?>
            <?php
            if (!isset($_SESSION["user_name"])) {
                if ($loginError) {
                    echo '<p class="text-danger">Incorrect username or password</p>';
                }
                echo '<form class="form-inline" action="main.php" method="POST">
                       <input type="text" name="user_name" placeholder="Username" required>
                       <input type="password" name="password" placeholder="Password" required>
                       <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log-in</button>
                  </form>';
            } else {
                echo '<form class="form-inline" action="main.php" method="POST">
                Hello, ' . $_SESSION["user_name"] . '! <br>' .
                    '<input type="hidden" name="log_out" value="true">
                           <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Log Out</button>
                      </form>';
            }
            ?>
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
                    User name: <?php
                                echo "main";
                                ?>
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