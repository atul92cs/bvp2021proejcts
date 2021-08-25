<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='room';
$data=json_decode(file_get_contents('php://input'));
$type=$data->type;
$status=$data->status;
$query='insert into '.$room.'(type,status) values (:type,:status)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':type',$type);
$stmt->bindParam(':status',$status);
if($stmt->execute())
{
    $response['message']='Room created';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>