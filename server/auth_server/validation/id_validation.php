<?php

include '../../server_config/db_connect.php';

//create connect object
$con = new connection();

$con_db = $con->connection;

if ($con_db->connect_error) {
    echo(array("success"=>"false","message"=>"server error"));
    exit();
}

$user_id =$_GET['id'];

//number of id validate 9 numbers
if (strlen($user_id) == 9) {
    $sql = "select * from `user` where id=" . $user_id;
    $result = $con_db->query($sql);
    if ($result->fetch_assoc()) {
        echo json_encode(array("success" => "false", "message" => "Id is already exist!"));
    } else {
        echo json_encode(array("success" => "true", "message" => "Id is valid"));
    }
} else {
    echo json_encode(array("success" => "false", "message" => "Id shoud be 9 numbers"));
}
