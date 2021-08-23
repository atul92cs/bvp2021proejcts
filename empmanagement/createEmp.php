<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='emp';
$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$department=$data->department;
$designation=$data->designation;
$query='insert into '.$table.' (name,department,deisgnation) values (:name,:department,:designation) ';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':deparment',$department);
$stmt->bindParam(':designation',$designation);
if($stmt->execute())
{
    $response['message']='Employee created';
    echo json_encode($response);
}
else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>