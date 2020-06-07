<?php
    session_start();

    //get database
    require "../db/database.php";
    $db = getDB();

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
        echo $hashedPassword;
        
        if (password_verify($_POST["password"], $hashedPassword)) {
            echo "correct!";
        } else {
            "incorrect!";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <header class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container">
            <a class="navbar-brand mb-0 h1 text-dark" href="main.php">teamActivity</a>
            <ul class="navbar-nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="#">Page 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Page 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Page 3</a>
                </li>
            </ul>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <h2>Sign-up</h2>
                <form action="teamActivity.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary" id="mySubmitButton">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <br><br>

    <br><br><br><br><br>
    <script src="teamActivity.js"></script>
    <!--Bootstrap javascript files-->
    <script src="../bootstrap/js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="../bootstrap/js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../bootstrap/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>