<?php

require "../db/database.php";
$db = getDB();
$statement = $db->prepare("SELECT * FROM users");
//$statement->bindValue(':user_id', $user_id);

 while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    // The variable "row" now holds the complete record for that
    // row, and we can access the different values based on their
    // name
    $personal_record_id = $row['id'];
    $record_name = $row['user_name'];
    $record_amount = $row['password'];
    $record_date = $row['date_of_birth'];
    echo "<tr>" . "<td>" . $record_name    . "</td>" .
        "<td>" . $record_amount . "</td>" .
        "<td>" . $record_date       .

        "<form action='remove_pr.php' method='POST'>" .
        "<button type='submit' class='btn btn-danger' name='remove'" .
        "value='$personal_record_id'>Remove Entry</button></form>";


    "</td>" .
        "</tr>";
}


?>