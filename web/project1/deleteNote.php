<?php
/***********************************************************
*   DELETE NOTE PAGE
*    Notice: The purpose of this php file is only to delete the
*    note specified by the given note id.
*    It is not used to display anything.
************************************************************/
session_start();

if (isset($_SESSION["user_id"])) {
$user_id = $_SESSION["user_id"];
$noteID = $_POST["noteID"];

//database loading
require "../db/database.php";
$db = getDB();

$stmt = $db->prepare("DELETE FROM note WHERE id=:ni AND user_id=:ui");
$stmt->bindValue(":ni", $noteID);
$stmt->bindValue(":ui", $user_id);
$stmt->execute();
}
else {
    echo "Permission Denied";
}

?>