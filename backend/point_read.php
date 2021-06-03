<?php

include_once('config.php');

$rawData = file_get_contents("php://input");

$fdata = json_decode($rawData, true);

$idno = $fdata['pid'];


$sql = "SELECT p_a, p_b FROM points_table WHERE post_id={$idno}";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = "0";
}
echo json_encode($data);
