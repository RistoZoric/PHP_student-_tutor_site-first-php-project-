<?php

include '../server_config/db_connect.php';

//create connect object
$con = new connection();

$con_db = $con->connection;

if ($con_db->connect_error) {
    echo (array("success" => "false", "message" => "server error"));
    exit();
}

//data from client
$id = $_POST['id'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = password_hash(
    $password,
    PASSWORD_DEFAULT
);
$name = $_POST['name'];
$group_id = $_POST['group_id'];

$sql = "INSERT INTO user (id, strEmail, strPassword,nGroup_id,nRole,strName) VALUES($id,'$email','$password',$group_id,0,'$name')";
if ($con_db->query($sql) > 0) {
    echo json_encode(array("success" => "true", "message" => "New record created successfully", "data" => array("id" => $id, "email" => $email, "role" => 0)));
    exit();
} else {
    echo json_encode(array("success" => "false", "message" => "server error"));
    exit();
}
