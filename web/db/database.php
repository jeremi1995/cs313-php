<?php

function getDB() {

$db = NULL;

try {

$dbUrl = 'postgres://uceotupgucrpqy:6ef80c902d24199baa647197a4f29d1efb097029ea827a18d5313dbb2c4a1ef3@ec2-52-207-25-133.compute-1.amazonaws.com:5432/d628mnu6q251l';


$dbOpts = parse_url($dbUrl);
$dbHost = $dbOpts["host"];
$dbPort = $dbOpts["port"];
$dbUser = $dbOpts["user"];
$dbPassword = $dbOpts["pass"];


$dbName = ltrim($dbOpts["path"], '/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} 

catch (PDOException $ex) {
echo 'Error!: ' . $ex->getMessage();
die();
}

return $db;
}