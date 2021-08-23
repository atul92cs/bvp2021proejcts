<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='company';

$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$found=$data->found;
$type=$data->type;
$size=$data->size;
$location=$data->location;

$query='insert into '.$table.' (name,found,type,size,location) values (:name,:found,:type,:size,:location)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':found',$found);
$stmt->bindParam(':type',$type);
$stmt->bindParam(':size',$size);
$stmt->bindParam(':location',$location);
if($stmt->execute())
{
    $response['message']='Company created';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>