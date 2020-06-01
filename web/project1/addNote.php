<?php
/*
echo $user_id;
echo $book;
echo $chapter;
echo $verse;
echo $verse_content;
echo $note_content;
*/
if (isset($_SESSION["user_id"])) {
    $addStmt = $db->prepare("INSERT INTO note (user_id, book_id, chapter, verse, verse_content, note_content)
                    VALUES (:ui,:bi,:ch,:ve,:vc,:nc)");
    $addStmt->bindValue(":ui", $user_id);
    $addStmt->bindValue(":bi", $book);
    $addStmt->bindValue(":ch", $chapter);
    $addStmt->bindvalue(":ve", $verse);
    $addStmt->bindValue(":vc", $verse_content);
    $addStmt->bindValue(":nc", $note_content);
    $addStmt->execute();
}
else {
    echo "Permission Denied";
}
?>