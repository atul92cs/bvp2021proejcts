<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='program';
$data=json_decode(file_get_contents('php://input'));
$member=$data->member;
$plan=$data->plan;
$query='insert into '.$table.'(member,plan) values (:member,:plan)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':member',$member);
$stmt->bindParam(':plan',$plan);
if($stmt->execute())
{
    $response['message']='Member enrolled';
    echo json_encode($response);
}
else
{
    $response['message']='error';
    echo json_encode($response);
}
?>