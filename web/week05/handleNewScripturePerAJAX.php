
<?php

$book = $_POST["book"];
$chapter = $_POST["chapter"];
$verse = $_POST["verse"];
$content = $_POST["content"];
$topics_json = $_POST["topics_json"];

$topics_id = json_decode($topics_json);

echo $book . " " . $chapter . " " . $verse . " " . $content . " " . $topics_json . " ";
foreach ($topics_id as $id) {
    echo $id . " ";
}
?>