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
    $majors = array("cs"=>"Computer Science",
                    "wdd"=>"Web Design and Development",
                    "cit"=>"Computer information Technology",
                    "ce"=>"Computer Engineering");
    ?>

    <div class="container">
        <h1 class="pb-2 mt-4 mb-2 border-bottom">Team Activity Form</h1>
    </div>

    <div class="container">
        <form action="teamActivity.php" method="POST">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="userName">
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="text" class="form-control" placeholder="Enter your email" name="email">
            </div>

            <div class="form-group">
                <label>Major:</label><br>
                <?php
                foreach ($majors as $key=>$major) {
                    print '<input type="radio" name="major" value="' . $key . '"> ' . $major . '<br>';
                }
                ?>
            </div>

            <div class="form-group">
                <label>Places you have visited:</label><br>
                <input type="checkbox" name="visit0" value="na"> North America
                <input type="checkbox" name="visit1" value="sa"> South America
                <input type="checkbox" name="visit2" value="eu"> Europe
                <input type="checkbox" name="visit3" value="as"> Asia
                <input type="checkbox" name="visit4" value="au"> Australia
                <input type="checkbox" name="visit5" value="af"> Africa
                <input type="checkbox" name="visit6" value="an"> Antarctica
            </div>

            <div class="form-group">
                <label>Comment:</label>
                <textarea class="form-control" placeholder="Comment" name="comment" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>