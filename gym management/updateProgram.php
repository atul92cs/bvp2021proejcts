<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='program';
$data=json_decode(file_get_contents('php://input'));
$member=$data->member;
$plan=$data->plan;
$id=$data->id;
$query='update '.$table.' set member=:member,plan=:plan where id=:id';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':member',$member);
$stmt->bindParam(':plan',$plan);
$stmt->bindParam(':id',$id);
if($stmt->execute())
{
    $response['message']='Program updated';
    echo json_encode($response);
}
else
{
    $response['message']='error occcured';
    echo json_encode($response);
}
?>