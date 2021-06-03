<?php

include_once('config.php');

// pid: pid, part: c, text: tPart, neww: neww

$rawData = file_get_contents("php://input");

$data = json_decode($rawData, true);

$pid = $data['pid'];
$part = $data['part'];
$cmt = $data['text'];
//$new = $data['neww'];


if (!empty($cmt)) {

    if ($part == 'a') {
        $test = "SELECT p_a FROM points_table WHERE p_a='-diff it at first-'";
        $r = $mysqli->query($test);
        if ($r == TRUE) {
            if ($r->num_rows > 0) {
                $sql = "UPDATE points_table SET p_a= '{$cmt}' WHERE i=(SELECT i FROM points_table WHERE p_a='-diff it at first-' ORDER BY i LIMIT 1)";
            } else {
                $sql = "INSERT INTO points_table (post_id, p_a) VALUES ( '{$pid}', '{$cmt}')";
            }
        } else {
            $res = "Unable to run test 1: " . $sql . "<br>" . $mysqli->error;
        }
    } else if ($part == 'b') {
        $test = "SELECT p_b FROM points_table WHERE p_b='-diff it at first-'";
        $r = $mysqli->query($test);
        if ($r == TRUE) {
            if ($r->num_rows > 0) {
                $sql = "UPDATE points_table SET p_b= '{$cmt}' WHERE i=(SELECT i FROM points_table WHERE p_b='-diff it at first-' ORDER BY i LIMIT 1)";
            } else {
                $sql = "INSERT INTO points_table (post_id, p_b) VALUES ( '{$pid}', '{$cmt}')";
            }
        } else {
            $res = "Unable to run test 2: " . $sql . "<br>" . $mysqli->error;
        }
    }

    if ($mysqli->query($sql) == TRUE) {
        $res = "1";
    } else {
        $res = "Unable to save: " . $sql . "<br>" . $mysqli->error;
    }
} else {
    $res = "empty field..";
}

echo $res;

?>