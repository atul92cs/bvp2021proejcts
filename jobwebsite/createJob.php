<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='job';
$data=json_decode(file_get_contents('php://input'));
$title=$data->name;
$type=$data->type;
$description=$data->description;
$salary=$data->salary;
$location=$data->location;
$company=$data->company;
$status=$data->status;
$query='insert into '.$table.' (title,type,description,salary,location,company,status) values (:title,:type,:description,:salary,:location,:company,:status)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':title',$title);
$stmt->bindParam(':type',$type);
$stmt->bindParam(':description',$description);
$stmt->bindParam(':salary',$salary);
$stmt->bindParam(':location',$location);
$stmt->bindParam(':company',$company);
$stmt->bindParam(':status',$status);
if($stmt->execute())
{
    $response['message']='Job created';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>