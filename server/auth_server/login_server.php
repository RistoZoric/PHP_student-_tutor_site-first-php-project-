<?php

include '../server_config/db_connect.php';

//create connect object
$con = new connection();

$con_db = $con->connection;

if ($con_db->connect_error) {
    echo (array("success" => "false", "message" => "server error"));
    exit();
}

$password = $_POST['password'];

$id = $_POST['user_id'];

if ($id == '000000000') {
    $sql_tutor = "select * from `user` where id=" . $id;
    $result_tutor = $con_db->query($sql_tutor);
    $tutor_row = $result_tutor->fetch_assoc();
    if ($tutor_row['strPassword'] == $password) {
        $tutor_row['strPassword']='deny';
        echo json_encode(array("success" => "true", "data" => $tutor_row, "message" => "regist successfully!"));
        setcookie("user",json_encode($tutor_row));
    } else {
        echo json_encode(array("success" => "false", "message" => "password incorrect"));
    }
    exit();
}

$sql_id = "select * from `user` where id=" . $id;

$result = $con_db->query($sql_id);
$row = $result->fetch_assoc();
//validate user id
if ($row) {
    //validate password
    if (password_verify($password, $row['strPassword'])) {
        $row['strPassword']='deny';
        echo json_encode(array("success" => "true", "data" => $row, "message" => "successfully regist"));
        setcookie("user",json_encode($row));
    } else {
        echo json_encode(array("success" => "false", "message" => "password is incorrect"));
    }
} else {
    echo json_encode(array("success" => "false", "message" => "user is not registed!"));
}
