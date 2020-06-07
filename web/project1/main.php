<?php

/***********************************************************
 *   MAIN PAGE
 *    Available to all users
 ************************************************************/
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

    $user = $stmt1->fetch(PDO::FETCH_ASSOC);

    if (empty($user)) {
        $loginError = true;
    } else {
        $_SESSION["user_name"] = $_POST["user_name"];
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["first_name"] = $user["first_name"];
        $_SESSION["last_name"] = $user["last_name"];
        $_SESSION["date_of_birth"] = $user["date_of_birth"];
        $loginError = false;
    }
}

//if the log_out signal is given, unset everything
if (isset($_POST["log_out"]) && isset($_SESSION["user_name"])) {
    session_unset();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>MyScriptures</title>
</head>

<body>

    <header class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container">
            <a class="navbar-brand mb-0 h1 text-dark" href="main.php">myScriptures</a>
            <?php
            if (isset($_SESSION["user_name"])) {
                echo '<ul class="navbar-nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="page1.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page2.php">Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page3.php">+Add notes</a>
                </li>
            </ul>';
            }
            ?>
            <div>
                <?php
                //If an user is in session, display login info on top right of the screen
                // Otherwise, display log-in username and password fields
                if (!isset($_SESSION["user_name"])) {
                    //If the provided username and password are incorrect, display
                    //  warning message
                    if ($loginError) {
                        echo '<p class="text-danger">Incorrect username or password</p>';
                    }
                    echo ' <form class="form-inline float-right" action="page4.php" method="POST">
                               <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Sign-up</button>
                           </form>
                           <form class="form-inline float-right" action="main.php" method="POST">
                               <input type="text" name="user_name" placeholder="Username" required>
                               <input type="password" name="password" placeholder="Password" required>
                               <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log-in</button>
                           </form>';
                } else {
                    echo '<form class="form-inline" action="main.php" method="POST">
                Hello, ' . $_SESSION["first_name"] . " " . $_SESSION["last_name"] . '! <br>' .
                        '<input type="hidden" name="log_out" value="true">
                           <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Log Out</button>
                      </form>';
                }
                ?>
            </div>
        </div>
    </header>

    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <img src="../resource/project1/gold_plates.jpg" alt="" width="350" height="350">
            </div>
            <div class="col-sm-8 col-md-8">
                <h2>Welcome to myScriptures!</h2>
                <p>This is where you can create notes for your scriptures study</p>
                <?php
                if (!isset($_SESSION["user_name"]))
                    echo "<p>Please sign in using your username and password</p>"
                ?>
            </div>
        </div>
    </div>

    <footer class="page-footer pt-4">
        <div class="footer-copyright text-center py-3">Copyright ©2020</div>
    </footer>

    <!--Bootstrap javascript files-->
    <script src="js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>