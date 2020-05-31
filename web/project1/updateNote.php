<?php
/***********************************************************
 *   UPDATE NOTES PAGE
*    Notice: The purpose of this php file is only to update the
*    'note' database given the user id, note id, verse content,
*    and note content. It is not used to display anything.
************************************************************/
session_start();

//database loading
require "../db/database.php";
$db = getDB();

$user_id = $_SESSION["user_id"];
$noteID = $_POST["noteID"];
$verse_content = $_POST["verse_content"];
$note_content = $_POST["note_content"];

//echo $verse_content;
//echo $note_content;
//echo $noteID;

$stmt1 = $db->prepare("UPDATE note SET verse_content=:vc, note_content=:nc WHERE id=:ni AND user_id=:ui");
$stmt1->bindValue(":vc", $verse_content);
$stmt1->bindValue(":nc", $note_content);
$stmt1->bindValue(":ni", $noteID);
$stmt1->bindValue(":ui", $user_id);
$stmt1->execute();

?>