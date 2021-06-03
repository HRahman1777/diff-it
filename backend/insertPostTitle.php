<?php

include_once('config.php');


$rawData = file_get_contents("php://input");

$data = json_decode($rawData, true);

$aid = $data['aid'];
$postd = $data['postt'];

if (!empty($postd) && !empty($aid)) {
    $sql = "INSERT INTO posts_table (a_id, p_title) VALUES ('$aid', '$postd')";

    if ($mysqli->query($sql) == TRUE) {
        $res = "1";
    } else {
        $res = "Unable to save: " . $sql . "<br>" . $mysqli->error;
    }
} else {
    $res = "empty field...";
}

echo $res;
