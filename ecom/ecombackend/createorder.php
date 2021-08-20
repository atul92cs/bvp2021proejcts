<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';
$table='orders';
$data=json_encode(file_get_contents('php://input'));
$ordersum=$data->ordersum;
$user=$data->user;
$status='placed';
$query='insert into '.$table.' (order_summary,user,status) values (:ordersum,:user,:status)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':ordersum',$ordersum);
$stmt->bindParam(':user',$user);
$stmt->bindParam(':status',$status);
if($stmt->execute())
{
    $response['message']='order created';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>