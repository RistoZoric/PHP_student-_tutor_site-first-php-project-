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
$sql = "SELECT  a.nMarks,a.strComment,user.strName FROM (SELECT * FROM rate WHERE user_id=$user_id) AS a LEFT JOIN USER ON user.id=a.rate_user_id ";
$result = $con_db->query($sql);
if ($result) {
    $rows = $result->fetch_all(MYSQLI_BOTH);
    echo json_encode(array("success" => "true", "message" => "my profile data", "data" => $rows));
    exit();
}
