<?php
require "../db/database.php";
$db = getDB();
$statement = $db->prepare("SELECT * FROM scriptures");
//$statement->bindValue(':user_id', $user_id);
$statement->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Scripture Resources</h1>
    </header>
    <div>
        <table>
            <tr>
                <th>Scripture ID</th>
                <th>Book, Chapter:Verse </th>
                <th>Content</th>
            </tr>
            <?php
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // The variable "row" now holds the complete record for that
                // row, and we can access the different values based on their
                // name
                $scripture_id = $row['id'];
                $book = $row['book'];
                $chapter = $row['chapter'];
                $verse = $row['verse'];
                $content = $row['content'];
                echo "<tr>" . "<td>" . $scripture_id    . "</td>" .
                    "<td><b>" . $book . " $chapter" . ":$verse" . "</b></td>" .
                    "<td>" . $content . "</td></tr>";
            }

            ?>
        </table>
    </div>
</body>

</html>