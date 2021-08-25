<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='doctor';

$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$age=$data->age;
$address=$data->address;
$query='insert into '.$table.' (name,age,address) values (:name,:age,:address)';
$stmt=$pdo->prepare($query);
if($stmt->execute())
{
    $response['message']='Doctor registered';
    echo json_encode($response);
}
else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>