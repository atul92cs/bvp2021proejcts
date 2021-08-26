<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';
 $table='plans';
 $data=json_decode(file_get_contents('php://input'));
 $name=$data->name;
 $type=$data->type;
 $query='insert into '.$table.'(name,type) values (:name,:type)';
 $stmt=$pdo->prepare($query);
 if($stmt->execute())
 {
    $response['message']='Plan Created';
    echo json_encode($response);
 }
 else
 {
    $response['message']='error occured';
    echo json_encode($response);
 }
?>