<?php

include '../server_config/db_connect.php';

//create connect object
$con = new connection();

$con_db = $con->connection;

if ($con_db->connect_error) {
    echo json_encode(array("success" => "false", "message" => "server error"));
    exit();
}
$user_id = $_GET['id'];
$group_id = $_GET['group_id'];
$sql = "SELECT a.id,a.strName,a.strEmail,a.nGroup_id,rate.nMarks FROM (SELECT * FROM USER WHERE nGroup_id=$group_id AND id != $user_id) AS a LEFT JOIN rate ON a.id = rate.rate_user_id AND rate.user_id=$user_id  ";

$result = $con_db->query($sql);
if ($result) {
    $rows = $result->fetch_all(MYSQLI_BOTH);
    echo json_encode(array("success" => "true", "message" => "my group members data", "data" => $rows));
    exit();
}
