<?php
echo '<h2>Newest Scripture</h2>
    <table class="table">
        <tr>
            <th scope="column">Scripture ID</th>
            <th scope="column">Book, Chapter:Verse </th>
            <th scope="column">Content</th>
            <th scope="column">Topics</th>
        </tr>';
$newScriptureId = $_SESSION["new_scripture_id"];
$statement5 = $db->prepare("SELECT * FROM scriptures WHERE id=:si");
$statement5->bindValue(":si", $newScriptureId);
$statement5->execute();
while ($newScripture = $statement5->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr><td>" . $newScriptureId . "</td>" .
        "<td><b>" . $newScripture["book"] . " " . $newScripture["chapter"] . ":" . $newScripture["verse"] . "</b></td>" .
        "<td>" . $newScripture["content"] . "</td><td>";
    $stmt3 = $db->prepare("SELECT name FROM scriptures_topic as st 
                            JOIN topic as t 
                            ON st.topic_id=t.id
                            WHERE scripture_id=:si;");
    $stmt3->bindValue(":si", $newScriptureId);
    $stmt3->execute();
    while ($topicObj = $stmt3->fetch(PDO::FETCH_ASSOC)) {
        echo $topicObj["name"] . "<br>";
    }

    echo "</td></tr>";
}

echo '</table>';
?>