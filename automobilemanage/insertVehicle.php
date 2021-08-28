<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='vehicle';
$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$model=$data->model;
$pdate=$data->pdate;
$status=$data->status;
$query='insert into '.$table.'(name,model,pickup_date,status) values (:name,:model,:pdate,:status)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':model',$model);
$stmt->bindParam(':pdate',$pdate);
$stmt->bindParam(':status',$status);
if($stmt->execute())
{
    $response['message']='Vehicle entry created';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>