<?php

/***********************************************************
 *   SIGN UP PAGE
 *   This is where the user can sign up for a new account
 ************************************************************/
session_start();

//database loading
require "../db/database.php";
$db = getDB();

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
    <title>Profile</title>
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
                <form action="signUp.php" method="POST">
                    <div class="form-group">
                        <input class="form-control" type="text" name="first_name" placeholder="First name">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="last_name" placeholder="Last name">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="date" name="date_of_birth" placeholder="Date of birth">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="user_name" placeholder="Username"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="c_password" placeholder="Confirm Password"></textarea>
                    </div>
                    <br>
                    <button class="btn btn-primary">Create account</button>
                </form>
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