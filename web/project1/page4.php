<?php

/***********************************************************
 *   SIGN UP PAGE
 *   This is where the user can sign up for a new account
 ************************************************************/
session_start();

//database loading
require "../db/database.php";
$db = getDB();

$pwdMatch = true;
$usernameUnique = true;
$signUpSuccess = false;

if (
    isset($_POST["first_name"]) && isset($_POST["last_name"])
    && isset($_POST["date_of_birth"]) && isset($_POST["username"])
    && isset($_POST["password"]) && isset($_POST["c_password"])
) {
    //If confirmed password matches password,...
    if (!($_POST["password"] == $_POST["c_password"])) {
        $pwdMatch = false;
    }

    //Look at database to see if username already exists
    $stmt = $db->prepare("SELECT * FROM users WHERE user_name=:un");
    $stmt->bindValue(":un", $_POST["username"]);
    $stmt->execute();
    $unFromDB = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($unFromDB)) {
        $usernameUnique = false;
    }

    //If password matches and username is unique, proceed to
    // push into database:
    if ($usernameUnique && $pwdMatch) {

        $stmt1 = $db->prepare("INSERT INTO users (user_name, password, first_name, last_name, date_of_birth) 
                               VALUES (:un, :pw, :fn, :ln, :bd)");
        $stmt1->bindValue(":un", $_POST["username"]);
        $stmt1->bindValue(":pw", $_POST["password"]);
        $stmt1->bindValue(":fn", $_POST["first_name"]);
        $stmt1->bindValue(":ln", $_POST["last_name"]);
        $stmt1->bindValue(":bd", $_POST["date_of_birth"]);
        $stmt1->execute();
        $signUpSuccess = true;
    }
}

?>

<?php
/*********************************************************
 * PAGE HTML PRESENTATION
 **********************************************************/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="page4.css">
    <title>Sign-up</title>
</head>

<body>

    <header class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container">
            <a class="navbar-brand mb-0 h1 text-dark" href="main.php">myScriptures</a>
        </div>
    </header>

    <div class="container">
        <br><br>
        <h2>Sign-up</h2>
        <br><br>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div id="message">
                    <?php
                    if (!$pwdMatch || !$usernameUnique) {
                        echo "<p class='error'>Please fix the following error:</p>";
                        if (!$pwdMatch) {
                            echo "<p class='error'>- Confirm password must match password</p>";
                        }

                        if (!$usernameUnique) {
                            echo "<p class='error'>- Username already exists</p>";
                        }
                    }
                    ?>
                </div>
                <?php
                if ($signUpSuccess) {
                    echo "<p>Sign-up success! Redirecting...</p>";
                    sleep(10);
                    echo "<form id='redirect' action='main.php' method='POST'>
                        <input type='hidden' name='user_name' value='" . $_POST["username"] . "'>
                        <input type='hidden' name='password' value='" . $_POST["password"] . "'>
                    </form>
                    <script>
                        document.getElementById('redirect').submit();
                    </script>
                    ";
                } else {
                    echo '<form action="page4.php" method="POST">';
                    if (isset($_POST["first_name"]) && isset($_POST["last_name"])
                        && isset($_POST["date_of_birth"])) {
                        echo 
                        '<div class="form-group">
                            <input class="form-control" type="text" name="first_name" value="' . $_POST["first_name"] .'" placeholder="First name" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="last_name" value="' . $_POST["last_name"] .'" placeholder="Last name" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="date" name="date_of_birth" value="' . $_POST["date_of_birth"] .'" placeholder="Date of birth" required>
                        </div>';
                    }

                    else {
                        echo 
                        '<div class="form-group">
                            <input class="form-control" type="text" name="first_name" placeholder="First name" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="last_name" placeholder="Last name" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="date" name="date_of_birth" placeholder="Date of birth" required>
                        </div>';
                    }
                    echo
                        '<div class="form-group">
                            <input class="form-control" type="text" name="username" placeholder="Username" minlength="8" required></textarea>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="password" placeholder="Password" minlength="8" required></textarea>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="c_password" placeholder="Confirm Password" minlength="8" required></textarea>
                        </div>
                        <br>
                        <button class="btn btn-primary">Create account</button>
                    </form>';
                }
                ?>
            </div>
        </div>
    </div>


    <footer class="page-footer pt-4">
        <div class="footer-copyright text-center py-3">Copyright ©2020</div>
    </footer>

    <script src="page4.js"></script>
    <!--Bootstrap javascript files-->
    <script src="js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>