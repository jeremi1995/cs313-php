<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <title>Team Activity</title>
</head>

<body>
    <?php
    $userName = htmlspecialchars($_POST["userName"]);
    $email = htmlspecialchars($_POST["email"]);
    $major = htmlspecialchars($_POST["major"]);
    $comment = htmlspecialchars($_POST["comment"]);

    $visits = array();
    for ($i = 0; $i < 7; $i++) {
        if (isset($_POST["visit" . $i])) {
            switch ($_POST["visit" . $i]) {
                case ("na"):
                    array_push($visits, "North America");
                    break;
                case ("sa"):
                    array_push($visits, "South America");
                    break;
                case ("eu"):
                    array_push($visits, "Europe");
                    break;
                case ("as"):
                    array_push($visits, "Asia");
                    break;
                case ("au"):
                    array_push($visits, "Australia");
                    break;
                case ("af"):
                    array_push($visits, "Africa");
                    break;
                case ("an"):
                    array_push($visits, "Antarctica");
                    break;
                default:
                    break;
            }
        }
    }
    ?>

    <div class="container">
        <h1 class="pb-2 mt-4 mb-2 border-bottom">Team Activity Display</h1>
    </div>

    <div class="container">
        <p>
            <b>Name:</b> <?php echo $userName; ?> <br>
            <b>Email:</b> <a href="mailto:<?php echo $email; ?>"><?php echo $email ?></a> <br>
            <b>Major:</b>
            <?php
            switch ($major) {
                case "cs":
                    echo "Computer Science";
                    break;
                case "wdd":
                    echo "Web Design and Development";
                    break;
                case "cit":
                    echo "Computer information Technology";
                    break;
                case "ce":
                    echo "Computer Engineering";
                    break;
                default:
                    echo "N/A";
            }
            ?>
            <br>

            <b>Places you have visited:</b>
            <ul>
                <?php
                foreach ($visits as $visit) {
                    echo "<li>" . $visit . "</li>";
                }
                ?>
            </ul>
            <b>Comments:</b> <?php echo $comment; ?>
        </p>
    </div>

</body>

</html>