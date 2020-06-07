<?php
session_start();

require "../db/database.php";
$db = getDB();

$statement1 = $db->prepare("SELECT * FROM topic");
$statement1->execute();

//If a scripture together with some topics are received:
if (
    isset($_POST["book"]) && isset($_POST["chapter"]) &&
    isset($_POST["verse"]) && isset($_POST["content"]) &&
    isset($_POST["topics"])
) {

    //Insert new scripture to database 'scriptures'
    $statement2 = $db->prepare("INSERT INTO scriptures (book, chapter, verse, content)
                                           VALUES (:bo, :ch, :ve, :co)");
    $statement2->bindValue(":bo", $_POST["book"]);
    $statement2->bindValue(":ch", $_POST["chapter"]);
    $statement2->bindValue(":ve", $_POST["verse"]);
    $statement2->bindValue(":co", $_POST["content"]);

    $statement2->execute();

    //Prepare the newly inserted scripture for connecting with topics
    $newScriptureId = $db->lastInsertId("scriptures_id_seq");
    $_SESSION["new_scripture_id"] = $newScriptureId;

    //If new topic is given:
    //  - store new topic into database
    //  - Insert new scripture-topic relationship into
    //    database scripture_topic with added topic
    if (
        isset($_POST["addTopic"]) && $_POST["addTopic"] == "yes"
        && isset($_POST["newTopic"])
    ) {
        //  - store new topic into database
        $statement3 = $db->prepare("INSERT INTO topic (name) VALUES (:nt)");
        $statement3->bindValue(":nt", $_POST["newTopic"]);
        $statement3->execute();

        //  - store the relationship between the newScripture and the newTopic
        $newTopicId = $db->lastInsertId("topic_id_seq");
        $statement4 = $db->prepare("INSERT INTO scriptures_topic (scripture_id, topic_id)
                                            VALUES (:si, :ti)");
        $statement4->bindValue(":si", $newScriptureId);
        $statement4->bindValue(":ti", $newTopicId);
        $statement4->execute();
    }

    //Insert new scripture-topic relationship to database scriptures_topic

    $topics = $_POST["topics"];
    foreach ($topics as $topic) {
        $stmt = $db->prepare("INSERT INTO scriptures_topic (scripture_id, topic_id)
                                        VALUES (:si, :ti)");
        $stmt->bindValue(":si", $newScriptureId);
        $stmt->bindValue(":ti", $topic);
        $stmt->execute();
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
    <header>
        <h1>Scripture Resources</h1>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <h2>Insert Your Scripture</h2>
                <form action="teamActivity.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Book" name="book" id="in_book" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Chapter" name="chapter" id="in_chapter" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Verse" name="verse" id="in_verse" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Verse content..." name="content" id="in_content" required></textarea>
                    </div>
                    <?php
                    $inputIndex = 0;
                    while ($topic = $statement1->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="form-check">
                        <input type="checkbox" class="form-check-input in_topics" id="topic' . $inputIndex . '" name="topics[]" value="' . $topic["id"] . '">
                        <label class="form-check-label" for="topic' . $inputIndex . '">' . $topic["name"] . '</label>
                      </div>';
                        $inputIndex++;
                    }
                    ?>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="addTopic" name="addTopic" value="yes">
                        <label class="form-check-label" for="addTopic">Add my own topic</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="newTopic" id="newTopic" placeholder="New topic" disabled>
                    </div>
                    <button type="button" class="btn btn-primary" id="mySubmitButton">Submit</button>
                </form>
            </div>
            <div class="col-sm-8 col-md-8">
                <?php
                if (isset($_SESSION["new_scripture_id"])) {
                    require "displayNewest.php";
                }
                ?>
                <h2>Scriptures...</h2>
                <table class="table">
                    <tr>
                        <th scope="column">Scripture ID</th>
                        <th scope="column">Book, Chapter:Verse </th>
                        <th scope="column">Content</th>
                        <th scope="column">Topics</th>
                    </tr>
                    <?php
                    $statement = $db->prepare("SELECT * FROM scriptures");
                    $statement->execute();
                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        // The variable "row" now holds the complete record for that
                        // row, and we can access the different values based on their
                        // name
                        $scripture_id = $row['id'];
                        $book = $row['book'];
                        $chapter = $row['chapter'];
                        $verse = $row['verse'];
                        $content = $row['content'];

                        //Figure out which topics the scripture is related to
                        $stmt1 = $db->prepare('SELECT name FROM scriptures_topic as st 
                                                           JOIN topic as t 
                                                           ON st.topic_id=t.id
                                                           WHERE scripture_id=:si;');
                        $stmt1->bindValue(":si", $scripture_id);
                        $stmt1->execute();

                        echo "<tr>" . "<td>" . $scripture_id    . "</td>" .
                            "<td><b>" . $book . " $chapter" . ":$verse" . "</b></td>" .
                            "<td>" . $content . "</td>" .
                            "<td>";
                        while ($topicObj = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                            echo $topicObj["name"] . "<br>";
                        }

                        echo "</td></tr>";
                    }
                    ?>
                </table>
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