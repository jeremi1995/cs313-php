<?php
/***********************************************************
*    ADD NOTES PAGE
*    - Notice: This page is only available to the users after
*    signing in
************************************************************/
session_start();

//database loading
require "../db/database.php";
$db = getDB();
$user_id = $_SESSION["user_id"]; //This only works if the user logged in

//Preparing all the books from the database
$stmt = $db->prepare("SELECT * FROM book;");
$stmt->execute();

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
    <title>Add Notes</title>
</head>

<body>

    <header class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container">
            <a class="navbar-brand mb-0 h1 text-dark" href="main.php">myScriptures</a>
            <ul class="navbar-nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="page1.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page2.php">Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page3.php">+Add notes</a>
                </li>
            </ul>
            <form class="form-inline" action="main.php" method="POST">
                Hello, <?php echo $_SESSION["first_name"] . " " . $_SESSION["last_name"]; ?>! <br>
                <input type="hidden" name="log_out" value="true">
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Log Out</button>
            </form>
        </div>
    </header>

    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <img src="../resource/project1/gold_plates.jpg" alt="" width="350" height="350">
            </div>
            <div class="col-sm-8 col-md-8">
                <form action="page2.php" method="POST">
                    <div class="form-group">
                        <select name="book">
                            <?php 
                            while ($book = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $book["id"] . "'>" . 
                                      $book["book_name"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" name="chapter" placeholder="Chapter">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" name="verse" placeholder="Verse">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="verse_content" placeholder="Verse Content"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="note_content" placeholder="Note Content"></textarea>
                    </div>
                    <button class="btn btn-primary">Add</button>
                </form>
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