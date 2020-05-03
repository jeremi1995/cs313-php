<?php
$visitorName = $_GET['visitorName']

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Thank you!</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center"><?php print "Hello " . $visitorName . "! Thank you for visiting my page! :)" ?></h1>
        <button class="btn btn-success" onclick="window.location.href='home.html'">Return</button>
    </div>
</body>

</html>