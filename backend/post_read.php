<?php

include_once('config.php');

$sql = "SELECT users.u_name, posts_table.p_title, posts_table.p_id FROM posts_table INNER JOIN users ON posts_table.a_id=users.id ORDER BY posts_table.p_id DESC";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}else{
    $data = "no data";
}

echo json_encode($data);
