<?php

include '../server_config/db_connect.php';

//create connect object
$con = new connection();

$con_db = $con->connection;

if ($con_db->connect_error) {
    echo json_encode(array("success" => "false", "message" => "server error"));
    exit();
}

$sql = "SELECT * FROM (SELECT COUNT(*) AS cur,nGroup_id FROM USER GROUP BY nGroup_id) AS a RIGHT JOIN `group` ON a.nGroup_id=group.id";
$result = $con_db->query($sql);
if ($result) {
    $rows = $result->fetch_all(MYSQLI_BOTH);
    $newRow=array();
    foreach($rows as $row){
        if($row['nNumber']>$row['cur'] || $row['cur']==NULL){
            array_push($newRow,$row);
        }
    }
    echo json_encode(array("success" => "true", "message" => "group data", "data" => $newRow));
    exit();
}
