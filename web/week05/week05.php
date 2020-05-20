<?php

require "../db/database.php";
$db = getDB();
$statement = $db->prepare("SELECT * FROM users");
//$statement->bindValue(':user_id', $user_id);

$statement->execute();

?>