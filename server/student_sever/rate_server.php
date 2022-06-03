<?php

include '../server_config/db_connect.php';

//create connect object
$con = new connection();

$con_db = $con->connection;

if ($con_db->connect_error) {
    echo json_encode(array("success" => "false", "message" => "server error"));
    exit();
}
